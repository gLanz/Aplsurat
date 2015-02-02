/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.24-log : Database - db_aplsurat
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `co_account` */

DROP TABLE IF EXISTS `co_account`;

CREATE TABLE `co_account` (
  `acc_id` int(10) NOT NULL AUTO_INCREMENT,
  `acc_user` varchar(35) NOT NULL,
  `acc_pass` varchar(35) NOT NULL,
  `acc_nama` varchar(100) NOT NULL,
  `level` int(3) NOT NULL,
  `acc_hits` int(10) NOT NULL,
  `acc_notes` varchar(100) NOT NULL,
  `acc_group` varchar(30) NOT NULL,
  `acc_created` int(15) NOT NULL,
  `acc_lastupdate` int(15) NOT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=85051 DEFAULT CHARSET=latin1;

/*Data for the table `co_account` */

LOCK TABLES `co_account` WRITE;

insert  into `co_account`(`acc_id`,`acc_user`,`acc_pass`,`acc_nama`,`level`,`acc_hits`,`acc_notes`,`acc_group`,`acc_created`,`acc_lastupdate`) values (13696,'admin','827ccb0eea8a706c4c34a16891f84e7b','Administrator',1,0,'-','Super Administrator',1361211246,1361211246),(35039,'faber','827ccb0eea8a706c4c34a16891f84e7b','Faber Nainggolan',1,0,'-','Super Administrator',1361211450,1361211486),(36105,'cs1','827ccb0eea8a706c4c34a16891f84e7b','Natalia S',2,0,'-','ADM',1361211328,1374143155),(37272,'cs2','827ccb0eea8a706c4c34a16891f84e7b','Japar Agus',2,0,'Custumer Service 2','ADM',1361211389,1374143014),(66484,'panitera1','827ccb0eea8a706c4c34a16891f84e7b','Sri Wahyuni P',2,0,'-','Panitera',1374142203,1394776876),(51177,'cs5','827ccb0eea8a706c4c34a16891f84e7b','Alfindo',3,0,'Admin dibagian umum','ADM',1374143286,1394774736),(52256,'cs3','827ccb0eea8a706c4c34a16891f84e7b','Suprapto',4,0,'Admin Bagian Pidana','ADM',1377598946,1394776953),(85050,'','827ccb0eea8a706c4c34a16891f84e7b','',2,0,'','',1377598991,1394777019);

UNLOCK TABLES;

/*Table structure for table `co_account_access` */

DROP TABLE IF EXISTS `co_account_access`;

CREATE TABLE `co_account_access` (
  `accessID` int(11) NOT NULL AUTO_INCREMENT,
  `acc_id` int(11) NOT NULL DEFAULT '0',
  `action_1` int(1) NOT NULL DEFAULT '0',
  `action_2` int(1) NOT NULL DEFAULT '0',
  `action_3` int(1) NOT NULL DEFAULT '0',
  `action_4` int(1) NOT NULL DEFAULT '0',
  `action_5` int(1) NOT NULL DEFAULT '0',
  `action_6` int(1) NOT NULL DEFAULT '0',
  `action_7` int(1) NOT NULL DEFAULT '0',
  `action_8` int(11) DEFAULT '0',
  `action_9` int(11) DEFAULT '0',
  `action_10` int(11) DEFAULT '0',
  `action_11` int(11) DEFAULT '0',
  `action_12` int(11) DEFAULT '0',
  `deleted` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`accessID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `co_account_access` */

LOCK TABLES `co_account_access` WRITE;

insert  into `co_account_access`(`accessID`,`acc_id`,`action_1`,`action_2`,`action_3`,`action_4`,`action_5`,`action_6`,`action_7`,`action_8`,`action_9`,`action_10`,`action_11`,`action_12`,`deleted`) values (1,1,1,1,1,1,1,1,1,1,1,1,1,1,'N'),(2,2,0,1,0,0,1,1,1,1,0,1,1,0,'N'),(3,3,0,1,0,0,1,1,1,0,1,1,1,0,'N'),(4,4,0,1,0,0,1,1,1,0,0,1,1,0,'N'),(5,5,0,1,0,1,1,1,1,0,0,1,1,0,'N'),(6,6,0,1,0,0,1,1,1,0,0,1,1,0,'N'),(7,7,0,1,0,0,1,1,1,0,0,1,1,0,'N');

UNLOCK TABLES;

/*Table structure for table `co_logacces` */

DROP TABLE IF EXISTS `co_logacces`;

CREATE TABLE `co_logacces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logName` varchar(30) NOT NULL DEFAULT '',
  `logIP` varchar(30) DEFAULT NULL,
  `logTime` int(13) NOT NULL DEFAULT '0',
  `logUrl` varchar(50) DEFAULT NULL,
  `logAction` varchar(15) DEFAULT NULL,
  `logDesc` text,
  `logUser` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=459 DEFAULT CHARSET=latin1;

/*Data for the table `co_logacces` */

LOCK TABLES `co_logacces` WRITE;

insert  into `co_logacces`(`id`,`logName`,`logIP`,`logTime`,`logUrl`,`logAction`,`logDesc`,`logUser`) values (458,'','::1',1401852786,'/app.simsurat/adminR','LOGIN','Login Sukses [username : Administrator]','Administrator'),(457,'','::1',1401852776,'/app.simsurat/adminR','ERROR','ERROR - Username dan atau password Anda salah ! [username:admin]','HostName:gogo'),(456,'','::1',1401852747,'/app.simsurat/adminR','ERROR','ERROR - Username dan atau password Anda salah ! [username:admin]','HostName:gogo'),(455,'','::1',1401852738,'/app.simsurat/views/admin/logout.php','LOGOUT','LOGOUT Berhasil ! [username: faber]','Faber Nainggolan'),(454,'','::1',1401677921,'/app.simsurat/adminR','LOGIN','Login Sukses [username : Faber Nainggolan]','Faber Nainggolan'),(453,'','::1',1401677914,'/app.simsurat/adminR','ERROR','ERROR - Username dan atau password Anda salah ! [username:admin]','HostName:gogo'),(452,'','::1',1397180903,'/app.simsurat/views/admin/logout.php','LOGOUT','LOGOUT Berhasil ! [username: faber]','Faber Nainggolan'),(451,'','::1',1397140192,'/app.simsurat/adminR','LOGIN','Login Sukses [username : Suprapto]','Suprapto'),(450,'','::1',1397140184,'/app.simsurat/views/admin/logout.php','LOGOUT','LOGOUT Berhasil ! [username: faber]','Faber Nainggolan'),(449,'','::1',1397140138,'/app.simsurat/adminR','LOGIN','Login Sukses [username : Faber Nainggolan]','Faber Nainggolan'),(448,'','::1',1397140128,'/app.simsurat/adminR','ERROR','ERROR - Username dan atau password Anda salah ! [username:faber]','HostName:gogo'),(447,'','::1',1397139778,'/app.simsurat/adminR','LOGIN','Login Sukses [username : Faber Nainggolan]','Faber Nainggolan'),(446,'','::1',1397139769,'/app.simsurat/adminR','ERROR','ERROR - Username dan atau password Anda salah ! [username:admin]','HostName:gogo'),(445,'','::1',1397100031,'/app.simsurat/adminR','LOGIN','Login Sukses [username : Faber Nainggolan]','Faber Nainggolan'),(444,'','::1',1394777223,'/app.simsurat/views/admin/coproses.php','UPDATE','Acces Akun berhasil ditambah.','Faber Nainggolan'),(443,'','::1',1394777144,'/app.simsurat/adminR','LOGIN','Login Sukses [username : Faber Nainggolan]','Faber Nainggolan'),(442,'','::1',1394777136,'/app.simsurat/views/admin/logout.php','LOGOUT','LOGOUT Berhasil ! [username: cs1]','Natalia S'),(441,'','::1',1394777049,'/app.simsurat/adminR','LOGIN','Login Sukses [username : Natalia S]','Natalia S'),(440,'','::1',1394777041,'/app.simsurat/views/admin/logout.php','LOGOUT','LOGOUT Berhasil ! [username: faber]','Faber Nainggolan'),(439,'','::1',1394776943,'/app.simsurat/views/admin/coproses.php','UPDATE','Akun berhasil dihapus. [52256 ]','Faber Nainggolan'),(438,'','::1',1394776876,'/app.simsurat/views/admin/coproses.php','UPDATE','Akun berhasil dihapus. [66484 ]','Faber Nainggolan'),(437,'','::1',1394774736,'/app.simsurat/views/admin/coproses.php','UPDATE','Akun berhasil dihapus. [51177 ]','Faber Nainggolan'),(436,'','::1',1394774641,'/app.simsurat/views/admin/coproses.php','UPDATE','Akun berhasil dihapus. [66484 ]','Faber Nainggolan'),(435,'','::1',1394774596,'/app.simsurat/views/admin/coproses.php','UPDATE','Akun berhasil dihapus. [66484 ]','Faber Nainggolan'),(434,'','::1',1394768312,'/app.simsurat/views/admin/coproses.php','DELETE','Surat Keluar berhasil dihapus. [11]','Faber Nainggolan'),(433,'','::1',1394768303,'/app.simsurat/views/admin/coproses.php','DELETE','Surat Keluar berhasil dihapus. [19]','Faber Nainggolan'),(432,'','::1',1394768293,'/app.simsurat/views/admin/coproses.php','DELETE','Surat Keluar berhasil dihapus. [15]','Faber Nainggolan'),(431,'','::1',1394768284,'/app.simsurat/views/admin/coproses.php','DELETE','Surat Keluar berhasil dihapus. [16]','Faber Nainggolan'),(430,'','::1',1394768275,'/app.simsurat/views/admin/coproses.php','DELETE','Surat Keluar berhasil dihapus. [18]','Faber Nainggolan'),(429,'','::1',1394768267,'/app.simsurat/views/admin/coproses.php','DELETE','Surat Keluar berhasil dihapus. [14]','Faber Nainggolan'),(428,'','::1',1394766656,'/app.simsurat/views/admin/coproses.php','ADD','Surat Berhasil ditambah','Faber Nainggolan'),(427,'','::1',1394766223,'/app.simsurat/adminR','LOGIN','Login Sukses [username : Faber Nainggolan]','Faber Nainggolan'),(426,'','::1',1394160637,'/apl-notaris/views/admin/logout.php','LOGOUT','LOGOUT Berhasil ! [username: admin]','Administrator'),(425,'','::1',1394160469,'/apl-notaris/adminR','LOGIN','Login Sukses [username : Administrator]','Administrator'),(424,'','::1',1393433632,'/app.simsurat/views/admin/coproses.php','UPDATE','Surat Berhasil di perbaharui','Faber Nainggolan'),(423,'','::1',1393433611,'/app.simsurat/adminR','LOGIN','Login Sukses [username : Faber Nainggolan]','Faber Nainggolan'),(422,'','::1',1393217149,'/app.simsurat/views/admin/coproses.php','UPDATE','Surat Berhasil di perbaharui','Administrator'),(419,'','::1',1393213640,'/app.simsurat/adminR','LOGIN','Login Sukses [username : Administrator]','Administrator'),(420,'','::1',1393213707,'/app.simsurat/views/admin/coproses.php','ADD','Surat Berhasil ditambah','Administrator'),(421,'','::1',1393213782,'/app.simsurat/views/admin/coproses.php','ADD','Surat Berhasil ditambah','Administrator');

UNLOCK TABLES;

/*Table structure for table `co_parameter` */

DROP TABLE IF EXISTS `co_parameter`;

CREATE TABLE `co_parameter` (
  `name` varchar(50) NOT NULL DEFAULT '0',
  `id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL DEFAULT '',
  `groups` varchar(50) NOT NULL DEFAULT '',
  `notes` varchar(100) DEFAULT NULL,
  `deleted` char(1) NOT NULL DEFAULT 'N',
  `dt_created` int(11) unsigned NOT NULL DEFAULT '0',
  `by_created` int(3) unsigned NOT NULL DEFAULT '0',
  `dt_updated` int(11) unsigned DEFAULT NULL,
  `by_updated` int(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`name`,`id`),
  KEY `description` (`description`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `co_parameter` */

LOCK TABLES `co_parameter` WRITE;

insert  into `co_parameter`(`name`,`id`,`description`,`groups`,`notes`,`deleted`,`dt_created`,`by_created`,`dt_updated`,`by_updated`) values ('jenis_kirim',1,'TIKI','jekir','Jenis Pengiriman dengan TIKI','N',0,0,1376629817,1),('jenis_kirim',2,'JNE','jekir','Jenis Pengiriman dengan JNE','N',0,0,1376629800,1),('jenis_kirim',3,'BIASA','jekir','Jenis Pengiriman Biasa','N',0,0,1376629784,NULL),('pengirim',1,'Agus','kirim','Nama 1','N',0,0,1380912136,NULL),('pengirim',2,'Ceryl Sumang','kirim','Ceryl Sumang','N',0,0,1380912166,NULL),('pengirim',3,'Sutisna Bakors','kirim','-','N',0,0,1380912180,1),('pengirim',4,'Aminah Siti','kirim','Bagian Panitera','N',0,0,1380912188,1),('pengirim',5,'Andi P Lumbun','kirim','Bagian Umum','N',0,0,1380912201,1),('bagian',1,'PANSEK','sub_bidang','Bagian PANSEK','N',0,0,1376884211,1),('bagian',2,'PANITERA MUDA PERDATA','sub_bidang','Bagian Panitera Muda Perdata','N',0,0,1376884222,NULL),('bagian',3,'PANITERA MUDA PIDANA','sub_bidang','Bagian Panitera Muda Pidana','N',0,0,1376884234,NULL),('bagian',4,'PANITERA MUDA HUKUM','sub_bidang','Jl.','N',0,0,1247890637,2),('bagian',5,'BAGIAN KEUANGAN','sub_bidang','Jl. Medan','N',0,0,1246950308,1),('bagian',6,'BAGIAN UMUM','sub_bidang','Sub Bagian Umum pada Pengadialan Tinggi Medan','N',0,0,1376630993,1),('pengirim',6,'Qyera Awan','kirim','Bagian Hukum','N',0,0,1380912216,32),('user_level',3,'Bagian Umum','akun','Sub Bagian Umum','N',1358149577,0,1377660911,NULL),('user_level',1,'Master Admin','akun','Master dari semua sub admin','N',0,0,1377595028,NULL),('user_level',2,'Pansek','akun','Bagian Panitera Sekretaris','N',0,0,1394777223,NULL),('user_level',5,'Panitera Perdata','akun','Kepaniteraan Perdata','N',1376497432,0,1377595107,NULL),('user_level',4,'Panitera Pidana','akun','Kepaniteraan Pidana','N',1376497510,0,1377660906,NULL),('jenis_kirim',4,'EXPESS','jekir','Jenis Pengiriman dengan Express','N',1376629397,0,1376629837,NULL),('user_level',6,'Hakim','akun','Acces untuk hakim','N',1377594627,0,1377660902,NULL),('user_level',7,'Panitera Hukum','akun','Bagian panitera hukum','N',1377594852,0,1377660897,NULL);

UNLOCK TABLES;

/*Table structure for table `co_setconfig` */

DROP TABLE IF EXISTS `co_setconfig`;

CREATE TABLE `co_setconfig` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `client_nama` varchar(150) DEFAULT NULL,
  `client_nama2` varchar(150) DEFAULT NULL,
  `client_copy` varchar(50) DEFAULT NULL,
  `client_desain` varchar(50) DEFAULT NULL,
  `client_metatitel` varchar(100) DEFAULT NULL,
  `client_metadesc` varchar(100) DEFAULT NULL,
  `client_metakey` varchar(100) DEFAULT NULL,
  `client_year` char(4) DEFAULT NULL,
  `client_ico` varchar(30) DEFAULT NULL,
  `client_email` varchar(40) DEFAULT NULL,
  `client_logo` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `co_setconfig` */

LOCK TABLES `co_setconfig` WRITE;

insert  into `co_setconfig`(`id`,`client_nama`,`client_nama2`,`client_copy`,`client_desain`,`client_metatitel`,`client_metadesc`,`client_metakey`,`client_year`,`client_ico`,`client_email`,`client_logo`) values (1,'AUTO 2000 Gatot Subroto','Monitoring Delivery Control Board','Piranti Persada','Piranti Persada','Home Profile, Web Profile','Website Home Profile','Website, Home, Medan','2013','20605ico1367260801.jpg','test@yahoo.com','20605logo1367260801.jpg');

UNLOCK TABLES;

/*Table structure for table `co_statussurat` */

DROP TABLE IF EXISTS `co_statussurat`;

CREATE TABLE `co_statussurat` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `idsurat` int(5) DEFAULT NULL,
  `acc_id` int(10) DEFAULT NULL,
  `noagenda` varchar(30) DEFAULT NULL,
  `tglditerima` date DEFAULT NULL,
  `tgldisposisi` date DEFAULT NULL,
  `isidisposisi` text,
  `pendisposisi` varchar(30) DEFAULT NULL,
  `tindaklanjut` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `co_statussurat` */

LOCK TABLES `co_statussurat` WRITE;

insert  into `co_statussurat`(`id`,`idsurat`,`acc_id`,`noagenda`,`tglditerima`,`tgldisposisi`,`isidisposisi`,`pendisposisi`,`tindaklanjut`) values (4,2,35039,'09/99912/9992','2014-03-14','2014-03-14','Makan','Ketua ','Siap dilaksanakan'),(5,0,35039,'09/99912/9992','2014-04-10','2014-04-10','Lanjutkan','Ketua','Segera dibahas di rapat mendatang'),(6,0,13696,'10/PT/2014/SK','2014-06-04','2014-06-04','Isi','Mendisposisi','Segera');

UNLOCK TABLES;

/*Table structure for table `co_suratkeluar` */

DROP TABLE IF EXISTS `co_suratkeluar`;

CREATE TABLE `co_suratkeluar` (
  `idsuke` int(10) NOT NULL AUTO_INCREMENT,
  `sk_tglterima` date DEFAULT NULL,
  `sk_noagenda` varchar(40) DEFAULT NULL,
  `sk_tglkeluar` date DEFAULT NULL,
  `sk_tglkirim` date DEFAULT NULL,
  `sk_pengirim` varchar(35) DEFAULT NULL,
  `sk_penyerah` varchar(30) DEFAULT NULL,
  `sk_penerima` varchar(30) DEFAULT NULL,
  `sk_jeniskirim` varchar(25) DEFAULT NULL,
  `sk_noresi` varchar(50) DEFAULT NULL,
  `sk_tglresi` date DEFAULT NULL,
  `sk_bagian` int(5) DEFAULT NULL,
  `sk_perihal` text,
  `sk_filesurat` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`idsuke`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `co_suratkeluar` */

LOCK TABLES `co_suratkeluar` WRITE;

insert  into `co_suratkeluar`(`idsuke`,`sk_tglterima`,`sk_noagenda`,`sk_tglkeluar`,`sk_tglkirim`,`sk_pengirim`,`sk_penyerah`,`sk_penerima`,`sk_jeniskirim`,`sk_noresi`,`sk_tglresi`,`sk_bagian`,`sk_perihal`,`sk_filesurat`) values (1,'0000-00-00','09:00 - 09:10','0000-00-00','2009-10-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'2013-09-05','10/PT/2014/SK','2013-09-19','2013-09-19','Qyera Awan','ab','10/PT/2014/SK','BIASA','abc','2013-09-19',2,'aa bbb',NULL),(13,'0000-00-00','11:00 - 11:10','0000-00-00','2011-10-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'2013-09-17','A/06/2013/07','2013-09-10','2013-09-03','Ceryl Sumang','Ag','A/06/2013/07','TIKI','123-34454','2013-09-24',6,'adf sgs adf',NULL);

UNLOCK TABLES;

/*Table structure for table `co_suratkembali` */

DROP TABLE IF EXISTS `co_suratkembali`;

CREATE TABLE `co_suratkembali` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nosurat` varchar(30) DEFAULT NULL,
  `alasankembali` text,
  `tindaklanjut` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `co_suratkembali` */

LOCK TABLES `co_suratkembali` WRITE;

UNLOCK TABLES;

/*Table structure for table `co_suratmasuk` */

DROP TABLE IF EXISTS `co_suratmasuk`;

CREATE TABLE `co_suratmasuk` (
  `idsurat` int(5) NOT NULL AUTO_INCREMENT,
  `tglmasuk_su` date DEFAULT NULL,
  `perihal_su` text,
  `asal_su` varchar(30) DEFAULT NULL,
  `tujuan_su` varchar(30) DEFAULT NULL,
  `penerima_su` varchar(30) DEFAULT NULL,
  `no_agendasurat` varchar(20) DEFAULT NULL,
  `tglcreate` int(16) DEFAULT NULL,
  `nosurat_su` varchar(20) DEFAULT NULL,
  `filesurat_su` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idsurat`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `co_suratmasuk` */

LOCK TABLES `co_suratmasuk` WRITE;

insert  into `co_suratmasuk`(`idsurat`,`tglmasuk_su`,`perihal_su`,`asal_su`,`tujuan_su`,`penerima_su`,`no_agendasurat`,`tglcreate`,`nosurat_su`,`filesurat_su`) values (1,'2014-02-24','Selamat','Keuangan','Pemko','Ade','10/PT/2014/SK',1393213782,'001/08/2013/Pemko',NULL),(2,'2014-03-14','Merdeka','Pemko Medan','Ketua','Ade','09/99912/9992',1394766656,'91/PTMDN/LOP',NULL);

UNLOCK TABLES;

/*Table structure for table `co_update` */

DROP TABLE IF EXISTS `co_update`;

CREATE TABLE `co_update` (
  `id` int(1) DEFAULT NULL,
  `update_field` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `co_update` */

LOCK TABLES `co_update` WRITE;

insert  into `co_update`(`id`,`update_field`) values (1,'1');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
