<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bakuna Tracker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-slate-50 text-slate-800">
    <nav class="bg-teal-700 text-white shadow">
        <div class="mx-auto flex max-w-6xl flex-col gap-3 px-4 py-4 md:flex-row md:items-center md:justify-between">
            <a href="{{ route('dashboard') }}" class="text-lg font-bold tracking-wide">Bakuna Tracker</a>

            <div class="flex flex-col gap-2 md:flex-row md:items-center md:gap-6">
                <a href="{{ route('dashboard') }}" class="hover:text-emerald-200">Dashboard</a>
                <a href="{{ route('schedule') }}" class="hover:text-emerald-200">Schedule</a>

                @auth
                    <span class="text-emerald-100">Hi, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded bg-white/10 px-3 py-1 text-sm hover:bg-white/20">
                            Logout
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="rounded bg-emerald-500 px-3 py-1 text-sm font-semibold hover:bg-emerald-400">
                        Sign in
                    </a>
                @endguest
            </div>
        </div>
    </nav>

    <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-8">
        @yield('content')
    </main>

    <footer class="border-t border-teal-100 bg-white py-4 text-center text-sm text-slate-500">
        Barangay Matina Crossing Health Center, Davao City
    </footer>
</body>
</html>
