<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $trigger = "
       CREATE TRIGGER prescription_frequency_calculator_trigger
       BEFORE INSERT ON prescriptions
       FOR EACH ROW
       BEGIN
        SET new.frequencyPerDay = 24 / new.frequencyBetweenDosesInHours;

        END;";
        DB::unprepared($trigger);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS prescription_frequency_calculator_trigger');
    }
};
