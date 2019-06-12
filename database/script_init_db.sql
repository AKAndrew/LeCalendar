DROP TABLE users CASCADE CONSTRAINTS;
/
DROP TABLE friends CASCADE CONSTRAINTS;
/
DROP TABLE events CASCADE CONSTRAINTS;
/
DROP TABLE messages CASCADE CONSTRAINTS;
/

CREATE TABLE users (
  id INT NOT NULL PRIMARY KEY,
  username VARCHAR2(50) NOT NULL UNIQUE,
  password VARCHAR2(200) NOT NULL,
  created_at DATE,
  updated_at DATE
)
/

CREATE TABLE friends (
--  id INT PRIMARY KEY,
  id_user1 INT NOT NULL,
  id_user2 INT NOT NULL,
  created_at DATE,
  updated_at DATE,
  CONSTRAINT fk_friends_id_user1 FOREIGN KEY (id_user1) REFERENCES users(id),
  CONSTRAINT fk_friends_id_user2 FOREIGN KEY (id_user2) REFERENCES users(id),
  CONSTRAINT no_duplicates_friends UNIQUE (id_user1, id_user2)
)
/

CREATE TABLE events (
    id INT NOT NULL PRIMARY KEY,
    title VARCHAR2(50),
    description VARCHAR2(300),
    location VARCHAR2(255),
    start_date DATE,
    end_date DATE,
    start_hour DATE,
    end_hour DATE,
    visibility INT,
    id_creator INT,
    keywords VARCHAR2(255),
    CONSTRAINT fk_id_creator FOREIGN KEY (id_creator) REFERENCES users(id)
)
/
create table messages (
sender int not null,
sender_name varchar2(50),
receiver int not null,
reveiver_name varchar2(50),
text varchar2(1000)
)
/

--select * from events where to_char(start_date,'yyyy-mm-dd')='2019-06-12';
--insert into events values (1,'nebunia lui salam','ceam mai mare smecherie pe sistem','fratelii',to_date('2019-06-12','yyyy-mm-dd'),to_date('2019-06-13','yyyy-mm-dd'),to_date('20:00','HH24:MI'),to_date('23:00','HH24:MI'),1,327,'smecherie cu buton la cutie valoare buzunarul meu vorbeste');
--/
--select * from users;
--CREATE UNIQUE INDEX users_username_index ON users(username);
--/
commit;
