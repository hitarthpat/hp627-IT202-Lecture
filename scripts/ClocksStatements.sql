-- Student Name: Hitarth Patel
-- Date: February 25, 2026
-- Course: IT202 Section 002
-- Assignment: Phase 2 - CRUD Clock Types and Clocks
-- Email: hp627@njit.edu

USE clock;

DROP TABLE IF EXISTS clocks;

CREATE TABLE clocks (
  clock_id INT NOT NULL,
  clock_code VARCHAR(10) NOT NULL UNIQUE,
  clock_name VARCHAR(255) NOT NULL,
  clock_description TEXT NOT NULL,
  clock_style VARCHAR(80) NOT NULL,
  clock_power_source VARCHAR(80) NOT NULL,
  clock_type_id INT DEFAULT NULL,
  clock_buy_price DECIMAL(10,2) NOT NULL,
  clock_sell_price DECIMAL(10,2) NOT NULL,
  date_time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  date_time_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (clock_id),
  FOREIGN KEY (clock_type_id)
    REFERENCES clock_types(clock_type_id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
);
