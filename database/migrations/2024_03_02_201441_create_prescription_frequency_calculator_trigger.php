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
        //Faire changement pour la connection avec le compte Laravel-DB DB::usingConnection('mysql-Laravel-DB')->unprepared('
        //Fichier config/database.php
        DB::usingConnection('mysql-Laravel-DB')->unprepared('
       CREATE TRIGGER prescription_frequency_calculator_trigger
       BEFORE INSERT ON prescriptions
       FOR EACH ROW
       BEGIN
        SET new.frequencyPerDay = 24 / new.frequencyBetweenDosesInHours;

        END;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::usingConnection('mysql-Laravel-DB')->unprepared('DROP TRIGGER IF EXISTS prescription_frequency_calculator_trigger');
    }
};
