SHOW DATABASES;
CREATE DATABASE guitar;
SHOW CREATE DATABASE guitar;

-- DROP DATABASE guitar;
CREATE USER 'ih_user'@'localhost'
IDENTIFIED BY 'InventoryHelper';

-- DROP USER 'ih_user'@'localhost';

GRANT SELECT,UPDATE,INSERT,DELETE
ON guitar.* TO 'ih_user'@'localhost';
SHOW GRANTS FOR 'ih_user'@'localhost';

USE guitar;
CREATE TABLE guitar_users (
user_id         INT         NOT NULL AUTO_INCREMENT,
email_address VARCHAR(255) NOT NULL UNIQUE,
password      CHAR(64)    NOT NULL,
first_name    VARCHAR(60) NOT NULL,
last_name     VARCHAR(60) NOT NULL,
PRIMARY KEY (user_id)
);
SHOW TABLES;
SHOW CREATE TABLE guitar_users;

-- DROP TABLE guitar_users;

DESCRIBE guitar_users;

INSERT INTO guitar_users
(email_address, password, first_name, last_name)
VALUES
('taylor@guitars.com', SHA2('myL0ngP@ssword', 256), 'Taylor', 'Swift');

SELECT * FROM guitar_users;

-- Taylor Swift's Lead Guitarist
INSERT INTO guitar_users
(email_address, password, first_name, last_name)
VALUES
('paul@guitars.com', SHA2('myL0ngP@ssword', 256), 'Paul', 'Sidoti');

UPDATE guitar_users SET
email_address = 'taylor.swift@guitars.com'
WHERE user_id = 1;

UPDATE guitar_users SET
email_address = 'paul.sidoti@guitars.com',
password = SHA2('myShOrtP@ssword', 256)
WHERE user_id = 2;