-- MySQL dump 10.13  Distrib 5.6.38, for osx10.9 (x86_64)
--
-- Host: localhost    Database: qa
-- ------------------------------------------------------
-- Server version	5.6.38

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ANSWERS`
--

DROP TABLE IF EXISTS `ANSWERS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ANSWERS` (
  `A_ID` int(11) NOT NULL AUTO_INCREMENT,
  `A_CONTENT` varchar(500) NOT NULL,
  `A_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RATING` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`A_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ANSWERS`
--

LOCK TABLES `ANSWERS` WRITE;
/*!40000 ALTER TABLE `ANSWERS` DISABLE KEYS */;
INSERT INTO `ANSWERS` VALUES (2,'The Saxon Garden','2018-04-12 03:22:17',3),(3,'Saxon Garden','2018-04-12 05:24:29',-1),(22,'kinder garden','2018-04-12 12:24:34',5),(23,'i love you','2018-04-12 12:47:05',-3),(28,'mjjjh','2018-04-16 13:45:46',5),(29,'fasd','2018-04-16 13:58:15',1);
/*!40000 ALTER TABLE `ANSWERS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `QUESTIONS`
--

DROP TABLE IF EXISTS `QUESTIONS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `QUESTIONS` (
  `Q_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Q_CONTENT` varchar(500) NOT NULL,
  `Q_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_ANSWERED` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Q_ID`),
  KEY `Questions_Q_id_index` (`Q_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `QUESTIONS`
--

LOCK TABLES `QUESTIONS` WRITE;
/*!40000 ALTER TABLE `QUESTIONS` DISABLE KEYS */;
INSERT INTO `QUESTIONS` VALUES (13,'What garden was formally only for royalty?','2018-04-11 14:39:52',1),(34,'How many miners died in the typhoid outbreak of 1854?','2018-04-16 13:31:30',1);
/*!40000 ALTER TABLE `QUESTIONS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Q_A`
--

DROP TABLE IF EXISTS `Q_A`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Q_A` (
  `A_id` int(11) NOT NULL,
  `Q_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`A_id`,`Q_id`),
  KEY `qanda_ibfk_2` (`Q_id`),
  CONSTRAINT `QandA_Answers_A_id_fk` FOREIGN KEY (`A_id`) REFERENCES `Answers` (`A_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `q_a_ibfk_2` FOREIGN KEY (`Q_id`) REFERENCES `Questions` (`Q_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Q_A`
--

LOCK TABLES `Q_A` WRITE;
/*!40000 ALTER TABLE `Q_A` DISABLE KEYS */;
INSERT INTO `Q_A` VALUES (2,13),(3,13),(22,13),(23,13),(28,34),(29,34);
/*!40000 ALTER TABLE `Q_A` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-17 10:06:46
