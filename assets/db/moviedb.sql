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
  `character_name` varchar(45) DEFAULT NULL,
  KEY `cast_movie_id_idx` (`movie_id`),
  CONSTRAINT `cast_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cast`
--

LOCK TABLES `cast` WRITE;
/*!40000 ALTER TABLE `cast` DISABLE KEYS */;
INSERT INTO `cast` VALUES ('001','Henry Cavill ','Clark Kent / Kal-El'),('001','Amy Adams','Lois Lane'),('001','Michael Shannon','General Zod'),('001','Diane Lane','Martha Kent'),('001','Russell Crowe','Jor-El'),('001','Antje Traue','Faora-Ul'),('001','Harry Lennix','General Swanwick'),('002','Andrew Garfield','Sam'),('002','Wendy Vanden Heuvel',' Bird Woman'),('002','Deborah Geffner','Mom'),('002','Riley Keough','Sarah'),('002','Riki Lindhome','Actress'),('002','Jeannine Cota','Botox Reporter'),('002','Chris Gann','Jefferson Sevence'),('003','Bradley Cooper','Colin Bates'),('003','Clint Eastwood','Earl Stone'),('003','Taissa Farmiga','Ginny'),('003','Andy Garcia','Actor'),('003','Michael Peña','Enforcer'),('003','Laurence Fishburne','DEA Special Agent'),('003','Alison Eastwood','Iris'),('003','Dianne Wiest','Mary'),('004','Mandy Moore','Rapunzel (voice)'),('004','Zachary Levi','Flynn Rider (voice)'),('004','Donna Murphy','Mother Gothel (voice)'),('004','Ron Perlman','Stabbington Brother (voice)'),('004','M.C. Gainey','Captain of the Guard (voice)'),('004','Jeffrey Tambor','Big Nose Thug (voice)'),('004','Brad Garrett','Hook Hand Thug (voice)'),('004','Paul F. Tompkins','Short Thug (voice)'),('004','Richard Kiel','Vlad (voice)');
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
  `release_date` date NOT NULL,
  `avg_rating` decimal(10,0) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie`
--

LOCK TABLES `movie` WRITE;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` VALUES ('001','Man of Steel','Action, Adventure, Fantasy','PG-13','2h 23min','2013-07-10',7),('002','Under the Silver Lake ','Comedy , Crime , Drama ','R','2h 19min','2018-12-20',0),('003','The Mule','Crime, Drama, Mystery','R','2h (approx','2018-12-14',0),('004','Tangled','Animation , Adventure , Comedy','PG','1h 40min','2010-11-24',8);
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
INSERT INTO `movie_meta` VALUES ('001',60000,'Zack Snyder','David S. Goyer, Jerry Siegel','$225,000,000','assets/images/manofsteel.jpg','A young boy learns that he has extraordinary powers and is not of this earth. As a young man, he journeys to discover where he came from and what he was sent here to do. But the hero in him must emerge if he is to save the world from annihilation and become the symbol of hope for all mankind.'),('002',0,'David Robert Mitchell','David Robert Mitchell','$8,500,000','assets/images/underthesilverlake.jpg','Sam, intelligent but without purpose, finds a mysterious woman swimming in his apartment\'s pool one night. The next morning, she disappears. Sam sets off across LA to find her, and along the way he uncovers a conspiracy far more bizarre.'),('003',0,'Clint Eastwood','Sam Dolnick, Nick Schenk','N/A','assets/images/themule.jpg','A 90-year-old horticulturist and WWII veteran is caught transporting $3 million worth of cocaine through Michigan for a Mexican drug cartel.'),('004',355,'Nathan Greno, Byron Howard','Dan Fogelman, Jacob Grimm ','$260,000,000','assets/images/tangled.jpg','The magically long-haired Rapunzel has spent her entire life in a tower, but now that a runaway thief has stumbled upon her, she is about to discover the world for the first time, and who she really is.');
/*!40000 ALTER TABLE `movie_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  `country` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (00001,'amberramesh@gmail.com','Amber','Ramesh','male','ikem3151','india'),(00002,'daniii@gmail.com','Danice','Parker','female','toohot4u','india');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_feedback`
--

DROP TABLE IF EXISTS `user_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_feedback` (
  `user_id` int(5) NOT NULL,
  `movie_id` varchar(45) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `review` text,
  `date` date NOT NULL,
  KEY `feedback_movie_id_idx` (`movie_id`),
  KEY `feedback_user_id_idx` (`user_id`),
  CONSTRAINT `feedback_movie_id` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_feedback`
--

LOCK TABLES `user_feedback` WRITE;
/*!40000 ALTER TABLE `user_feedback` DISABLE KEYS */;
INSERT INTO `user_feedback` VALUES (0,'001',8.5,'Jack Snyder\'s fresh take on Superman/Man of Steel is... fresh indeed. A superhero movie that maxes visual wizardry but beautifully balanced by emotional tones without feeling heavy. Gone is the sleek metal and crystal polish we have known replaced by a techno- organic theme (reminds me of Prometheus) that is both regal and advanced. This is perhaps the only Superman film with the best narrative of the Kryptonian\'s heritage and history. Good casting and an impressive performance by Russell Crowe. I give it an 8.5/10 (just behind Dark Knight Rises IMHO). The Dad in me deems this movie watchable by kids (more age-appropriate, less violent than Iron Man 3)','2013-11-11'),(0,'001',8.5,'I really enjoyed this movie. I am a big fan of action and superhero movies, and this did not disappoint. First of all I thought they did a great job on casting Superman. Henry Cavill fits the role perfectly. I liked the supporting cast, except thought they could have done better with Lois Lane. The plot starts out with Superman (Kal-El) being born, and quickly jumps into him being in his 20\'s and saving people. They show some of his growing up, through flashbacks but I wish they would have done more of this. You don\'t have to see any previous Superman movies to see this one, you get the whole back story. There was a ton of good action scenes, almost too much I thought. Plot was pretty good, but also pretty predictable. I saw the 3-D version, and I am not a big fan of 3-D. While this movie did not give me a headache, like \'The Hobbit\', I didn\'t think the 3-D added that much, and I would recommend seeing the 2-D version! Overall I gave it a 9/10. Good action, fun, entertaining movie.','2013-09-10'),(0,'004',8.5,'I was apprehensive, to say the least, when I went to see Tangled, after the disappointment that was Princess and the Frog. First, Disney\'s back with CGI animation, which hasn\'t really worked that great except, maybe to some extent, Bolt. Second, the trailers made it look really slapstick -- I\'m rather wary of today\'s animation features that try too hard to be hip and fast-paced and silly.','2010-11-25'),(0,'004',7.0,'I will start by saying that I am a 62 year old grandfather of three (9, 8, and 5) who has no connection to Disney in any way. I took the grandkids today to see this movie and they loved it, as did I. The 3D is worth going to. There is enough silliness, adventure, and romance to allow boys and girls of almost all ages to love this show. There were some funny lines in the show that kids would not understand, but adults would enjoy. I heard a gentleman laughing throughout the whole show. I am not around teenagers, so I am not sure how a teenager would respond to this show. The storyline was different but predictable. That should not discourage anyone from going to this show. I would rate it as one of the best, if not the best animation show I have ever seen. This show is a winner as a family show.','2010-11-24'),(0,'004',9.0,'Honestly, when is the last time you saw a decent Disney Animated feature? No no, PIXAR does not count. I\'m talking about just a regular ol\' straight laced Disney flick. If your like me, I\'m sure your answer falls somewhere in the mid 90\'s. But isn\'t that a shame? What happened to the totally awesome Disney movies? If your excuse is because of technology, i assure you that your wrong. You can make a great animated movie without resorting to actual hand drawn art. But where is that old feeling we all use to share? Well i can tell you this much....i already knew that Disney had something special here, mainly because the VP of PIXAR jumped ship and decided to fund this project. The first time anyone from PIXAR has ever done so, let alone the freakin VP. So needless to say, Disney finally had enough, and pulled out all the stops for this one.','2010-11-24');
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

-- Dump completed on 2018-11-03 19:36:19
