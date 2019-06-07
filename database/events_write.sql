set serveroutput on;
create or replace procedure events_write ( nume in varchar) as
maxc int;
begin
select count(*) into maxc from events;
insert into events values (maxc+1,nume);
end;


--declare
--begin
--events_write('invierea');
--end;
--
--
--select * from events;
-- aici am testat sa vad ca merge
