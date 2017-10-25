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
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tailormadedashboard` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tailormadedashboard`;

/*Table structure for table `tblaccount` */

DROP TABLE IF EXISTS `tblaccount`;

CREATE TABLE `tblaccount` (
  `AccountID` int(11) NOT NULL AUTO_INCREMENT,
  `GoogleEmail` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Passwords` varchar(255) DEFAULT NULL,
  `Firstname` varchar(255) DEFAULT NULL,
  `Lastname` varchar(255) DEFAULT NULL,
  `AlternateEmail` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Company` varchar(255) DEFAULT NULL,
  `Industry` varchar(255) DEFAULT NULL,
  `Addressline` varchar(255) DEFAULT '338-346 Goswell Road',
  `City` varchar(255) DEFAULT 'London',
  `PostalCode` varchar(255) DEFAULT 'EC1V 7LQ',
  PRIMARY KEY (`AccountID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `tblaccount` */

insert  into `tblaccount`(`AccountID`,`GoogleEmail`,`Username`,`Passwords`,`Firstname`,`Lastname`,`AlternateEmail`,`Phone`,`Company`,`Industry`,`Addressline`,`City`,`PostalCode`) values (2,'larrymark2003@gmail.com','larrymark2003','202cb962ac59075b964b07152d234b70','Larry Mark','Somocor','larrymark@gmail.com','8557555','Orion Solutions','IT','338-346 Goswell Road','London','EC1V 7LQ'),(13,'johnddarling9@gmail.com','johndarling','202cb962ac59075b964b07152d234b70','John','Darling','johnddarling9@gmail.com','7375037113','CU Loans','CU Loans','338-346 Goswell Road','London','EC1V 7LQ'),(14,'john@powerednow.com','johnpower','202cb962ac59075b964b07152d234b70','John','Darling','john@powerednow.com','07375037113','Powered Now','Powered Now','338-346 Goswell Road','London','EC1V 7LQ'),(17,'rayyana00@gmail.com','ryana','202cb962ac59075b964b07152d234b70','Rogan','Alista n','rebellionstrength@gmail.com','1234567890','Rebellion Strength','Rebellion Strength','338-346 Goswell Road','London','EC1V 7LQ'),(18,'lsomocor2003@gmail.com','lsomocor','202cb962ac59075b964b07152d234b70','Larry Mark','Somocor','ddada','991-4041','Orion Solutions','Orion Solutions','338-346 Goswell Road','London','EC1V 7LQ'),(19,'superayyan97@gmail.com','superayan','202cb962ac59075b964b07152d234b70','Al-Rayyan','Abdurahman','mariedoll0115@gmail.com','0995683467','Tailormade','Tailormade','338-346 Goswell Road','London','EC1V 7LQ'),(20,'lenovobolante@gmail.com','lenov','202cb962ac59075b964b07152d234b70','Jay Jules','Bolante','bolante93@gmail.com','090909090909','Orion Solutions','Orion Solutions','338-346 Goswell Road','London','EC1V 7LQ'),(22,'larry@tailormadetraffic.com','larrytailor','202cb962ac59075b964b07152d234b70','Larry','Somocor','saitaosla@gmail.com','09068338122','Orion Solutions','Orion Solutions','338-346 Goswell Road','London','EC1V 7LQ'),(23,'john@tailormadetraffic.com','johntailor','202cb962ac59075b964b07152d234b70','John','Darling','johnddarling9@gmail.com','7375037113','Powered Now','Powered Now','338-346 Goswell Road','London','EC1V 7LQ'),(24,'sutherlandinn@googlemail.com','sutherland','202cb962ac59075b964b07152d234b70','dean','taylor','hell@deantaylordesign.co.uk','07779276884','shop4whisky','shop4whisky','338-346 Goswell Road','London','EC1V 7LQ');

/*Table structure for table `tblcampaigns` */

DROP TABLE IF EXISTS `tblcampaigns`;

CREATE TABLE `tblcampaigns` (
  `CampaignID` int(11) NOT NULL AUTO_INCREMENT,
  `CampaignTitle` varchar(255) DEFAULT NULL,
  `CampaignTypeID` varchar(255) DEFAULT NULL,
  `CampaignLink` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CampaignID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tblcampaigns` */

insert  into `tblcampaigns`(`CampaignID`,`CampaignTitle`,`CampaignTypeID`,`CampaignLink`) values (1,'Facebook','1','www.site.com/index.php');

/*Table structure for table `tblcampaigntype` */

DROP TABLE IF EXISTS `tblcampaigntype`;

CREATE TABLE `tblcampaigntype` (
  `CampaignTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `CampaignTypeTitle` varchar(255) DEFAULT NULL,
  `CampaignTypeDescription` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CampaignTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tblcampaigntype` */

insert  into `tblcampaigntype`(`CampaignTypeID`,`CampaignTypeTitle`,`CampaignTypeDescription`) values (1,'Facebook','Facebook'),(2,'Email Marketing','Email Marketing'),(3,'Website Marketing','Website Marketing');

/*Table structure for table `tblsubscription` */

DROP TABLE IF EXISTS `tblsubscription`;

CREATE TABLE `tblsubscription` (
  `SubscriptionID` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `MandateID` varchar(255) DEFAULT NULL,
  `AccountID` int(11) DEFAULT NULL,
  `UniqueID` varchar(255) DEFAULT NULL,
  `SubscriptionTypeID` int(11) DEFAULT NULL,
  `SubscriptionAmount` decimal(10,2) DEFAULT NULL,
  `DailyBudget` decimal(10,2) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Expiry` int(1) DEFAULT '0',
  `Status` int(1) NOT NULL DEFAULT '0',
  `crm` int(1) NOT NULL DEFAULT '0',
  `websitelink` varchar(255) NOT NULL,
  `SubscriptionTitle` varchar(255) NOT NULL,
  `PaymentPlan` varchar(255) NOT NULL,
  `PaymentPlatform` varchar(255) NOT NULL,
  `PaymentCampaign` varchar(255) NOT NULL,
  `CustomerID` varchar(255) NOT NULL,
  `PaymentType` varchar(255) NOT NULL,
  `PaymentID` varchar(255) NOT NULL,
  `PaymentCampaignTitle` varchar(255) NOT NULL,
  `OrderInstructions` varchar(255) NOT NULL,
  PRIMARY KEY (`SubscriptionID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tblsubscription` */

insert  into `tblsubscription`(`SubscriptionID`,`MandateID`,`AccountID`,`UniqueID`,`SubscriptionTypeID`,`SubscriptionAmount`,`DailyBudget`,`StartDate`,`EndDate`,`Expiry`,`Status`,`crm`,`websitelink`,`SubscriptionTitle`,`PaymentPlan`,`PaymentPlatform`,`PaymentCampaign`,`CustomerID`,`PaymentType`,`PaymentID`,`PaymentCampaignTitle`,`OrderInstructions`) values (00000000001,'MD0006PYAWSMAZ',2,'SB00029DF109VY',1,29.00,10.00,'2017-10-24',NULL,0,0,0,'https://gg.com','Basic Advertising','Daily','Facebook Marketing','Get More Calls','CU00072J5Y8YTP','Subscribe_Payment','','',''),(00000000002,'MD0006PYDKTXFM',20,'SB00029DH19S5M',1,29.00,88.00,'2017-10-24',NULL,0,0,0,'https://gg.com','Basic Advertising','Daily','Facebook Marketing','Get More Traffic','CU00072J8PMW46','Subscribe_Payment','','',''),(00000000003,'MD0006Q9VACJDK',0,NULL,1,400.00,0.00,'2017-10-25',NULL,0,0,0,'','Android Development','','','','CU00072XV424ZP','Direct_Payment','PM001CVP5WCS52','Test IOS','Test');

/*Table structure for table `tblsubscriptiontype` */

DROP TABLE IF EXISTS `tblsubscriptiontype`;

CREATE TABLE `tblsubscriptiontype` (
  `SubscriptionTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `SubscriptionTitle` varchar(255) DEFAULT NULL,
  `SubscriptionDescription` varchar(255) DEFAULT NULL,
  `SubscriptionAmount` varchar(255) DEFAULT NULL,
  `Campaigns` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SubscriptionTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tblsubscriptiontype` */

insert  into `tblsubscriptiontype`(`SubscriptionTypeID`,`SubscriptionTitle`,`SubscriptionDescription`,`SubscriptionAmount`,`Campaigns`) values (1,'Basic','Basic','29','1'),(2,'Premium','Premium','199','5'),(3,'Ultimate','Ultimate','299','10'),(4,'Pro','Pro','599','15');

/*Table structure for table `tblwebdetails` */

DROP TABLE IF EXISTS `tblwebdetails`;

CREATE TABLE `tblwebdetails` (
  `WebDetailsID` int(11) NOT NULL AUTO_INCREMENT,
  `AccountID` int(11) DEFAULT NULL,
  `SiteID` int(11) DEFAULT NULL,
  PRIMARY KEY (`WebDetailsID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `tblwebdetails` */

insert  into `tblwebdetails`(`WebDetailsID`,`AccountID`,`SiteID`) values (1,1,137244157),(2,2,134990441),(20,20,134990441),(25,12,0),(26,13,137244157),(30,14,137244157),(31,17,137244157),(33,19,0),(34,20,0),(35,21,0),(36,22,0),(37,23,0),(38,24,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
