

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
        END;



CREATE TRIGGER prescriptions_after_update
        AFTER UPDATE ON prescriptions
        FOR EACH ROW
        BEGIN
            DECLARE currentDate DATE;
            DECLARE ctrDurationDays INT;
            DECLARE hours TIME;
            DECLARE Date DATE;
        
            DELETE FROM calendars WHERE prescription_id = NEW.id;
        
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
