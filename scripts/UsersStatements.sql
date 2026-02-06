-- Student Name: Hitarth Patel
-- Date: February 6, 2026
-- Course: IT202 Section 002
-- Assignment: Phase 1 - Login and Logout
-- Email: hp627@njit.edu

DROP DATABASE IF EXISTS clock;
CREATE DATABASE clock;

DROP USER IF EXISTS 'clock_app'@'localhost';
CREATE USER 'clock_app'@'localhost' IDENTIFIED BY 'ClockP@ss2026';
GRANT SELECT, INSERT, UPDATE, DELETE ON clock.* TO 'clock_app'@'localhost';
FLUSH PRIVILEGES;

USE clock;

DROP TABLE IF EXISTS clock_users;
CREATE TABLE clock_users (
  user_id INT NOT NULL AUTO_INCREMENT,
  email_address VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(64) NOT NULL,
  pronouns VARCHAR(60) NOT NULL,
  first_name VARCHAR(60) NOT NULL,
  last_name VARCHAR(60) NOT NULL,
  phone_number VARCHAR(20) NOT NULL,
  date_time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  date_time_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (user_id)
);

INSERT INTO clock_users
(email_address, password, pronouns, first_name, last_name, phone_number)
VALUES
('alex@clocks.com', SHA2('BassBoost!123', 256), 'He/Him', 'Alex', 'Carter', '555-1001'),
('riley@clocks.com', SHA2('StudioMix!456', 256), 'She/Her', 'Riley', 'Nguyen', '555-1002'),
('jordan@clocks.com', SHA2('NoiseCancel!789', 256), 'They/Them', 'Jordan', 'Patel', '555-1003');

SELECT user_id, email_address, first_name, last_name, pronouns, phone_number
FROM clock_users
ORDER BY user_id;


