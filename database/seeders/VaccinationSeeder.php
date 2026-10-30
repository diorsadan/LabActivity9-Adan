<?php

namespace Database\Seeders;

use App\Models\Vaccination;
use Illuminate\Database\Seeder;

class VaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            ['patient_name' => 'Althea Mae Villanueva', 'purok' => 'Purok Adan', 'vaccine' => 'BCG', 'dose' => '1st dose', 'scheduled_at' => '2026-09-15', 'status' => 'Done'],
            ['patient_name' => 'Rhed Bautista', 'purok' => 'Purok Sampaguita', 'vaccine' => 'Pentavalent', 'dose' => '2nd dose', 'scheduled_at' => '2026-10-05', 'status' => 'Overdue'],
            ['patient_name' => 'Kyla Faith Mangubat', 'purok' => 'Purok Ilang-Ilang', 'vaccine' => 'OPV', 'dose' => '3rd dose', 'scheduled_at' => '2026-10-12', 'status' => 'Done'],
            ['patient_name' => 'Jomar Dagohoy', 'purok' => 'Purok Adan', 'vaccine' => 'MMR', 'dose' => '1st dose', 'scheduled_at' => '2026-10-20', 'status' => 'Overdue'],
            ['patient_name' => 'Ernesto Labrador', 'purok' => 'Purok Rosal', 'vaccine' => 'Anti-Flu', 'dose' => 'Annual', 'scheduled_at' => '2026-11-10', 'status' => 'Scheduled'],
            ['patient_name' => 'Princess Joy Alcantara', 'purok' => 'Purok Gumamela', 'vaccine' => 'Hepatitis B', 'dose' => 'Booster', 'scheduled_at' => '2026-11-24', 'status' => 'Scheduled'],
            ['patient_name' => 'Nathaniel Sumagaysay', 'purok' => 'Purok Adan', 'vaccine' => 'Hepatitis B', 'dose' => '1st dose', 'scheduled_at' => '2026-12-03', 'status' => 'Scheduled'],
            ['patient_name' => 'Corazon Pabillore', 'purok' => 'Purok Sampaguita', 'vaccine' => 'Anti-Flu', 'dose' => 'Annual', 'scheduled_at' => '2026-10-01', 'status' => 'Done'],
        ];

        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}
