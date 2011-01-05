# Sequel Pro dump
# Version 2492
# http://code.google.com/p/sequel-pro
#
# Host: 127.0.0.1 (MySQL 5.1.44)
# Database: acc
# Generation Time: 2011-01-05 21:15:15 +0300
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Categories`;

CREATE TABLE `Categories` (
  `name` text NOT NULL,
  `code` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

LOCK TABLES `Categories` WRITE;
/*!40000 ALTER TABLE `Categories` DISABLE KEYS */;
INSERT INTO `Categories` (`name`,`code`)
VALUES
	('Продукты',1),
	('Бытовая химия',2),
	('Техника',3),
	('Дополнительно',4),
	('Машины',5),
	('Дома',6),
	('Острова',7);

/*!40000 ALTER TABLE `Categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ci_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`)
VALUES
	('32b578c213659ddab3dada8bbc9ff2e5','0.0.0.0','Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_4; ',1294251165,'a:1:{s:5:\"login\";s:5:\"Chaos\";}');

/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Incomes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Incomes`;

CREATE TABLE `Incomes` (
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `summary` int(11) NOT NULL,
  `information` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

LOCK TABLES `Incomes` WRITE;
/*!40000 ALTER TABLE `Incomes` DISABLE KEYS */;
INSERT INTO `Incomes` (`date`,`name`,`category`,`summary`,`information`,`user_id`,`id`)
VALUES
	('2010-12-23','Нашел кошелек','Находка',2000,'В автобусе нашел',1,1),
	('2010-01-01','Получил от Витька','Дар',500,'Отобрал деньги у знакомого',1,3),
	('2010-01-02','Продал машину','Продажа',7000,'Ваз 2106',1,4),
	('2001-01-01','Подвез пару людей','Таксист',3000,'За город и обратно',1,6);

/*!40000 ALTER TABLE `Incomes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Outcomes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Outcomes`;

CREATE TABLE `Outcomes` (
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `summary` int(11) NOT NULL,
  `information` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

LOCK TABLES `Outcomes` WRITE;
/*!40000 ALTER TABLE `Outcomes` DISABLE KEYS */;
INSERT INTO `Outcomes` (`date`,`name`,`category`,`summary`,`information`,`user_id`,`id`)
VALUES
	('2010-01-01','Манная каша','Продукты',22,'Очень вкусная каша',1,36),
	('2010-01-01','Стаканчик колы','Продукты',15,'Кола из бутылочек',1,33),
	('2010-02-02','Проезд в маршрутке','Транспорт',8,'Хоть не 10...',1,34),
	('2010-12-12','Книга по C#','Книги',800,'Очень толстая книга',1,35),
	('2010-12-12','Билет в кино','Развлечения',120,'Фильм \"Начало\"',1,37),
	('2010-01-01','Сигареты','Разное',33,'Winston Lights',1,42);

/*!40000 ALTER TABLE `Outcomes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Periodic_incomes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Periodic_incomes`;

CREATE TABLE `Periodic_incomes` (
  `name` text NOT NULL,
  `summary` int(11) NOT NULL,
  `date` date NOT NULL,
  `period` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

LOCK TABLES `Periodic_incomes` WRITE;
/*!40000 ALTER TABLE `Periodic_incomes` DISABLE KEYS */;
INSERT INTO `Periodic_incomes` (`name`,`summary`,`date`,`period`,`term`,`user_id`,`id`)
VALUES
	('Стипендия',1100,'2010-12-01',30,0,1,7),
	('Заработок с рекламы в блоге',200,'2010-12-01',7,10,1,6);

/*!40000 ALTER TABLE `Periodic_incomes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Periodic_outcomes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Periodic_outcomes`;

CREATE TABLE `Periodic_outcomes` (
  `name` text NOT NULL,
  `summary` int(11) NOT NULL,
  `date` date NOT NULL,
  `period` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

LOCK TABLES `Periodic_outcomes` WRITE;
/*!40000 ALTER TABLE `Periodic_outcomes` DISABLE KEYS */;
INSERT INTO `Periodic_outcomes` (`name`,`summary`,`date`,`period`,`term`,`user_id`,`id`)
VALUES
	('Интернет',500,'2010-12-07',30,0,1,1),
	('Обед',80,'2010-01-01',1,1,1,3),
	('Проезд',16,'2010-01-02',1,2,1,4),
	('Каток',300,'2010-01-01',7,0,1,5);

/*!40000 ALTER TABLE `Periodic_outcomes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `login` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` (`login`,`password`,`email`,`id`)
VALUES
	('Chaos','202cb962ac59075b964b07152d234b70','OvergodOfCode@gmail.com',1),
	('root','63a9f0ea7bb98050796b649e85481845','root',52),
	('l','2db95e8e1a9267b7a1188556b2013b33','l@l.com',53),
	('mexx','202cb962ac59075b964b07152d234b70','mexx@mexx.com',47);

/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;





/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
