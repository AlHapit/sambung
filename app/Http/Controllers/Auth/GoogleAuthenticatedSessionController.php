<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class GoogleAuthenticatedSessionController extends Controller
{
    public function redirect(): RedirectResponse
    {
        if (! config('services.google.client_id') || ! config('services.google.client_secret') || ! config('services.google.redirect')) {
            return redirect()->route('login')->withErrors([
                'google' => 'Google sign-in is not configured yet.',
            ]);
        }

        return Socialite::driver('google')
            ->scopes(['openid', 'profile', 'email'])
            ->redirect();
    }

    public function callback(Request $request): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $rawUser = $googleUser->getRaw();
            $googleId = $googleUser->getId();
            $email = Str::lower((string) $googleUser->getEmail());

            if (! $googleId || ! $email || ! filter_var($rawUser['email_verified'] ?? false, FILTER_VALIDATE_BOOLEAN)) {
                return redirect()->route('login')->withErrors([
                    'google' => 'Google did not provide a verified email address.',
                ]);
            }

            $user = User::firstWhere('google_id', $googleId);

            if (! $user) {
                $user = User::firstWhere('email', $email);

                if ($user) {
                    $user->forceFill([
                        'google_id' => $googleId,
                        'email_verified_at' => now(),
                    ])->save();
                } else {
                    $user = User::create([
                        'name' => $googleUser->getName() ?: Str::before($email, '@'),
                        'email' => $email,
                        'password' => Str::random(64),
                        'google_id' => $googleId,
                    ]);

                    $user->forceFill(['email_verified_at' => now()])->save();
                }
            }

            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard', absolute: false));
        } catch (Throwable) {
            return redirect()->route('login')->withErrors([
                'google' => 'Unable to sign in with Google. Please try again.',
            ]);
        }
    }
}
