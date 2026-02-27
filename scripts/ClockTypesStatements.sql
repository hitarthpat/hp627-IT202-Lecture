-- Student Name: Hitarth Patel
-- Date: February 25, 2026
-- Course: IT202 Section 002
-- Assignment: Phase 2 - CRUD Clock Types and Clocks
-- Email: hp627@njit.edu

USE clock;

DROP TABLE IF EXISTS clock_types;

CREATE TABLE clock_types (
  clock_type_id INT NOT NULL,
  clock_type_code VARCHAR(255) NOT NULL UNIQUE,
  clock_type_name VARCHAR(255) NOT NULL,
  clock_aisle_number VARCHAR(20) NOT NULL,
  date_time_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  date_time_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (clock_type_id)
);
