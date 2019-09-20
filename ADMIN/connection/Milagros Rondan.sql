CREATE DATABASE  IF NOT EXISTS `milagosrondan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `milagosrondan`;
-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: milagosrondan
-- ------------------------------------------------------
-- Server version	8.0.17

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
-- Table structure for table `detalle_evento`
--

DROP TABLE IF EXISTS `detalle_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_evento` (
  `id_detalle_evento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) DEFAULT NULL,
  `precio` double(11,2) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_evento`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `detalle_evento_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_evento`
--

LOCK TABLES `detalle_evento` WRITE;
/*!40000 ALTER TABLE `detalle_evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeria`
--

DROP TABLE IF EXISTS `galeria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galeria` (
  `id_galeria` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_galeria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeria`
--

LOCK TABLES `galeria` WRITE;
/*!40000 ALTER TABLE `galeria` DISABLE KEYS */;
/*!40000 ALTER TABLE `galeria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nosotros`
--

DROP TABLE IF EXISTS `nosotros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nosotros` (
  `id_nosotros` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(250) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id_nosotros`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nosotros`
--

LOCK TABLES `nosotros` WRITE;
/*!40000 ALTER TABLE `nosotros` DISABLE KEYS */;
INSERT INTO `nosotros` VALUES (1,'31XBceKMaP9Y0jnMibNx4xfHW.jpg','hola soy messi');
/*!40000 ALTER TABLE `nosotros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portada`
--

DROP TABLE IF EXISTS `portada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portada` (
  `id_portada` int(11) NOT NULL AUTO_INCREMENT,
  `foto1` varchar(250) DEFAULT NULL,
  `texto1` text,
  `texto2` text,
  `texto3` text,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_portada`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portada`
--

LOCK TABLES `portada` WRITE;
/*!40000 ALTER TABLE `portada` DISABLE KEYS */;
INSERT INTO `portada` VALUES (1,'Dj26dK2v9wPdpzGPsck5f22zP.png','Bienvenidos','A MILAGROS RONDAN','los mejores eventos que existen','1'),(2,'R7UC78JaQjmNzxxs0gH8267cH.png','Bar','A MILAGROS RONDAN','infaltable','1');
/*!40000 ALTER TABLE `portada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonios`
--

DROP TABLE IF EXISTS `testimonios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonios` (
  `id_testimonios` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) DEFAULT NULL,
  `comentario` varchar(250) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_testimonios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonios`
--

LOCK TABLES `testimonios` WRITE;
/*!40000 ALTER TABLE `testimonios` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajadores`
--

DROP TABLE IF EXISTS `trabajadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trabajadores` (
  `id_trabajador` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(250) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `cargo` varchar(250) DEFAULT NULL,
  `facebook` varchar(250) DEFAULT NULL,
  `estados` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_trabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajadores`
--

LOCK TABLES `trabajadores` WRITE;
/*!40000 ALTER TABLE `trabajadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabajadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(250) DEFAULT NULL,
  `contrasena` varchar(250) DEFAULT NULL,
  `nombres` varchar(250) DEFAULT NULL,
  `apellidos` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'milagosrondan'
--

--
-- Dumping routines for database 'milagosrondan'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-20 18:27:19
