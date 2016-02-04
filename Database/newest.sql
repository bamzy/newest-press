/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.9-MariaDB : Database - newest
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`newest` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `newest`;

/*Table structure for table `manuscript` */

DROP TABLE IF EXISTS `manuscript`;

CREATE TABLE `manuscript` (
  `id` bigint(20) NOT NULL,
  `title` char(100) NOT NULL,
  `author` char(100) NOT NULL,
  `category` char(50) NOT NULL,
  `content` blob,
  `text` text,
  `receivedDate` date NOT NULL,
  `status` enum('Rejected','Accepted','Undetermined') NOT NULL,
  `finalizedDate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `manuscript` */

insert  into `manuscript`(`id`,`title`,`author`,`category`,`content`,`text`,`receivedDate`,`status`,`finalizedDate`) values (1,'Androids Dream of Electric Sheep?','Philip K. Dick','Science Fiction','lskfslkfjaslkfkja',NULL,'2016-01-20','Undetermined','2016-01-30'),(2,'Something Wicked This Way Comes (Green Town, #2)','Ray Bradbury','Science Fiction',NULL,NULL,'2015-04-22','Accepted','2016-01-14'),(3,'The Hitchhiker\'s Guide to the Galaxy','Douglas Adams','Comedy',NULL,NULL,'2015-10-12','Rejected','2015-12-29');

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `id` bigint(20) NOT NULL,
  `manuscriptId` bigint(20) NOT NULL,
  `reviewerId` bigint(20) NOT NULL,
  `reviewContent` text,
  `finalDecision` enum('Accepted','Rejected','Not Submitted') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `manuscriptId` (`manuscriptId`),
  KEY `reviewerId` (`reviewerId`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`manuscriptId`) REFERENCES `manuscript` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `review_ibfk_2` FOREIGN KEY (`reviewerId`) REFERENCES `reviewer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `review` */

insert  into `review`(`id`,`manuscriptId`,`reviewerId`,`reviewContent`,`finalDecision`) values (1,1,1,'D Haraway - 2006 - Springer\r\nThis chapter is an effort to build an ironic political myth faithful to feminism, socialism, and \r\nmaterialism. Perhaps more faithful as blasphemy is faithful, than as reverent worship and \r\nidentification. Blasphemy has always seemed to require taking things very seriously. I ...','Rejected'),(2,1,2,'S Turkle - 2011 - books.google.com\r\nLife on the Screen is a book not about computers, but about people and how computers are \r\ncausing us to reevaluate our identities in the age of the Internet. We are using life on the \r\nscreen to engage in new ways of thinking about evolution, relationships, politics, sex, and ...','Rejected');

/*Table structure for table `reviewer` */

DROP TABLE IF EXISTS `reviewer`;

CREATE TABLE `reviewer` (
  `id` bigint(20) NOT NULL,
  `name` char(50) DEFAULT NULL,
  `phone` char(12) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `address` char(255) DEFAULT NULL,
  `biography` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `reviewer` */

insert  into `reviewer`(`id`,`name`,`phone`,`email`,`address`,`biography`) values (1,'Lynne Truss','7807023134','lynn@gmail.com','blah blah blah',NULL),(2,'Harper Lee','7807023134','haperlee@gmail.com','blah blah blah',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
