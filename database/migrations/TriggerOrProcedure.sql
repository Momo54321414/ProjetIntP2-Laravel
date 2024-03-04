
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
        
            WHILE currentDate <= ADDDATE(NEW.dateOfStart, INTERVAL NEW.durationOfPrescriptionInDays - 1 DAY) DO
               
                SET hours = SEC_TO_TIME(hoursBetweenDoses * 3600);
                SET Date = currentDate;
        
                INSERT INTO calendars (prescription_id, dateOfIntake, hourOfIntake,created_at,updated_at)
                VALUES (NEW.id, currentDate, hours, NOW(), NOW());
        
                
                SET currentDate = DATE_ADD(currentDate, INTERVAL 1 DAY);
            END WHILE;
        END;



CREATE TRIGGER prescriptions_after_update
        AFTER UPDATE ON prescriptions
        FOR EACH ROW
        BEGIN
           DECLARE currentDate DATE;
            DECLARE hours TIME;
            DECLARE Date DATE;
            DECLARE hoursBetweenDoses INT;
        
            SET currentDate = NEW.dateOfStart;
            SET hoursBetweenDoses = NEW.frequencyBetweenDosesInHours;
        
            WHILE currentDate <= ADDDATE(NEW.dateOfStart, INTERVAL NEW.durationOfPrescriptionInDays - 1 DAY) DO
               
                SET hours = SEC_TO_TIME(hoursBetweenDoses * 3600);
                SET Date = currentDate;
        
                INSERT INTO calendars (prescription_id, dateOfIntake, hourOfIntake,created_at,updated_at)
                VALUES (NEW.id, currentDate, hours, NOW(), NOW());
        
                
                SET currentDate = DATE_ADD(currentDate, INTERVAL 1 DAY);
            END WHILE;
        END;



CREATE TRIGGER prescriptions_after_delete
        AFTER DELETE ON prescriptions
        FOR EACH ROW
        BEGIN
            DELETE FROM calendars WHERE prescription_id = OLD.id;
        END;



CREATE TRIGGER create_alert_after_insert_calendar
        AFTER INSERT ON calendars
        FOR EACH ROW
        BEGIN
                INSERT INTO alerts (isTheMedicineTaken, calendar_id,created_at,updated_at)
                VALUES (0, NEW.id, NOW(), NOW()); 
        END;

```
