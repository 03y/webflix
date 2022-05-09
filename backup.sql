-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: webflix
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `mov_rev`
--

DROP TABLE IF EXISTS `mov_rev`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mov_rev` (
  `post_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(4) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `movie_title` varchar(60) NOT NULL,
  `rate` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mov_rev`
--

LOCK TABLES `mov_rev` WRITE;
/*!40000 ALTER TABLE `mov_rev` DISABLE KEYS */;
/*!40000 ALTER TABLE `mov_rev` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(30) NOT NULL,
  `further_info` varchar(500) NOT NULL,
  `img` varchar(30) NOT NULL,
  `preview` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie`
--

LOCK TABLES `movie` WRITE;
/*!40000 ALTER TABLE `movie` DISABLE KEYS */;
INSERT INTO `movie` VALUES (10,'2001: A Space Odessey','Ai goes bad','2001','https://www.youtube.com/watch?v=oR_e9y-bka0'),(11,'Full Metal Jacket','nam','fullmetaljacket','https://www.youtube.com/watch?v=n2i917l5RFc'),(12,'Interstella 5555','Daft punk film','interstella5555','https://www.youtube.com/watch?v=3Qxe-QOp_-s'),(13,'Reservoir Dogs','a tarantino film','reservoirdogs','https://www.youtube.com/watch?v=xerx80SWgkA'),(14,'The Big Short','american economy','thebigshort','https://www.youtube.com/watch?v=xbiDrzTd8fE'),(15,'The Social Network','zuckerburg','thesocialnetwork','https://www.youtube.com/watch?v=lB95KLmpLR4'),(16,'This is England','edl','thisisengland','https://www.youtube.com/watch?v=ZjlT8-6U9Xs'),(17,'Trainspotting','herione issues in edinburgh','trainspotting','https://www.youtube.com/watch?v=SaP7qmsQbSI'),(18,'Wall E','last plant on earth is found','walle','https://www.youtube.com/watch?v=CZ1CATNbXg0');
/*!40000 ALTER TABLE `movie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `exp_month` varchar(2) NOT NULL,
  `exp_year` int(4) NOT NULL,
  `cvv` int(3) NOT NULL,
  `reg_date` datetime NOT NULL,
  `premium` tinyint(4) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'john','doed','johndoe@example.com','25f43b1486ad95a1398e3eeb3d83bc4010015fcc9bedb35b432e00298d5021f7','123','1',2021,123,'2021-10-14 09:48:27',1,'07777777777','Scotland','Active'),(3,'hello','world','hello@worldnet','25f43b1486ad95a1398e3eeb3d83bc4010015fcc9bedb35b432e00298d5021f7','123','12',123,123,'2021-10-14 10:19:07',0,'07777777777','Scotland','Active'),(4,'testing1','testing2','testing3','ba066a29bd5dc07c63a9ac630a72462ec67c492a3805eed727e0e443e214caab','321','32',321,321,'2021-10-14 10:43:26',0,'07777777777','Scotland','Active'),(5,'we','are','testing','fcec91509759ad995c2cd14bcb26b2720993faf61c29d379b270d442d92290eb','321','32',321,321,'2021-10-14 10:44:17',0,'07777777777','Scotland','Banned'),(9,'test1','test2','test3','a4e624d686e03ed2767c0abd85c14426b0b1157d2ce81d27bb4fe4f6f01d688a','123','12',123,123,'2021-10-28 07:43:58',1,'07777777777','Scotland','Banned'),(12,'hi1','hi2','hi3','31322e5ba6572b517fcb2bebb349eb951e11f7a883756a114bdfd82ab01aa5c9','123','12',123,123,'2021-10-28 07:47:39',0,'07777777777','Scotland','Active'),(15,'1','2','3','4b227777d4dd1fc61c6f884f48641d02b4d121d3fd328cb08b5531fcacdabf8a','5','6',7,8,'2021-10-28 07:49:58',0,'07777777777','Scotland','Banned'),(16,'9','8','7','e7f6c011776e8db7cd330b54174fd76f7d0216b612387a5ffcfb81e6f0919683','5','4',3,2,'2021-10-28 07:50:17',0,'07777777777','Scotland','Active'),(17,'123','123','123','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','123','12',123,23,'2021-10-28 07:52:40',1,'07777777777','Scotland','Banned'),(19,'abc','abc','abc','ba7816bf8f01cfea414140de5dae2223b00361a396177a9cb410ff61f20015ad','123','12',123,123,'2021-10-28 07:53:10',0,'07777777777','Scotland','Active'),(20,'zxc','zxc','zxc','657f18518eaa2f41307895e18c3ba0d12d97b8a23c6de3966f52c6ba39a07ee4','123','12',123,123,'2021-10-28 07:53:33',0,'07777777777','Scotland','Active'),(21,'hjkl','hjkl','hjkl','f91c3b6b3ec826aca3dfaf46d47a32cc627d2ba92e2d63d945fbd98b87b2b002','123','12',123,123,'2021-10-28 07:54:03',0,'07777777777','Scotland','Active'),(23,'wasd','wasd','wasd','2ec21195be2d5d944c92d52dc3255306e702347d6a3da6e6a2f410c6aff8dc1a','123','12',123,123,'2021-10-28 07:55:46',0,'07777777777','Scotland','Active'),(24,'qwe','qwe','qwe','489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3942ccb9555cf35','123','12',123,123,'2021-10-28 07:57:09',0,'07777777777','Scotland','Active'),(26,'gg','gg','gg','cbd3cfb9b9f51bbbfbf08759e243f5b3519cbf6ecc219ee95fe7c667e32c0a8d','123','12',123,123,'2021-10-28 08:00:03',0,'07777777777','Scotland','Active'),(27,'ert','ert','ert','abdcb58157a7f3b40a914257be7d618d2fc09630559711b6c71a39d500b8ced2','123','12',123,123,'2021-10-28 08:03:50',0,'07777777777','Scotland','Active'),(29,'s','s','s','043a718774c572bd8a25adbeb1bfcd5c0256ae11cecf9f9c3f925d0e52beaf89','123','12',123,123,'2021-10-28 08:10:53',0,'07777777777','Scotland','Active'),(30,'v','v','v','4c94485e0c21ae6c41ce1dfe7b6bfaceea5ab68e40a2476f50208e526f506080','123','12',123,123,'2021-10-28 08:11:06',0,'07777777777','Scotland','Active'),(31,'joe','nuts','HEY@A.COM','408f31d86c6bf4a8aff4ea682ad002278f8cb39dc5f37b53d343e63a61f3cc4f','123','12',123,123,'2021-10-28 09:34:25',0,'07777777777','Scotland','Active'),(34,'321','321','321@321.321','8d23cf6c86e834a7aa6eded54c26ce2bb2e74903538c61bdd5d2197997ab2f72','321','32',321,321,'2021-11-04 11:31:57',0,'07777777777','Scotland','Active'),(35,'1','1','1@1.com','6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b','1','1',1,1,'2021-11-10 16:48:58',0,'07777777777','Scotland','Active'),(36,'jeff','bezos','jeff@bezos.org','cbc62794911ff31b2864ecd3dbbbee7ebcb7ea41c5a42e2cba377f3cfdb42811','7777777777777777','12',21,123,'2021-11-11 11:04:20',0,'07777777777','Scotland','Active'),(37,'Sharon','Martin','sm@sm.com','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','1111222233334444','11',23,123,'2021-12-02 13:36:39',0,'07777777777','Scotland','Active'),(38,'1','1','1@1.1','6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b','1','1',1,1,'2021-12-08 13:32:15',0,'07777777777','Scotland','Active'),(39,'C','M','C@m.com','56ff1de3143f71a5640fe4d8df7b49be6c8309151cb7dc309649bb68f3d09cc9','123123123123','12',22,123,'2021-12-14 19:28:34',0,'07777777777','Scotland','Active'),(40,'S','m','s@m.org.uk','936a185caaa266bb9cbe981e9e05cb78cd732b0b3280eb944412bb6f8f8f07af','0','0',0,0,'2021-12-15 18:22:47',0,'07777777777','Scotland','Active'),(41,'Hello','world','hello@world.com','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','123','12',12,123,'2021-12-16 08:51:22',0,'07777777777','Scotland','Active'),(42,'test1','test1','test1@email.com','1b4f0e9851971998e732078544c96b36c3d01cedf7caa332359d6f1d83567014','1111','11',11,111,'2022-01-13 08:04:55',0,'07777777777','Scotland','Active'),(44,'hello','world','hello@world.org','936a185caaa266bb9cbe981e9e05cb78cd732b0b3280eb944412bb6f8f8f07af','1111222233334444','12',1912,123,'2022-04-28 17:13:11',1,'07777777777','Scotland','banned'),(45,'admin','user','admin@webflix.net','25f43b1486ad95a1398e3eeb3d83bc4010015fcc9bedb35b432e00298d5021f7','1111222233334444','12',1234,123,'2022-05-01 17:12:37',1,'07777777777','Scotland','Active');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-04 19:14:52
