-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: form
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Table structure for table `applicant_documents`
--

DROP TABLE IF EXISTS `applicant_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicant_documents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int NOT NULL,
  `birth_certificate` varchar(255) NOT NULL,
  PRIMARY KEY (`applicant_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant_documents`
--

LOCK TABLES `applicant_documents` WRITE;
/*!40000 ALTER TABLE `applicant_documents` DISABLE KEYS */;
INSERT INTO `applicant_documents` VALUES (33,1,'Kinyanjui_Wallace_birth_certificate.pdf');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant_register`
--

LOCK TABLES `applicant_register` WRITE;
/*!40000 ALTER TABLE `applicant_register` DISABLE KEYS */;
INSERT INTO `applicant_register` VALUES (1,'Wallace','Kinyanjui','','','0702632142','','$2y$10$Yy7qeUEZ7Z7i/ojb8byFyeIiqhNA9a8R0OXtZzKWDeQQLbH5xwFr6');
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-22 15:37:20
SELECT  courses.id, courses.course, departments.department, levels.level, exam_bodies.exam_body, durations.duration
FROM courses INNER JOIN departments INNER JOIN levels INNER JOIN exam_bodies INNER JOIN durations ON (courses.department_id = departments.id AND courses.level_id = levels.id AND courses.exam_body_id = exam_bodies.id AND courses.duration_id = durations.id);

CREATE VIEW courses_view AS SELECT  courses.id, courses.course, departments.department, levels.level, exam_bodies.exam_body, durations.duration
FROM courses INNER JOIN departments INNER JOIN levels INNER JOIN exam_bodies INNER JOIN durations ON (courses.department_id = departments.id AND courses.level_id = levels.id AND courses.exam_body_id = exam_bodies.id AND courses.duration_id = durations.id);