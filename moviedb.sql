CREATE DATABASE  IF NOT EXISTS `moviedb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `moviedb`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: moviedb
-- ------------------------------------------------------
-- Server version	5.7.19-log

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
-- Table structure for table `cast`
--

DROP TABLE IF EXISTS `cast`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cast` (
  `movie_id` varchar(45) NOT NULL,
  `actor_name` varchar(45) DEFAULT NULL,
  `character_name` varchar(45) NOT NULL,
  KEY `cast_movie_id` (`movie_id`),
  CONSTRAINT `cast_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cast`
--

LOCK TABLES `cast` WRITE;
/*!40000 ALTER TABLE `cast` DISABLE KEYS */;
INSERT INTO `cast` VALUES ('001','Henry Cavill','Clark Kent / Kal- el'),('001','Amy Adams','Clark Kent / Kal- el'),('001','Michael Shannon','Clark Kent / Kal- el'),('001','Diane Lane','Clark Kent / Kal- el'),('001','Russell Crowe','Clark Kent / Kal- el'),('001','Antje Traue','Faora-ul'),('001','Harry Lennix','General Swanwick'),('001','Richard Schiff','Dr. Emil Hamilton');
/*!40000 ALTER TABLE `cast` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie` (
  `movie_id` varchar(45) NOT NULL,
  `title` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `content_rating` varchar(5) NOT NULL,
  `runtime` varchar(10) NOT NULL,
  `release_date` varchar(15) NOT NULL,
  `avg_rating` decimal(10,0) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie`
--

LOCK TABLES `movie` WRITE;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` VALUES ('001','Man of Steel','Action, Adventure, Fantasy','PG-13','2h 23min','14 June 2013',7);
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_meta`
--

DROP TABLE IF EXISTS `movie_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_meta` (
  `movie_id` varchar(45) NOT NULL,
  `no_of_ratings` int(11) DEFAULT NULL,
  `director` varchar(45) NOT NULL,
  `writer` varchar(85) NOT NULL,
  `budget` varchar(15) NOT NULL,
  `title_poster_path` varchar(80) NOT NULL,
  `summary` text,
  PRIMARY KEY (`movie_id`),
  CONSTRAINT `meta_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_meta`
--

LOCK TABLES `movie_meta` WRITE;
/*!40000 ALTER TABLE `movie_meta` DISABLE KEYS */;
INSERT INTO `movie_meta` VALUES ('001',60000,'Zack Snyder',' David S. Goyer, Jerry Siegel','$225,000,000','assets/images/manofsteel.jpg',NULL);
/*!40000 ALTER TABLE `movie_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `password` varchar(15) NOT NULL,
  `country` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('000','anon@dankies.com','Anonymous','Anon','anonanon','AnonyLand');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_feedback`
--

DROP TABLE IF EXISTS `user_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_feedback` (
  `user_id` varchar(45) NOT NULL,
  `movie_id` varchar(45) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `review` text,
  `date` date NOT NULL,
  KEY `feedback_movie_id_idx` (`movie_id`),
  KEY `feedback_user_id` (`user_id`),
  CONSTRAINT `feedback_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `feedback_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_feedback`
--

LOCK TABLES `user_feedback` WRITE;
/*!40000 ALTER TABLE `user_feedback` DISABLE KEYS */;
INSERT INTO `user_feedback` VALUES ('000','001',8.4,'Jack Snyder\'s fresh take on Superman/Man of Steel is... fresh indeed. A superhero movie that maxes visual wizardry but beautifully balanced by emotional tones without feeling heavy. Gone is the sleek metal and crystal polish we have known replaced by a techno- organic theme (reminds me of Prometheus) that is both regal and advanced. This is perhaps the only Superman film with the best narrative of the Kryptonian\'s heritage and history. Good casting and an impressive performance by Russell Crowe. I give it an 8.5/10 (just behind Dark Knight Rises IMHO). The Dad in me deems this movie watchable by kids (more age-appropriate, less violent than Iron Man 3)','2013-11-11'),('000','001',7.5,'I really enjoyed this movie. I am a big fan of action and superhero movies, and this did not disappoint. First of all I thought they did a great job on casting Superman. Henry Cavill fits the role perfectly. I liked the supporting cast, except thought they could have done better with Lois Lane. The plot starts out with Superman (Kal-El) being born, and quickly jumps into him being in his 20\'s and saving people. They show some of his growing up, through flashbacks but I wish they would have done more of this. You don\'t have to see any previous Superman movies to see this one, you get the whole back story. There was a ton of good action scenes, almost too much I thought. Plot was pretty good, but also pretty predictable. I saw the 3-D version, and I am not a big fan of 3-D. While this movie did not give me a headache, like \'The Hobbit\', I didn\'t think the 3-D added that much, and I would recommend seeing the 2-D version! Overall I gave it a 9/10. Good action, fun, entertaining movie.','2013-09-10');
/*!40000 ALTER TABLE `user_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'moviedb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-27  9:24:15
