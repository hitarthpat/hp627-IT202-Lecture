-- MySQL dump 10.13  Distrib 8.0.45, for macos15 (arm64)
--
-- Host: localhost    Database: clock
-- ------------------------------------------------------
-- Server version	8.0.45

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clock_types`
--

DROP TABLE IF EXISTS `clock_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clock_types` (
  `clock_type_id` int NOT NULL,
  `clock_type_code` varchar(255) NOT NULL,
  `clock_type_name` varchar(255) NOT NULL,
  `clock_aisle_number` varchar(20) NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`clock_type_id`),
  UNIQUE KEY `clock_type_code` (`clock_type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clock_types`
--

LOCK TABLES `clock_types` WRITE;
/*!40000 ALTER TABLE `clock_types` DISABLE KEYS */;
INSERT INTO `clock_types` VALUES (101,'WALL','Modern Wall Clocks','Aisle B1','2026-04-02 03:18:35','2026-04-02 03:18:35'),(102,'DIGI','Digital Display Clocks','Aisle C2','2026-04-02 03:18:35','2026-04-02 03:18:35'),(103,'ALRM','Bedroom Alarm Clocks','Aisle D4','2026-04-02 03:18:35','2026-04-02 03:18:35'),(104,'SMART','SMART HOME','E5','2026-04-02 03:34:11','2026-04-02 03:34:11'),(105,'Kitchen','Kitchen Smart Clock','K1','2026-04-02 03:49:55','2026-04-02 03:49:55');
/*!40000 ALTER TABLE `clock_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clock_users`
--

DROP TABLE IF EXISTS `clock_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clock_users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `pronouns` varchar(60) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_address` (`email_address`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clock_users`
--

LOCK TABLES `clock_users` WRITE;
/*!40000 ALTER TABLE `clock_users` DISABLE KEYS */;
INSERT INTO `clock_users` VALUES (1,'alex@clocks.com','d834c47cca341755b5febfe45ad2c0a2b512b737df226b84d8d16cc08a62017b','He/Him','Alex','Carter','555-1001','2026-04-02 03:18:35','2026-04-02 03:18:35'),(2,'riley@clocks.com','6badfa39c440e90ba2101f48098cc53f40497b3aecba524f506fceb86cae951f','She/Her','Riley','Nguyen','555-1002','2026-04-02 03:18:35','2026-04-02 03:18:35'),(3,'jordan@clocks.com','a0f9bb1b6b805addf2050743b33b9405c49148200b1e02ceb9b7b89f69a7b522','They/Them','Jordan','Patel','555-1003','2026-04-02 03:18:35','2026-04-02 03:18:35');
/*!40000 ALTER TABLE `clock_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clocks`
--

DROP TABLE IF EXISTS `clocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clocks` (
  `clock_id` int NOT NULL,
  `clock_code` varchar(10) NOT NULL,
  `clock_name` varchar(255) NOT NULL,
  `clock_description` text NOT NULL,
  `clock_style` varchar(80) NOT NULL,
  `clock_power_source` varchar(80) NOT NULL,
  `clock_type_id` int DEFAULT NULL,
  `clock_buy_price` decimal(10,2) NOT NULL,
  `clock_sell_price` decimal(10,2) NOT NULL,
  `date_time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_time_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`clock_id`),
  UNIQUE KEY `clock_code` (`clock_code`),
  KEY `clock_type_id` (`clock_type_id`),
  CONSTRAINT `clocks_ibfk_1` FOREIGN KEY (`clock_type_id`) REFERENCES `clock_types` (`clock_type_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clocks`
--

LOCK TABLES `clocks` WRITE;
/*!40000 ALTER TABLE `clocks` DISABLE KEYS */;
INSERT INTO `clocks` VALUES (1001,'W1001','Oak Frame Gallery Clock','This wall clock features a wide oak frame with clear hour markers that are easy to read across a room. It adds a warm traditional accent to a living room or office while keeping dependable time.','Traditional','AA Battery',101,24.50,44.99,'2026-04-02 03:18:35','2026-04-02 03:18:35'),(1002,'W1002','Minimal Steel Wall Clock','This wall clock uses a slim steel bezel and clean matte dial to create a quiet modern look. It is designed for open workspaces and keeps a steady rhythm with silent quartz movement.','Modern','AA Battery',101,28.75,52.00,'2026-04-02 03:18:35','2026-04-02 03:18:35'),(1003,'W1003','Vintage Station Wall Clock','This station-inspired wall clock has bold black numerals and a slightly weathered finish for a classic display. It works well in entryways and dens where a statement piece needs to stay practical.','Vintage','AA Battery',101,31.20,57.95,'2026-04-02 03:18:35','2026-04-02 03:18:35'),(1004,'W1004','Coastal Blue Wall Clock','This wall clock combines a blue washed face with contrasting white markers for a relaxed coastal style. It brightens kitchens and breakfast nooks while still presenting a clear readable dial.','Coastal','AA Battery',101,22.10,41.50,'2026-04-02 03:18:35','2026-04-02 03:18:35'),(1005,'W1005','Large Loft Wall Clock','This oversized wall clock uses open metalwork and tall numerals to anchor a loft or studio wall. It keeps a bold decorative presence without sacrificing reliable daily performance.','Industrial','AA Battery',101,39.80,71.00,'2026-04-02 03:18:35','2026-04-02 03:18:35'),(2001,'D2001','Bedside LED Cube Clock','This digital clock has a bright cube display with adjustable brightness for late night visibility. It offers a simple compact form that fits neatly on nightstands and study desks.','Compact','USB Power',102,18.40,34.95,'2026-04-02 03:18:35','2026-04-02 03:18:35'),(2002,'D2002','Smart Desk Display Clock','This digital clock shows time in a crisp wide panel with a layout that stays readable from several feet away. It is ideal for home offices where quick glances need to be clear and distraction free.','Contemporary','USB Power',102,26.90,49.99,'2026-04-02 03:18:35','2026-04-02 03:18:35'),(2003,'D2003','Mirror Face Digital Clock','This digital clock uses a reflective mirror face for a sleek appearance when the display is idle. It doubles as a stylish desktop accent and still delivers sharp readable numbers on command.','Modern','USB Power',102,21.60,39.95,'2026-04-02 03:18:35','2026-04-02 03:18:35'),(2004,'D2004','Travel Fold Digital Clock','This foldable digital clock is light enough for travel yet sturdy enough for repeated setup in hotel rooms. Its compact shell protects the display and keeps the time easy to check during trips.','Travel','AAA Battery',102,14.85,29.50,'2026-04-02 03:18:35','2026-04-02 03:18:35'),(2005,'D2005','Calendar Hub Digital Clock','This digital clock combines a large time display with date information so the screen remains useful all day long. It is especially effective in offices and classrooms where schedule awareness matters.','Utility','AC Adapter',102,33.25,58.75,'2026-04-02 03:18:35','2026-04-02 03:18:35'),(3001,'A3001','Sunrise Alarm Clock','This alarm clock simulates a gentle sunrise before the audio alarm begins to help create a calmer morning routine. It balances bedroom comfort with dependable wake up performance.','Wellness','AC Adapter',103,35.50,64.99,'2026-04-02 03:18:35','2026-04-02 03:18:35'),(3002,'A3002','Classic Twin Bell Alarm','This alarm clock delivers the familiar twin bell design with strong metal construction and a loud ring. It fits customers who want a timeless look and an alarm that cannot be ignored.','Classic','AA Battery',103,17.30,33.95,'2026-04-02 03:18:35','2026-04-02 03:18:35'),(3003,'A3003','Compact Student Alarm','This alarm clock keeps controls simple and the display clear for students managing busy class schedules. It is small enough for dorm desks and shelves while still offering dependable daily use.','Compact','AAA Battery',103,12.95,24.95,'2026-04-02 03:18:35','2026-04-02 03:18:35'),(3004,'A3004','Soft Glow Alarm Clock','This alarm clock includes a soft amber display that stays visible at night without overpowering the room. It creates a calm bedside atmosphere and maintains consistent alarm reliability.','Ambient','USB Power',103,19.60,36.40,'2026-04-02 03:18:35','2026-04-02 03:18:35'),(3005,'A3005','Weekend Smart Alarm','This alarm clock supports weekday and weekend scheduling so routines can stay flexible without repeated setup. It works well for professionals who want an organized sleep and work rhythm.','Smart','AC Adapter',103,29.40,54.25,'2026-04-02 03:18:35','2026-04-02 03:18:35'),(3016,'S3016','Smart Routine Wake Clock','This smart alarm clock blends app scheduling with a clear bedside display that stays readable in low light. It supports organized weekday routines and gives the bedroom a modern connected look.','Smart Premium','USB-C',104,35.00,61.99,'2026-04-02 03:56:39','2026-04-02 04:01:48');
/*!40000 ALTER TABLE `clocks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-02  0:05:56
