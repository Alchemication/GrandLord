-- MySQL dump 10.13  Distrib 5.6.21, for Win32 (x86)
--
-- Host: localhost    Database: grandlord
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activityDesc` varchar(255) DEFAULT NULL,
  `addedAt` datetime DEFAULT NULL,
  `addedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastName` varchar(30) NOT NULL,
  `firstName` varchar(25) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'Napora','Adam','1983-09-12'),(2,'Jokiel','Greg','1973-01-11'),(3,'Baran','Piotr','1963-03-28');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buildingNumber` int(11) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `county` varchar(125) DEFAULT NULL,
  `city` varchar(125) DEFAULT NULL,
  `addedBy` int(11) DEFAULT NULL,
  `addedAt` datetime DEFAULT NULL,
  `active` enum('y','n') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

ALTER TABLE properties ADD FULLTEXT KEY `fullAddress` (`street`,`county`,`city`);

insert into properties values (null, 115, 'Grange', 'cork', 'Douglas', 2, now(), 'y');
insert into properties values (null, 11, 'Elk Grove', 'dublin', 'Dublin', 2, now(), 'y');
insert into properties values (null, 41, 'douglas house, maryborough hill', 'cork', 'cork', 1, now(), 'y');

--
-- Dumping data for table `properties`
--

LOCK TABLES `properties` WRITE;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tenancies`
--

DROP TABLE IF EXISTS `tenancies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tenancies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propertyId` int(11) DEFAULT NULL,
  `dateFrom` date DEFAULT NULL,
  `dateTo` date DEFAULT NULL,
  `rateContactWithLandlord` enum('1','2','3','4','5') DEFAULT NULL,
  `rateFlatQuality` enum('1','2','3','4','5') DEFAULT NULL,
  `rateCleanliness` enum('1','2','3','4','5') DEFAULT NULL,
  `ratePropertyState` enum('1','2','3','4','5') DEFAULT NULL,
  `rateOverallSatisfaction` enum('1','2','3','4','5') DEFAULT NULL,
  `rateAvg` decimal(10,0) DEFAULT NULL,
  `comment` text,
  `addedBy` int(11) DEFAULT NULL,
  `addedAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `active` enum('y','n') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `propertyId_fk` (`propertyId`),
  CONSTRAINT `propertyId_fk` FOREIGN KEY (`propertyId`) REFERENCES `properties` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenancies`
--

LOCK TABLES `tenancies` WRITE;
/*!40000 ALTER TABLE `tenancies` DISABLE KEYS */;
/*!40000 ALTER TABLE `tenancies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` enum('tenant','landlord','admin') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,'tenant'),(2,'landlord'),(3,'admin');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roleId` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `secondName` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `active` enum('y','n') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roleId_fk` (`roleId`),
  CONSTRAINT `roleId_fk` FOREIGN KEY (`roleId`) REFERENCES `user_roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'gjokiel','gjokiel123','gjok@mycit.ie','Greg','Jokiel','2015-02-19 23:59:59','2015-02-19 23:59:59','y'),(2,1,'anapora','anapora123','anap@mycit.ie','Adam','Napora','2015-02-19 23:59:59','2015-02-19 23:59:59','y'),(3,1,'pbaran','pbaranl123','pbar@mycit.ie','Piotr','Baran','2015-02-19 23:59:59','2015-02-19 23:59:59','y'),(4,3,'admin','adminl123','admin@mycit.ie','Admin',NULL,'2015-02-19 23:59:59','2015-02-19 23:59:59','y');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `lookups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lookups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lookupType` varchar(25) DEFAULT NULL,
  `lookupValue` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

insert into lookups (id, lookupType, lookupValue) values (null, 'city',  'Cork'), (null, 'city',  'Galway'), (null, 'city',  'Tralee'), (null, 'city',  'Tallaght'), (null, 'city',  'Naas'), (null, 'city',  'Limerick'), (null, 'city',  'Ennis'), (null, 'city',  'Waterford'), (null, 'city',  'Balbriggan'), (null, 'city',  'Swords'), (null, 'city',  'Sligo'), (null, 'city',  'Dundalk'), (null, 'city',  'Newbridge'), (null, 'city',  'Drogheda'), (null, 'city',  'Clonmel'), (null, 'city',  'Navan'), (null, 'city',  'Athlone');
insert into lookups (id, lookupType, lookupValue) values (null, 'county',  'Antrim'), (null, 'county',  'Armagh'), (null, 'county',  'Carlow'), (null, 'county',  'Cavan'), (null, 'county',  'Clare'), (null, 'county',  'Cork'), (null, 'county',  'Derry'), (null, 'county',  'Donegal'), (null, 'county',  'Down'), (null, 'county',  'Dublin'), (null, 'county',  'Fermanagh'), (null, 'county',  'Galway'), (null, 'county',  'Kerry'), (null, 'county',  'Kildare'), (null, 'county',  'Kilkenny'), (null, 'county',  'Laois'), (null, 'county',  'Leitrim'), (null, 'county',  'Limerick'), (null, 'county',  'Longford'), (null, 'county',  'Louth'), (null, 'county',  'Mayo'), (null, 'county',  'Meath'), (null, 'county',  'Monaghan'), (null, 'county',  'Offaly'), (null, 'county',  'Roscommon'), (null, 'county',  'Sligo'), (null, 'county',  'Tipperary'), (null, 'county',  'Tyrone'), (null, 'county',  'Waterford'), (null, 'county',  'Westmeath'), (null, 'county',  'Wexford'), (null, 'county',  'Wicklow');
--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'gjokiel','gjokiel123','gjok@mycit.ie','Greg','Jokiel','2015-02-19 23:59:59','2015-02-19 23:59:59','y'),(2,1,'anapora','anapora123','anap@mycit.ie','Adam','Napora','2015-02-19 23:59:59','2015-02-19 23:59:59','y'),(3,1,'pbaran','pbaranl123','pbar@mycit.ie','Piotr','Baran','2015-02-19 23:59:59','2015-02-19 23:59:59','y'),(4,3,'admin','adminl123','admin@mycit.ie','Admin',NULL,'2015-02-19 23:59:59','2015-02-19 23:59:59','y');
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

-- Dump completed on 2015-02-25 19:00:23
