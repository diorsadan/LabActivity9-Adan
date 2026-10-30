<?php

namespace App\Http\Controllers;

use App\Models\Vaccination;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Bakuna Tracker – Purok Adan';

        $schedules = Vaccination::orderBy('scheduled_at')->get();

        $stats = [
            'Total' => $schedules->count(),
            'Done' => $schedules->where('status', 'Done')->count(),
            'Scheduled' => $schedules->where('status', 'Scheduled')->count(),
            'Overdue' => $schedules->where('status', 'Overdue')->count(),
        ];

        $alerts = $schedules->where('status', 'Overdue');

        $outOfStock = ['MMR'];

        return view('dashboard.index', compact('title', 'schedules', 'stats', 'alerts', 'outOfStock'));
    }

    public function schedule()
    {
        $schedules = Vaccination::orderBy('scheduled_at')->get();

        return view('dashboard.schedule', compact('schedules'));
    }
}
