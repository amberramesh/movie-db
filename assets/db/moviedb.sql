CREATE DATABASE  IF NOT EXISTS `moviedb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `moviedb`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: moviedb
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.33-MariaDB

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
INSERT INTO `cast` VALUES ('001','Henry Cavill ','Clark Kent / Kal-El'),('001','Amy Adams','Lois Lane'),('001','Michael Shannon','General Zod'),('001','Diane Lane','Martha Kent'),('001','Russell Crowe','Jor-El'),('001','Antje Traue','Faora-Ul'),('001','Harry Lennix','General Swanwick'),('002','Andrew Garfield','Sam'),('002','Wendy Vanden Heuvel',' Bird Woman'),('002','Deborah Geffner','Mom'),('002','Riley Keough','Sarah'),('002','Riki Lindhome','Actress'),('002','Jeannine Cota','Botox Reporter'),('002','Chris Gann','Jefferson Sevence'),('003','Bradley Cooper','Colin Bates'),('003','Clint Eastwood','Earl Stone'),('003','Taissa Farmiga','Ginny'),('003','Andy Garcia','Actor'),('003','Michael Peña','Enforcer'),('003','Laurence Fishburne','DEA Special Agent'),('003','Alison Eastwood','Iris'),('003','Dianne Wiest','Mary'),('004','Mandy Moore','Rapunzel (voice)'),('004','Zachary Levi','Flynn Rider (voice)'),('004','Donna Murphy','Mother Gothel (voice)'),('004','Ron Perlman','Stabbington Brother (voice)'),('004','M.C. Gainey','Captain of the Guard (voice)'),('004','Jeffrey Tambor','Big Nose Thug (voice)'),('004','Brad Garrett','Hook Hand Thug (voice)'),('004','Paul F. Tompkins','Short Thug (voice)'),('004','Richard Kiel','Vlad (voice)'),('006','Liam Neeson','Oskar Schindler'),('006','Ben Kingsley','Itzhak Stern'),('006','Ralph Fiennes','Amon Goeth'),('006','Caroline Goodall','Emilie Schindler'),('006','Jonathan Sagall','Poldek Pfefferberg'),('006','Embeth Davidtz','Helen Hirsch'),('006','Malgorzata Gebel','Wiktoria Klonowska '),('006','Shmuel Levy','	Wilek Chilowicz'),('006','Mark Ivanir','Marcel Goldberg'),('007','Marlon Brando','Don Vito Corleone'),('007','Al Pacino','Michael Corleone'),('007','James Caan','Sonny Corleone'),('007','Richard S. Castellano','Clemenza'),('007','Robert Duvall','Tom Hagen'),('007','Sterling Hayden','Capt. McCluskey'),('007','John Marley','Jack Woltz'),('007','Richard Conte','Barzini'),('007','Al Lettieri','Sollozzo'),('008','Christian Bale','Bruce Wayne'),('008','Heath Ledger','Joker'),('008','Aaron Eckhart','Harvey Dent'),('008','Michael Caine','Alfred'),('008','Maggie Gyllenhaal','Rachel'),('008','Gary Oldman','Gordon'),('008','Morgan Freeman','Lucius Fox'),('008','Monique Gabriela Curnen','Ramirez'),('008','Ron Dean','Wuertz'),('009','Amandla Stenberg','Starr Carter'),('009','Regina Hall','Lisa Carter'),('009','Russell Hornsby','Maverick \'Mav\' Carter'),('009','Anthony Mackie','King'),('009','Issa Rae','April Ofrah'),('009','Common','Carlos'),('009','Algee Smith','Khalil'),('009','Sabrina Carpenter','Hailey'),('010','Wendi McLendon-Covey','Kathy'),('010','Madison Iseman','Sarah'),('010','Jeremy Ray Taylor','Sonny'),('010','Caleel Harris','Sam'),('010','Ken Jeong','Mr. Chu'),('010','Chris Parnell','Walter'),('010','Bryce Cass','Tyler'),('010','Peyton Wich','Tommy Madigan'),('011','John C. Reilly','Eli Sisters'),('011','Joaquin Phoenix','Charlie Sisters'),('011','Jake Gyllenhaal','John Morris'),('011','Riz Ahmed','Hermann Kermit Warm'),('011','Rebecca Root','Mayfield'),('011','Allison Tolman','Girl Mayfield Saloon'),('011','Rutger Hauer','The Commodore'),('011','Carol Kane','	Mrs. Sisters'),('012','Robert Downey Jr.','Tony Stark / Iron Man'),('012','Chris Hemsworth','	Thor'),('012','Mark Ruffalo','Bruce Banner / Hulk'),('012','Chris Evans','Steve Rogers / Captain America'),('012','Scarlett Johansson','Natasha Romanoff / Black Widow'),('012','Don Cheadle','	James Rhodes / War Machine'),('012','Benedict Cumberbatch','	Doctor Strange'),('012','Tom Holland','Peter Parker / Spider-Man'),('012','Chadwick Boseman','T\'Challa / Black Panther'),('012','Zoe Saldana','Gamora'),('013','Amber Heard','Mera'),('013','	Jason Momoa','Arthur Curry / Aquaman'),('013','Nicole Kidman','Queen Atlanna'),('013','Patrick Wilson','Orm / Ocean Master'),('013','	Dolph Lundgren','King Nereus'),('013','Willem Dafoe','Nuidis Vulko'),('013','Djimon Hounsou','The Fisherman King'),('013','Leigh Whannell','	Pilot'),('013','Temuera Morrison','Thomas Curry');
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
  `avg_rating` decimal(2,1) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie`
--

LOCK TABLES `movie` WRITE;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` VALUES ('001','Man of Steel','Action, Adventure, Fantasy','PG-13','2h 23min','2013-07-10',7.5),('002','Under the Silver Lake ','Comedy , Crime , Drama ','R','2h 19min','2018-12-26',0.0),('003','The Mule','Crime, Drama, Mystery','R','2h (approx','2018-12-25',0.0),('004','Tangled','Animation , Adventure , Comedy','PG','1h 40min','2010-11-24',7.8),('005','The Shawshank Redemption','Drama','R','2h 22min','1994-10-14',9.3),('006','Schindler\'s List ','Biography , Drama , History','R','3h 15min ','1994-02-04',8.9),('007','The Godfather','Crime, Drama','R','2h 55min','1972-03-24',9.2),('008','The Dark Knight','Action , Crime , Drama ','PG-13','2h 32min ','2008-07-18',9.0),('009','The Hate U Give','Crime, Drama','PG-13','2h 13min','2018-10-12',6.8),('010','Goosebumps 2: Haunted Halloween','Adventure , Comedy','PG','1h 30min','2018-10-12',6.0),('011','The Sisters Brothers','Adventure , Comedy , Crime ','R','2h 1min','2018-10-19',7.2),('012','Avengers: Infinity War','Action , Adventure , Fantasy ','PG-12','2h 29min ','2018-04-03',8.6),('013','Aquaman','Action , Adventure , Fantasy ','PG-13','2h (approx','2018-12-23',0.0);
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
INSERT INTO `movie_meta` VALUES ('001',634015,'Zack Snyder','David S. Goyer, Jerry Siegel','$225,000,000','assets/images/manofsteel.jpg','A young boy learns that he has extraordinary powers and is not of this earth. As a young man, he journeys to discover where he came from and what he was sent here to do. But the hero in him must emerge if he is to save the world from annihilation and become the symbol of hope for all mankind.'),('002',0,'David Robert Mitchell','David Robert Mitchell','$8,500,000','assets/images/underthesilverlake.jpg','Sam, intelligent but without purpose, finds a mysterious woman swimming in his apartment\'s pool one night. The next morning, she disappears. Sam sets off across LA to find her, and along the way he uncovers a conspiracy far more bizarre.'),('003',0,'Clint Eastwood','Sam Dolnick, Nick Schenk','N/A','assets/images/themule.jpg','A 90-year-old horticulturist and WWII veteran is caught transporting $3 million worth of cocaine through Michigan for a Mexican drug cartel.'),('004',355421,'Nathan Greno, Byron Howard','Dan Fogelman, Jacob Grimm ','$260,000,000','assets/images/tangled.jpg','The magically long-haired Rapunzel has spent her entire life in a tower, but now that a runaway thief has stumbled upon her, she is about to discover the world for the first time, and who she really is.'),('005',2010976,'Frank Darabont','Stephen King, Frank Darabont','$25,000,000','assets/images/shawshank.jpg','Framed in the 1940s for the double murder of his wife and her lover, upstanding banker Andy Dufresne begins a new life at the Shawshank prison, where he puts his accounting skills to work for an amoral warden. During his long stretch in prison, Dufresne comes to be admired by the other inmates -- including an older prisoner named Red -- for his integrity and unquenchable sense of hope.'),('006',1037924,'Steven Spielberg','Thomas Keneally, Steven Zaillian','$22,000,000','assets/images/schindler.jpg','In German-occupied Poland during World War II, Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazi Germans'),('007',1377841,'Francis Ford Coppola','Francis Ford Coppola, Mario Puzo','$6,000,000','assets/images/godfather.jpg','Spanning the years 1945 to 1955, a chronicle of the fictional Italian-American Corleone crime family. When organized crime family patriarch, Vito Corleone barely survives an attempt on his life, his youngest son, Michael steps in to take care of the would-be killers, launching a campaign of bloody revenge.'),('008',1906729,'Christopher Nolan','Jonathan Nolan, Christopher Nolan','$185,000,000','assets/images/darkknight.jpg','Batman raises the stakes in his war on crime. With the help of Lt. Jim Gordon and District Attorney Harvey Dent, Batman sets out to dismantle the remaining criminal organizations that plague the streets. The partnership proves to be effective, but they soon find themselves prey to a reign of chaos unleashed by a rising criminal mastermind known to the terrified citizens of Gotham as the Joker.'),('009',4337,'George Tillman Jr.','Audrey Wells, Angie Thomaw','$512,035','assets/images/hateugive.jpg','Starr witnesses the fatal shooting of her childhood best friend Khalil at the hands of a police officer. Now, facing pressure from all sides of the community, Starr must find her voice and stand up for what\'s right.'),('010',2623,'Ari Sandel','Rob Lieber','$35,000,000','assets/images/goosebumps2.jpg','Two boys face an onslaught from witches, monsters, ghouls and a talking dummy after they discover a mysterious book by author R.?L. Stine.'),('011',4045,'Jacques Audiard','Jacques Audiard,  Thomas Bidegain ','$950,000','assets/images/sisbro.jpg','The colourfully named gold prospector Hermann Kermit Warm is being pursued across 1,000 miles of 1850s Oregon desert to San Francisco by the notorious assassins Eli and Charlie Sisters. Except Eli is having a personal crisis and beginning to doubt the longevity of his chosen career. And Hermann might have a better offer.'),('012',514345,'Anthony Russo, Joe Russo','Christopher Markus, Stephen McFeely','$321,000,000','assets/images/avengers2018.jpg','As the Avengers and their allies have continued to protect the world from threats too large for any one hero to handle, a new danger has emerged from the cosmic shadows: Thanos. A despot of intergalactic infamy, his goal is to collect all six Infinity Stones, artifacts of unimaginable power, and use them to inflict his twisted will on all of reality. Everything the Avengers have fought for has led up to this moment - the fate of Earth and existence itself has never been more uncertain.'),('013',0,'James Wan','David Leslie Johnson-McGoldrick, Will Beall ','$160,000,000','assets/images/aquaman.jpg','The film reveals the origin story of half-human, half-Atlantean Arthur Curry and takes him on the journey of his lifetime - one that will not only force him to face who he really is, but to discover if he is worthy of who he was born to be...a king.');
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
INSERT INTO `user` VALUES (00001,'amberramesh@gmail.com','Amber','Ramesh','male','ikem3151','india'),(00002,'daniii@gmail.com','Danice','Parker','female','toohot4u','india'),(00003,'a','a','a',NULL,'a',NULL);
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
  `rating` decimal(3,1) NOT NULL,
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
INSERT INTO `user_feedback` VALUES (0,'001',8.5,'Jack Snyder\'s fresh take on Superman/Man of Steel is... fresh indeed. A superhero movie that maxes visual wizardry but beautifully balanced by emotional tones without feeling heavy. Gone is the sleek metal and crystal polish we have known replaced by a techno- organic theme (reminds me of Prometheus) that is both regal and advanced. This is perhaps the only Superman film with the best narrative of the Kryptonian\'s heritage and history. Good casting and an impressive performance by Russell Crowe. I give it an 8.5/10 (just behind Dark Knight Rises IMHO). The Dad in me deems this movie watchable by kids (more age-appropriate, less violent than Iron Man 3)','2013-11-11'),(0,'001',7.5,'I really enjoyed this movie. I am a big fan of action and superhero movies, and this did not disappoint. First of all I thought they did a great job on casting Superman. Henry Cavill fits the role perfectly. I liked the supporting cast, except thought they could have done better with Lois Lane. The plot starts out with Superman (Kal-El) being born, and quickly jumps into him being in his 20\'s and saving people. They show some of his growing up, through flashbacks but I wish they would have done more of this. You don\'t have to see any previous Superman movies to see this one, you get the whole back story. There was a ton of good action scenes, almost too much I thought. Plot was pretty good, but also pretty predictable. I saw the 3-D version, and I am not a big fan of 3-D. While this movie did not give me a headache, like \'The Hobbit\', I didn\'t think the 3-D added that much, and I would recommend seeing the 2-D version! Overall I gave it a 9/10. Good action, fun, entertaining movie.','2013-09-10'),(0,'004',8.0,'I was apprehensive, to say the least, when I went to see Tangled, after the disappointment that was Princess and the Frog. First, Disney\'s back with CGI animation, which hasn\'t really worked that great except, maybe to some extent, Bolt. Second, the trailers made it look really slapstick -- I\'m rather wary of today\'s animation features that try too hard to be hip and fast-paced and silly.','2010-11-25'),(0,'004',7.5,'I will start by saying that I am a 62 year old grandfather of three (9, 8, and 5) who has no connection to Disney in any way. I took the grandkids today to see this movie and they loved it, as did I. The 3D is worth going to. There is enough silliness, adventure, and romance to allow boys and girls of almost all ages to love this show. There were some funny lines in the show that kids would not understand, but adults would enjoy. I heard a gentleman laughing throughout the whole show. I am not around teenagers, so I am not sure how a teenager would respond to this show. The storyline was different but predictable. That should not discourage anyone from going to this show. I would rate it as one of the best, if not the best animation show I have ever seen. This show is a winner as a family show.','2010-11-24'),(0,'004',7.5,'Honestly, when is the last time you saw a decent Disney Animated feature? No no, PIXAR does not count. I\'m talking about just a regular ol\' straight laced Disney flick. If your like me, I\'m sure your answer falls somewhere in the mid 90\'s. But isn\'t that a shame? What happened to the totally awesome Disney movies? If your excuse is because of technology, i assure you that your wrong. You can make a great animated movie without resorting to actual hand drawn art. But where is that old feeling we all use to share? Well i can tell you this much....i already knew that Disney had something special here, mainly because the VP of PIXAR jumped ship and decided to fund this project. The first time anyone from PIXAR has ever done so, let alone the freakin VP. So needless to say, Disney finally had enough, and pulled out all the stops for this one.','2010-11-24'),(0,'005',10.0,'This movie is not your ordinary Hollywood flick. It has a great and deep message. This movie has a foundation and just kept on being built on from their and that foundation is hope.','2008-10-10'),(0,'005',9.0,'Can Hollywood, usually creating things for entertainment purposes only, create art? To create something of this nature, a director must approach it in a most meticulous manner, due to the delicacy of the process. Such a daunting task requires an extremely capable artist with an undeniable managerial capacity and an acutely developed awareness of each element of art in their films, the most prominent; music, visuals, script, and acting. These elements, each equally important, must succeed independently, yet still form a harmonious union, because this mixture determines the fate of the artist\'s opus. Though already well known amongst his colleagues for his notable skills at writing and directing, Frank Darabont emerges with his feature film directorial debut, The Shawshank Redemption. Proving himself already a master of the craft, Darabont managed to create one of the most recognizable independent releases in the history of Hollywood. The Shawshank Redemption defines a genre, defies the odds, compels the emotions, and brings an era of artistically influential films back to Hollywood.','2008-11-05'),(0,'005',10.0,'I\'m trying to save you money; this is the last film title that you should consider borrowing. Renting Shawshank will cost you five bucks... just plunk down the $25 and own the title. You\'ll wind up going back to this gem time and time again. This is one of few movies that are truly timeless. And it\'s entertaining and moving, no matter how many times you view it','2008-11-11'),(0,'006',1.0,'I\'ve watched this film about half a dozen times over the last five years and I still don\'t really understand what Spielberg was trying to do. Was he trying to outline the horrors of the holocaust or was he trying to examine Schindler himself - why the man did what he did? Maybe both. In neither case does he succeed. One can\'t help but feel the atrocities were greatly toned down for this film thus not really reflecting the true horror of what really happened, and he fails completely in exploring the character of Schindler. Why did Schindler do what he did? The man was a philanderer and a shrewd business man who didn\'t exactly go out of his way to be nice. Did witnessing what he did make him wake up to himself or perhaps there was an ulterior motive? Spielberg looks at none of this and serves up a modern day saint. It is kind of ironic that Spielberg shot this movie in black and white because that is the approach he has taken to his subject material. He gives us the saintly Schindler, the stereotypical evil Nazi, the honourable Jew and none of the complexities that made these people what they are. This was Spielberg\'s attempt to become accepted as a serious film-maker but yet he takes exactly the same approach to making this as he did with his marvellous popcorn movies resulting in a rather dictatorial film that has more answers than questions!','2004-03-09'),(0,'006',8.5,'Schindler\'s List is undoubtedly the best Holocaust film ever made. There just isn\'t anything like this film. Various other films have tried to show the true horrors of the Holocaust, but none of them succeeded the way that Schindler\'s List did. Schindler\'s List is a difficult film to watch. When you see the true atrocities of the Holocaust, your jaw drops. When you see the pain that all of the innocent people were going through, the only thing you can do is cry. The true goal of all Holocaust films is to make you feel sorrowful, and Schindler\'s List did that to me. If you want to see the best depiction of the Holocaust, make your way towards Schindler\'s List.','2005-07-27'),(0,'006',9.5,'It had the sort of power you\'d expect from Spielberg, the soundtrack is amazing, of course, and it actually contained many clever things as well. ','2004-04-16'),(0,'007',10.0,'The godfather trilogy is an exclusive set of movies that will continue to live with humanity, every generation will see them to say, \"Oh that was 10 out of 10.\" If you watch them you will know that the world that lives inside the underworld is same as the one we live in except that people in underworld are so smart, in fact smartness is the only thing that can keep them there. Don Vito Caroleone\'s early life shown in part-II is very well done to show the Don in making, how a kid who couldn\'t even tell his name went on becoming a underworld don who keep most senators, judges and lawyers in his pocket. Meeting of don with the so call five families are among most impressive scenes.','2005-08-04'),(0,'007',10.0,'I love this movie and all of the GF movies. I see something new every time I have seen it (countless, truly). The story of tragedy and (little) comedy that exists in this film is easily understood by people all over the world. This film has been called an American story however I have met others who have seen this movie in other languages and they seem to have the same love and appreciation for it that I do. I love the characters and all of the different personalities that they represent not just in families but in society itself. It seems like the entire cast is part of every other movie that I love as well. The sounds, music, color and light in the film are just as much a part of the film as the people. This could be attributed to the method in which it was filmed. At many parts of the film I can still find myself feeling the emotions conveyed in the film. I never tire of appreciating this film. I thank God that FFC is an American treasure. We are fortunate to have him.','2005-06-02'),(0,'008',9.5,'We\'ve been subjected to enormous amounts of hype and marketing for the Dark Knight. We\'ve seen Joker scavenger hunts and one of the largest viral campaigns in advertising history and it culminates with the actual release of the movie.','2008-07-28'),(0,'008',9.0,'Im just gonna start off by saying I LOVE this movie.Its one of my favorites of all time. I honestly cant think of too much wrong with this movie other than its a little long and Batmans by now infamous voice. But everything else is top notch. The acting,story,atmosphere,and actions scenes are all amazing. If you haven\'t seen this movie see it right now! I went into this not expecting to much but I came out blown away, I cant imagine any movie being much better. I\'ll just have to wait for The Dark Knight Rises to release to see if anything can be better. Until then, this stands as the best movie I\'ve ever seen','2008-07-26'),(0,'008',10.0,'Dark, yes, complex, ambitious. Christopher Nolan and his co-writer Jonathan Nolan deserve a standing ovation. I don\'t usually go for loud movies filled with mindless gore and violence. \"The Dark Knight\" is certainly loud and violent but it\'s not mindless. It has depth and soul. Even the Joker, in an extraordinary creation by Heath Ledger, is deeply human. The natural petulance of Christian Bale makes his ego and alter ego the most fascinating and complex of all film superheroes. Part of the genius of this movie is that Batman himself, in screen time, is not really the lead. My attention was captivated by Heath Ledger and he determines and inspires the breathtaking atmosphere that envelopes Gotham as well as us. The aplomb of Christopher Nolan as a director is mind blowing and his secret, I believe, is his obvious respect for his audience. What he\'s done is to elevate a popular genre into Shakesperean proportions. Bravo!','2008-08-26'),(0,'009',1.0,'Horrible movie. Exploiting the issue in our country....not entertainment. Not reality.','2018-10-30'),(0,'009',3.0,'This was less of a movie more of a political rant, at the heart of it lay a black community riddled by a societal lack of opportunity, violent gangs, drug culture and endemic gun use.','2018-12-30'),(0,'009',9.0,'I Just saw a secret screening of this movie , I didn\'t know it was going to be this film , so I had no expectations and went in with a clear mind. All I can say is wow, you will be taken on a ride on all different emotions and come out the cinema feeling touched. This movie is not a huge blockbuster and not alot people will know how about it but people should know about it and it\'s a movie everyone should see!','2018-12-25'),(0,'010',8.0,'A solid film, well placed jokes, good scares for the kids, an ok story, CGI was on par for today\'s standards, would recommend this movie to friends and family','2018-10-29'),(0,'010',6.0,'The original Goosebumps movie took me by surprise when it came out in 2015. It had fun likable characters and a great villain in Slappy the evil dummy. ','2018-11-29'),(0,'012',9.0,'I was amazed to see so many negative reviews; so many people are impossible to please. This movie was 2 1/2 hours long, but I could have sat there another 2 1/2 hours and not noticed. Thoroughly entertaining, and I love how the directors weren\'t afraid to take chances. I\'ve read a lot of other user reviews that claim that there\'s no plot. Unless you\'re mentally handicapped or not paying attention because you\'re on your phone the entire movie, the plot is pretty clear, and decent in my opinion.','2018-04-03'),(0,'012',8.5,'This movie has made me feel things that I haven\'t about a movie in a very long time. If you are anything like me you will definitely feel a sense of \"everything is gonna be alright\" because of the generous sprinkling of light humour that makes the situation feel less serious than it actually is. The emotional roller coaster that begins right at the beginning of the movie to the very end has you feeling more and more frustrated and on edge as it goes on. Don\'t get me wrong this movie is absolutely stunning and amazing and a cliffhanger at the end has you wanting more and more. I\'m definitely very excited to see how this storyline will carry out in the next Avengers movie.','2018-04-03'),(0,'012',7.0,'Film was entertaining, ive watched all marvel movies multiple times. This film is great fun but is far to rushed, of cause with so many characters involved was always going to be a tough one to do, part 2 may improve it.','2018-04-04'),(0,'012',1.0,'This movie was litterly the same as the avengers and civil war. Nothing new here except that the hype is getting stronger??? By rules of nature hype must die down over time but marvel fanboys want more bad movies? Disney\'s board of director\'s and their shareholders are laughing their ass off. They acquire the rights of a universe with some superheroes en then they release 5 superhero movies a year that are complete and utter trash but its fanbase will love it no matter wat. now a cgi war movie (were we all now how of how it will end, it doesn\'t becouse Disney will keep spitting out these movies until marvel fanboys stop going to these trash movies.) Is considerd better than movies like Silence of the Lambs, Se7en, forrest gump and Leon??? Well if this is the case than i will leave this site and never come back becouse i use this site to see if a movie is worth seeing. But if a crap movie like this is considerd to be as good as THE GODFATHER!!! then i can no longer trust this site and will de-recommend it to everyone that wants to use it for the same purpose as i did.','2018-04-05'),(0,'011',6.0,'I was looking foward to the crossover movie of Joaquin Phoenix and Jake Gyllenhaal where they prove to not just be the same person this whole time, and i would be lying if I said it didn\'t deliver in that regard. But this movie... was just okay. The performances all around were stellar, with Gyllenhaal and Joaquin completely getting lost in their roles. John C. Riley was good... half of the time, the other half was just Steve Brule in a cowboy hat. Throughout the movie i just kept thinking to myself, \"so when are we gonna start wrapping up?\" That\'s not a good sign. Don\'t get me wrong - where this movie goes and each scene in of itself is pretty good, the film just lacks real momentum. The film doesn\'t really go anywhere, which would be fine if there was a central theme for the spiraling story. But The ending was kinda poop, so that doesn\'t help. I enjoyed watching it and the directions it took, but it never felt complete to me. Everything about this movie (except the exceptional performances) were just fine. Go see if you want an enjoyable and unpredictable western with good performances, but if you\'re hoping for this movie to prove itself as a treasure of cinema, you\'ll be sadly mistaken. 6/10','2018-09-30');
/*!40000 ALTER TABLE `user_feedback` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-04 10:51:11
