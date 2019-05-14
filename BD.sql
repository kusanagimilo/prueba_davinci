-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: davinici_clientes
-- ------------------------------------------------------
-- Server version	5.7.16

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
-- Table structure for table `campania`
--

DROP TABLE IF EXISTS `campania`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campania` (
  `id_campania` int(11) NOT NULL AUTO_INCREMENT,
  `campania` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_campania`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campania`
--

LOCK TABLES `campania` WRITE;
/*!40000 ALTER TABLE `campania` DISABLE KEYS */;
INSERT INTO `campania` VALUES (5,'CAMPAÃ‘A PRUEBA','AC'),(6,'CAMPAÃ‘A 2','AC');
/*!40000 ALTER TABLE `campania` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campania_cliente`
--

DROP TABLE IF EXISTS `campania_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campania_cliente` (
  `id_campania_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `id_campania` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_campania_cliente`),
  KEY `fk_cliente_idx` (`id_cliente`),
  KEY `fk_campania_idx` (`id_campania`),
  CONSTRAINT `fk_campania` FOREIGN KEY (`id_campania`) REFERENCES `campania` (`id_campania`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campania_cliente`
--

LOCK TABLES `campania_cliente` WRITE;
/*!40000 ALTER TABLE `campania_cliente` DISABLE KEYS */;
INSERT INTO `campania_cliente` VALUES (11,5,11,'2019-05-14 09:33:45'),(12,5,12,'2019-05-14 09:33:45'),(13,5,13,'2019-05-14 09:33:45'),(14,6,14,'2019-05-14 09:34:43'),(15,6,11,'2019-05-14 09:35:35'),(16,6,12,'2019-05-14 09:35:35'),(17,6,13,'2019-05-14 09:35:35'),(18,6,15,'2019-05-14 09:38:52'),(19,6,16,'2019-05-14 09:38:52');
/*!40000 ALTER TABLE `campania_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(150) DEFAULT NULL,
  `apellidos` varchar(150) DEFAULT NULL,
  `telefono` varchar(150) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (11,'Juan Camilo','Cruz Franco','3006163077','calle 139b #114-03','2019-05-14 09:33:45','2019-05-14 09:33:45'),(12,'Diego Eduardo','Cruz Franco','3115516878','calle 123','2019-05-14 09:33:45','2019-05-14 09:33:45'),(13,'Luis Eduardo','Cruz','3006345768','calle 3456','2019-05-14 09:33:45','2019-05-14 09:33:45'),(14,'luis','Perez','112233','calle 24','2019-05-14 09:34:43','2019-05-14 09:34:43'),(15,'jjjjj','aaaaa','55555','calle 234','2019-05-14 09:38:52','2019-05-14 09:38:52'),(16,'iiiii','bbbb','99999','calle 1235','2019-05-14 09:38:52','2019-05-14 09:38:52');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-14 12:03:47
