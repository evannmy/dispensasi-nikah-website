/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.5.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: dispensasi_nikah
-- ------------------------------------------------------
-- Server version	11.5.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `data_istri`
--

DROP TABLE IF EXISTS `data_istri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_istri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Hindu','Buddha','Konghucu','Kepercayaan Terhadap Tuhan YME') DEFAULT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_kawin` enum('Belum Kawin','Kawin','Cerai Hidup','Cerai Mati') DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_istri`
--

LOCK TABLES `data_istri` WRITE;
/*!40000 ALTER TABLE `data_istri` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_istri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_pemohon`
--

DROP TABLE IF EXISTS `data_pemohon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_pemohon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_suami` int(11) NOT NULL,
  `id_istri` int(11) NOT NULL,
  `id_waktu_pernikahan` int(11) NOT NULL,
  `tanggal_pengajuan` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_id_suami` (`id_suami`),
  KEY `fk_id_istri` (`id_istri`),
  KEY `fk_id_waktu_pernikahan` (`id_waktu_pernikahan`),
  CONSTRAINT `fk_id_istri` FOREIGN KEY (`id_istri`) REFERENCES `data_istri` (`id`),
  CONSTRAINT `fk_id_suami` FOREIGN KEY (`id_suami`) REFERENCES `data_suami` (`id`),
  CONSTRAINT `fk_id_waktu_pernikahan` FOREIGN KEY (`id_waktu_pernikahan`) REFERENCES `waktu_pernikahan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_pemohon`
--

LOCK TABLES `data_pemohon` WRITE;
/*!40000 ALTER TABLE `data_pemohon` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_pemohon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_suami`
--

DROP TABLE IF EXISTS `data_suami`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_suami` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Hindu','Buddha','Konghucu','Kepercayaan Terhadap Tuhan YME') DEFAULT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_kawin` enum('Belum Kawin','Kawin','Cerai Hidup','Cerai Mati') DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_suami`
--

LOCK TABLES `data_suami` WRITE;
/*!40000 ALTER TABLE `data_suami` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_suami` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nomor_surat`
--

DROP TABLE IF EXISTS `nomor_surat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nomor_surat` (
  `nomor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nomor_surat`
--

LOCK TABLES `nomor_surat` WRITE;
/*!40000 ALTER TABLE `nomor_surat` DISABLE KEYS */;
INSERT INTO `nomor_surat` VALUES
('474.2/1/438.7.18/2024');
/*!40000 ALTER TABLE `nomor_surat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttd`
--

DROP TABLE IF EXISTS `ttd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttd` (
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `NIP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttd`
--

LOCK TABLES `ttd` WRITE;
/*!40000 ALTER TABLE `ttd` DISABLE KEYS */;
INSERT INTO `ttd` VALUES
('SUYONO,S.SOS.','Kassubag Umum dan Kepegawaian','Penata Muda','196807102007011039');
/*!40000 ALTER TABLE `ttd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'admin','adminporong');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `waktu_pernikahan`
--

DROP TABLE IF EXISTS `waktu_pernikahan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waktu_pernikahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jum''at','Sabtu','Minggu') DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tempat` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `waktu_pernikahan`
--

LOCK TABLES `waktu_pernikahan` WRITE;
/*!40000 ALTER TABLE `waktu_pernikahan` DISABLE KEYS */;
/*!40000 ALTER TABLE `waktu_pernikahan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2024-11-12 20:52:13
