/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.18-log : Database - tailormadedashboard
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tailorma_dashboard` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `tailorma_dashboard`;

/*Table structure for table `subscription_status` */

DROP TABLE IF EXISTS `subscription_status`;

CREATE TABLE `subscription_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `Status` int(11) DEFAULT NULL,
  `status_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `subscription_status` */

insert  into `subscription_status`(`status_id`,`Status`,`status_description`) values (1,1,'pending_customer_approval'),(2,2,'pending_submission'),(3,3,'submitted'),(4,4,'confirmed'),(5,5,'paid_out'),(6,6,'cancelled'),(7,7,'customer_approval_denied'),(8,8,'failed'),(9,9,'charged_back');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
