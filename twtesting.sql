DROP TABLE users ;
/
DROP TABLE friends ;
/
drop table messages;
/
CREATE TABLE users (
  id INT NOT NULL PRIMARY KEY,
  username VARCHAR2(50) NOT NULL,
  password int NOT NULL,
  created_at DATE,
  updated_at DATE
)
/

CREATE TABLE friends (
--  id INT PRIMARY KEY,
  id_user1 INT NOT NULL,
  id_user2 INT NOT NULL,
  created_at DATE,
  updated_at DATE
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
--CREATE UNIQUE INDEX users_username_index ON users(username);
--/
