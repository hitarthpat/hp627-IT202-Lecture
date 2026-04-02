-- Hitarth Patel, IT202 Section 002, Internet Applications, Unit 9 PHP/HTML In-Class Exercise, hp627@njit.edu
CREATE TABLE exercise_hp627.contacts_hp627 (
   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(60) NOT NULL,
   email VARCHAR(100) NOT NULL,
   message TEXT NOT NULL,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
