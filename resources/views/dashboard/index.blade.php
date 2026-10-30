@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1 class="mb-6 text-2xl font-bold text-teal-800 md:text-3xl">{{ $title }}</h1>

    @if ($alerts->count() > 0)
        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-red-700">
            <strong>Attention:</strong> {{ $alerts->count() }} resident(s) have overdue vaccinations.
        </div>
    @elseif (count($outOfStock) > 0)
        <div class="mb-6 rounded-lg border border-amber-200 bg-amber-50 px-4 py-3 text-amber-700">
            <strong>Notice:</strong> Out of stock: {{ implode(', ', $outOfStock) }}. Please reschedule affected residents.
        </div>
    @else
        <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-700">
            All clear. No overdue vaccinations.
        </div>
    @endif

    <div class="grid gap-4 md:grid-cols-4">
        @foreach ($stats as $label => $value)
            <x-stat-card :title="$label" :value="$value" />
        @endforeach
    </div>

    <x-panel title="Upcoming Schedules" class="mt-8">
        <ul class="divide-y divide-slate-100">
            @forelse ($schedules->where('status', 'Scheduled') as $row)
                <li class="flex flex-col gap-1 py-3 md:flex-row md:items-center md:justify-between">
                    <div>
                        <p class="font-medium">{{ $row->patient_name }}</p>
                        <p class="text-sm text-slate-500">{{ $row->vaccine }} · {{ $row->dose }} · {{ $row->purok }}</p>
                    </div>
                    <span class="text-sm font-semibold text-teal-700">{{ $row->scheduled_at->format('M d, Y') }}</span>
                </li>
            @empty
                <li class="py-3 text-slate-500">No upcoming schedules.</li>
            @endforelse
        </ul>
    </x-panel>
@endsection
