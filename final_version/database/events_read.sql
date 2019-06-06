create or replace procedure events_read ( ev_id in int) as
 ev varchar(50);
begin
  select event_name into ev from events where event_id=ev_id;
  dbms_output.put_line(ev);
end;  



--declare
--begin
--events_read(2);
--end;
-- tot aici testat sa vad daca merge