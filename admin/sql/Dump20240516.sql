-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: form
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `academic_information`
--

DROP TABLE IF EXISTS `academic_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `academic_information` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int NOT NULL,
  `primary_school_name` varchar(255) NOT NULL,
  `kcpe_index_number` varchar(255) NOT NULL,
  `kcpe_marks` varchar(255) NOT NULL,
  `date_of_primary_education_completion` date DEFAULT NULL,
  `secondary_school_name` varchar(255) DEFAULT NULL,
  `kcse_index_number` varchar(255) DEFAULT NULL,
  `kcse_grade` varchar(255) DEFAULT NULL,
  `date_of_secondary_education_completion` date DEFAULT NULL,
  `tertiary_institute_name` varchar(255) DEFAULT NULL,
  `tertiary_course_name` varchar(255) DEFAULT NULL,
  `tertiary_classification` varchar(255) DEFAULT NULL,
  `date_of_tertiary_education_completion` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `academic_information`
--

LOCK TABLES `academic_information` WRITE;
/*!40000 ALTER TABLE `academic_information` DISABLE KEYS */;
INSERT INTO `academic_information` VALUES (1,1,'Muriundu Primary School','511136003','350','2006-12-31','Bavuni Secondary School','511142008','A-','2010-12-31','JKUAT','BSc Analytical Chemistry','Second Upper','2015-11-27');
/*!40000 ALTER TABLE `academic_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `id_number` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Wallace','Kinyanjui','Karanja','wallacek10@gmail.com','0702632142','29334778','$2y$10$wndKMH9Ch0bJVaO5grmcK.tjhOmHhmF08JfYQEhbDw53YgCHsqFtm');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admission_numbers`
--

DROP TABLE IF EXISTS `admission_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admission_numbers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int NOT NULL,
  `admission_number` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admission_numbers`
--

LOCK TABLES `admission_numbers` WRITE;
/*!40000 ALTER TABLE `admission_numbers` DISABLE KEYS */;
INSERT INTO `admission_numbers` VALUES (1,1,'IT/CIT/20004/2024');
/*!40000 ALTER TABLE `admission_numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admission_numbers_counter`
--

DROP TABLE IF EXISTS `admission_numbers_counter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admission_numbers_counter` (
  `applicant_id` int NOT NULL,
  `admission_no` bigint unsigned NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `admission_no` (`admission_no`)
) ENGINE=InnoDB AUTO_INCREMENT=20005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admission_numbers_counter`
--

LOCK TABLES `admission_numbers_counter` WRITE;
/*!40000 ALTER TABLE `admission_numbers_counter` DISABLE KEYS */;
INSERT INTO `admission_numbers_counter` VALUES (1,20004);
/*!40000 ALTER TABLE `admission_numbers_counter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admission_offers`
--

DROP TABLE IF EXISTS `admission_offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admission_offers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `application_id` int NOT NULL,
  `applicant_id` int NOT NULL,
  `applicant_decision` char(10) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admission_offers`
--

LOCK TABLES `admission_offers` WRITE;
/*!40000 ALTER TABLE `admission_offers` DISABLE KEYS */;
INSERT INTO `admission_offers` VALUES (2,2,1,'ACCEPT');
/*!40000 ALTER TABLE `admission_offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicant_documents`
--

DROP TABLE IF EXISTS `applicant_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicant_documents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int NOT NULL,
  `birth_certificate` varchar(255) DEFAULT NULL,
  `kcse` varchar(255) DEFAULT NULL,
  `kcpe` varchar(255) DEFAULT NULL,
  `id_card` varchar(255) DEFAULT NULL,
  `leaving_certificate` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`applicant_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant_documents`
--

LOCK TABLES `applicant_documents` WRITE;
/*!40000 ALTER TABLE `applicant_documents` DISABLE KEYS */;
INSERT INTO `applicant_documents` VALUES (44,1,'','','','',''),(45,2,'','',NULL,NULL,NULL);
/*!40000 ALTER TABLE `applicant_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicant_register`
--

DROP TABLE IF EXISTS `applicant_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicant_register` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `second_name` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL,
  `id_number` varchar(10) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant_register`
--

LOCK TABLES `applicant_register` WRITE;
/*!40000 ALTER TABLE `applicant_register` DISABLE KEYS */;
INSERT INTO `applicant_register` VALUES (1,'Wallace','Kinyanjui','','','0702632142','','$2y$10$Yy7qeUEZ7Z7i/ojb8byFyeIiqhNA9a8R0OXtZzKWDeQQLbH5xwFr6'),(2,'Harrison','Wekesa','','harrisonwekesa09@gmail.com','0741947264','','$2y$10$cf/I1fuNFY3CaTGr43XZOuVMhNyE5/PiuGZ6DiOzNzka2.C0im9Xe');
/*!40000 ALTER TABLE `applicant_register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_form`
--

DROP TABLE IF EXISTS `application_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `application_form` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_form`
--

LOCK TABLES `application_form` WRITE;
/*!40000 ALTER TABLE `application_form` DISABLE KEYS */;
INSERT INTO `application_form` VALUES (1,'Wallace','Kinyanjui','wallacek10@gmail.com','0702632142'),(3,'Wallace','Karanja','karanjawallace@yahoo.com','0735435988'),(4,'Wallace','Kinyanjui','wallacekaranja@yahoo.co','0735358988'),(5,'Kennedy','Muchukuri','Kennedy.muchukuri@kalro.org','0738501322');
/*!40000 ALTER TABLE `application_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `applications`
--

DROP TABLE IF EXISTS `applications`;
/*!50001 DROP VIEW IF EXISTS `applications`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `applications` AS SELECT 
 1 AS `id`,
 1 AS `applicant_id`,
 1 AS `firstname`,
 1 AS `lastname`,
 1 AS `second_name`,
 1 AS `gender`,
 1 AS `id_number`,
 1 AS `birthday`,
 1 AS `email_address`,
 1 AS `phone_number`,
 1 AS `alternative_phone`,
 1 AS `county_id`,
 1 AS `sub_county_id`,
 1 AS `location`,
 1 AS `sub_location`,
 1 AS `village`,
 1 AS `primary_school_name`,
 1 AS `kcpe_index_number`,
 1 AS `kcpe_marks`,
 1 AS `date_of_primary_education_completion`,
 1 AS `secondary_school_name`,
 1 AS `kcse_index_number`,
 1 AS `kcse_grade`,
 1 AS `date_of_secondary_education_completion`,
 1 AS `tertiary_institute_name`,
 1 AS `tertiary_course_name`,
 1 AS `tertiary_classification`,
 1 AS `date_of_tertiary_education_completion`,
 1 AS `course`,
 1 AS `course_id`,
 1 AS `department_id`,
 1 AS `level_id`,
 1 AS `exam_body_id`,
 1 AS `duration_id`,
 1 AS `requirement`,
 1 AS `description`,
 1 AS `father`,
 1 AS `father_occupation`,
 1 AS `father_phone_number`,
 1 AS `father_email_address`,
 1 AS `father_postal_address`,
 1 AS `mother`,
 1 AS `mother_occupation`,
 1 AS `mother_phone_number`,
 1 AS `mother_email_address`,
 1 AS `mother_postal_address`,
 1 AS `guardian`,
 1 AS `guardian_occupation`,
 1 AS `guardian_phone_number`,
 1 AS `guardian_email_address`,
 1 AS `guardian_postal_address`,
 1 AS `sponsor`,
 1 AS `sponsor_occupation`,
 1 AS `sponsor_phone_number`,
 1 AS `sponsor_email_address`,
 1 AS `sponsor_postal_address`,
 1 AS `birth_certificate`,
 1 AS `kcse`,
 1 AS `kcpe`,
 1 AS `id_card`,
 1 AS `leaving_certificate`,
 1 AS `submitted`,
 1 AS `admitted`,
 1 AS `applicant_decision`,
 1 AS `admission_number`,
 1 AS `intake`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `applications_decision`
--

DROP TABLE IF EXISTS `applications_decision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applications_decision` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int NOT NULL,
  `admitted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applications_decision`
--

LOCK TABLES `applications_decision` WRITE;
/*!40000 ALTER TABLE `applications_decision` DISABLE KEYS */;
INSERT INTO `applications_decision` VALUES (1,1,1);
/*!40000 ALTER TABLE `applications_decision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counties`
--

DROP TABLE IF EXISTS `counties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `counties` (
  `id` int NOT NULL,
  `county` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counties`
--

LOCK TABLES `counties` WRITE;
/*!40000 ALTER TABLE `counties` DISABLE KEYS */;
INSERT INTO `counties` VALUES (1,'Mombasa'),(2,'Kwale'),(3,'Kilifi'),(4,'TanaRiver'),(5,'Lamu'),(6,'Taita-Taveta'),(7,'Garissa'),(8,'Wajir'),(9,'Mandera'),(10,'Marsabit'),(11,'Isiolo'),(12,'Meru'),(13,'Tharaka-Nithi'),(14,'Embu'),(15,'Kitui'),(16,'Machakos'),(17,'Makueni'),(18,'Nyandarua'),(19,'Nyeri'),(20,'Kirinyaga'),(21,'Murang\'a'),(22,'Kiambu'),(23,'Turkana'),(24,'WestPokot'),(25,'Samburu'),(26,'Trans-Nzoia'),(27,'UasinGishu'),(28,'Elgeyo-Marakwet'),(29,'Nandi'),(30,'Baringo'),(31,'Laikipia'),(32,'Nakuru'),(33,'Narok'),(34,'Kajiado'),(35,'Kericho'),(36,'Bomet'),(37,'Kakamega'),(38,'Vihiga'),(39,'Bungoma'),(40,'Busia'),(41,'Siaya'),(42,'Kisumu'),(43,'HomaBay'),(44,'Migori'),(45,'Kisii'),(46,'Nyamira'),(47,'Nairobi');
/*!40000 ALTER TABLE `counties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_information`
--

DROP TABLE IF EXISTS `course_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_information` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int NOT NULL,
  `course_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_information`
--

LOCK TABLES `course_information` WRITE;
/*!40000 ALTER TABLE `course_information` DISABLE KEYS */;
INSERT INTO `course_information` VALUES (1,1,8),(2,2,14);
/*!40000 ALTER TABLE `course_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course` varchar(255) NOT NULL,
  `abbr` varchar(10) NOT NULL,
  `department_id` int NOT NULL,
  `level_id` int NOT NULL,
  `exam_body_id` int NOT NULL,
  `duration_id` int NOT NULL,
  `requirement` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (7,'Science Laboratory Technology','DSLT',5,2,4,1,'Provide course requirement','Provide course description'),(8,'Information Technology','CIT',8,1,4,2,'D or D+ in KCSE','Provides skills to work in IT industry at the technician entry level.'),(9,'Information Technology','DIT',8,2,4,1,'Atleast a C- in KCSE or a certificate in In information technology level 5.','This provides you with knowlegde and skills to work in the IT field.'),(12,'General Agriculture','DGA',1,2,4,1,'Atleast a C-(minus) in KCSE','Provides compentencies in General agriculture.'),(14,'Mechanical Engineering','DME',6,2,4,1,'Atleast C- (minus)','Plant & Automotive option'),(15,'Automotive Engineering','DAE',6,2,4,1,'Atleast a C- (minus) in KCSE or a Level 5 Certificate in Automotive Engineering','Prepares you for a career in automotive/automation industry');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `courses_view`
--

DROP TABLE IF EXISTS `courses_view`;
/*!50001 DROP VIEW IF EXISTS `courses_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `courses_view` AS SELECT 
 1 AS `id`,
 1 AS `course`,
 1 AS `abbr`,
 1 AS `department`,
 1 AS `level`,
 1 AS `exam_body`,
 1 AS `duration`,
 1 AS `requirement`,
 1 AS `description`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `demographic_information`
--

DROP TABLE IF EXISTS `demographic_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `demographic_information` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int NOT NULL,
  `county_id` int NOT NULL,
  `sub_county_id` int NOT NULL,
  `location` varchar(255) NOT NULL,
  `sub_location` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demographic_information`
--

LOCK TABLES `demographic_information` WRITE;
/*!40000 ALTER TABLE `demographic_information` DISABLE KEYS */;
INSERT INTO `demographic_information` VALUES (1,1,32,175,'Wendo','Kabatini','Engoshura');
/*!40000 ALTER TABLE `demographic_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `department` varchar(255) NOT NULL,
  `abbr` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Agriculture and Environment Studies','AES'),(3,'Liberal Arts','LA'),(5,'Applied Sciences','AS'),(6,'Mechanical and Automotive Engineering','MAE'),(7,'Electrical and Electronic Engineering','EEE'),(8,'Information Technology','IT'),(9,'Instutional Management','IM'),(12,'Business Dpt','BS');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `durations`
--

DROP TABLE IF EXISTS `durations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `durations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `duration` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `durations`
--

LOCK TABLES `durations` WRITE;
/*!40000 ALTER TABLE `durations` DISABLE KEYS */;
INSERT INTO `durations` VALUES (1,'3 Years'),(2,'2 Years'),(3,'1 Year'),(4,'6 Months'),(5,'3 months');
/*!40000 ALTER TABLE `durations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_bodies`
--

DROP TABLE IF EXISTS `exam_bodies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exam_bodies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `exam_body` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_bodies`
--

LOCK TABLES `exam_bodies` WRITE;
/*!40000 ALTER TABLE `exam_bodies` DISABLE KEYS */;
INSERT INTO `exam_bodies` VALUES (3,'KNP'),(4,'CBET/CDACC'),(6,'KNEC');
/*!40000 ALTER TABLE `exam_bodies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intake_information`
--

DROP TABLE IF EXISTS `intake_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intake_information` (
  `applicant_id` int NOT NULL,
  `intake` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intake_information`
--

LOCK TABLES `intake_information` WRITE;
/*!40000 ALTER TABLE `intake_information` DISABLE KEYS */;
INSERT INTO `intake_information` VALUES (1,'JANUARY 2025');
/*!40000 ALTER TABLE `intake_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intakes`
--

DROP TABLE IF EXISTS `intakes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `intakes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `intake` varchar(255) DEFAULT NULL,
  `active` char(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intakes`
--

LOCK TABLES `intakes` WRITE;
/*!40000 ALTER TABLE `intakes` DISABLE KEYS */;
INSERT INTO `intakes` VALUES (1,'2024-05-01','2024-08-31','SEPTEMBER 2024','YES'),(2,'2024-09-01','2024-12-31','JANUARY 2025','YES');
/*!40000 ALTER TABLE `intakes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `levels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` VALUES (1,'Level 5'),(2,'Level 6'),(4,'Level 4');
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parent_information`
--

DROP TABLE IF EXISTS `parent_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parent_information` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int NOT NULL,
  `father` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `father_phone_number` varchar(255) DEFAULT NULL,
  `father_email_address` varchar(255) DEFAULT NULL,
  `father_postal_address` varchar(255) DEFAULT NULL,
  `mother` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) DEFAULT NULL,
  `mother_phone_number` varchar(255) DEFAULT NULL,
  `mother_email_address` varchar(255) DEFAULT NULL,
  `mother_postal_address` varchar(255) DEFAULT NULL,
  `guardian` varchar(255) DEFAULT NULL,
  `guardian_occupation` varchar(255) DEFAULT NULL,
  `guardian_phone_number` varchar(255) DEFAULT NULL,
  `guardian_email_address` varchar(255) DEFAULT NULL,
  `guardian_postal_address` varchar(255) DEFAULT NULL,
  `sponsor` varchar(255) DEFAULT NULL,
  `sponsor_occupation` varchar(255) DEFAULT NULL,
  `sponsor_phone_number` varchar(255) DEFAULT NULL,
  `sponsor_email_address` varchar(255) DEFAULT NULL,
  `sponsor_postal_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parent_information`
--

LOCK TABLES `parent_information` WRITE;
/*!40000 ALTER TABLE `parent_information` DISABLE KEYS */;
INSERT INTO `parent_information` VALUES (1,1,'Wallace Karanja','Technical trainer','0702632142','wallacek10@gmail.com','4061-20100 Nakuru','Pearl Njoki','Farmer','0713505237','pearlnjoki@yahoo.com','4033 Nakuru',NULL,NULL,NULL,NULL,NULL,'Equity Bank','Finance','074600000','scholarships@equity.ac.ke','2020 Nairobi');
/*!40000 ALTER TABLE `parent_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_information`
--

DROP TABLE IF EXISTS `personal_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_information` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `second_name` varchar(255) DEFAULT NULL,
  `gender` char(10) NOT NULL,
  `id_number` int NOT NULL,
  `birthday` date NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `alternative_phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_information`
--

LOCK TABLES `personal_information` WRITE;
/*!40000 ALTER TABLE `personal_information` DISABLE KEYS */;
INSERT INTO `personal_information` VALUES (1,1,'Wallace','Kinyanjui','Karanja','Male',29334778,'1991-02-21','wallacek10@gmail.com','0702632142','0735435988'),(3,2,'Harrison','Wekesa','','M',0,'1998-04-29','harrisonwekesa09@gmail.com','0741947264','');
/*!40000 ALTER TABLE `personal_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_counties`
--

DROP TABLE IF EXISTS `sub_counties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_counties` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `county_id` int NOT NULL,
  `sub_county_id` int DEFAULT NULL,
  `sub_county` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=297 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_counties`
--

LOCK TABLES `sub_counties` WRITE;
/*!40000 ALTER TABLE `sub_counties` DISABLE KEYS */;
INSERT INTO `sub_counties` VALUES (1,1,1,'Changamwe'),(2,1,2,'Jomvu'),(3,1,3,'Kisauni'),(4,1,4,'Likoni'),(5,1,5,'Mvita'),(6,1,6,'Nyali'),(7,2,1,'Kinango'),(8,2,2,'Lunga Lunga'),(9,2,3,'Msambweni'),(10,2,4,'Matuga'),(11,3,1,'Ganze'),(12,3,2,'Kaloleni'),(13,3,3,'Kilifi North'),(14,3,4,'Kilifi South'),(15,3,5,'Magarini'),(16,3,6,'Malindi'),(17,3,7,'Rabai'),(18,4,1,'Bura'),(19,4,2,'Galole'),(20,4,3,'Garsen'),(21,5,1,'Lamu East'),(22,5,2,'Lamu West'),(23,6,1,'Mwatate'),(24,6,2,'Taveta'),(25,6,3,'Voi'),(26,6,4,'Wundanyi'),(27,7,1,'Daadab'),(28,7,2,'Fafi'),(29,7,3,'Garissa Township'),(30,7,4,'Hulugho'),(31,7,5,'Ijara'),(32,7,6,'Lagdera'),(33,7,7,'Balambala'),(34,8,1,'Eldas'),(35,8,2,'Tarbaj'),(36,8,3,'Wajir East'),(37,8,4,'Wajir North'),(38,8,5,'Wajir South'),(39,8,6,'Wajir West'),(40,9,1,'Banissa'),(41,9,2,'Lafey'),(42,9,3,'Mandera East'),(43,9,4,'Mandera North'),(44,9,5,'Mandera South'),(45,9,6,'Mandera West'),(46,10,1,'Laisamis'),(47,10,2,'Moyale'),(48,10,3,'North Hor'),(49,10,4,'Saku'),(50,11,1,'Isiolo'),(51,11,2,'Merti'),(52,11,3,'Garbatulla'),(53,12,1,'Buuri'),(54,12,2,'Igembe Central'),(55,12,3,'Igembe North'),(56,12,4,'Igembe South'),(57,12,5,'Imenti Central'),(58,12,6,'Imenti North'),(59,12,7,'Imenti South'),(60,12,8,'Tigania East'),(61,12,9,'Tigania West'),(62,13,1,'Tharaka North'),(63,13,2,'Tharaka South'),(64,13,3,'Chuka'),(65,13,4,'Igambangoâ€™mbe'),(66,13,5,'Maara'),(67,13,6,'Chiakariga and Muthambi'),(68,14,1,'Manyatta'),(69,14,2,'Mbeere North'),(70,14,3,'Mbeere South'),(71,14,4,'Runyenjes'),(72,15,1,'Kitui West'),(73,15,2,'Kitui Central'),(74,15,3,'Kitui Rural'),(75,15,4,'Kitui South'),(76,15,5,'Kitui East'),(77,15,6,'Mwingi North'),(78,15,7,'Mwingi West'),(79,15,8,'Mwingi Central'),(80,16,1,'Kathiani'),(81,16,2,'Machakos Town'),(82,16,3,'Masinga'),(83,16,4,'Matungulu'),(84,16,5,'Mavoko'),(85,16,6,'Mwala'),(86,16,7,'Yatta'),(87,17,1,'Kaiti'),(88,17,2,'Kibwezi West'),(89,17,3,'Kibwezi East'),(90,17,4,'Kilome'),(91,17,5,'Makueni'),(92,17,6,'Mbooni'),(93,18,1,'Kinangop'),(94,18,2,'Kipipiri'),(95,18,3,'Ndaragwa'),(96,18,4,'Ol-Kalou'),(97,18,5,'Ol Joro Orok'),(98,19,1,'Kieni East'),(99,19,2,'Kieni West'),(100,19,3,'Mathira East'),(101,19,4,'Mathira West'),(102,19,5,'Mukurweini'),(103,19,6,'Nyeri Town'),(104,19,7,'Othaya'),(105,19,8,'Tetu'),(106,20,1,'Kirinyaga Central'),(107,20,2,'Kirinyaga East'),(108,20,3,'Kirinyaga West'),(109,20,4,'Mwea East'),(110,20,5,'Mwea West'),(111,21,1,'Gatanga'),(112,21,2,'Kahuro'),(113,21,3,'Kandara'),(114,21,4,'Kangema'),(115,21,5,'Kigumo'),(116,21,6,'Kiharu'),(117,21,7,'Mathioya'),(118,21,8,'Murang\'a South'),(119,22,1,'Gatundu North'),(120,22,2,'Gatundu South'),(121,22,3,'Githunguri'),(122,22,4,'Juja'),(123,22,5,'Kabete'),(124,22,6,'Kiambaa'),(125,22,7,'Kiambu'),(126,22,8,'Kikuyu'),(127,22,9,'Limuru'),(128,22,10,'Ruiru'),(129,22,11,'Thika Town'),(130,22,12,'Lari'),(131,23,1,'Loima'),(132,23,2,'Turkana Central'),(133,23,3,'Turkana East'),(134,23,4,'Turkana North'),(135,23,5,'Turkana South'),(136,24,1,'Central Pokot'),(137,24,2,'North Pokot'),(138,24,3,'Pokot South'),(139,24,4,'West Pokot'),(140,25,1,'Samburu East'),(141,25,2,'Samburu North'),(142,25,3,'Samburu West'),(143,26,1,'Cherangany'),(144,26,2,'Endebess'),(145,26,3,'Kiminini'),(146,26,4,'Kwanza'),(147,26,5,'Saboti'),(148,27,1,'Ainabkoi'),(149,27,2,'Kapseret'),(150,27,3,'Kesses'),(151,27,4,'Moiben'),(152,27,5,'Soy'),(153,27,6,'Turbo'),(154,28,1,'Keiyo North'),(155,28,2,'Keiyo South'),(156,28,3,'Marakwet East'),(157,28,4,'Marakwet West'),(158,29,1,'Aldai'),(159,29,2,'Chesumei'),(160,29,3,'Emgwen'),(161,29,4,'Mosop'),(162,29,5,'Nandi Hills'),(163,29,6,'Tindiret'),(164,30,1,'Baringo Central'),(165,30,2,'Baringo North'),(166,30,3,'Baringo South'),(167,30,4,'Eldama Ravine'),(168,30,5,'Mogotio'),(169,30,6,'Tiaty'),(170,30,1,'Laikipia Central'),(171,30,2,'Laikipia East'),(172,30,3,'Laikipia North'),(173,30,4,'Laikipia West '),(174,30,5,'Nyahururu'),(175,32,1,'Bahati'),(176,32,2,'Gilgil'),(177,32,3,'Kuresoi North'),(178,32,4,'Kuresoi South'),(179,32,5,'Molo'),(180,32,6,'Naivasha'),(181,32,7,'Nakuru Town East'),(182,32,8,'Nakuru Town West'),(183,32,9,'Njoro'),(184,32,10,'Rongai'),(185,32,11,'Subukia'),(186,33,1,'Narok East'),(187,33,2,'Narok North'),(188,33,3,'Narok South'),(189,33,4,'Narok West'),(190,33,5,'Transmara East'),(191,33,6,'Transmara West'),(192,34,1,'Isinya'),(193,34,2,'Kajiado Central'),(194,34,3,'Kajiado North'),(195,34,4,'Loitokitok'),(196,34,5,'Mashuuru'),(197,35,1,'Ainamoi'),(198,35,2,'Belgut'),(199,35,3,'Bureti'),(200,35,4,'Kipkelion East'),(201,35,5,'Kipkelion West'),(202,35,6,'Soin/Sigowet'),(203,36,1,'Bomet Central'),(204,36,2,'Bomet East'),(205,36,3,'Chepalungu'),(206,36,4,'Konoin'),(207,36,5,'Sotik'),(208,37,1,'Butere'),(209,37,2,'Kakamega Central'),(210,37,3,'Kakamega East'),(211,37,4,'Kakamega North'),(212,37,5,'Kakamega South'),(213,37,6,'Khwisero'),(214,37,7,'Lugari'),(215,37,8,'Lukuyani'),(216,37,9,'Lurambi'),(217,37,10,'Matete'),(218,37,11,'Mumias'),(219,37,12,'Mutungu'),(220,37,13,'Navakholo'),(221,38,1,'Emuhaya'),(222,38,2,'Hamisi'),(223,38,3,'Luanda'),(224,38,4,'Sabatia'),(225,38,5,'Vihiga'),(226,39,1,'Bumula'),(227,39,2,'Kabuchai'),(228,39,3,'Kanduyi'),(229,39,4,'Kimilil'),(230,39,5,'Mt Elgon'),(231,39,6,'Sirisia'),(232,39,7,'Tongaren'),(233,39,8,'Webuye East'),(234,39,9,'Webuye West'),(235,40,1,'Budalangi'),(236,40,2,'Butula'),(237,40,3,'Funyula'),(238,40,4,'Nambele'),(239,40,5,'Teso North'),(240,40,6,'Teso South'),(241,41,1,'Alego Usonga'),(242,41,2,'Bondo'),(243,41,3,'Gem'),(244,41,4,'Rarieda'),(245,41,5,'Ugenya'),(246,41,6,'Unguja'),(247,42,1,'Kisumu Central'),(248,42,2,'Kisumu East '),(249,42,3,'Kisumu West'),(250,42,4,'Muhoroni'),(251,42,5,'Nyakach'),(252,42,6,'Nyando'),(253,42,7,'Seme'),(254,43,1,'Homabay Town'),(255,43,2,'Kabondo'),(256,43,3,'Karachwonyo'),(257,43,4,'Kasipul'),(258,43,5,'Mbita'),(259,43,6,'Ndhiwa'),(260,43,7,'Rangwe'),(261,43,8,'Suba'),(262,44,1,'Awendo'),(263,44,2,'Kuria East'),(264,44,3,'Kuria West'),(265,44,4,'Mabera'),(266,44,5,'Ntimaru'),(267,44,6,'Rongo'),(268,44,7,'Suna East'),(269,44,8,'Suna West'),(270,44,9,'Uriri'),(271,45,1,'Kisii'),(272,46,1,'Borabu'),(273,46,2,'Manga'),(274,46,3,'Masaba North'),(275,46,4,'Nyamira North'),(276,46,5,'Nyamira South'),(277,47,1,'Dagoretti North'),(278,47,2,'Dagoretti South'),(279,47,3,'Embakasi Central'),(280,47,4,'Embakasi East'),(281,47,5,'Embakasi North'),(282,47,6,'Embakasi South'),(283,47,7,'Embakasi West'),(284,47,8,'Kamukunji'),(285,47,9,'Kasarani'),(286,47,10,'Kibra'),(287,47,11,'Lang\'ata'),(288,47,12,'Makadara'),(289,47,13,'Mathare'),(290,47,14,'Roysambu'),(291,47,15,'Ruaraka'),(292,47,16,'Starehe'),(293,47,17,'Westlands'),(294,32,NULL,'Nakuru North'),(295,32,NULL,'Nakuru North'),(296,32,NULL,'Nakuru North');
/*!40000 ALTER TABLE `sub_counties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submitted_applications`
--

DROP TABLE IF EXISTS `submitted_applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `submitted_applications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int NOT NULL,
  `submitted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submitted_applications`
--

LOCK TABLES `submitted_applications` WRITE;
/*!40000 ALTER TABLE `submitted_applications` DISABLE KEYS */;
INSERT INTO `submitted_applications` VALUES (2,1,1);
/*!40000 ALTER TABLE `submitted_applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `applications`
--

/*!50001 DROP VIEW IF EXISTS `applications`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`admin`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `applications` AS select `personal_information`.`id` AS `id`,`personal_information`.`applicant_id` AS `applicant_id`,`personal_information`.`firstname` AS `firstname`,`personal_information`.`lastname` AS `lastname`,`personal_information`.`second_name` AS `second_name`,`personal_information`.`gender` AS `gender`,`personal_information`.`id_number` AS `id_number`,`personal_information`.`birthday` AS `birthday`,`personal_information`.`email_address` AS `email_address`,`personal_information`.`phone_number` AS `phone_number`,`personal_information`.`alternative_phone` AS `alternative_phone`,`demographic_information`.`county_id` AS `county_id`,`demographic_information`.`sub_county_id` AS `sub_county_id`,`demographic_information`.`location` AS `location`,`demographic_information`.`sub_location` AS `sub_location`,`demographic_information`.`village` AS `village`,`academic_information`.`primary_school_name` AS `primary_school_name`,`academic_information`.`kcpe_index_number` AS `kcpe_index_number`,`academic_information`.`kcpe_marks` AS `kcpe_marks`,`academic_information`.`date_of_primary_education_completion` AS `date_of_primary_education_completion`,`academic_information`.`secondary_school_name` AS `secondary_school_name`,`academic_information`.`kcse_index_number` AS `kcse_index_number`,`academic_information`.`kcse_grade` AS `kcse_grade`,`academic_information`.`date_of_secondary_education_completion` AS `date_of_secondary_education_completion`,`academic_information`.`tertiary_institute_name` AS `tertiary_institute_name`,`academic_information`.`tertiary_course_name` AS `tertiary_course_name`,`academic_information`.`tertiary_classification` AS `tertiary_classification`,`academic_information`.`date_of_tertiary_education_completion` AS `date_of_tertiary_education_completion`,`courses`.`course` AS `course`,`course_information`.`course_id` AS `course_id`,`courses`.`department_id` AS `department_id`,`courses`.`level_id` AS `level_id`,`courses`.`exam_body_id` AS `exam_body_id`,`courses`.`duration_id` AS `duration_id`,`courses`.`requirement` AS `requirement`,`courses`.`description` AS `description`,`parent_information`.`father` AS `father`,`parent_information`.`father_occupation` AS `father_occupation`,`parent_information`.`father_phone_number` AS `father_phone_number`,`parent_information`.`father_email_address` AS `father_email_address`,`parent_information`.`father_postal_address` AS `father_postal_address`,`parent_information`.`mother` AS `mother`,`parent_information`.`mother_occupation` AS `mother_occupation`,`parent_information`.`mother_phone_number` AS `mother_phone_number`,`parent_information`.`mother_email_address` AS `mother_email_address`,`parent_information`.`mother_postal_address` AS `mother_postal_address`,`parent_information`.`guardian` AS `guardian`,`parent_information`.`guardian_occupation` AS `guardian_occupation`,`parent_information`.`guardian_phone_number` AS `guardian_phone_number`,`parent_information`.`guardian_email_address` AS `guardian_email_address`,`parent_information`.`guardian_postal_address` AS `guardian_postal_address`,`parent_information`.`sponsor` AS `sponsor`,`parent_information`.`sponsor_occupation` AS `sponsor_occupation`,`parent_information`.`sponsor_phone_number` AS `sponsor_phone_number`,`parent_information`.`sponsor_email_address` AS `sponsor_email_address`,`parent_information`.`sponsor_postal_address` AS `sponsor_postal_address`,`applicant_documents`.`birth_certificate` AS `birth_certificate`,`applicant_documents`.`kcse` AS `kcse`,`applicant_documents`.`kcpe` AS `kcpe`,`applicant_documents`.`id_card` AS `id_card`,`applicant_documents`.`leaving_certificate` AS `leaving_certificate`,`submitted_applications`.`submitted` AS `submitted`,`applications_decision`.`admitted` AS `admitted`,`admission_offers`.`applicant_decision` AS `applicant_decision`,`admission_numbers`.`admission_number` AS `admission_number`,`intake_information`.`intake` AS `intake` from (((((((((((`personal_information` join `demographic_information` on((`personal_information`.`applicant_id` = `demographic_information`.`applicant_id`))) join `academic_information` on((`academic_information`.`applicant_id` = `demographic_information`.`applicant_id`))) join `course_information` on((`demographic_information`.`applicant_id` = `course_information`.`applicant_id`))) join `parent_information` on((`parent_information`.`applicant_id` = `course_information`.`applicant_id`))) join `applicant_documents` on((`applicant_documents`.`applicant_id` = `parent_information`.`applicant_id`))) join `courses` on((`courses`.`id` = `course_information`.`course_id`))) left join `submitted_applications` on((`applicant_documents`.`applicant_id` = `submitted_applications`.`applicant_id`))) left join `applications_decision` on((`submitted_applications`.`applicant_id` = `applications_decision`.`applicant_id`))) left join `admission_numbers` on((`applications_decision`.`applicant_id` = `admission_numbers`.`applicant_id`))) left join `admission_offers` on((`admission_numbers`.`applicant_id` = `admission_offers`.`applicant_id`))) join `intake_information` on((`intake_information`.`applicant_id` = `personal_information`.`applicant_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `courses_view`
--

/*!50001 DROP VIEW IF EXISTS `courses_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`admin`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `courses_view` AS select `courses`.`id` AS `id`,`courses`.`course` AS `course`,`courses`.`abbr` AS `abbr`,`departments`.`department` AS `department`,`levels`.`level` AS `level`,`exam_bodies`.`exam_body` AS `exam_body`,`durations`.`duration` AS `duration`,`courses`.`requirement` AS `requirement`,`courses`.`description` AS `description` from ((((`courses` join `departments` on((`courses`.`department_id` = `departments`.`id`))) join `levels` on((`courses`.`level_id` = `levels`.`id`))) join `exam_bodies` on((`courses`.`exam_body_id` = `exam_bodies`.`id`))) join `durations` on((`courses`.`duration_id` = `durations`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-16 13:55:01
