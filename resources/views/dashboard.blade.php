<x-layouts.app>
    <p class="text-sm font-medium text-slate-500">Signed in as</p>
    <h1 class="mt-1 text-2xl font-semibold">{{ auth()->user()->name }}</h1>
    <p class="mt-3 text-sm text-slate-600">Your account is authenticated and ready for the next Sambung features.</p>

    <form method="POST" action="{{ route('logout') }}" class="mt-8">
        @csrf
        <button type="submit" class="rounded-md bg-slate-900 px-4 py-2.5 text-sm font-medium text-white hover:bg-slate-700">Sign out</button>
    </form>
</x-layouts.app>
