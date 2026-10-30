@extends('layouts.app')

@section('title', 'Schedule – Bakuna Tracker')

@section('content')
    {{-- Panel component, the table below goes into its $slot --}}
    <x-panel title="Vaccination Schedule">
        {{-- Lets the table scroll sideways on small screens --}}
        <div class="overflow-x-auto">
            <table class="w-full min-w-[640px] text-left text-sm">
                <thead class="bg-teal-700 text-white">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Patient</th>
                        <th class="px-4 py-2">Purok</th>
                        <th class="px-4 py-2">Vaccine</th>
                        <th class="px-4 py-2">Dose</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Loop the rows, or show @empty if there are none --}}
                    @forelse ($schedules as $row)
                        {{-- $loop->odd makes zebra stripes --}}
                        <tr class="{{ $loop->odd ? 'bg-white' : 'bg-emerald-50' }}">
                            {{-- $loop->iteration = row number starting at 1 --}}
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 font-medium">{{ $row->patient_name }}</td>
                            <td class="px-4 py-2">{{ $row->purok }}</td>
                            <td class="px-4 py-2">{{ $row->vaccine }}</td>
                            <td class="px-4 py-2">{{ $row->dose }}</td>
                            <td class="px-4 py-2">{{ $row->scheduled_at->format('M d, Y') }}</td>
                            <td class="px-4 py-2">
                                {{-- @unless = "if not", so the red badge shows only when status is Overdue --}}
                                @unless ($row->status !== 'Overdue')
                                    <span class="rounded-full bg-red-100 px-2 py-0.5 text-xs font-semibold text-red-700">Overdue</span>
                                @else
                                    {{ $row->status }}
                                @endunless
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-6 text-center text-slate-500">No schedules yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-panel>
@endsection
