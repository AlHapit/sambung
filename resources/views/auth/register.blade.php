<x-layouts.app>
    <h1 class="text-2xl font-semibold">Create your account</h1>
    <p class="mt-2 text-sm text-slate-600">Join {{ config('app.name') }} with your email address.</p>

    <form method="POST" action="{{ route('register.store') }}" class="mt-6 space-y-4">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name" class="mt-1 w-full rounded-md border-slate-300">
            @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="email" class="block text-sm font-medium">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" class="mt-1 w-full rounded-md border-slate-300">
            @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="password" class="block text-sm font-medium">Password</label>
            <input id="password" name="password" type="password" required autocomplete="new-password" class="mt-1 w-full rounded-md border-slate-300">
            @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="password_confirmation" class="block text-sm font-medium">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="mt-1 w-full rounded-md border-slate-300">
        </div>
        <button type="submit" class="w-full rounded-md bg-slate-900 px-4 py-2.5 text-sm font-medium text-white hover:bg-slate-700">Create account</button>
    </form>

    <p class="mt-6 text-center text-sm text-slate-600">Already registered? <a href="{{ route('login') }}" class="font-medium text-slate-900 underline">Sign in</a></p>
</x-layouts.app>
