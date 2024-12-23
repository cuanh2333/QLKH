-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: shop_system
-- ------------------------------------------------------
-- Server version	8.0.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `posting_date` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Nguyễn Văn Anh','nguyenvana','nguyenvananh@example.com','123456','0901234567','Nam','Hà Nội',1,'2024-11-28','default_male.jpg','user'),(2,'Trần Thị Bình','tranthib','tranthib@example.com','abcdef','0912345678','Nữ','Hồ Chí Minh',1,'2024-11-28','5.jpg','user'),(3,'Nguyễn Quý Hùng','nguyenquyh','leminhc@example.com','qwerty','0923456789','Nam','Đà Nẵng',1,'2024-11-28','4.jpg','user'),(4,'Phạm Lan Diệu','phamland','phamland@example.com','zxcvbn','0934567890','Nữ','Cần Thơ',1,'2024-11-28','default_female.jpg','user'),(5,'Lại Duy Hải','laiduyh','vuquange@example.com','password123','0945678901','Nam','Nha Trang',1,'2024-11-28','3.jpg','user'),(6,'Đỗ Bích Phương','dobichf','dobichf@example.com','abc123','0956789012','Nữ','Hải Phòng',1,'2024-11-28','default_female.jpg','user'),(7,'Ngô Quỳnh Giao','ngoquynhg','ngoquynhg@example.com','qazwsx','0967890123','Nữ','Quảng Ninh',1,'2024-11-28','default_female.jpg','user'),(8,'Mai Hữu Hậu','maihuh','maihuh@example.com','ytrewq','0978901234','Nam','Bình Dương',1,'2024-11-28','default_male.jpg','user'),(9,'Hồ Thanh In','hothanhi','hothanhi@example.com','abcxyz','0989012345','Nam','Đắk Lắk',1,'2024-11-28','default_male.jpg','user'),(10,'Cao Hồng Nhật','caohongj','caohongj@example.com','123abc','0990123456','Nữ','Vũng Tàu',1,'2024-11-28','default_female.jpg','user'),(11,'Quản Trị Viên','admin','admin1@gmail.com','admin123','0987654345','Nam','Vĩnh Phúc',1,'2024-11-24','default_male.jpg','admin'),(12,'Trần Thị Lan','tranthilan','tranthilan@example.com','password123','0902345678','Nữ','Hà Nội',1,'2024-11-29','default_female.jpg','user'),(13,'Lê Minh Hoàng','leminhhoang','leminhhoang@example.com','password123','0903456789','Nam','TP.HCM',1,'2024-11-29','default_male.jpg','user'),(14,'Phạm Thuỳ Dương','phamthuynduong','phamthuynduong@example.com','password123','0904567890','Nữ','Đà Nẵng',1,'2024-11-29','default_female.jpg','user'),(15,'Nguyễn Thị Mai','nguyenthimai','nguyenthimai@example.com','password123','0905678901','Nữ','Hải Phòng',1,'2024-11-29','default_female.jpg','user'),(16,'Đỗ Thành Công','dothanhcong','dothanhcong@example.com','password123','0906789012','Nam','Hà Nội',1,'2024-11-29','default_male.jpg','user'),(17,'Vũ Thuỳ Linh','vuthuylinh','vuthuylinh@example.com','password123','0907890123','Nữ','TP.HCM',1,'2024-11-29','default_female.jpg','user'),(18,'Nguyễn Phúc Hưng','nguyenphuchung','nguyenphuchung@example.com','password123','0908901234','Nam','Hà Nội',1,'2024-11-29','default_male.jpg','user'),(19,'Trần Thị Lệ','tranthile','tranthile@example.com','password123','0909012345','Nữ','Cần Thơ',1,'2024-11-29','default_female.jpg','user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-23 10:48:26
