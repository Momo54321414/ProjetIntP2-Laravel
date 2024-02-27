CREATE TRIGGER 'after_insert_prescription' AFTER INSERT ON 'prescription'
BEGIN
    SELECT 