CREATE DATABASE  IF NOT EXISTS `books` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `books`;
-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: books
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `birth_year` int(4) unsigned NOT NULL,
  `death_year` int(4) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Miguel','de Cervantes Saavedra','Spanish',1547,1616),(2,'Charles','Dickens','British',1812,1870),(3,'J.R.R.','Tolkien','British',1892,1973),(4,'Antoine','de Saint-Exupery','French',1900,1944),(5,'J.K.','Rowling','British',1965,NULL),(6,'Agatha','Christie','British',1890,1976),(7,'Cao','Xueqin','Chinese',1715,1763),(8,'Henry',' Rider Haggard','British',1856,1925),(9,'C.S.','Lewis','British',1898,1963),(10,'ARTFUL','DODGER','English',1991,NULL),(11,'555','555','555',555,NULL);
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_authors`
--

DROP TABLE IF EXISTS `book_authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_authors` (
  `book_id` int(10) NOT NULL,
  `author_id` int(10) NOT NULL,
  PRIMARY KEY (`book_id`,`author_id`),
  KEY `author_id_idx` (`author_id`),
  CONSTRAINT `author_id` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `book_id` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_authors`
--

LOCK TABLES `book_authors` WRITE;
/*!40000 ALTER TABLE `book_authors` DISABLE KEYS */;
INSERT INTO `book_authors` VALUES (1,1),(2,2),(4,4),(6,6),(7,7),(8,8);
/*!40000 ALTER TABLE `book_authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_images`
--

DROP TABLE IF EXISTS `book_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_images` (
  `book_id` int(10) NOT NULL,
  `image_id` int(10) NOT NULL,
  PRIMARY KEY (`book_id`,`image_id`),
  KEY `image_id_idx` (`image_id`),
  CONSTRAINT `the book` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `the image` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_images`
--

LOCK TABLES `book_images` WRITE;
/*!40000 ALTER TABLE `book_images` DISABLE KEYS */;
INSERT INTO `book_images` VALUES (4,0),(6,0),(7,0),(2,2),(1,5),(8,8);
/*!40000 ALTER TABLE `book_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_plots`
--

DROP TABLE IF EXISTS `book_plots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_plots` (
  `book_id` int(10) NOT NULL,
  `plot_id` int(10) NOT NULL,
  PRIMARY KEY (`book_id`,`plot_id`),
  KEY `the plot_idx` (`plot_id`),
  CONSTRAINT `the book for the plot` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `the plot` FOREIGN KEY (`plot_id`) REFERENCES `plots` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_plots`
--

LOCK TABLES `book_plots` WRITE;
/*!40000 ALTER TABLE `book_plots` DISABLE KEYS */;
INSERT INTO `book_plots` VALUES (1,1),(2,2),(4,4),(6,6),(7,7),(8,8);
/*!40000 ALTER TABLE `book_plots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `original_title` varchar(255) DEFAULT NULL,
  `year_of_publication` int(4) unsigned NOT NULL,
  `genre` varchar(45) NOT NULL,
  `language` varchar(45) NOT NULL,
  `millions_sold` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Don Quixote','El Ingenioso Hidalgo Don Quixote de la Mancha',1605,'Novel','Spanish',502),(2,'A Tale of Two Citiess','A Tale of Two Cities',1859,'Historical Fiction','English',200),(4,'The Litle Prince','Le Petit Prince',1943,'Fable','French',142),(6,'And Then There Were None','Ten Little Niggers',1939,'Mystery','English',100),(7,'The Dream of the Red Chambers','The Story of the Stone',1792,'Novel','Chinese',100),(8,'The Hobbit ','There and Back Again',1937,'High Fantasy','English',100);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `books_complete_view`
--

DROP TABLE IF EXISTS `books_complete_view`;
/*!50001 DROP VIEW IF EXISTS `books_complete_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `books_complete_view` AS SELECT
                                                1 AS `id`,
                                                1 AS `title`,
                                                1 AS `original_title`,
                                                1 AS `year_of_publication`,
                                                1 AS `genre`,
                                                1 AS `language`,
                                                1 AS `millions_sold`,
                                                1 AS `image_path`,
                                                1 AS `author`,
                                                1 AS `plot`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (0,'public/covers/default.png'),(1,'public/covers/a_tale_of_two_cities.jpg'),(2,'public/covers/and_then_there_were_none.jpg'),(3,'public/covers/spr.png'),(4,'public/covers/red_chamber.jpg'),(5,'public/covers/don_quixote.jpg'),(6,'public/covers/she.jpg'),(7,'public/covers/the_hobbit.jpg'),(8,'public/covers/the_little_prince.jpg'),(47,'public/covers/spa-cream-pot-of-natural-flowers.png'),(48,'public/covers/xanadu.jpg'),(49,'public/covers/stephen-johnson-550590-unsplash.jpg'),(50,'public/covers/logout.png'),(51,'public/covers/mp.png');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plots`
--

DROP TABLE IF EXISTS `plots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plots` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `plot` longtext NOT NULL,
  `source` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plots`
--

LOCK TABLES `plots` WRITE;
/*!40000 ALTER TABLE `plots` DISABLE KEYS */;
INSERT INTO `plots` VALUES (1,'The story follows the adventures of a hidalgo named Mr. Alonso Quixano who reads so many chivalric romances \r\nthat he loses his sanity and decides to set out to revive chivalry, undo wrongs, and bring justice to the world, under the name \r\nDon Quixote de la Mancha. He recruits a simple farmer, Sancho Panza, as his squire, who often employs a unique, earthy wit in dealing with Don Quixote\'s rhetorical orations on antiquated knighthood.','https://en.wikipedia.org/wiki/Don_Quixote '),(2,'In A Tale of Two Cities, Charles Darnay tries to escape his heritage as a French aristocrat in the years leading up to the French Revolution. \r\nOn the eve of the Revolution, he\'s captured, but Sydney Carton, a man who looks like Darnay, takes his place and dies on the guillotine.','https://www.enotes.com/topics/tale-of-two-cities'),(3,'The title of the novel refers to the story\'s main antagonist, the Dark Lord Sauron, who had in an earlier age created the \r\nOne Ring to rule the other Rings of Power as the ultimate weapon in his campaign to conquer and rule all of Middle-earth. ','https://en.wikipedia.org/wiki/The_Lord_of_the_Rings'),(4,'If Saint-Exupery is to be believed The Little Prince is a book for children written for grown-ups. It can be read on many different levels to provide pleasure and food for thought for readers of all ages.\r\nThe author, an aviator, crashes with his aeroplane in the middle of the Sahara desert. ','http://www.thelittleprince.com/work/the-story/'),(5,'Harry Potter is not a normal boy. Raised by his cruel Aunt and Uncle, and tormented by his bully of a cousin, Dudley, he has resigned to a life of neglect. \r\nOn his eleventh birthday, however, a half-giant called Hagrid comes crashing-–quite literally-–into his life, and announces that Harry is a wizard. \r\nTogether they journey to London to get school supplies for Harry’s first year at Hogwarts School of Witchcraft and Wizardry. ','http://www.hypable.com/harry-potter/sorcerers-stone-book-plot/'),(6,'And Then There Were None is a detective fiction novel by Agatha Christie, first published in the United Kingdom by the Collins Crime Club on 6 November 1939 under the title Ten Little Niggers and in the United States by Dodd, Mead and Company in January 1940 under the title And Then There Were None. In the novel, ten people, who have previously been complicit in the deaths of others but have escaped notice and/or punishment, are tricked into coming onto an island. Even though the guests are the only people on the island, they are all mysteriously murdered one by one, in a manner paralleling, inexorably and sometimes grotesquely, the old nursery rhyme, \"Ten Little Indians\". The UK edition retailed at seven shillings and sixpence (7/6) and the US edition at $2.00. The novel has also been published and filmed under the title Ten Little Indians.','http://agathachristie.wikia.com/wiki/And_Then_There_Were_None'),(7,'The novel provides a detailed, episodic record of the two branches of the Jia Clan, the Ning-guo and Rong-guo Houses, who reside in two large adjacent family compounds in the capital. \r\nTheir ancestors were made Dukes, and as the novel begins the two houses remain among the most illustrious families in the capital. \r\nThe story\'s preface has supernatural Taoist and Buddhist overtones. ','http://www.foreignercn.com/index.php?option=com_content&id=698:dream-of-the-red-chamber-&catid=34:chinese-literature&Itemid=117'),(8,'The Hobbit is the story of Bilbo Baggins, a hobbit who lives in Hobbiton. He enjoys a peaceful and pastoral life but his life is interrupted by a surprise visit by the wizard Gandalf. \r\nBefore Bilbo is really able to improve upon the situation, Gandalf has invited himself to tea and when he arrives, he comes with a company of dwarves led by Thorin. \r\nThey are embarking on a journey to recover lost treasure that is guarded by the dragon Smaug, at the Lonely Mountain. ','http://www.gradesaver.com/the-hobbit/study-guide/summary'),(9,'555','555');
/*!40000 ALTER TABLE `plots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `pass` varchar(60) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user','pass'),(62,'bottle','$2y$10$cVGZfBl6MjhSheafsSSvIeG14JYx60e4Ml0TQQsT1GU4UDTbuAGIG'),(68,'cancan','$2y$10$TwxYyf91nExopkb2EpWbSep.tM3jhaYx5AC8rrfR4bjaix.cyey7W');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'books'
--

--
-- Dumping routines for database 'books'
--

--
-- Final view structure for view `books_complete_view`
--

/*!50001 DROP VIEW IF EXISTS `books_complete_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
  /*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
  /*!50001 VIEW `books_complete_view` AS (select `books`.`id` AS `id`,`books`.`title` AS `title`,`books`.`original_title` AS `original_title`,`books`.`year_of_publication` AS `year_of_publication`,`books`.`genre` AS `genre`,`books`.`language` AS `language`,`books`.`millions_sold` AS `millions_sold`,`images`.`path` AS `image_path`,concat(`authors`.`name`,' ',`authors`.`surname`) AS `author`,`plots`.`plot` AS `plot` from ((((((`book_images` left join `books` on((`books`.`id` = `book_images`.`book_id`))) left join `book_authors` on((`book_authors`.`book_id` = `books`.`id`))) left join `book_plots` on((`book_plots`.`book_id` = `books`.`id`))) left join `authors` on((`book_authors`.`author_id` = `authors`.`id`))) left join `images` on((`book_images`.`image_id` = `images`.`id`))) left join `plots` on((`book_plots`.`plot_id` = `plots`.`id`)))) */;
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

-- Dump completed on 2018-05-04 21:27:14
