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
            DECLARE hourOfIntake TIME;
            DECLARE hoursBetweenDoses INT;
            DECLARE daysBetweenIntakes INT;
            DECLARE intakePerDay INT;
            
            SET currentDate = NEW.dateOfStart;
            SET hourOfIntake = NEW.firstIntakeHour;
            SET hoursBetweenDoses = NEW.frequencyBetweenDosesInHours;
            SET daysBetweenIntakes = NEW.frequencyOfIntakeInDays;
        
            WHILE currentDate <= ADDDATE(NEW.dateOfStart, INTERVAL NEW.durationOfPrescriptionInDays DAY) DO
                
                SET hourOfIntake = NEW.firstIntakeHour;
                SET intakePerDay = 1;

                WHILE intakePerDay <= NEW.frequencyPerDay DO
                    INSERT INTO calendars (prescription_id, dateOfIntake, hourOfIntake, created_at, updated_at)
                    VALUES (NEW.id, currentDate, hourOfIntake, NOW(), NOW());
                     
                    SET hourOfIntake = ADDTIME(hourOfIntake, SEC_TO_TIME(hoursBetweenDoses * 3600));

                    SET hourOfIntake = ADDTIME(hourOfIntake, SEC_TO_TIME(-TIME_TO_SEC("24:00:00") * FLOOR(TIME_TO_SEC(hourOfIntake) / TIME_TO_SEC("24:00:00"))));
                    SET intakePerDay = intakePerDay + 1;
                END WHILE;

               SET currentDate = DATE_ADD(currentDate, INTERVAL daysBetweenIntakes DAY);
            END WHILE;
        END;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        DB::unprepared('DROP TRIGGER IF EXISTS create_calendar_after_insert_prescription');
    }
};
