CREATE DATABASE  IF NOT EXISTS `conlana` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `conlana`;
-- MySQL dump 10.13  Distrib 5.7.12, for Linux (x86_64)
--
-- Host: localhost    Database: conlana
-- ------------------------------------------------------
-- Server version	5.7.12-0ubuntu1.1

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
-- Table structure for table `InventarioGeneral`
--

DROP TABLE IF EXISTS `InventarioGeneral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `InventarioGeneral` (
  `idInventarioGeneral` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(45) DEFAULT NULL,
  `preciounitario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idInventarioGeneral`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `InventarioGeneral`
--

LOCK TABLES `InventarioGeneral` WRITE;
/*!40000 ALTER TABLE `InventarioGeneral` DISABLE KEYS */;
INSERT INTO `InventarioGeneral` VALUES (1,'mouse',20),(2,'monitor',500),(3,'teclado',25),(4,'impresora',300),(5,'laptop2',7000),(7,'tinua',35),(10,'tinuanioini',35);
/*!40000 ALTER TABLE `InventarioGeneral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TiendaInventario`
--

DROP TABLE IF EXISTS `TiendaInventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TiendaInventario` (
  `idTiendas` int(11) NOT NULL,
  `idInventarioGeneral` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTiendas`,`idInventarioGeneral`),
  KEY `fk_TiendaInventario_InventarioGeneral1_idx` (`idInventarioGeneral`),
  CONSTRAINT `fk_TiendaInventario_InventarioGeneral1` FOREIGN KEY (`idInventarioGeneral`) REFERENCES `InventarioGeneral` (`idInventarioGeneral`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TiendaInventario_Tiendas` FOREIGN KEY (`idTiendas`) REFERENCES `Tiendas` (`idTiendas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TiendaInventario`
--

LOCK TABLES `TiendaInventario` WRITE;
/*!40000 ALTER TABLE `TiendaInventario` DISABLE KEYS */;
INSERT INTO `TiendaInventario` VALUES (1,1,4),(1,5,1),(2,1,8),(3,1,0),(3,5,2);
/*!40000 ALTER TABLE `TiendaInventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tiendas`
--

DROP TABLE IF EXISTS `Tiendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tiendas` (
  `idTiendas` int(11) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(65) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTiendas`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tiendas`
--

LOCK TABLES `Tiendas` WRITE;
/*!40000 ALTER TABLE `Tiendas` DISABLE KEYS */;
INSERT INTO `Tiendas` VALUES (1,'tienda1','napoles','89898'),(2,'tienda2','tlalpan','63636'),(3,'tienda3','coyoacan','777546'),(4,'tienda4','naucalpan','846774');
/*!40000 ALTER TABLE `Tiendas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-05 16:58:20
