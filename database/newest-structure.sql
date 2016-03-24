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

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL,
  `categoryName` char(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `manuscript` */

DROP TABLE IF EXISTS `manuscript`;

CREATE TABLE `manuscript` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL,
  `author` char(100) NOT NULL,
  `category` char(50) NOT NULL,
  `uploadedFile` blob,
  `msText` text,
  `receivedDate` date NOT NULL,
  `status` enum('Rejected','Accepted','Undetermined') NOT NULL DEFAULT 'Undetermined',
  `finalizedDate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

/*Table structure for table `notification` */

DROP TABLE IF EXISTS `notification`;

CREATE TABLE `notification` (
  `id` bigint(20) NOT NULL,
  `email` char(100) NOT NULL,
  `phone` char(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `id` bigint(20) NOT NULL,
  `manuscriptId` bigint(20) DEFAULT NULL,
  `reviewerId` bigint(20) NOT NULL,
  `reviewContent` text,
  `finalDecision` enum('Accepted','Rejected','Not Submitted') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviewerId` (`reviewerId`),
  KEY `manuscriptId` (`manuscriptId`),
  CONSTRAINT `review_ibfk_2` FOREIGN KEY (`reviewerId`) REFERENCES `reviewer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `review_ibfk_3` FOREIGN KEY (`manuscriptId`) REFERENCES `manuscript` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `reviewer` */

DROP TABLE IF EXISTS `reviewer`;

CREATE TABLE `reviewer` (
  `id` bigint(20) NOT NULL,
  `name` char(50) DEFAULT NULL,
  `phone` char(12) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `address` char(255) DEFAULT NULL,
  `biography` text,
  `userId` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  CONSTRAINT `reviewer_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` char(50) NOT NULL,
  `password` char(255) NOT NULL,
  `creationDate` date NOT NULL,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('Reviewer','Administrator','Author') NOT NULL,
  `lastLogin` date DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
