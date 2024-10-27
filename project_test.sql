/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - project_test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`project_test` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `project_test`;

/*Table structure for table `banks` */

DROP TABLE IF EXISTS `banks`;

CREATE TABLE `banks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `is_connected` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `banks` */

insert  into `banks`(`id`,`name`,`code`,`is_connected`,`created_at`,`updated_at`) values 
(1,'PT. BANK CIMB NIAGA - (CIMB)','022',0,NULL,NULL),
(2,'PT. BANK CIMB NIAGA UNIT USAHA SYARIAH - (CIMB SYARIAH)','730',0,NULL,NULL),
(3,'PT. BNI SYARIAH','427',0,NULL,NULL),
(4,'PT. BANK BCA SYARIAH','536',0,NULL,NULL),
(5,'PT. BANK BUKOPIN','441',0,NULL,NULL),
(6,'PT. BANK CENTRAL ASIA, TBK - (BCA)','014',0,NULL,NULL),
(7,'PT. BANK DANAMON INDONESIA','011',0,NULL,NULL),
(8,'PT. BANK DKI','111',0,NULL,NULL),
(9,'PT. BANK DBS INDONESIA','046',0,NULL,NULL),
(10,'PT. BANK HSBC INDONESIA','087',0,NULL,NULL),
(11,'PT. BANK MANDIRI (PERSERO), TBK','008',0,NULL,NULL),
(12,'PT. BANK MANDIRI TASPEN POS','564',0,NULL,NULL),
(13,'PT. BANK MAYBANK INDONESIA, TBK','016',0,NULL,NULL),
(14,'PT. BANK MAYORA','553',0,NULL,NULL),
(15,'PT. BANK MEGA, TBK','426',0,NULL,NULL),
(16,'PT. BANK MUAMALAT INDONESIA, TBK','147',0,NULL,NULL),
(17,'PT. BANK NEGARA INDONESIA (PERSERO), TBK (BNI)','009',0,NULL,NULL),
(18,'PT. BANK OCBC NISP, TBK','028',0,NULL,NULL),
(19,'PT. BANK OCBC NISP, TBK UNIT USAHA SYARIAH','731',0,NULL,NULL),
(20,'PT. BANK PERMATA, TBK','013',0,NULL,NULL),
(21,'PT. BANK PERMATA, TBK UNIT USAHA SYARIAH','721',0,NULL,NULL),
(22,'PT. BANK RAKYAT INDONESIA (PERSERO), TBK (BRI)','002',0,NULL,NULL),
(23,'PT. BANK RAKYAT INDONESIA AGRONIAGA, TBK','494',0,NULL,NULL),
(24,'PT. BANK SYARIAH BRI - (BRI SYARIAH)','422',0,NULL,NULL),
(25,'PT. BANK SYARIAH BUKOPIN','521',0,NULL,NULL),
(26,'PT. BANK SYARIAH MANDIRI','451',0,NULL,NULL),
(27,'PT. BANK TABUNGAN NEGARA (PERSERO), TBK (BTN)','200',0,NULL,NULL),
(28,'PT. BANK TABUNGAN NEGARA (PERSERO), TBK UNIT USAHA SYARIAH','723',0,NULL,NULL),
(29,'PT. BANK TABUNGAN PENSIUNAN NASIONAL - (BTPN)','213',0,NULL,NULL),
(30,'PT. BANK TABUNGAN PENSIUNAN NASIONAL SYARIAH - (BTPN Syariah)','547',0,NULL,NULL),
(31,'PT. BANK WOORI SAUDARA INDONESIA 1906, TBK (BWS)','212',0,NULL,NULL),
(32,'PT. BANK JABAR BANTEN SYARIAH','425',0,NULL,NULL),
(33,'PT. BANK PEMBANGUNAN DAERAH BANTEN','137',0,NULL,NULL),
(34,'PT. BANK CAPITAL INDONESIA','054',0,NULL,NULL),
(35,'PT. BANK DKI UNIT USAHA SYARIAH','724',0,NULL,NULL),
(36,'PT. BANK ICBC INDONESIA','164',0,NULL,NULL),
(37,'PT. BANK JTRUST INDONESIA, TBK','095',0,NULL,NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2024_10_27_072256_create_banks_table',1),
(6,'2024_10_27_073852_create_transfers_table',2);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `transfers` */

DROP TABLE IF EXISTS `transfers`;

CREATE TABLE `transfers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bank_id` bigint(20) unsigned NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `type` enum('inhouse','online') NOT NULL,
  `currency` enum('IDR','USD') NOT NULL,
  `amount` double(15,2) NOT NULL,
  `status` enum('pending','completed','failed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transfers_bank_id_foreign` (`bank_id`),
  CONSTRAINT `transfers_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transfers` */

insert  into `transfers`(`id`,`bank_id`,`account_number`,`type`,`currency`,`amount`,`status`,`created_at`,`updated_at`) values 
(1,7,'9788432098','online','IDR',2000000.00,'completed',NULL,NULL),
(2,1,'5004455322','online','IDR',3500000.00,'completed',NULL,NULL),
(3,2,'7608788344','inhouse','IDR',600000.00,'completed',NULL,NULL),
(4,3,'83884545123','online','IDR',200000.00,'completed',NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
