<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Each page sets its own title, default is "Bakuna Tracker" --}}
    <title>@yield('title', 'Bakuna Tracker')</title>
    {{-- Loads Tailwind CSS and JS through Vite (dev server or public/build) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-slate-50 text-slate-800">
    {{-- Nav: stacked on mobile, becomes a row on md screens and up --}}
    <nav class="bg-teal-700 text-white shadow">
        <div class="mx-auto flex max-w-6xl flex-col gap-3 px-4 py-4 md:flex-row md:items-center md:justify-between">
            <a href="{{ route('dashboard') }}" class="text-lg font-bold tracking-wide">Bakuna Tracker</a>

            <div class="flex flex-col gap-2 md:flex-row md:items-center md:gap-6">
                <a href="{{ route('dashboard') }}" class="hover:text-emerald-200">Dashboard</a>
                <a href="{{ route('schedule') }}" class="hover:text-emerald-200">Schedule</a>

                {{-- Only shown when logged in --}}
                @auth
                    <span class="text-emerald-100">Hi, {{ auth()->user()->name }}</span>
                    {{-- Logout must be a POST form with @csrf --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded bg-white/10 px-3 py-1 text-sm hover:bg-white/20">
                            Logout
                        </button>
                    </form>
                @endauth

                {{-- Only shown when not logged in --}}
                @guest
                    <a href="{{ route('login') }}" class="rounded bg-emerald-500 px-3 py-1 text-sm font-semibold hover:bg-emerald-400">
                        Sign in
                    </a>
                @endguest
            </div>
        </div>
    </nav>

    {{-- Page content from @section('content') goes here --}}
    <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-8">
        @yield('content')
    </main>

    <footer class="border-t border-teal-100 bg-white py-4 text-center text-sm text-slate-500">
        Barangay Matina Crossing Health Center, Davao City
    </footer>
</body>
</html>
