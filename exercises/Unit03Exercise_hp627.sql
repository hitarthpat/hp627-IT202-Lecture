CREATE USER IF NOT EXISTS 'ex_user'@'localhost'
IDENTIFIED BY 'IT202Exercises';

USE exercise_hp627;

GRANT SELECT, UPDATE, INSERT, DELETE
ON exercise_hp627.*
TO 'ex_user'@'localhost';

USE exercise_hp627;

CREATE TABLE bowlers_hp627
  (bowlerid int primary key,
  name varchar(100),
  address varchar(200),
  phone varchar(20));

INSERT INTO bowlers_hp627 VALUES

  (100, 'Rich', '123 Main St.', '555-1234');

INSERT INTO bowlers_hp627 VALUES

  (101, 'Barbara', '123 Main St.', '555-5678');

INSERT INTO bowlers_hp627 VALUES

  (102, 'Randhir', '99 Terrace St.', '201-7868');

INSERT INTO bowlers_hp627 VALUES

  (103, 'Eshan', '440 Liberty St.', '551-3832');

SELECT * FROM bowlers_hp627;

CREATE TABLE games_hp627

  (gameid int auto_increment primary key,
  bowlerid int,
  score int);

INSERT INTO games_hp627 (bowlerid, score) VALUES (100, 110);
INSERT INTO games_hp627 (bowlerid, score) VALUES (100, 115);
INSERT INTO games_hp627 (bowlerid, score) VALUES (100, 105);
INSERT INTO games_hp627 (bowlerid, score) VALUES (101, 110);
INSERT INTO games_hp627 (bowlerid, score) VALUES (101, 112);
INSERT INTO games_hp627 (bowlerid, score) VALUES (101, 130);

-- Games for bowler 102 (Randhir)
INSERT INTO games_hp627 (bowlerid, score) VALUES (102, 145);
INSERT INTO games_hp627 (bowlerid, score) VALUES (102, 138);
INSERT INTO games_hp627 (bowlerid, score) VALUES (102, 150);

-- Games for bowler 103 (Eshan)
INSERT INTO games_hp627 (bowlerid, score) VALUES (103, 160);
INSERT INTO games_hp627 (bowlerid, score) VALUES (103, 155);
INSERT INTO games_hp627 (bowlerid, score) VALUES (103, 148);

SELECT * FROM games_hp627;

SELECT bowlerid, name FROM bowlers_hp627 ORDER BY name;

SELECT COUNT(score) AS games, AVG(score) AS average FROM games_hp627 WHERE bowlerid = 102;
SELECT COUNT(score) AS games, AVG(score) AS average FROM games_hp627 WHERE bowlerid = 103;




