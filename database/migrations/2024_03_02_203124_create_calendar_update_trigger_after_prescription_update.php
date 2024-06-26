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
        //Trigger V3 basic sans delete
        DB::unprepared('
        CREATE TRIGGER prescriptions_after_update
                AFTER UPDATE ON prescriptions
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

                    UPDATE calendars 
                               SET active = 0
                               WHERE prescription_id = NEW.id 
                                 AND dateOfIntake >= NEW.dateOfStart;
                                 

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
        // DB::unprepared('
        // CREATE TRIGGER prescriptions_after_update
        // AFTER UPDATE ON prescriptions
        // FOR EACH ROW
        // BEGIN
        //    DECLARE currentDate DATE;
        //     DECLARE hourOfIntake TIME;
        //     DECLARE Date DATE;
        //     DECLARE hoursBetweenDoses INT;

        //     DELETE FROM calendars WHERE prescription_id = NEW.id;


        //     SET currentDate = NEW.dateOfStart;
        //     SET hoursBetweenDoses = NEW.frequencyBetweenDosesInHours;
        //     SET hourOfIntake = NEW.firstIntakeHour;

        //     WHILE currentDate <= ADDDATE(NEW.dateOfStart, INTERVAL NEW.durationOfPrescriptionInDays DAY) DO
        //         IF (currentDate = NEW.dateOfStart) THEN
        //             SET hourOfIntake = NEW.firstIntakeHour;
        //         ELSE
        //             SET hourOfIntake = ADDTIME(hourOfIntake, SEC_TO_TIME(hoursBetweenDoses * 3600));
        //         END IF;
        //         SET Date = currentDate;

        //         INSERT INTO calendars (prescription_id, dateOfIntake, hourOfIntake,created_at,updated_at)
        //         VALUES (NEW.id, currentDate, hourOfIntake, NOW(), NOW());


        //         SET currentDate = DATE_ADD(currentDate, INTERVAL 1 DAY);
        //     END WHILE;
        // END;');

        /*
        version 2 du trigger qui ne supprime pas les données mais met à jour un attribut de la table a true ou false
            DB::unprepared(' CREATE TRIGGER prescriptions_after_update
                AFTER UPDATE ON prescriptions
                FOR EACH ROW
                BEGIN
                   DECLARE currentDate DATE;
                    DECLARE hours TIME;
                    DECLARE Date DATE;
                    DECLARE hoursBetweenDoses INT;
                    
                       UPDATE calendars 
                               SET active = 0
                               WHERE prescription_id = NEW.id 
                                 AND dateOfIntake > NEW.dateOfStart;
                    
        
                    SET currentDate = NEW.dateOfStart;
                    SET hoursBetweenDoses = NEW.frequencyBetweenDosesInHours;
                
                    WHILE currentDate <= ADDDATE(NEW.dateOfStart, INTERVAL NEW.durationOfPrescriptionInDays DAY) DO
                       
                        SET hours = SEC_TO_TIME(hoursBetweenDoses * 3600);
                    
                        SET Date = currentDate;
                
                        INSERT INTO calendars (prescription_id, dateOfIntake, hourOfIntake,created_at,updated_at)
                        VALUES (NEW.id, currentDate, hours, NOW(), NOW());
                
                        
                        SET currentDate = DATE_ADD(currentDate, INTERVAL 1 DAY);
                    END WHILE;
                END;');*/
        /*V3 basic sans delete
                DB::unprepared(' CREATE TRIGGER prescriptions_after_update
                AFTER UPDATE ON prescriptions
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
            */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS prescriptions_after_update');
    }
};
