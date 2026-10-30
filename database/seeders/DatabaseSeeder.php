<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // My login account, password is hashed so Auth::attempt can check it
        User::create([
            'name' => 'Dion',
            'email' => 'nurse.adan@bakuna.test',
            'password' => Hash::make('bakuna2026'),
        ]);

        // Run the vaccination seeder too
        $this->call([VaccinationSeeder::class]);
    }
}
