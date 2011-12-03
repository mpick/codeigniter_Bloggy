-- MySQL dump 10.13  Distrib 5.5.9, for Win32 (x86)
--
-- Host: localhost    Database: bloggy
-- ------------------------------------------------------
-- Server version	5.1.36-community-log

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
-- Table structure for table `blogentry`
--

DROP TABLE IF EXISTS `blogentry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogentry` (
  `idblogentry` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `entrydate` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `note` text NOT NULL,
  `titleurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idblogentry`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `blogtags`
--

DROP TABLE IF EXISTS `blogtags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogtags` (
  `idblogtags` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogentryid` int(10) unsigned NOT NULL,
  `tagid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idblogtags`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `link`
--

DROP TABLE IF EXISTS `link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link` (
  `idlink` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `note` text,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idlink`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `milestonetask`
--

DROP TABLE IF EXISTS `milestonetask`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `milestonetask` (
  `idmilestonetask` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `milestoneid` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duedate` datetime NOT NULL,
  `estimatedhours` int(10) unsigned NOT NULL,
  `actualhours` int(10) unsigned NOT NULL,
  `completeddate` datetime NOT NULL,
  PRIMARY KEY (`idmilestonetask`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `idproject` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime DEFAULT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `companyurl` varchar(255) DEFAULT NULL,
  `companycontactperson` varchar(255) DEFAULT NULL,
  `companycontactpersonemail` varchar(255) DEFAULT NULL,
  `note` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idproject`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `projectmilestone`
--

DROP TABLE IF EXISTS `projectmilestone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projectmilestone` (
  `idprojectmilestone` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text,
  `createddate` datetime NOT NULL,
  `estimatedreleasedate` datetime DEFAULT NULL,
  `releasedate` datetime DEFAULT NULL,
  `projectid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idprojectmilestone`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `software`
--

DROP TABLE IF EXISTS `software`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `software` (
  `idsoftware` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `note` text,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idsoftware`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tagtypes`
--

DROP TABLE IF EXISTS `tagtypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tagtypes` (
  `idtagtypes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `urlfriendly` varchar(255) NOT NULL,
  PRIMARY KEY (`idtagtypes`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `iduser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(105) NOT NULL,
  `password` varchar(105) NOT NULL,
  `salt` varchar(45) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-12-02 16:21:40