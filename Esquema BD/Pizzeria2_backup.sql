-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: escom.xyz    Database: pizza2
-- ------------------------------------------------------
-- Server version	5.5.47-0+deb8u1

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
-- Table structure for table `Especial`
--

DROP TABLE IF EXISTS `Especial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Especial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `precio` int(11) NOT NULL,
  `Pizza_id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Especial_Pizza` (`Pizza_id`),
  CONSTRAINT `Especial_Pizza` FOREIGN KEY (`Pizza_id`) REFERENCES `Pizza` (`Producto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Especial`
--

LOCK TABLES `Especial` WRITE;
/*!40000 ALTER TABLE `Especial` DISABLE KEYS */;
/*!40000 ALTER TABLE `Especial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ingrediente`
--

DROP TABLE IF EXISTS `Ingrediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ingrediente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ingrediente`
--

LOCK TABLES `Ingrediente` WRITE;
/*!40000 ALTER TABLE `Ingrediente` DISABLE KEYS */;
INSERT INTO `Ingrediente` VALUES (1,'Queso extra',10),(2,'Pepperoni',20),(3,'Piña',15),(4,'Jamón',20),(5,'Orilla de queso',40);
/*!40000 ALTER TABLE `Ingrediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Operacion`
--

DROP TABLE IF EXISTS `Operacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Operacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Orden_id` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `lat` double(11,5) NOT NULL,
  `lon` double(11,5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Operacion_Orden` (`Orden_id`),
  CONSTRAINT `Operacion_Orden` FOREIGN KEY (`Orden_id`) REFERENCES `Orden` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Operacion`
--

LOCK TABLES `Operacion` WRITE;
/*!40000 ALTER TABLE `Operacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `Operacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Orden`
--

DROP TABLE IF EXISTS `Orden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Orden` (
  `id` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `Sucursal_id` int(11) NOT NULL,
  `Repartidor_id` int(11) NOT NULL,
  `lat` double(11,5) NOT NULL,
  `lon` double(11,5) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `tel_cliente` varchar(20) DEFAULT NULL,
  `email_cliente` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Orden_Repartidor` (`Repartidor_id`),
  KEY `Orden_Sucursal` (`Sucursal_id`),
  CONSTRAINT `Orden_Repartidor` FOREIGN KEY (`Repartidor_id`) REFERENCES `Repartidor` (`id`),
  CONSTRAINT `Orden_Sucursal` FOREIGN KEY (`Sucursal_id`) REFERENCES `Sucursal` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Orden`
--

LOCK TABLES `Orden` WRITE;
/*!40000 ALTER TABLE `Orden` DISABLE KEYS */;
/*!40000 ALTER TABLE `Orden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Orden_producto`
--

DROP TABLE IF EXISTS `Orden_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Orden_producto` (
  `Orden_id` int(11) NOT NULL,
  `Producto_id` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`Orden_id`,`Producto_id`),
  KEY `Orden_producto_Producto` (`Producto_id`),
  CONSTRAINT `Orden_producto_Producto` FOREIGN KEY (`Producto_id`) REFERENCES `Producto` (`id`),
  CONSTRAINT `Orden_producto_Orden` FOREIGN KEY (`Orden_id`) REFERENCES `Orden` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Orden_producto`
--

LOCK TABLES `Orden_producto` WRITE;
/*!40000 ALTER TABLE `Orden_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `Orden_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Paquete`
--

DROP TABLE IF EXISTS `Paquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Paquete` (
  `Producto_id` int(11) NOT NULL,
  `Refresco_Producto_id` int(11) NOT NULL,
  `Especial_id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`Producto_id`),
  KEY `Paquete_Especial` (`Especial_id`),
  KEY `Paquete_Refresco` (`Refresco_Producto_id`),
  CONSTRAINT `Paquete_Refresco` FOREIGN KEY (`Refresco_Producto_id`) REFERENCES `Refresco` (`Producto_id`),
  CONSTRAINT `Paquete_Especial` FOREIGN KEY (`Especial_id`) REFERENCES `Especial` (`id`),
  CONSTRAINT `Paquete_Producto` FOREIGN KEY (`Producto_id`) REFERENCES `Producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Paquete`
--

LOCK TABLES `Paquete` WRITE;
/*!40000 ALTER TABLE `Paquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `Paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pizza`
--

DROP TABLE IF EXISTS `Pizza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pizza` (
  `Producto_id` int(11) NOT NULL,
  `tamano` int(11) NOT NULL,
  PRIMARY KEY (`Producto_id`),
  CONSTRAINT `Pizza_Producto` FOREIGN KEY (`Producto_id`) REFERENCES `Producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pizza`
--

LOCK TABLES `Pizza` WRITE;
/*!40000 ALTER TABLE `Pizza` DISABLE KEYS */;
/*!40000 ALTER TABLE `Pizza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Producto`
--

DROP TABLE IF EXISTS `Producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `precio` double(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Producto`
--

LOCK TABLES `Producto` WRITE;
/*!40000 ALTER TABLE `Producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `Producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Refresco`
--

DROP TABLE IF EXISTS `Refresco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Refresco` (
  `Producto_id` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  PRIMARY KEY (`Producto_id`),
  CONSTRAINT `Refresco_Producto` FOREIGN KEY (`Producto_id`) REFERENCES `Producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Refresco`
--

LOCK TABLES `Refresco` WRITE;
/*!40000 ALTER TABLE `Refresco` DISABLE KEYS */;
/*!40000 ALTER TABLE `Refresco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Repartidor`
--

DROP TABLE IF EXISTS `Repartidor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Repartidor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Repartidor`
--

LOCK TABLES `Repartidor` WRITE;
/*!40000 ALTER TABLE `Repartidor` DISABLE KEYS */;
INSERT INTO `Repartidor` VALUES (1,'JUAN PEREZ','5529698494'),(2,'JUAN PEREZ','5529698494'),(3,'','');
/*!40000 ALTER TABLE `Repartidor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Status`
--

DROP TABLE IF EXISTS `Status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Status`
--

LOCK TABLES `Status` WRITE;
/*!40000 ALTER TABLE `Status` DISABLE KEYS */;
/*!40000 ALTER TABLE `Status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sucursal`
--

DROP TABLE IF EXISTS `Sucursal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sucursal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(200) NOT NULL,
  `lat` double(11,5) NOT NULL,
  `lon` double(11,5) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sucursal`
--

LOCK TABLES `Sucursal` WRITE;
/*!40000 ALTER TABLE `Sucursal` DISABLE KEYS */;
INSERT INTO `Sucursal` VALUES (1,'Av Hda. de Pastejé 5, Impulsora Popular Avicola, Nezahualcóyotl, Méx.',19.48536,-99.04856,'Impulsora','root'),(2,'Calz del Hueso 690, Los Sauces, Ciudad de México, D.F.',19.30163,-99.11759,'Coapa','root'),(3,'La Espiga 299, 57001 Benito Juárez, Méx.',19.41018,-99.00337,'Mariquita Linda','root'),(4,'Mixiuhca, Jardín Balbuena, Ciudad de México',19.41024,-99.11339,'Mixiuhca','root'),(5,'Calle Miguel Lebrija 171, Aviación Civil, Ciudad de México, D.F.',19.41610,-99.07624,'Pantitlán','root'),(6,'Av. Juan de Dios Bátiz s/n, Gustavo A. Madero, CIDETEC, Nueva Industrial Vallejo, 07700 Ciudad de México, D.F.',19.50447,-99.14714,'Plaza Torres Lindavista','root');
/*!40000 ALTER TABLE `Sucursal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inv_ingrediente`
--

DROP TABLE IF EXISTS `inv_ingrediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inv_ingrediente` (
  `Sucursal_id` int(11) NOT NULL,
  `Ingrediente_id` int(11) NOT NULL,
  PRIMARY KEY (`Sucursal_id`,`Ingrediente_id`),
  KEY `inv_ingrediente_Ingrediente` (`Ingrediente_id`),
  CONSTRAINT `inv_ingrediente_Sucursal` FOREIGN KEY (`Sucursal_id`) REFERENCES `Sucursal` (`id`),
  CONSTRAINT `inv_ingrediente_Ingrediente` FOREIGN KEY (`Ingrediente_id`) REFERENCES `Ingrediente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inv_ingrediente`
--

LOCK TABLES `inv_ingrediente` WRITE;
/*!40000 ALTER TABLE `inv_ingrediente` DISABLE KEYS */;
/*!40000 ALTER TABLE `inv_ingrediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inv_refresco`
--

DROP TABLE IF EXISTS `inv_refresco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inv_refresco` (
  `Sucursal_id` int(11) NOT NULL,
  `Refresco_id` int(11) NOT NULL,
  PRIMARY KEY (`Sucursal_id`,`Refresco_id`),
  KEY `inv_refresco_Refresco` (`Refresco_id`),
  CONSTRAINT `inv_refresco_Sucursal` FOREIGN KEY (`Sucursal_id`) REFERENCES `Sucursal` (`id`),
  CONSTRAINT `inv_refresco_Refresco` FOREIGN KEY (`Refresco_id`) REFERENCES `Refresco` (`Producto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inv_refresco`
--

LOCK TABLES `inv_refresco` WRITE;
/*!40000 ALTER TABLE `inv_refresco` DISABLE KEYS */;
/*!40000 ALTER TABLE `inv_refresco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pizza_ingrediente`
--

DROP TABLE IF EXISTS `pizza_ingrediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pizza_ingrediente` (
  `Ingrediente_id` int(11) NOT NULL,
  `Pizza_Producto_id` int(11) NOT NULL,
  PRIMARY KEY (`Ingrediente_id`),
  KEY `pizza_ingrediente_Pizza` (`Pizza_Producto_id`),
  CONSTRAINT `pizza_ingrediente_Pizza` FOREIGN KEY (`Pizza_Producto_id`) REFERENCES `Pizza` (`Producto_id`),
  CONSTRAINT `pizza_ingrediente_Ingrediente` FOREIGN KEY (`Ingrediente_id`) REFERENCES `Ingrediente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pizza_ingrediente`
--

LOCK TABLES `pizza_ingrediente` WRITE;
/*!40000 ALTER TABLE `pizza_ingrediente` DISABLE KEYS */;
/*!40000 ALTER TABLE `pizza_ingrediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_operacion`
--

DROP TABLE IF EXISTS `status_operacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_operacion` (
  `Status_id` int(11) NOT NULL,
  `Operacion_id` int(11) NOT NULL,
  PRIMARY KEY (`Status_id`,`Operacion_id`),
  KEY `status_operacion_Operacion` (`Operacion_id`),
  CONSTRAINT `status_operacion_Status` FOREIGN KEY (`Status_id`) REFERENCES `Status` (`id`),
  CONSTRAINT `status_operacion_Operacion` FOREIGN KEY (`Operacion_id`) REFERENCES `Operacion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_operacion`
--

LOCK TABLES `status_operacion` WRITE;
/*!40000 ALTER TABLE `status_operacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_operacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-23 18:18:00
