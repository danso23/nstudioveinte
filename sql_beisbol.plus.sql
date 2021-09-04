-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: beisbolplus
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.14-MariaDB
CREATE DATABASE IF NOT EXISTS beisbolpus;
USE beisbolplus;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `atributos`
--

DROP TABLE IF EXISTS `atributos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `atributos` (
  `id_atributo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_atributo` varchar(120) DEFAULT NULL,
  `desc_atributo` varchar(500) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_atributo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atributos`
--

LOCK TABLES `atributos` WRITE;
/*!40000 ALTER TABLE `atributos` DISABLE KEYS */;
INSERT INTO `atributos` VALUES (1,'XL','Tamaño de gorra',1,'2021-03-02 16:41:01'),(2,'L','Tamaño S',1,'2021-03-02 16:43:03'),(3,'M','Talla Medina',1,'2021-03-02 16:45:46'),(4,'S','Talla chica',1,'2021-03-02 16:45:46');
/*!40000 ALTER TABLE `atributos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carro_compras`
--

DROP TABLE IF EXISTS `carro_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `carro_compras` (
  `id_carro_compras` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_carro_compras` varchar(120) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_carro_compras`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carro_compras`
--

LOCK TABLES `carro_compras` WRITE;
/*!40000 ALTER TABLE `carro_compras` DISABLE KEYS */;
INSERT INTO `carro_compras` VALUES (1,NULL,1,400,5),(2,'1',1,400,5),(3,'Pelota de beisbol',1,400,5),(4,'Pelota de beisbol',1,400,5),(5,'Pelota de beisbol',1,400,1);
/*!40000 ALTER TABLE `carro_compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(120) DEFAULT NULL,
  `desc_categoria` varchar(1200) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'APPAREL','Pelotas de beisbol y mucho mas',1,'2021-03-02 16:41:01'),(2,'BATES','Gorras de distintas marcas',1,'2021-03-02 16:41:01'),(3,'ZAPATOS',NULL,1,'2021-03-07 06:42:29'),(4,'GUANTES',NULL,1,'2021-03-07 06:42:29'),(5,'CATCHERS',NULL,1,'2021-03-07 06:42:29'),(6,'MALETAS',NULL,1,'2021-03-07 06:42:29'),(7,'CASCOS',NULL,1,'2021-03-07 06:42:29'),(8,'PELOTAS',NULL,1,'2021-03-07 06:42:29'),(9,'MALLAS',NULL,1,'2021-03-07 06:42:29'),(10,'SOFTBAL',NULL,1,'2021-03-07 06:42:29');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `charges`
--

DROP TABLE IF EXISTS `charges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `charges` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cardholder` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_brand` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charges`
--

LOCK TABLES `charges` WRITE;
/*!40000 ALTER TABLE `charges` DISABLE KEYS */;
INSERT INTO `charges` VALUES (3,'Daniel Eduardo Solis Can','tok_1IT8ezKGjcpz85FFakCoG9ib','Visa','4242',NULL,'2021-03-09 22:44:00','2021-03-09 22:44:00'),(4,'Eduardo','tok_1ITTjZKGjcpz85FFr67t3FsH','MasterCard','4444',NULL,'2021-03-10 21:14:08','2021-03-10 21:14:08'),(5,'Otro','tok_1ITTodKGjcpz85FFSWaIAwUh','Visa','4242',1900,'2021-03-10 21:19:22','2021-03-10 21:19:22'),(6,'Iruharu','tok_1ITTpeKGjcpz85FFAG9rrdnQ','Visa','4242',1900,'2021-03-10 21:20:26','2021-03-10 21:20:26'),(7,'Daniel Prueba','tok_1ITTrNKGjcpz85FFIPvTsCLu','MasterCard','3222',1900,'2021-03-10 21:22:13','2021-03-10 21:22:13'),(8,'Prueba daniel','ch_1ITTyyKGjcpz85FFRNOIGdt5','Visa','4242',400,'2021-03-10 21:30:03','2021-03-10 21:30:03'),(9,'Daniel prueba','ch_1ITUSzKGjcpz85FFBBYaUAkT','MasterCard','4444',1500,'2021-03-10 22:01:04','2021-03-10 22:01:04'),(10,'Marine','ch_1ITUVMKGjcpz85FF6hUHqvRm','MasterCard','8210',350,'2021-03-10 22:03:31','2021-03-10 22:03:31'),(11,'Manuel','ch_1ITWDCKGjcpz85FFbyLuQ9z1','Visa','5556',1500,'2021-03-10 23:52:52','2021-03-10 23:52:52'),(12,'Marine Burgos','ch_1ITWQGKGjcpz85FFJhDinl1B','Visa','4242',2650,'2021-03-11 00:06:22','2021-03-11 00:06:22'),(13,'Carla Serrano','ch_1ITWm9KGjcpz85FFm8ymeL1r','MasterCard','8210',350,'2021-03-11 00:28:59','2021-03-11 00:28:59'),(14,'Carla serrano madrid','ch_1ITWniKGjcpz85FFsvkIJ6jw','MasterCard','8210',350,'2021-03-11 00:30:36','2021-03-11 00:30:36'),(15,'Mariana vazquez','ch_1ITX62KGjcpz85FF0ecEgmNY','Visa','4242',1900,'2021-03-11 00:49:33','2021-03-11 00:49:33'),(16,'Mariana Vazquez','ch_1ITX6zKGjcpz85FFX84Vt4je','Visa','4242',750,'2021-03-11 00:50:31','2021-03-11 00:50:31'),(17,'Mariano','ch_1ITXb5KGjcpz85FFeTsdsmyG','Visa','5556',1500,'2021-03-11 01:21:37','2021-03-11 01:21:37'),(18,'Daniel solis','ch_1ITXeAKGjcpz85FF2zn2g2II','Visa','4242',350,'2021-03-11 01:24:48','2021-03-11 01:24:48'),(19,'Natalia','ch_1ITXfyKGjcpz85FFp3nKuAEV','Visa','4242',350,'2021-03-11 01:26:40','2021-03-11 01:26:40'),(20,'Monserrat Escalante','ch_1ITXhEKGjcpz85FFYNZHjOMb','Visa','4242',400,'2021-03-11 01:27:58','2021-03-11 01:27:58'),(21,'Monse','ch_1ITXpwKGjcpz85FFnVHRdyiB','Visa','4242',350,'2021-03-11 01:36:58','2021-03-11 01:36:58');
/*!40000 ALTER TABLE `charges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_ventas`
--

DROP TABLE IF EXISTS `detalle_ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `detalle_ventas` (
  `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_detalle_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_ventas`
--

LOCK TABLES `detalle_ventas` WRITE;
/*!40000 ALTER TABLE `detalle_ventas` DISABLE KEYS */;
INSERT INTO `detalle_ventas` VALUES (1,4,1,400,2,'2021-03-10 18:06:21'),(2,4,2,1500,1,'2021-03-10 18:06:21'),(3,4,3,350,1,'2021-03-10 18:06:21'),(5,6,3,350,1,'2021-03-10 18:28:58'),(6,8,3,350,1,'2021-03-10 18:30:35'),(9,10,1,400,1,'2021-03-10 18:49:32'),(10,10,2,1500,1,'2021-03-10 18:49:32'),(11,12,1,400,1,'2021-03-10 18:50:30'),(12,12,3,350,1,'2021-03-10 18:50:30'),(13,13,2,1500,1,'2021-03-10 19:21:36'),(14,14,3,350,1,'2021-03-10 19:24:47'),(15,15,3,350,1,'2021-03-10 19:26:39'),(16,17,1,400,1,'2021-03-10 19:27:57'),(17,19,3,350,1,'2021-03-10 19:36:57');
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL AUTO_INCREMENT,
  `domicilio` varchar(140) DEFAULT NULL,
  `pais` varchar(80) DEFAULT NULL,
  `estado` varchar(80) DEFAULT NULL,
  `codigo_postal` varchar(7) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_direccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direcciones`
--

LOCK TABLES `direcciones` WRITE;
/*!40000 ALTER TABLE `direcciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marcas`
--

DROP TABLE IF EXISTS `marcas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_marca` varchar(200) DEFAULT NULL,
  `desc_marca` varchar(1200) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marcas`
--

LOCK TABLES `marcas` WRITE;
/*!40000 ALTER TABLE `marcas` DISABLE KEYS */;
/*!40000 ALTER TABLE `marcas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre_producto` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_producto` varchar(1200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url_imagen` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_producto`),
  KEY `fk_productos__categorias__id_categoria_idx` (`id_categoria`),
  KEY `fk_productos__marcas_id_marca_idx` (`id_marca`),
  CONSTRAINT `fk_productos__categorias__id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_productos__marcas_id_marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,1,'Pelota de beisbol','Pelota marca jersey','01.jpg',400,5,NULL,1,'2021-03-02 16:43:03'),(2,1,'Guante blanco','Guantes de beisbol con acabado color blanco','02.jpg',1500,4,NULL,1,'2021-03-07 06:25:10'),(3,2,'Gorra de los leones','Gorra autografiada por el pitcher','03.jpg',350,8,NULL,1,'2021-03-02 16:47:15');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_atributos`
--

DROP TABLE IF EXISTS `productos_atributos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `productos_atributos` (
  `id_producto_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) DEFAULT NULL,
  `id_atributo` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_producto_detalle`),
  KEY `fk_Productos_detalle__Atributos__id_atributo_idx` (`id_atributo`),
  KEY `fk_Productos_detalle__Atriubots__fk_id_producto_idx` (`id_producto`),
  CONSTRAINT `fk_Productos_detalle__Atributos__id_atributo` FOREIGN KEY (`id_atributo`) REFERENCES `atributos` (`id_atributo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Productos_detalle__Atriubots__id_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_atributos`
--

LOCK TABLES `productos_atributos` WRITE;
/*!40000 ALTER TABLE `productos_atributos` DISABLE KEYS */;
INSERT INTO `productos_atributos` VALUES (1,3,1,'2021-03-02 16:49:36'),(2,3,2,'2021-03-02 16:49:36'),(3,3,4,'2021-03-02 16:49:36');
/*!40000 ALTER TABLE `productos_atributos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` date DEFAULT NULL,
  `total_productos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,'2021-03-10',1),(2,'2021-03-10',1),(3,'2021-03-10',1),(4,'2021-03-10',4),(6,'2021-03-10',1),(8,'2021-03-10',1),(10,'2021-03-10',2),(12,'2021-03-10',2),(13,'2021-03-10',1),(14,'2021-03-10',1),(15,'2021-03-10',1),(17,'2021-03-10',1),(19,'2021-03-10',1);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-10 13:56:11
