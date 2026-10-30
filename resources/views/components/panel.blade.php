{{-- Used as <x-panel title="...">content</x-panel> --}}
@props(['title'])

<section {{ $attributes->merge(['class' => 'rounded-xl border border-slate-200 bg-white shadow-sm']) }}>
    <h2 class="border-b border-slate-200 px-5 py-3 text-lg font-semibold text-teal-800">{{ $title }}</h2>
    <div class="p-5">
        {{-- $slot = whatever is written between <x-panel> and </x-panel> --}}
        {{ $slot }}
    </div>
</section>
