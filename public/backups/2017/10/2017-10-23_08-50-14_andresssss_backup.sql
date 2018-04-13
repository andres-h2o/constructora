-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `backup_restores`
--

DROP TABLE IF EXISTS `backup_restores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backup_restores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `id_usuario` int(10) unsigned NOT NULL,
  `id_banco` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `backup_restores_id_usuario_foreign` (`id_usuario`),
  KEY `backup_restores_id_banco_foreign` (`id_banco`),
  CONSTRAINT `backup_restores_id_banco_foreign` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `backup_restores_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backup_restores`
--

LOCK TABLES `backup_restores` WRITE;
/*!40000 ALTER TABLE `backup_restores` DISABLE KEYS */;
INSERT INTO `backup_restores` VALUES (1,'2017-10-22_22-06-07_marcelo_backup.sql','backups\\2017\\10','2017-10-22 22:06:10',2,1,'2017-10-23 02:06:10','2017-10-23 02:06:10'),(2,'2017-10-23_08-48-54_andres pruebs_backup.sql','backups\\2017\\10','2017-10-23 08:48:54',1,1,'2017-10-23 12:48:54','2017-10-23 12:48:54');
/*!40000 ALTER TABLE `backup_restores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banco_modulos`
--

DROP TABLE IF EXISTS `banco_modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banco_modulos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_banco` int(10) unsigned NOT NULL,
  `id_modulo` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `banco_modulos_id_banco_foreign` (`id_banco`),
  KEY `banco_modulos_id_modulo_foreign` (`id_modulo`),
  CONSTRAINT `banco_modulos_id_banco_foreign` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `banco_modulos_id_modulo_foreign` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banco_modulos`
--

LOCK TABLES `banco_modulos` WRITE;
/*!40000 ALTER TABLE `banco_modulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `banco_modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banco_monedas`
--

DROP TABLE IF EXISTS `banco_monedas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banco_monedas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_moneda` int(10) unsigned NOT NULL,
  `id_banco` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `banco_monedas_id_moneda_foreign` (`id_moneda`),
  KEY `banco_monedas_id_banco_foreign` (`id_banco`),
  CONSTRAINT `banco_monedas_id_banco_foreign` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`),
  CONSTRAINT `banco_monedas_id_moneda_foreign` FOREIGN KEY (`id_moneda`) REFERENCES `monedas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banco_monedas`
--

LOCK TABLES `banco_monedas` WRITE;
/*!40000 ALTER TABLE `banco_monedas` DISABLE KEYS */;
/*!40000 ALTER TABLE `banco_monedas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bancos`
--

DROP TABLE IF EXISTS `bancos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bancos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bancos`
--

LOCK TABLES `bancos` WRITE;
/*!40000 ALTER TABLE `bancos` DISABLE KEYS */;
INSERT INTO `bancos` VALUES (1,'Banco Nacional de Bolivia',45625815,'2017-09-25 09:01:16','2017-09-25 09:01:16');
/*!40000 ALTER TABLE `bancos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cajas`
--

DROP TABLE IF EXISTS `cajas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cajas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sucursal` int(10) unsigned NOT NULL,
  `id_banco` int(10) unsigned NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cajas_id_sucursal_foreign` (`id_sucursal`),
  CONSTRAINT `cajas_id_sucursal_foreign` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cajas`
--

LOCK TABLES `cajas` WRITE;
/*!40000 ALTER TABLE `cajas` DISABLE KEYS */;
INSERT INTO `cajas` VALUES (1,'Caja 1',1,1,10900,'2017-09-26 18:32:18','2017-09-26 23:10:29'),(2,'Caja 2',1,1,5100,'2017-09-26 18:08:42','2017-09-26 22:23:49');
/*!40000 ALTER TABLE `cajas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cambios`
--

DROP TABLE IF EXISTS `cambios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cambios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `valor` double NOT NULL,
  `id_moneda` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cambios_id_moneda_foreign` (`id_moneda`),
  CONSTRAINT `cambios_id_moneda_foreign` FOREIGN KEY (`id_moneda`) REFERENCES `monedas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cambios`
--

LOCK TABLES `cambios` WRITE;
/*!40000 ALTER TABLE `cambios` DISABLE KEYS */;
INSERT INTO `cambios` VALUES (1,'2017-10-20',7,1,'2017-10-20 10:15:19','2017-10-20 10:15:19');
/*!40000 ALTER TABLE `cambios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caso_usos`
--

DROP TABLE IF EXISTS `caso_usos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caso_usos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_menu` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `caso_usos_id_menu_foreign` (`id_menu`),
  CONSTRAINT `caso_usos_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caso_usos`
--

LOCK TABLES `caso_usos` WRITE;
/*!40000 ALTER TABLE `caso_usos` DISABLE KEYS */;
/*!40000 ALTER TABLE `caso_usos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paterno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `id_banco` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientes_id_banco_foreign` (`id_banco`),
  CONSTRAINT `clientes_id_banco_foreign` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Andres','Contreras','Ojeda','8873316','2010-06-16','MASCULINO','andresito.2011.4@gmail.com',70863702,1,'2017-09-25 09:20:35','2017-09-25 09:20:35'),(2,'Marchelo','Lolo','LAL','7412582','1991-11-30','0','aaa@aaa.aa',7521456,1,'2017-09-26 21:48:30','2017-09-26 21:48:30');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuentas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(10) unsigned NOT NULL,
  `saldo` double NOT NULL,
  `moneda` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_banco` int(10) unsigned NOT NULL,
  `id_tipo` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cuentas_id_tipo_foreign` (`id_tipo`),
  KEY `cuentas_id_cliente_foreign` (`id_cliente`),
  CONSTRAINT `cuentas_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cuentas_id_tipo_foreign` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_cuentas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
INSERT INTO `cuentas` VALUES (1,1,5400,'Bs',1,1,'2017-09-25 19:38:18','2017-09-26 23:10:29'),(2,2,1600,'Bs',1,1,'2017-09-26 21:48:57','2017-09-26 22:54:18');
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles`
--

DROP TABLE IF EXISTS `detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `id_caja` int(10) unsigned NOT NULL,
  `monto` double NOT NULL,
  `id_banco` int(10) unsigned NOT NULL,
  `detalle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalles_id_caja_foreign` (`id_caja`),
  CONSTRAINT `detalles_id_caja_foreign` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles`
--

LOCK TABLES `detalles` WRITE;
/*!40000 ALTER TABLE `detalles` DISABLE KEYS */;
INSERT INTO `detalles` VALUES (1,'2017-09-26 13:56:59',1,-500,1,'','2017-09-26 17:56:59','2017-09-26 17:56:59'),(2,'2017-09-26 13:57:53',1,1000,1,'','2017-09-26 17:57:53','2017-09-26 17:57:53'),(3,'2017-09-26 14:05:08',1,1000,1,'Deposito en la cuenta 1','2017-09-26 18:05:08','2017-09-26 18:05:08'),(4,'2017-09-26 14:51:58',1,500,1,'Deposito en la cuenta 1','2017-09-26 18:51:58','2017-09-26 18:51:58'),(5,'2017-09-26 18:06:37',1,-1000,1,'Retiro de la cuenta 1','2017-09-26 22:06:37','2017-09-26 22:06:37'),(6,'2017-09-26 18:23:49',2,100,1,'Deposito en la cuenta 2','2017-09-26 22:23:49','2017-09-26 22:23:49'),(7,'2017-09-26 18:58:31',1,5000,1,'Deposito en la cuenta 1','2017-09-26 22:58:31','2017-09-26 22:58:31'),(8,'2017-09-26 19:10:29',1,-100,1,'Retiro de la cuenta 1','2017-09-26 23:10:29','2017-09-26 23:10:29');
/*!40000 ALTER TABLE `detalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historicos`
--

DROP TABLE IF EXISTS `historicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historicos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `tipo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cuenta` int(10) unsigned NOT NULL,
  `monto` double NOT NULL,
  `saldo` double NOT NULL,
  `detalle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `historicos_id_cuenta_foreign` (`id_cuenta`),
  CONSTRAINT `historicos_id_cuenta_foreign` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historicos`
--

LOCK TABLES `historicos` WRITE;
/*!40000 ALTER TABLE `historicos` DISABLE KEYS */;
INSERT INTO `historicos` VALUES (1,'2017-09-26 18:49:29','',2,-1000,1100,'A Nro de Cuenta: 1','2017-09-26 22:49:29','2017-09-26 22:49:29'),(2,'2017-09-26 18:49:29','',1,1000,1000,'De Nro de Cuenta: 2','2017-09-26 22:49:29','2017-09-26 22:49:29'),(3,'2017-09-26 18:54:18','TRANSACCION',1,-500,500,'A Nro de Cuenta: 2','2017-09-26 22:54:18','2017-09-26 22:54:18'),(4,'2017-09-26 18:54:18','TRANSACCION',2,500,1600,'De Nro de Cuenta: 1','2017-09-26 22:54:18','2017-09-26 22:54:18'),(5,'2017-09-26 18:58:31','DEPOSITO ',1,5000,5500,'','2017-09-26 22:58:31','2017-09-26 22:58:31'),(6,'2017-09-26 19:10:29','RETIRO',1,-100,5400,'','2017-09-26 23:10:29','2017-09-26 23:10:29');
/*!40000 ALTER TABLE `historicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_modulo` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_id_modulo_foreign` (`id_modulo`),
  CONSTRAINT `menus_id_modulo_foreign` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_09_25_045856_create_bancos_table',2),(5,'2017_09_25_050330_create_sucursals_table',3),(6,'2017_09_25_050453_create_cajas_table',3),(7,'2017_09_25_050513_create_detalles_table',3),(9,'2017_09_25_049900_create_clientes_table',4),(11,'2017_09_25_153251_create_tipo_cuentas_table',5),(12,'2017_09_25_153309_create_cuentas_table',5),(13,'2017_09_25_153907_create_movimientos_table',6),(14,'2017_09_26_112051_create_trigger_movimiento',7),(15,'2017_09_26_160131_create_transaccions_table',8),(16,'2017_09_26_173148_create_trigger_transaccion',9),(17,'2017_09_26_183834_create_historicos_table',10),(18,'2017_10_20_060017_create_monedas_table',11),(19,'2017_10_20_060557_create_cambios_table',12),(20,'2017_10_20_061925_create_banco_monedas_table',13),(21,'2017_10_20_062141_create_usuarios_table',14),(22,'2017_10_20_062455_create_rols_table',15),(23,'2017_10_20_063122_create_modulos_table',16),(24,'2017_10_20_063425_create_menus_table',17),(25,'2017_10_20_063817_create_caso_usos_table',18),(26,'2017_10_20_064648_create_usuario_bancos_table',19),(27,'2017_10_20_064942_create_rol_cus_table',20),(28,'2017_10_20_065915_create_banco_modulos_table',21),(31,'2017_10_20_080352_create_backup_restores_table',22);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulos`
--

DROP TABLE IF EXISTS `modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monedas`
--

DROP TABLE IF EXISTS `monedas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monedas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monedas`
--

LOCK TABLES `monedas` WRITE;
/*!40000 ALTER TABLE `monedas` DISABLE KEYS */;
INSERT INTO `monedas` VALUES (1,'Boliviano','moneda nacional','Bs.','2017-10-20 10:12:34','2017-10-20 10:12:34');
/*!40000 ALTER TABLE `monedas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimientos`
--

DROP TABLE IF EXISTS `movimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimientos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `id_caja` int(10) unsigned NOT NULL,
  `monto` double NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_banco` int(10) unsigned NOT NULL,
  `id_cuenta` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movimientos_id_cuenta_foreign` (`id_cuenta`),
  CONSTRAINT `movimientos_id_cuenta_foreign` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimientos`
--

LOCK TABLES `movimientos` WRITE;
/*!40000 ALTER TABLE `movimientos` DISABLE KEYS */;
INSERT INTO `movimientos` VALUES (1,'2017-09-26 11:19:59',1,10,'',1,1,'2017-09-26 15:20:04','2017-09-26 15:20:04'),(2,'2017-09-26 11:26:29',1,10,'DEPOSITO',1,1,'2017-09-26 15:27:20','2017-09-26 15:27:20'),(6,'2017-09-26 13:27:55',1,500,'RETIRO',1,1,'2017-09-26 17:56:59','2017-09-26 17:56:59'),(7,'2017-09-26 13:57:45',1,1000,'DEPOSITO',1,1,'2017-09-26 17:57:53','2017-09-26 17:57:53'),(8,'2017-09-26 14:04:56',1,1000,'DEPOSITO',1,1,'2017-09-26 18:05:08','2017-09-26 18:05:08'),(9,'2017-09-26 14:51:18',1,500,'DEPOSITO',1,1,'2017-09-26 18:51:58','2017-09-26 18:51:58'),(10,'2017-09-26 18:06:18',1,1000,'RETIRO',1,1,'2017-09-26 22:06:37','2017-09-26 22:06:37'),(11,'2017-09-26 18:23:35',2,100,'DEPOSITO',1,2,'2017-09-26 22:23:49','2017-09-26 22:23:49'),(12,'2017-09-26 18:58:19',1,5000,'DEPOSITO',1,1,'2017-09-26 22:58:31','2017-09-26 22:58:31'),(13,'2017-09-26 19:10:05',1,100,'RETIRO',1,1,'2017-09-26 23:10:29','2017-09-26 23:10:29');
/*!40000 ALTER TABLE `movimientos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `tr_movimiento` AFTER INSERT ON `movimientos` FOR EACH ROW BEGIN
                 if new.tipo="RETIRO" then
                      UPDATE cuentas SET saldo=saldo-new.monto,updated_at=now() WHERE id=new.id_cuenta;
                      UPDATE cajas SET total=total-new.monto,updated_at=now() WHERE id=new.id_caja;
                      INSERT INTO detalles( fecha, id_caja, monto, id_banco,detalle,created_at, updated_at) 
                VALUES (now(),new.id_caja,-new.monto,new.id_banco,concat('Retiro de la cuenta ',new.id_cuenta),now(),now());
                 select saldo into @saldo from cuentas where id=new.id_cuenta;
                      
                INSERT INTO historicos( fecha,tipo, monto, saldo,detalle,id_cuenta, created_at, updated_at) 
                VALUES (now(),"RETIRO",-new.monto,@saldo,"",new.id_cuenta,now(),now()); 
                 elseif new.tipo="DEPOSITO" then
                         UPDATE cuentas SET saldo=saldo+new.monto,updated_at=now() WHERE id=new.id_cuenta;
                        UPDATE cajas SET total=total+new.monto,updated_at=now() WHERE id=new.id_caja;
                       INSERT INTO detalles( fecha, id_caja, monto, id_banco,detalle,created_at, updated_at) 
                VALUES (now(),new.id_caja,new.monto,new.id_banco,concat('Deposito en la cuenta ',new.id_cuenta),now(),now());
                select saldo into @saldo from cuentas where id=new.id_cuenta;
                      
                INSERT INTO historicos( fecha,tipo, monto, saldo,detalle,id_cuenta, created_at, updated_at) 
                VALUES (now(),"DEPOSITO ",new.monto,@saldo,"",new.id_cuenta,now(),now()); 
                 end if;
                
        END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol_cus`
--

DROP TABLE IF EXISTS `rol_cus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol_cus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_rol` int(10) unsigned NOT NULL,
  `id_casouso` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rol_cus_id_rol_foreign` (`id_rol`),
  KEY `rol_cus_id_casouso_foreign` (`id_casouso`),
  CONSTRAINT `rol_cus_id_casouso_foreign` FOREIGN KEY (`id_casouso`) REFERENCES `caso_usos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rol_cus_id_rol_foreign` FOREIGN KEY (`id_rol`) REFERENCES `rols` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_cus`
--

LOCK TABLES `rol_cus` WRITE;
/*!40000 ALTER TABLE `rol_cus` DISABLE KEYS */;
/*!40000 ALTER TABLE `rol_cus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rols`
--

DROP TABLE IF EXISTS `rols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rols` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rols`
--

LOCK TABLES `rols` WRITE;
/*!40000 ALTER TABLE `rols` DISABLE KEYS */;
INSERT INTO `rols` VALUES (1,'123','Administrador','admin del sistema','2017-10-20 10:31:00','2017-10-20 10:31:00'),(2,'1234','Cajero','cejero','2017-10-20 19:54:05','2017-10-20 19:54:05');
/*!40000 ALTER TABLE `rols` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursals`
--

DROP TABLE IF EXISTS `sucursals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_banco` int(10) unsigned NOT NULL,
  `departamento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sucursals_id_banco_foreign` (`id_banco`),
  CONSTRAINT `sucursals_id_banco_foreign` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursals`
--

LOCK TABLES `sucursals` WRITE;
/*!40000 ALTER TABLE `sucursals` DISABLE KEYS */;
INSERT INTO `sucursals` VALUES (1,'BNB La Ramada',1,'Santa Cruz',70865951,'La Ramada Nro. 850','2017-09-26 18:31:34','2017-09-26 18:31:34'),(2,'BNB La Guardia',1,'Santa Cruz',72177485,'km 21  carretera antiga a CCBB','2017-09-26 22:17:43','2017-09-26 22:17:43');
/*!40000 ALTER TABLE `sucursals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_cuentas`
--

DROP TABLE IF EXISTS `tipo_cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_cuentas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interes` double NOT NULL,
  `id_banco` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_cuentas`
--

LOCK TABLES `tipo_cuentas` WRITE;
/*!40000 ALTER TABLE `tipo_cuentas` DISABLE KEYS */;
INSERT INTO `tipo_cuentas` VALUES (1,'Cuenta de Ahorro',0.33,1,'2017-09-25 19:37:18','2017-09-25 19:37:18');
/*!40000 ALTER TABLE `tipo_cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaccions`
--

DROP TABLE IF EXISTS `transaccions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaccions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `monto` double NOT NULL,
  `id_banco` int(10) unsigned NOT NULL,
  `id_cuenta` int(10) unsigned NOT NULL,
  `id_cuenta_destino` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaccions_id_cuenta_foreign` (`id_cuenta`),
  KEY `transaccions_id_cuenta_destino_foreign` (`id_cuenta_destino`),
  CONSTRAINT `transaccions_id_cuenta_destino_foreign` FOREIGN KEY (`id_cuenta_destino`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaccions_id_cuenta_foreign` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccions`
--

LOCK TABLES `transaccions` WRITE;
/*!40000 ALTER TABLE `transaccions` DISABLE KEYS */;
INSERT INTO `transaccions` VALUES (2,'2017-09-26 00:00:00',15161,1,1,1,'2017-09-26 20:03:11','2017-09-26 20:03:11'),(3,'2017-09-26 00:00:00',2000,1,1,2,'2017-09-26 21:50:13','2017-09-26 21:50:13'),(5,'2017-09-26 00:00:00',1000,1,2,1,'2017-09-26 22:49:29','2017-09-26 22:49:29'),(7,'2017-09-26 00:00:00',500,1,1,2,'2017-09-26 22:54:18','2017-09-26 22:54:18');
/*!40000 ALTER TABLE `transaccions` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `tr_transaccion` AFTER INSERT ON `transaccions` FOR EACH ROW BEGIN
               
                      UPDATE cuentas SET saldo=saldo-new.monto,updated_at=now() WHERE id=new.id_cuenta;
                      UPDATE cuentas SET saldo=saldo+new.monto,updated_at=now() WHERE id=new.id_cuenta_destino;
                      select saldo into @cuenta_a from cuentas where id=new.id_cuenta;
                      select saldo into @cuenta_b from cuentas where id=new.id_cuenta_destino;
                      INSERT INTO historicos( fecha,tipo, monto, saldo,detalle,id_cuenta, created_at, updated_at) 
                VALUES (now(),"TRANSACCION",-new.monto,@cuenta_a,concat("A Nro de Cuenta: ",new.id_cuenta_destino),new.id_cuenta,now(),now()); 
                INSERT INTO historicos( fecha,tipo, monto, saldo,detalle,id_cuenta, created_at, updated_at) 
                VALUES (now(),"TRANSACCION",new.monto,@cuenta_b,concat("De Nro de Cuenta: ",new.id_cuenta),new.id_cuenta_destino,now(),now()); 
                   
        END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_banco` int(10) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Andres Contreras ojeda','andresito.2011.4@gmail.com','$2y$10$i9qoYWmHONygqIhY1TVeLuw0Z72sfhIT0JXpitU4RMMaXySN7jnxe',1,'BgRK2CSdZAdzTcfIw0wi5QTW79CLHoA6VN1TQaOSrc66s1BP26RBnOADDvFd','2017-09-25 08:54:59','2017-09-25 08:54:59'),(2,'Yimmy Quispe Yujra','jin_maxtor@outlook.com','$2y$10$1MzKoKXfpJRjOeJfnsubyuyEedfwfZDDYpFxYQEhwjXXoJMeX87ru',1,'EZeOw6BrVcTIKI5MoikqbOgON4DLS6rhA4ik4l7FQ36QlHQkQkA3tZv6kZ9t','2017-10-20 02:47:04','2017-10-20 02:47:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_bancos`
--

DROP TABLE IF EXISTS `usuario_bancos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_bancos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_family` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `font_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(10) unsigned NOT NULL,
  `id_banco` int(10) unsigned NOT NULL,
  `id_rol` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_bancos_id_usuario_foreign` (`id_usuario`),
  KEY `usuario_bancos_id_banco_foreign` (`id_banco`),
  KEY `usuario_bancos_id_rol_foreign` (`id_rol`),
  CONSTRAINT `usuario_bancos_id_banco_foreign` FOREIGN KEY (`id_banco`) REFERENCES `bancos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_bancos_id_rol_foreign` FOREIGN KEY (`id_rol`) REFERENCES `rols` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_bancos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_bancos`
--

LOCK TABLES `usuario_bancos` WRITE;
/*!40000 ALTER TABLE `usuario_bancos` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_bancos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ci` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paterno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'sadfsd','marcos','pardo','ramires','masculino','carlos12','calos@gmail.com','123456',NULL,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-23  8:50:16
