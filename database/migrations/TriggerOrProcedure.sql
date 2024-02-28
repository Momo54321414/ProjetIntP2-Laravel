USE laravel;

DELIMITER //
CREATE PROCEDURE insert_prescriptions_dates(IN prescription_id INT)
BEGIN
    DECLARE DateOfStart DATE;
    DECLARE FrequencyPerDay INT;
    DECLARE DurationOfPrescription INT;
    DECLARE HourOfIntake TIME;
    DECLARE DateOfIntake DATE;
    DECLARE hours TIME;
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

        SET DateOfIntake = dateOfStart + INTERVAL ctrDurationDays DAY;
        SET HourOfIntake = hours;
        INSERT INTO calendars (prescription_id, d)
        VALUES (Prescription_id, DateAndHour);
        SET ctrDurationDays = ctrDurationDays + 1;
    END WHILE;
END //
DELIMITER ;

CALL insert_prescriptions_dates (2);
DROP procedure insert_prescriptions_dates;

DELIMITER //
CREATE PROCEDURE insert_prescriptions_dates(
    IN Prescription_id INT,
    OUT DateOfStart DATE,
    OUT FrequencyPerDay INT,
    OUT DurationOfPrescription INT
)
BEGIN
    -- Declare local variables (different names from OUT parameters)
    DECLARE StartDateVar DATE;
    DECLARE FrequencyVar INT;
    DECLARE DurationVar INT;
    DECLARE HourOfIntake TIME;
    DECLARE DateOfIntake DATE;
    DECLARE hours TIME;
    DECLARE ctrDurationDays INT;

    -- Retrieve values from the prescriptions table
    SELECT dateOfStart, frequencyPerDay, durationOfPrescriptionInDays INTO StartDateVar, FrequencyVar, DurationVar
    FROM prescriptions
    WHERE id = Prescription_id;

    -- Set OUT parameters with local variables
    SET DateOfStart = StartDateVar;
    SET FrequencyPerDay = FrequencyVar;
    SET DurationOfPrescription = DurationVar;

    -- Uncomment and modify the following logic as needed
    -- SET ctrDurationDays = 0;
    -- WHILE ctrDurationDays < DurationOfPrescription DO
    --     IF FrequencyPerDay = 1 THEN
    --         SET hours = '24:00:00';
    --     ELSE
    --         SET hours = SEC_TO_TIME(24 * 3600 / FrequencyPerDay);
    --     END IF;

    --     SET HourOfIntake = hours;
    --     INSERT INTO calendars (prescription_id, dateOfIntake, hourOfIntake)
    --     VALUES (Prescription_id, DateOfIntake, HourOfIntake);

    --     SET ctrDurationDays = ctrDurationDays + 1;
    -- END WHILE;

END //
DELIMITER ;
CALL insert_prescriptions_dates(2, @DateOfStart, @FrequencyPerDay, @DurationOfPrescription);
SELECT @DateOfStart, @FrequencyPerDay, @DurationOfPrescription;
DROP procedure insert_prescriptions_dates;


DELIMITER //
CREATE PROCEDURE insert_prescriptions_dates(
    IN Prescription_id INT,
    OUT DateOfStart DATE,
    OUT FrequencyPerDay INT,
    OUT DurationOfPrescription INT
)BEGIN

DECLARE returnDate DATE;
DECLARE returnFrequency INT;


  select date(dateOfStart) as date , frequencyPerDay as freq from prescriptions where id = idP;
	 SET returnDate = str_to_date(@returnDate, '%Y-%m-%d');
     SET returnFrequency = @returnFrequency;
  
END
DELIMITER ;
```
