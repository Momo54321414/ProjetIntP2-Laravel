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
        $trigger = 'CREATE TRIGGER create_alert_after_insert_calendar
        AFTER INSERT ON calendars
        FOR EACH ROW
        BEGIN
                INSERT INTO alerts (isTheMedicationTaken, calendar_id,created_at,updated_at)
                VALUES (0, NEW.id, NOW(), NOW()); 
        END;';
        DB::unprepared($trigger);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS create_alert_after_insert_calendar');
    }
};
