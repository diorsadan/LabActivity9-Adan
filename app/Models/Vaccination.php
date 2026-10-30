<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Model for the "vaccinations" table (Laravel guesses the table name from the class name)
class Vaccination extends Model
{
    // Columns allowed in Vaccination::create([...]) (mass assignment protection)
    protected $fillable = [
        'patient_name',
        'purok',
        'vaccine',
        'dose',
        'scheduled_at',
        'status',
    ];

    // Turn scheduled_at into a Carbon date so we can use ->format('M d, Y')
    protected $casts = [
        'scheduled_at' => 'date',
    ];
}
