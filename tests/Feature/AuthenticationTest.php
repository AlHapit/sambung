<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

uses(RefreshDatabase::class);

test('guests can view the registration and login pages', function (): void {
    $this->get(route('register'))->assertOk();
    $this->get(route('login'))->assertOk();
});

test('users can register and are authenticated', function (): void {
    $response = $this->post(route('register.store'), [
        'name' => 'Sambung User',
        'email' => 'user@example.test',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    $user = User::firstOrFail();

    $response->assertRedirect(route('dashboard'));
    $this->assertAuthenticatedAs($user);
    $this->assertTrue(Hash::check('password123', $user->password));
});

test('registration validates duplicate emails and password confirmation', function (): void {
    User::factory()->create(['email' => 'user@example.test']);

    $this->from(route('register'))
        ->post(route('register.store'), [
            'name' => 'Sambung User',
            'email' => 'user@example.test',
            'password' => 'password123',
            'password_confirmation' => 'not-the-same',
        ])
        ->assertRedirect(route('register'))
        ->assertSessionHasErrors(['email', 'password']);
});

test('users can login and logout', function (): void {
    $user = User::factory()->create(['password' => Hash::make('password123')]);

    $this->post(route('login.store'), [
        'email' => $user->email,
        'password' => 'password123',
    ])->assertRedirect(route('dashboard'));

    $this->assertAuthenticatedAs($user);

    $this->post(route('logout'))->assertRedirect(route('login'));

    $this->assertGuest();
});

test('invalid credentials return a validation error', function (): void {
    User::factory()->create(['email' => 'user@example.test']);

    $this->from(route('login'))
        ->post(route('login.store'), [
            'email' => 'user@example.test',
            'password' => 'wrong-password',
        ])
        ->assertRedirect(route('login'))
        ->assertSessionHasErrors('email');
});

test('guests are redirected away from protected pages and authenticated users away from guest pages', function (): void {
    $this->get(route('dashboard'))->assertRedirect(route('login'));

    $this->actingAs(User::factory()->create())
        ->get(route('login'))
        ->assertRedirect(route('dashboard'));
});

test('login attempts are throttled', function (): void {
    $email = 'not-found@example.test';

    foreach (range(1, 5) as $attempt) {
        $this->from(route('login'))
            ->post(route('login.store'), [
                'email' => $email,
                'password' => 'password123',
            ])
            ->assertRedirect(route('login'));
    }

    $this->from(route('login'))
        ->post(route('login.store'), [
            'email' => $email,
            'password' => 'password123',
        ])
        ->assertStatus(429);
});

test('Google OAuth creates and authenticates a user with a verified Google email', function (): void {
    config()->set('services.google.client_id', 'test-client-id');
    config()->set('services.google.client_secret', 'test-client-secret');
    config()->set('services.google.redirect', 'http://sambung.test/auth/google/callback');

    $googleUser = Mockery::mock();
    $googleUser->shouldReceive('getId')->andReturn('google-user-id');
    $googleUser->shouldReceive('getEmail')->andReturn('google@example.test');
    $googleUser->shouldReceive('getName')->andReturn('Google User');
    $googleUser->shouldReceive('getRaw')->andReturn(['email_verified' => true]);

    $provider = Mockery::mock();
    $provider->shouldReceive('user')->once()->andReturn($googleUser);

    Socialite::shouldReceive('driver')->once()->with('google')->andReturn($provider);

    $this->get(route('google.callback'))->assertRedirect(route('dashboard'));

    $user = User::firstOrFail();

    expect($user->google_id)->toBe('google-user-id');
    expect($user->email_verified_at)->not->toBeNull();
    $this->assertAuthenticatedAs($user);
});
