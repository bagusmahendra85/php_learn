-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: phplearn
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `list_banjar`
--

DROP TABLE IF EXISTS `list_banjar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `list_banjar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_banjar` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_banjar` (`nama_banjar`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `list_banjar`
--

LOCK TABLES `list_banjar` WRITE;
/*!40000 ALTER TABLE `list_banjar` DISABLE KEYS */;
INSERT INTO `list_banjar` VALUES (10,'Alangkajeng'),(1,'Batu'),(11,'Delod Bale Agung'),(2,'Gambang'),(8,'Lebah Pangkung'),(4,'Munggu'),(3,'Pande'),(5,'Pandean'),(9,'Pengiasan'),(7,'Peregae'),(6,'Serangan');
/*!40000 ALTER TABLE `list_banjar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penduduk`
--

DROP TABLE IF EXISTS `penduduk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penduduk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` char(16) DEFAULT NULL,
  `nomor_kk` char(16) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `banjar` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penduduk`
--

LOCK TABLES `penduduk` WRITE;
/*!40000 ALTER TABLE `penduduk` DISABLE KEYS */;
INSERT INTO `penduduk` VALUES (1,'5103022810010002','5103022005140009','I GUSTI AYU ADINDA SINTA OKTAVIANI','PEREMPUAN','ALANGKAJENG','MENGWI','2001-10-28','igustiayua228100@mengwi.desa.id','igustiay.jpeg'),(2,'5103023112560008','5103022911200005','NI MADE SARI','PEREMPUAN','BATU','MENGWI','1956-12-31','nimadesari231125@mengwi.desa.id','nimadesa.jpeg'),(3,'5103021710690006','5103021804200001','I MADE OKA PUSPA','LAKI-LAKI','PANDE','MENGWI','1969-10-17','imadeokapu217106@mengwi.desa.id','imadeoka.jpeg'),(4,'5103023107020007','5103023011100003','ANAK AGUNG KUSUMA JAYAN','LAKI-LAKI','PANDE','MOJOKERTO','2002-07-31','anakagungk231070@mengwi.desa.id','anakagun.jpeg'),(5,'5103021903820002','5103022311220003','NI LUH PUTU KARTINI','PEREMPUAN','DELOD BALE AGUNG','MUNGGU','1982-03-19','niluhputuk219038@mengwi.desa.id','niluhput.jpeg'),(6,'5103020105940009','5103022608200009','I GUSTI AGUNG MAS PUTRI SUSANTI','PEREMPUAN','MUNGGU','NEGARA','1994-05-01','igustiagun201059@mengwi.desa.id','igustiag.jpeg'),(7,'5103020407790005','5103022801190005','NI WAYAN KERTIYANI','PEREMPUAN','PANDE','NUSA PENIDA','1979-07-04','niwayanker204077@mengwi.desa.id','niwayank.jpeg'),(8,'5103021812730004','5103020705170004','FRANSISKA REGINA SARU','PEREMPUAN','SERANGAN','PAGAL','1973-12-18','fransiskar218127@mengwi.desa.id','fransisk.jpeg'),(9,'5103020806890008','5103021507210007','PUTU SANTIKA NARENDRA','LAKI-LAKI','LEBAH PANGKUNG','PALEMBANG','1989-06-08','putusantik208068@mengwi.desa.id','putusant.jpeg'),(10,'5103021010650002','5103022305150008','RATNA SURYA','PEREMPUAN','PENGIASAN','PALEMBANG','1965-10-10','ratnasurya210106@mengwi.desa.id','ratnasur.jpeg'),(11,'5103020308450009','5103020502220004','I WAYAN KERUK','LAKI-LAKI','GAMBANG','PAYANGAN','1945-08-03','iwayankeru203084@mengwi.desa.id','iwayanke.jpeg'),(12,'5103020301770007','5103021501140003','NI WAYAN PURI','PEREMPUAN','LEBAH PANGKUNG','PAYANGAN','1977-01-03','niwayanpur203017@mengwi.desa.id','niwayanp.jpeg'),(13,'5103020601750003','5103022702110005','I GUSTI AGUNG ALIT ASTINI','PEREMPUAN','ALANGKAJENG','POHSANTEN','1975-01-06','igustiagun206017@mengwi.desa.id','igustiag.jpeg'),(14,'5103022506920008','5103021107170003','GEDE TONY ARIMBAWA','LAKI-LAKI','PEREGAE','SEKUMPUL','1992-06-25','gedetonyar225069@mengwi.desa.id','gedetony.jpeg'),(15,'5103021011990004','5103021404100002','NI MADE NOVIANI','PEREMPUAN','DELOD BALE AGUNG','SEMBUNG','1999-11-10','nimadenovi210119@mengwi.desa.id','nimadeno.jpeg'),(16,'5103020805960008','5103020405140015','I GST NGR BAGUS PUTRA MAHENDRA YASA','LAKI-LAKI','ALANGKAJENG','MENGWI','1996-05-08','pmahendrayasa27@gmail.com','65c9bb63b7560.png'),(18,'5103020302210006','5103020405140015','I GUSTI BAGUS KADEK KUSUMA NEGARA','LAKI-LAKI','ALANGKAJENG','MENGWI','2021-02-03','steve_online@live.com','65c9bb5c807ac.png'),(22,'5103025805960002','5103020405140015','NI KOMANG URMILA DEWI','PEREMPUAN','ALANGKAJENG','DENPASAR','1996-05-18','urmiladewi18@gmail.com','65c9b2c980219.png');
/*!40000 ALTER TABLE `penduduk` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-12 15:20:42
