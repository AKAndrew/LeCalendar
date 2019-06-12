CREATE OR REPLACE PACKAGE lecalendar_external IS

--p_title events.title%type
PROCEDURE add_event (p_title IN VARCHAR2, p_description IN VARCHAR2,p_location IN VARCHAR2, p_start_date IN VARCHAR2, p_end_date IN VARCHAR2, p_start_hour IN VARCHAR2, p_end_hour IN VARCHAR2, p_visibility IN INT, p_id_creator IN INT, p_keywords IN VARCHAR2);


END lecalendar_external;
/
CREATE OR REPLACE PACKAGE BODY lecalendar_external IS

PROCEDURE add_event (p_title IN VARCHAR2, p_description IN VARCHAR2,p_location IN VARCHAR2, p_start_date IN VARCHAR2, p_end_date IN VARCHAR2, p_start_hour IN VARCHAR2, p_end_hour IN VARCHAR2, p_visibility IN INT, p_id_creator IN INT, p_keywords IN VARCHAR2) AS
v_id NUMBER;
BEGIN
select MAX(ID) INTO v_id from events;
insert into events values (v_id+1, p_title, p_description, p_location, to_date(p_start_date,'YYYY-MM-DD'), TO_DATE(p_end_date,'YYYY-MM-DD'), to_date(p_start_hour,'HH24:MI'), to_date(p_end_hour, 'HH24:MI'), p_visibility, p_id_creator, p_keywords);
END;


END lecalendar_external;



--BEGIN 
--(1,'nebunia lui salam','ceam mai mare smecherie pe sistem','fratelii',to_date('2019-06-12','yyyy-mm-dd'),to_date('2019-06-13','yyyy-mm-dd'),to_date('20:00','HH24:MI'),to_date('23:00','HH24:MI'),1,327,'smecherie cu buton la cutie valoare buzunarul meu vorbeste');

--END;

--/
--select * from events;
--/
--select * from users;
--select * from users where id =0;
--SELECT id from users where username='a@a';
--/

--/
--create or replace PROCEDURE add_event (p_title IN VARCHAR2, p_description IN VARCHAR2,p_location IN VARCHAR2, p_start_date IN VARCHAR2, p_end_date IN VARCHAR2, p_start_hour IN VARCHAR2, p_end_hour IN VARCHAR2, p_visibility IN INT, p_id_creator IN INT, p_keywords IN VARCHAR2) AS
--v_id NUMBER;
--BEGIN
--select MAX(ID) INTO v_id from events;
--insert into events values (v_id+1, p_title, p_description, p_location, to_date(p_start_date,'YYYY-MM-DD'), TO_DATE(p_end_date,'YYYY-MM-DD'), to_date(p_start_hour,'HH24:MI'), to_date(p_end_hour, 'HH24:MI'), p_visibility, p_id_creator, p_keywords);
--END;
/
BEGIN
lecalendar_external.add_event('titlu','descriere','locatie','2019-06-13','2019-06-13','10:00','17:00',1,1001,'test');
END;
/
BEGIN
add_event('titlu','descriere','locatie','2019-06-13','2019-06-13','10:00','17:00',1,1001,'test');
END;
/
select * from events;
/
insert into events values (1,'nebunia lui salam','ceam mai mare smecherie pe sistem','fratelii',to_date('2019-06-12','yyyy-mm-dd'),to_date('2019-06-13','yyyy-mm-dd'),to_date('20:00','HH24:MI'),to_date('23:00','HH24:MI'),1,327,'smecherie cu buton la cutie valoare buzunarul meu vorbeste');
--select * from users where id=1001;
/
commit;