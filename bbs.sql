-- MySQL dump 10.13  Distrib 5.5.53, for Win32 (AMD64)
--
-- Host: localhost    Database: bbs
-- ------------------------------------------------------
-- Server version	5.5.53

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
-- Current Database: `bbs`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bbs` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bbs`;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(1024) NOT NULL,
  `content` text NOT NULL,
  `publish_at` int(10) unsigned NOT NULL,
  `publish_by` varchar(64) NOT NULL,
  `views` int(10) unsigned NOT NULL,
  `replies` int(10) unsigned NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'1111111111111 1 ','1111111111111111111111111111111111111111',1542434946,'admin',1,0,2),(2,'22222222222222222222222222','222222222222222222222',1542434963,'admin',7,0,2),(3,'2343243243243','sadfsdafdsf',1542434977,'admin',1,0,1),(4,'6575765765','fghfhfghgfh',1542434984,'admin',1,0,1),(5,'dsafsdafdsf','dsfdsafdsf',1542434997,'admin',1,0,3),(6,'dsfdsafsdf','sdfsdafdsfdsf',1542435010,'admin',1,0,4),(7,'sdfsdfdsf','sdfdsfdsf',1542435041,'admin',1,0,3),(8,'dsfsdfdsf','sdfdsfdsf',1542435052,'admin',4,0,4),(9,'45665werwerewrew','rewrewr',1542440899,'admin',1,0,1),(10,'45665werwerewrew','rewrewrsadfsfdds',1542440903,'admin',1,0,1),(11,'45665werwerewrew','rewrewrsadfsfdds',1542440906,'admin',12,0,1),(12,'435435435','543543543543',1542440910,'admin',1,0,1),(13,'3245354354','454354353',1542440915,'admin',1,0,1),(14,'rtyu65urtytrytr','ytrytryrytry',1542440922,'admin',1,0,1),(15,'trytrytrytrytr','dfgfdsgfggggggggggggggggggggggggggggg',1542440929,'admin',1,0,1),(16,'tttttttttttttttttttttttttttttttttgfdg fd gfd','dfgfdgfd',1542440936,'admin',3,0,1),(17,'fdgfdgfd','gfdsgfdsg',1542440958,'admin',1,0,1),(18,'ooooooooooouyi','yuiuyiyuiyi',1542440964,'admin',1,0,1),(19,'sdfsdafsdf','sadfsdafdsf',1542442309,'admin',1,0,1),(20,'233333333333333333','KindEditor使用JavaScript编写，可以无缝的于Java、.NET、PHP、ASP等程序接合。 KindEditor非常适合在CMS、商城、论坛、博客、Wiki、电子邮件等互联网应用上使用，2006年7月首次发布2.0以来，KindEditor依靠出色的用户体验和领先的技术不断扩大编辑器市场占有率，目前在国内已经成为最受欢迎的编辑器之一。',1542443983,'admin',34,0,1),(21,'4555555555555555','KindEditor使用JavaScript编写，可以无缝的于Java、.NET、PHP、ASP等程序接合。 KindEditor非常适合在<span style=\"color:red\">CMS、商城、论坛、博客、Wiki、</span>电子邮件等互联网应用上使用，2006年7月首次发布2.0以来，KindEditor依靠出色的用户体验和领先的技术不断扩大编辑器市场占有率，目前在国内已经成为最受欢迎的编辑器之一。',1542444246,'admin',9,0,1),(22,'21313213','<p>\r\n	<strong><span style=\"font-size:18px;\">黄卓同志生前在什邡乡镇、部门多岗位任职，爱岗敬业、勤恳工作，得到干部、群众和组织的充分认可。</span></strong> \r\n</p>\r\n<p>\r\n	<span style=\"background-color:#E53333;font-size:18px;\">另据新京报政事儿</span> \r\n</p>\r\n<p>\r\n	<span style=\"font-size:18px;\">根据什邡市人民政府门户网站信息，黄卓1973年1月生，大学文化，汉族，四川双流人。什邡市财政局官网网页快照显示，黄卓任财政局党组书记、局长、国资委副主任。</span> \r\n</p>',1542531484,'admin',0,0,1),(23,'黄卓同志生前在什邡乡镇','<p>\r\n	<strong><span style=\"font-size:18px;\">黄卓同志生前在什邡乡镇、部门多岗位任职，爱岗敬业、勤恳工作，得到干部、群众和组织的充分认可。</span></strong> \r\n</p>\r\n<p>\r\n	<span style=\"background-color:#E53333;font-size:18px;\">另据新京报政事儿</span> \r\n</p>\r\n<p>\r\n	<span style=\"font-size:18px;\">根据什邡市人民政府门户网站信息，黄卓1973年1月生，大学文化，汉族，四川双流人。什邡市财政局官网网页快照显示，黄卓任财政局党组书记、局长、国资委副主任。</span> \r\n</p>',1542531507,'admin',12,0,1),(24,'sdfdsfdsf','dsfsfd',1542532603,'admin',0,0,2),(25,'33333333333333333333333','5555555555555555555',1542532704,'admin',1,0,2),(26,'sdfdsfdsf','dsfsadfdsaf',1542532798,'admin',0,0,2),(27,'oooooooooooooo','ooooooooooooooooooooo',1542532813,'admin',2,0,4);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thread`
--

DROP TABLE IF EXISTS `thread`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thread` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(1024) NOT NULL,
  `content` text NOT NULL,
  `publish_at` int(10) unsigned NOT NULL,
  `publish_by` varchar(64) NOT NULL,
  `replies` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thread`
--

LOCK TABLES `thread` WRITE;
/*!40000 ALTER TABLE `thread` DISABLE KEYS */;
INSERT INTO `thread` VALUES (1,'43535345','sdfdsfsdfdsdfdsf',1542506502,'user',0,20),(2,'AAAAAAAAAAAAAAAAAAAAAAAAAAAAA','FDSSGGGGGGGGGGGGGGGGGGGG',1542506882,'user',0,20),(3,'345435435','dsgdsgfdg',1542507029,'user',0,20),(4,'43543535435','dsgfdgfdgdfgfdg',1542507040,'user',0,20),(5,'ewtewrtrew','dsgdetrete',1542507635,'user',0,20),(6,'SADFSADF','SDFSDFF',1542528999,'user',0,21),(7,'dsfsDF','SDFDSFDSF',1542529545,'user',0,2),(8,'RE: 黄卓同志生前在什邡乡镇fdgdg','sdgfdsgfdgdfsgdfgfdg',1542532134,'user',0,23),(9,'','sdfsdfsdfdsf',1542532263,'user',0,23),(10,'','sadfsafdsf',1542532295,'user',0,23),(11,'','sadfsafdsf',1542532315,'user',0,23),(12,'','sdfsafdsafdsf',1542532332,'user',0,23),(13,'','dsfdsfdsfdsf',1542532443,'user',0,23),(14,'','dsfdsfdsfdsf',1542532472,'user',0,23),(15,'','dsfdsfdsfdsf',1542532499,'user',0,23),(16,'','ipoipoipi',1542532535,'user',0,23),(17,'','sfsdafsafsdf',1542532573,'user',0,23),(18,'','dsafsafdsafdsf',1542532588,'user',0,23),(19,'','dsfdsfdsf',1542532831,'user',0,27);
/*!40000 ALTER TABLE `thread` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-18 17:48:18
