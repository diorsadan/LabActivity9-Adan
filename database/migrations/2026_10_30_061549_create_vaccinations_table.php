<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Creates the vaccinations table when we run php artisan migrate
        Schema::create('vaccinations', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('purok');
            $table->string('vaccine');
            $table->string('dose');            // e.g. 1st dose, Booster
            $table->date('scheduled_at');
            $table->string('status');          // Scheduled, Done, Overdue
            $table->timestamps();              // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Undo: delete the table (used by migrate:rollback / migrate:fresh)
        Schema::dropIfExists('vaccinations');
    }
};
