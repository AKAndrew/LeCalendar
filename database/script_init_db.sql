DROP TABLE users CASCADE CONSTRAINTS;
/
DROP TABLE friends CASCADE CONSTRAINTS;
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

--CREATE UNIQUE INDEX users_username_index ON users(username);
--/
commit;
