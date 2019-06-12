set serveroutput on;
declare 
type varr is varray(10000) of varchar(30);
lista_user1 varr := varr('Alex','Alexandru','Alin','Andrut','Andrei','Aurel','Ben','Bogdan','Catalin','Cezarel','Ciprian','Claudel','Cornelus','Cosmin','Costelus','Cristi','Damian','Danut','Daniel','Darius','Denise','Dimitrie','Dorian','Dorin','Edi','Eduard','Elvis','Emil','Eugen','Eusebiu','Fabian','Filip','Florian','Florin','Gabriel','George','Gheorghe','Giani','Giulio','Iaroslav','Ilie','Ioan','Ion','Ionel','Ionut','Iosif','Irinel','Iulian','Iustin','Laurentiu','Liviu','Lucian','Marian','Marius','Matei','Mihai','Mihail','Nicolae','Nicu','Nicusor','Octavian','Ovi','Paul','Petru','Petrut','Radu','Rares','Razvan','Richard','Robert','Roland','Rolland','Romanescu','Sabin','Samuel','Sebi','Sergiu','Silviu','Stefanel','Teodor','Teofil','Theodor','Tudorel','Valentin','Valerica','Vasile','Viorel','Vlad','Vladimir','Vladut');
lista_user2 varr :=varr('123','99','89','97','96','95','95','00','01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','Smecheru','CelBun','CelMare','Campionul','Seful','Nebunul','Nike','Adidas','Puma','Retro','Gamer','Studentul');
v_j int;
v_user1 varchar2(50);
v_user2 varchar2(50);
v_password int;
v_p int;
begin
for v_j in 1..1000 loop 
    v_user1 := lista_user1(TRUNC(DBMS_RANDOM.VALUE(0,lista_user1.count))+1);
    v_user2 := lista_user2(TRUNC(DBMS_RANDOM.VALUE(0,lista_user2.count))+1);
    v_password := trunc(dbms_random.value(1,100000000));
    insert into users values (v_j, v_user1||v_user2||v_j , v_password ,sysdate,sysdate);
  end loop;  
for v_j in 1..1000 loop
       v_p:=trunc(dbms_random.value(1,999));
       if (v_j=v_p)then loop
          v_p:=trunc(dbms_random.value(1,999));
         exit when v_j<>v_p;
         end loop;
      end if;
    insert into friends values (v_j,v_p,sysdate,sysdate);
   end loop;     
end;

commit;



















