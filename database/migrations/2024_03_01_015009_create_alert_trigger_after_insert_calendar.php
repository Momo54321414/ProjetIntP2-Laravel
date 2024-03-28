<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Faire changement pour la connection avec le compte Laravel-DB DB::usingConnection('mysql-Laravel-DB')->unprepared('
        //Fichier config/database.php
        DB::usingConnection('mysql-Laravel-DB')->unprepared('CREATE TRIGGER create_alert_after_insert_calendar
        AFTER INSERT ON calendars
        FOR EACH ROW
        BEGIN
                INSERT INTO alerts (isTheMedicationTaken, calendar_id,created_at,updated_at)
                VALUES (0, NEW.id, NOW(), NOW()); 
        END;');
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::usingConnection('mysql-Laravel-DB')->unprepared('DROP TRIGGER IF EXISTS create_alert_after_insert_calendar');
    }
};
