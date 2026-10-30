@extends('layouts.app')

@section('title', 'Sign in – Bakuna Tracker')

@section('content')
    <div class="mx-auto max-w-md">
        <div class="rounded-2xl border border-emerald-100 bg-white p-8 shadow-md">
            <div class="mb-6 text-center">
                <span class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100 text-2xl font-bold text-emerald-700">+</span>
                <h1 class="mt-3 text-2xl font-bold text-teal-800">Health Worker Sign in</h1>
                <p class="text-sm text-slate-500">Access the barangay vaccination records</p>
            </div>

            <form method="POST" action="{{ url('/login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="mb-1 block text-sm font-medium text-slate-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-200">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="mb-1 block text-sm font-medium text-slate-700">Password</label>
                    <input type="password" id="password" name="password" required
                           class="w-full rounded-lg border border-slate-300 px-3 py-2 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-200">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full rounded-lg bg-emerald-600 py-2.5 font-semibold text-white transition hover:bg-teal-700">
                    Sign in
                </button>
            </form>
        </div>
    </div>
@endsection
