DROP SEQUENCE users_id_sequence;
/
CREATE SEQUENCE users_id_sequence start with 1 increment by 1;
/

CREATE OR REPLACE TRIGGER add_new_user_id_trigger
BEFORE INSERT ON users
for each row
BEGIN
    SELECT users_id_sequence.nextval INTO :new.id
    FROM dual;
END;
/
