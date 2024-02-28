USE laravel;

DELIMITER //
CREATE PROCEDURE insert_prescriptions_dates(IN prescription_id INT)
BEGIN
    DECLARE DateOfStart DATE;
    DECLARE FrequencyPerDay INT;
    DECLARE DurationOfPrescription INT;
    DECLARE hours TIME;
    DECLARE DateAndHour DATETIME;
    DECLARE ctrDurationDays INT;

    SELECT dateOfStart, frequencyPerDay, durationOfPrescriptionInDays INTO DateOfStart, FrequencyPerDay, DurationOfPrescription FROM prescriptions
    WHERE id = Prescription_id;

    SET ctrDurationDays = 0;
    WHILE ctrDurationDays < DurationOfPrescription DO
        IF FrequencyPerDay = 1 THEN
            SET hours = '24:00:00';
        ELSE
            SET hours = SEC_TO_TIME(24 * 3600 / FrequencyPerDay);
        END IF;

        SET DateAndHour = CONCAT(DateOfStart, ' ', hours);

        INSERT INTO calendars (prescription_id, dateAndHour)
        VALUES (Prescription_id, DateAndHour);
        SET ctrDurationDays = ctrDurationDays + 1;
    END WHILE;
END //
DELIMITER ;

CALL insert_prescriptions_dates (2);
DROP procedure insert_prescriptions_dates;


DELIMITER //
CREATE PROCEDURE test_column(IN DATE DATE,IN TIME TIME)
BEGIN
DECLARE DATEANDHOUR DATETIME;
SET DATEANDHOUR = CONCAT(DATE, ' ', TIME);
SELECT DATEANDHOUR;
END //
DELIMITER ;