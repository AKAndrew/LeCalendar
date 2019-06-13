CREATE OR REPLACE PACKAGE lecalendar_account IS

    PROCEDURE create_account(p_username users.username%type, p_password users.password%type, success OUT INT);

    PROCEDURE login_account(p_username users.username%type, p_password users.password%type, success OUT INT);

END lecalendar_account;
/
CREATE OR REPLACE PACKAGE BODY lecalendar_account IS

    PROCEDURE create_account(p_username users.username%type, p_password users.password%type, success OUT INT) IS
    valid INT DEFAULT 0;
    BEGIN
        success := 1;
        select count(*) into valid from users where username = p_username;
        if valid <> 0 then
            success := 0;
            return;
        end if;
        insert into users values (0, p_username, p_password,null,sysdate, sysdate);
    END;

    PROCEDURE login_account(p_username users.username%type, p_password users.password%type, success OUT INT) IS
    v_user users%rowtype;
    valid INT DEFAULT 0;
    BEGIN
        select count(*) into valid from users where username like p_username and password like p_password;
        if valid = 1 then
            success := 1;
        else
            success := 0;
        end if;
    END;

END lecalendar_account;
