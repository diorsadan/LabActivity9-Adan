{{-- Used as <x-stat-card :title="..." :value="..." /> --}}
@props(['title', 'value'])

{{-- merge() keeps these classes and adds any class passed from outside --}}
<div {{ $attributes->merge(['class' => 'rounded-xl border-l-4 border-emerald-500 bg-white p-5 shadow-sm']) }}>
    <p class="text-sm font-medium uppercase tracking-wide text-slate-500">{{ $title }}</p>
    <p class="mt-2 text-3xl font-bold text-teal-800">{{ $value }}</p>
</div>
