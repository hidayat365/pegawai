/*
SQLyog Enterprise - MySQL GUI v5.22
Host - 5.5.16 : Database - pegawai
*********************************************************************
Server version : 5.5.16
*/


/*!40101 SET NAMES utf8 */;
/*!40101 SET SQL_MODE=''*/;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*Table structure for table `pegawai` */

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `alamat` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  PRIMARY KEY (`id`)
);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;