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



        DB::unprepared('
        CREATE TRIGGER create_calendar_after_insert_prescription
        AFTER INSERT ON prescriptions
        FOR EACH ROW
        BEGIN
            DECLARE currentDate DATE;
            DECLARE hours TIME;
            DECLARE Date DATE;
            DECLARE hoursBetweenDoses INT;

            SET currentDate = NEW.dateOfStart;
            SET hoursBetweenDoses = NEW.frequencyBetweenDosesInHours;

            WHILE currentDate <= ADDDATE(NEW.dateOfStart, INTERVAL NEW.durationOfPrescriptionInDays DAY) DO
                IF (currentDate = NEW.dateOfStart) THEN
                    SET hours = NEW.firstIntakeHour;
                ELSE
                    SET hours = SEC_TO_TIME(hoursBetweenDoses * 3600);
                END IF;
                SET Date = currentDate;

                INSERT INTO calendars (prescription_id, dateOfIntake, hourOfIntake, created_at, updated_at)
                VALUES (NEW.id, currentDate, hours, NOW(), NOW());

                SET currentDate = DATE_ADD(currentDate, INTERVAL 1 DAY);
            END WHILE;
        END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        DB::unprepared('DROP TRIGGER IF EXISTS create_calendar_after_insert_prescription');
    }
};
