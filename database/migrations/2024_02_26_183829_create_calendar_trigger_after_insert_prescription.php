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

        $trigger = "
        
        CREATE TRIGGER create_calendar_after_insert_prescription
        AFTER INSERT ON prescriptions
        FOR EACH ROW
        BEGIN
            DECLARE currentDate DATE;
            DECLARE ctrDurationDays INT;
            DECLARE hours TIME;
            DECLARE Date DATE;
        
            SET currentDate = NEW.dateOfStart;
            SET ctrDurationDays = 0;
        
            WHILE ctrDurationDays < NEW.durationOfPrescriptionInDays DO
                IF NEW.frequencyPerDay = 1 THEN
                    SET hours = '24:00:00';
                ELSE
                    SET hours = SEC_TO_TIME(24 * 3600 / NEW.frequencyPerDay);
                END IF;
        
                SET Date = currentDate;
        
                INSERT INTO calendars (prescription_id, dateOfIntake, hourOfIntake)
                VALUES (NEW.id, currentDate, hours);
        
                SET currentDate = DATE_ADD(currentDate, INTERVAL 1 DAY);
                SET ctrDurationDays = ctrDurationDays + 1;
            END WHILE;
        END;";
        DB::unprepared($trigger);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        DB::unprepared('DROP TRIGGER IF EXISTS create_calendar_after_insert_prescription');
    }
};
