-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: 192.168.116.134    Database: 
-- ------------------------------------------------------
-- Server version 4.1.7-standard

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
-- Current Database: `badstore2015`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `badstore2015` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `badstore2015`;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) default NULL,
  `description` varchar(40) default NULL,
  `cost` float(8,2) default NULL,
  `price` float(8,2) default NULL,
  `isnew` char(1) default NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (id, name, description, cost, price, isnew) VALUES (1000,'Snake Oil','Useless but expensive',4.35,11.50,'Y'), (1001,'Crystal Ball','The finest Austrian crystal for complete',13.95,49.95,'N'), (1002,'Magic Hat','The classic magicians hat',18.45,60.00,'N'), (1003,'Magic Rabbit','Cute white bunny',3.50,12.50,'Y'), (1004,'Security Appliance','Everybody needs one',400.00,3999.00,'N'), (1005,'Perfect Code','The rarest magic of all',5.00,5000.00,'Y'), (1006,'Security Blanket','Keeps you warm and toasty',9.50,16.00,'N'), (1007,'Bag \'o Fud','For those who believe anything',0.50,200.00,'N'), (1008,'ROI Calculator','Accurate Return on Investment',2.30,22.95,'Y'), (1009,'Planning Template','Business Planning Tool',6.70,24.95,'Y'), (1010,'Security 911','Technical Support Agreement',99.00,9999.00,'N'), (1011,'Money','There\'s never enough',3.00,90.00,'Y'), (1012,'Endless Cup','Perfect for late nights',4.56,23.98,'Y'), (1013,'Invisibility Cloak','For when you just want to hide',0.00,8995.00,'N'), (1014,'Disappearing Ink','Makes perfect signatures',8.96,30.95,'Y');

/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int(11) default NULL,
  `order_datetime` datetime default NULL,
  `order_cost` float(8, 2) default NULL,
  `order_price` float(8, 2) default NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (user_id, order_datetime, order_cost, order_price) VALUES (1,'2015-03-16 01:54:51', 46.95, 56.95), (2,'2015-03-16 01:54:51', 46.95, 56.95), (3,'2015-03-15 01:54:50', 22.95, 32.95);

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int(11) default NULL,
  `item_id` int(11) default NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` (order_id, item_id) VALUES (1, 1), (1, 2), (2, 3), (2, 4), (3, 3), (3, 5);

/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(40) default NULL,
  `password` varchar(32) default NULL,
  `fullname` varchar(50) default NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (email, password, fullname) VALUES ('joe@r.com','62072d95acb588c7ee9d6fa0c6c85155','棚下　太郎'), ('sato@r.com','9726255eec083aa56dc0449a21b33190','砂糖 一郎'), ('watababe@r.com','99b0e8da24e29e4ccb5d7d76e677c2ac','渡辺　あきら'), ('robert@spender.net','e40b34e3380d6d2b238762f0330fbd84','Robert Spender'), ('bill@gander.org','5f4dcc3b5aa765d61d8327deb882cf99','Bill Gander'), ('steve@badstore2015.net','8cb554127837a4002338c10a299289fb','Steve Owner');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;


--
-- Table structure for table `guestbooks`
--

DROP TABLE IF EXISTS `guestbooks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guestbooks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) default NULL,
  `email` varchar(40) default NULL,
  `comment` varchar(255) default NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guestbooks`
--

LOCK TABLES `guestbooks` WRITE;
/*!40000 ALTER TABLE `guestbooks` DISABLE KEYS */;
INSERT INTO `guestbooks` (name, email, comment) VALUES ('Joe Shopper','joe@r.com','素晴らしいサイトだね！! 毎日きたくなるよ！'),('John Q. Public','jqp@w.gov', '夏の商品が来たら教えてください！'),('Big Spender', 'billg@m.com', 'また使います！');
/*!40000 ALTER TABLE `guestbooks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-16  1:55:41
