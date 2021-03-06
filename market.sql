-- MySQL dump 10.13  Distrib 5.5.22, for FreeBSD9.0 (i386)
--
-- Host: localhost    Database: market
-- ------------------------------------------------------
-- Server version	5.5.22

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
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) DEFAULT NULL,
  `item_group` varchar(100) DEFAULT NULL,
  `item_init_price` double DEFAULT NULL,
  `item_lowest_rise` double DEFAULT NULL,
  `item_height_rise` double DEFAULT NULL,
  `item_total_time` double DEFAULT NULL,
  `item_direct_sale_price` double DEFAULT NULL,
  `item_price_currency` int(11) DEFAULT NULL,
  `item_pic` set('top','button','left','right') DEFAULT NULL,
  `item_desc` varchar(400) DEFAULT NULL,
  `item_date_created` int(11) DEFAULT NULL,
  `item_lowest_price` double DEFAULT NULL,
  `status` enum('active','in-active','finish') DEFAULT 'active',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (25,'new one ','0',32223,12889.2,9666.9,2,33333,0,'top,left','new one ',NULL,9999,'active'),(26,'Football','0',900,90,180,2,80000,0,'top,left','foot ball ',NULL,5000,'active');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay_for_item`
--

DROP TABLE IF EXISTS `pay_for_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay_for_item` (
  `item_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_for_item`
--

LOCK TABLES `pay_for_item` WRITE;
/*!40000 ALTER TABLE `pay_for_item` DISABLE KEYS */;
INSERT INTO `pay_for_item` VALUES (1,1,9999),(26,11,10100),(26,11,10199);
/*!40000 ALTER TABLE `pay_for_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_mayt`
--

DROP TABLE IF EXISTS `test_mayt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_mayt` (
  `ali` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_mayt`
--

LOCK TABLES `test_mayt` WRITE;
/*!40000 ALTER TABLE `test_mayt` DISABLE KEYS */;
/*!40000 ALTER TABLE `test_mayt` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-12-23  5:30:23
