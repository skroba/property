# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.2.13-MariaDB)
# Database: property
# Generation Time: 2019-10-13 21:53:44 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table property
# ------------------------------------------------------------

DROP TABLE IF EXISTS `property`;

CREATE TABLE `property` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `town` varchar(64) DEFAULT NULL,
  `block` varchar(128) DEFAULT NULL,
  `street` text DEFAULT NULL,
  `room` int(11) DEFAULT NULL,
  `space` int(11) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `floors` int(11) DEFAULT NULL,
  `heating` varchar(64) DEFAULT NULL,
  `rentorsell` varchar(64) DEFAULT NULL,
  `garage` varchar(64) DEFAULT NULL,
  `elevator` varchar(64) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `owner` text DEFAULT NULL,
  `about` text DEFAULT NULL,
  `insertedby` varchar(64) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `uploaded` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `property` WRITE;
/*!40000 ALTER TABLE `property` DISABLE KEYS */;

INSERT INTO `property` (`id`, `town`, `block`, `street`, `room`, `space`, `type`, `floors`, `heating`, `rentorsell`, `garage`, `elevator`, `price`, `owner`, `about`, `insertedby`, `images`, `uploaded`)
VALUES
	(114,'Novi Sad','Liman','Balzakova',4,145,'Stan',2,'Centralno','sell','no','no',140000,'Milan','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','admin','{\"0\":\"1.jpg\",\"1\":\"2.jpg\",\"2\":\"3.jpg\",\"3\":\"4.jpg\"}',1570998846),
	(115,'Novi Sad','Detelinara','Janka Čmelika',3,100,'Kuca',2,'Centralno','sell','no','no',150000,'Janko','At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium.\r\n','admin','{\"0\":\"1.jpg\",\"1\":\"2.jpg\",\"2\":\"3.jpg\",\"3\":\"4.jpg\",\"4\":\"5.jpg\",\"5\":\"6.jpg\"}',1570998964),
	(116,'Sabac','Bare','Ujkina',2,68,'Stan',4,'Centralno','rent','yes','yes',140,'Sava','Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).','admin','{\"0\":\"1.jpg\",\"1\":\"2.jpg\",\"2\":\"3.jpg\",\"3\":\"4.jpg\"}',1570999125),
	(117,'Beograd','Dedinje','Dzona Kenedija',5,340,'Kuca',1,'Gas','sell','yes','no',500000,'Toma','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage.','admin','{\"0\":\"1.jpg\",\"1\":\"2.jpg\",\"2\":\"3.jpg\",\"3\":\"4.jpg\"}',1570999234),
	(118,'Sabac','Cavic','Nikole Pasica',4,200,'Kuca',2,'Centralno','sell','yes','no',90000,'Nenad','Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage,','admin','{\"0\":\"2.jpg\",\"1\":\"3.jpg\",\"2\":\"4.jpg\",\"3\":\"5.jpg\",\"4\":\"6.jpg\",\"5\":\"8f14e402002499a8052002081024.jpg\"}',1570999356),
	(119,'Beograd','Zarkovo','Pelagiceva',2,52,'Stan',4,'Centralno','rent','no','yes',200,'Milutin',' It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.','admin','{\"0\":\"2.jpg\",\"1\":\"3.jpg\",\"2\":\"4.jpg\",\"3\":\"8f14e4024325fb2e632432101024.jpg\"}',1570999497),
	(120,'Beograd','Vracar','Svetog Save',3,150,'Kuca',2,'Centralno','sell','yes','yes',150000,'Sava',' It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.','admin','{\"0\":\"1.jpg\",\"1\":\"2.jpg\",\"2\":\"3.jpg\",\"3\":\"4.jpg\"}',1571000055),
	(121,'Beograd','Senjak','Ruzveltova',3,150,'Stan',2,'Gas','sell','no','no',150000,'Goran','At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium.\r\n','admin','{\"0\":\"1.jpg\",\"1\":\"2.jpg\",\"2\":\"3.jpg\",\"3\":\"4.jpg\"}',1571002771);

/*!40000 ALTER TABLE `property` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table towns
# ------------------------------------------------------------

DROP TABLE IF EXISTS `towns`;

CREATE TABLE `towns` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `town` varchar(64) DEFAULT NULL,
  `blocks` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `towns` WRITE;
/*!40000 ALTER TABLE `towns` DISABLE KEYS */;

INSERT INTO `towns` (`id`, `town`, `blocks`)
VALUES
	(1,'Sabac','Trkaliste,Cavic,Centar,Letnjikovac,Bare'),
	(2,'Beograd','Zarkovo, Vracar, Dedinje,Senjak,Stari Grad'),
	(23,'Novi Sad','Liman, Podbara, Rotkvarija, Detelinara, Grbavica, Klisa,Sangaj');

/*!40000 ALTER TABLE `towns` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `role` varchar(16) DEFAULT NULL,
  `salt` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `role`, `salt`)
VALUES
	(113,'admin','$2y$10$Z6up0IbdQnLMSddmLg2eDem04BoqTwZforUJFM0elFjd2oHSnQayi','askrobic@gmail.com','2019-10-04 12:34:24','admin','df7d5230b848b42d2e2f12f4a7c6434edbc6317d62f9db13edfc3f558a4dc65cbdc9939b4d5f4e93'),
	(114,'aca','$2y$10$DKcw91VtXki6GeRZpMTEwO3EX3BUQ1IWiLgRRncFBa/4tYIkkTFuS','askrobic@gmail.com','2019-10-04 12:49:33','user','df7d5230b848b42d2e2f12f4a7c6434edbc6317d62f9db13edfc3f558a4dc65c127d79d0cdcfe867'),
	(135,'Jelena','$2y$10$rxg9fkEGvaICmbyEAeGqauxandsFSinCk5dldSG.NZaqmCKuxwp9S','jelena@hotmail.com','2019-10-13 22:27:26','guest','<br />\r\n<b>Notice</b>:  Undefined index: csrf in <b>/Users/skroba/Sites/property/register.php</b> on line <b>41</b><br />\r\nd2a7426c97873e71');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
