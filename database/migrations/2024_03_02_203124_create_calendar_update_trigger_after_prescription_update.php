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
        CREATE TRIGGER prescriptions_after_update
        AFTER UPDATE ON prescriptions
        FOR EACH ROW
        BEGIN
           DECLARE currentDate DATE;
            DECLARE hours TIME;
            DECLARE Date DATE;
            DECLARE hoursBetweenDoses INT;
        
            DELETE FROM calendars WHERE prescription_id = NEW.id;
            

            SET currentDate = NEW.dateOfStart;
            SET hoursBetweenDoses = NEW.frequencyBetweenDosesInHours;
        
            WHILE currentDate <= ADDDATE(NEW.dateOfStart, INTERVAL NEW.durationOfPrescriptionInDays DAY) DO
               
                SET hours = SEC_TO_TIME(hoursBetweenDoses * 3600);
                SET Date = currentDate;
        
                INSERT INTO calendars (prescription_id, dateOfIntake, hourOfIntake,created_at,updated_at)
                VALUES (NEW.id, currentDate, hours, NOW(), NOW());
        
                
                SET currentDate = DATE_ADD(currentDate, INTERVAL 1 DAY);
            END WHILE;
        END;";
        DB::unprepared($trigger);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS prescriptions_after_update');
    }
};
