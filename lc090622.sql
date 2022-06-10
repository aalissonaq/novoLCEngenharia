-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: lc
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

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
-- Table structure for table `identification`
--

DROP TABLE IF EXISTS `identification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `identification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fantasy_name` varchar(100) NOT NULL,
  `slogan` varchar(190) DEFAULT NULL,
  `icon` varchar(190) DEFAULT NULL,
  `logo` varchar(190) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identification`
--

LOCK TABLES `identification` WRITE;
/*!40000 ALTER TABLE `identification` DISABLE KEYS */;
INSERT INTO `identification` VALUES (1,'LC Engenharia','Entre nesse Geração','logo-fold.png','logo.png','2021-12-08 13:25:01');
/*!40000 ALTER TABLE `identification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `person` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(190) COLLATE utf8mb4_general_ci NOT NULL,
  `social_name` varchar(190) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `personal_document` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `type_person` enum('pj','pf') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birth` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `street` varchar(190) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `number_address` varchar(6) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `complement_address` varchar(190) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `neighborhood` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cell_phone_number` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_whatsapp` tinyint DEFAULT NULL,
  `email` varchar(190) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avatar` varchar(190) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES (1,'Administrador Root',NULL,'99999999999',NULL,'01/01/2022','R. Loudes Vitória','830','Próximo a UFCA','Cidade Universitaria','Juazeiro do Norte','CE','63040280','(88) 2155-0550','(88) 9.9696-5764',1,'adminstrador@gmail.com','root.jpg',0,'2022-02-18 03:26:39'),(14,'Alisson Almeida',NULL,'00299304302',NULL,NULL,'Lourdes  victoria','830','','cidade universitaria','Juazeiro do Norte','ce','63048-240','(99) 99999-9999','(88) 99696-5764',1,'aalissonalmeidaq@gmail.com','',4,'2022-03-12 01:40:33'),(20,'ANTONIA C V Batista',NULL,'12121212121','pj',NULL,'Rua das Laranjeiras','12','','Cajuína São Geraldo','Juazeiro do Norte','CE','63022-050','(56) 46546-5465','(12) 31232-1312',0,'camila@gmail.com',NULL,4,NULL);
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_person_responsable` int DEFAULT NULL,
  `id_type_project` int DEFAULT NULL,
  `id_person_client` int DEFAULT NULL,
  `title` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `decription` longtext COLLATE utf8mb4_general_ci,
  `states` enum('create','in progress','suspended','cancel') COLLATE utf8mb4_general_ci DEFAULT 'create',
  `deadline` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (2,'e0e420a9-b83f-4a17-abba-97be7a352f44',1,1,14,'teste de projeto','Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.','create','2022-03-29','2022-03-29 08:49:25'),(3,'35b2a081-50f5-4153-9891-13811ba9e602',1,1,1,'teste de projeto','isso é um teste','cancel','2022-03-29','2022-03-29 08:49:41'),(4,'35b2a081-50f5-4153-9891-13811ba9e603',1,1,1,'teste de projeto','isso é um teste','in progress','2022-03-29','2022-03-29 08:50:00'),(5,'cbc10635-a095-4a67-962a-8a6b19482060',1,2,1,'isso é um novo teste','estamos testando novamente','suspended','2022-03-29','2022-03-29 09:00:23'),(6,'a3db649c-1df8-46ce-a4d5-a6e5ff39c72b',1,2,1,'outro teste','Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.','create','2022-03-29','2022-03-29 09:33:37');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types_project`
--

DROP TABLE IF EXISTS `types_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `types_project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(190) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types_project`
--

LOCK TABLES `types_project` WRITE;
/*!40000 ALTER TABLE `types_project` DISABLE KEYS */;
INSERT INTO `types_project` VALUES (1,'Energia Solar'),(2,'Iluminação Publica');
/*!40000 ALTER TABLE `types_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_person` int NOT NULL,
  `user_level` int NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint DEFAULT '1',
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,0,'21232f297a57a5a743894a0e4a801fc3',1,'2022-02-18 03:16:57'),(3,14,4,'17d706c1784400f5a4a4f1afa1975184',1,'2022-03-12 01:40:33'),(9,20,4,'de872154ffbf91a5dcc0e539dd2d5106',1,'2022-05-12 09:51:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-09 22:24:37
