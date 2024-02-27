USE laravel;


DELIMITER //
CREATE PROCEDURE insert_prescriptions_dates(IN Prescription_id INT)

BEGIN
    DECLARE DateOfStart DATE;
    DECLARE FrequencyPerDay INT;
    DECLARE DurationOfPrescription INT;
    DECLARE hours TIME;
    DECLARE DateAndHour DATETIME;
    DECLARE ctrDurationDays INT;

        SELECT dateOfStart, frequencyPerDay, durationOfPrescriptonInDays INTO DateOfStart, FrequencyPerDay, DurationOfPrescription FROM prescriptions
        WHERE id = Prescription_id;

    SET ctrDurationDays = 0;
    WHILE ctrDurationDays < DurationOfPrescription
        DO

            IF FrequencyPerDay = 1 THEN
                SET @hours = 24;
            ELSE
                SET @hours = 24 / FrequencyPerDay;
            END IF;

            SET DateAndHour = CONCAT(DateOfStart, ' ', @hours, ':00:00');

            INSERT INTO calendars (prescription_id, dateAndHour)
            VALUES (@Prescription_id, DateAndHour);
            SET ctrDurationDays = ctrDurationDays + 1;
        END WHILE;
END //
CALL insert_prescriptions_dates (2);
DROP procedure insert_prescriptions_dates;