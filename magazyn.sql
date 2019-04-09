-- MySQL dump 10.16  Distrib 10.1.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: magazyn
-- ------------------------------------------------------
-- Server version	10.1.34-MariaDB-0ubuntu0.18.04.1

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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `amount_start` float NOT NULL,
  `added_date` datetime NOT NULL,
  `contractor_id` int(11) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `minimum` float NOT NULL,
  `category` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contractor_id` (`contractor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (11,'artykuł 1',4,'2018-09-27 13:34:45',9,'szt',2,14,0,NULL,0),(12,'artykuł 2',0,'2018-09-27 14:19:20',10,'kg',8,3,0,NULL,1),(13,'Nowy artykul testowy',0,'2018-09-27 15:00:46',7,'ghjkm',5,14,0,NULL,0),(14,'złota plexa',20,'2018-09-27 19:55:53',5,'szt',10,2,0,NULL,1),(15,'Artykuł',19,'2018-09-27 20:05:28',9,'szt',10,1,0,NULL,0),(16,'ghjk',342,'2018-09-30 22:19:33',9,'hjk',24356500,1,0,NULL,1);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles_moves`
--

DROP TABLE IF EXISTS `articles_moves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles_moves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) DEFAULT NULL,
  `amount` float NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_article` (`id_article`),
  CONSTRAINT `articles_moves_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles_moves`
--

LOCK TABLES `articles_moves` WRITE;
/*!40000 ALTER TABLE `articles_moves` DISABLE KEYS */;
INSERT INTO `articles_moves` VALUES (48,11,-3,'2018-09-27 13:35:14'),(49,11,10,'2018-09-27 13:35:21'),(50,12,10,'2018-09-27 14:19:37'),(51,12,-3,'2018-09-27 14:19:54'),(52,12,2,'2018-09-27 14:23:56'),(53,12,-2,'2018-09-27 14:25:07'),(54,12,2,'2018-09-27 14:25:46'),(55,12,-3,'2018-09-27 14:26:17'),(56,13,-4,'2018-09-27 15:00:55'),(57,13,10,'2018-09-27 15:01:05'),(58,13,-2,'2018-09-27 15:21:49'),(59,14,-11,'2018-09-27 19:56:46'),(60,14,-11,'2018-09-27 19:57:51'),(61,14,40,'2018-09-27 19:59:21'),(62,15,-10,'2018-09-27 20:09:00'),(63,16,-25356500,'2018-09-30 22:20:15');
/*!40000 ALTER TABLE `articles_moves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles_products`
--

DROP TABLE IF EXISTS `articles_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_article` (`id_article`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `articles_products_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`),
  CONSTRAINT `articles_products_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles_products`
--

LOCK TABLES `articles_products` WRITE;
/*!40000 ALTER TABLE `articles_products` DISABLE KEYS */;
INSERT INTO `articles_products` VALUES (37,14,22,1),(38,12,22,1),(40,15,22,0.2);
/*!40000 ALTER TABLE `articles_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'BEZ KATEGORII'),(2,'KATEGORIA 1'),(3,'NOWA KATEGORIE'),(12,'NOWA PEŁNA KATEGORIA'),(13,''),(14,'Nowa kategoria dodana przy artykule'),(15,''),(16,'');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contractors`
--

DROP TABLE IF EXISTS `contractors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contractors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `annotation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contractors`
--

LOCK TABLES `contractors` WRITE;
/*!40000 ALTER TABLE `contractors` DISABLE KEYS */;
INSERT INTO `contractors` VALUES (4,'Nowy kontrahent testowy','dfsgvhjbkn','3456787654','dfsdfsd'),(5,'Nowy kontrahent testowy','dfsgvhjbkn','3456787654','dfsdfsd'),(6,'Nowy kontrahent testowy','fgvhbjnkm','34567876543','dtrftghyjn'),(7,'NOWY PEŁNY KONTRAHRNT','fghbjnkml','45678987654','bnjkllnjkbh'),(9,'nowy kontrahent dodany przy artykule','adres','243567564534','adnotacja');
/*!40000 ALTER TABLE `contractors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `last_checked`
--

DROP TABLE IF EXISTS `last_checked`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `last_checked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `last_checked`
--

LOCK TABLES `last_checked` WRITE;
/*!40000 ALTER TABLE `last_checked` DISABLE KEYS */;
/*!40000 ALTER TABLE `last_checked` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `amount` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_article` (`id_article`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (3,1,12,5),(4,2,13,150),(5,2,11,150),(6,2,14,30),(7,0,15,50),(8,1,16,490);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_production`
--

DROP TABLE IF EXISTS `orders_production`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_production` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `orders_production_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_production`
--

LOCK TABLES `orders_production` WRITE;
/*!40000 ALTER TABLE `orders_production` DISABLE KEYS */;
INSERT INTO `orders_production` VALUES (3,1,22,25);
/*!40000 ALTER TABLE `orders_production` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `last_inner_date` datetime NOT NULL,
  `annotation` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (22,'Nowy produkt',10,'2018-09-28 16:15:16','adnotacja lorem ipsum dolor sit amet consterectur');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_files`
--

DROP TABLE IF EXISTS `products_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  `id_product` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `products_files_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_files`
--

LOCK TABLES `products_files` WRITE;
/*!40000 ALTER TABLE `products_files` DISABLE KEYS */;
INSERT INTO `products_files` VALUES (8,'clone.txt',22),(9,'ps.php',22);
/*!40000 ALTER TABLE `products_files` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-02  1:24:21
