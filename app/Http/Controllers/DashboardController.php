<?php

namespace App\Http\Controllers;

use App\Models\Vaccination;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Bakuna Tracker – Purok Adan';

        // Get all vaccination rows from the database, earliest date first
        $schedules = Vaccination::orderBy('scheduled_at')->get();

        // 4 counts for the stat cards (label => number)
        $stats = [
            'Total' => $schedules->count(),
            'Done' => $schedules->where('status', 'Done')->count(),
            'Scheduled' => $schedules->where('status', 'Scheduled')->count(),
            'Overdue' => $schedules->where('status', 'Overdue')->count(),
        ];

        // Only the overdue rows, used by the alert banner
        $alerts = $schedules->where('status', 'Overdue');

        // Sample list for the @elseif "out of stock" message
        $outOfStock = ['MMR'];

        // dashboard.index = resources/views/dashboard/index.blade.php, compact() passes the variables
        return view('dashboard.index', compact('title', 'schedules', 'stats', 'alerts', 'outOfStock'));
    }

    // Same data, shown as a full table on /schedule
    public function schedule()
    {
        $schedules = Vaccination::orderBy('scheduled_at')->get();

        return view('dashboard.schedule', compact('schedules'));
    }
}
