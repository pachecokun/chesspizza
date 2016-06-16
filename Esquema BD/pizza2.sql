-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: pizza.escom.xyz    Database: pizza2
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
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Sucursal_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apPaterno` varchar(30) NOT NULL,
  `apMaterno` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `tipoEmpleado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Empleado_Sucursal` (`Sucursal_id`),
  CONSTRAINT `Empleado_Sucursal` FOREIGN KEY (`Sucursal_id`) REFERENCES `sucursal` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1,4,'demis','demis','Demis','Gómez','Moncada','5541855576',3),(2,1,'Saul','123','Saul','Trujillo','García','5516238149',1),(4,6,'paxeko','paxeko','David','Paxeko','Zoto','5512345678',2),(5,4,'gerenteBalbuena','123','Raúl','Arenas','Escobar','5587654321',3),(6,6,'gerenteTorres','123','Guadalupe','Reyes','','12345678',3),(7,6,'chefTorres','chef','Pepe','Roni','','34652718',1),(8,4,'repartidorBalbuena','123','Sergio','Montes','América','12341234',2),(11,4,'repartidorEjemplo','123','Repartidor','Ejemplo','Otro','12348765',2);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especial`
--

DROP TABLE IF EXISTS `especial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `precio` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `Pizza_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Especial_Pizza` (`Pizza_id`),
  CONSTRAINT `Especial_Pizza` FOREIGN KEY (`Pizza_id`) REFERENCES `pizza` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especial`
--

LOCK TABLES `especial` WRITE;
/*!40000 ALTER TABLE `especial` DISABLE KEYS */;
INSERT INTO `especial` VALUES (3,500,'Hawaiiana',1),(4,250,'Gourmet',26),(5,270,'Vegetariana',27),(6,290,'Especial',28);
/*!40000 ALTER TABLE `especial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingrediente`
--

DROP TABLE IF EXISTS `ingrediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingrediente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `precio` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingrediente`
--

LOCK TABLES `ingrediente` WRITE;
/*!40000 ALTER TABLE `ingrediente` DISABLE KEYS */;
INSERT INTO `ingrediente` VALUES (1,'Queso extra',10),(2,'Pepperoni',20),(3,'Piña',15),(4,'Jamón',20),(5,'Champiñones',30),(6,'Salchicha italiana',25),(7,'Aguacate',20),(8,'Aceitunas',25),(9,'Chilorio',15);
/*!40000 ALTER TABLE `ingrediente` ENABLE KEYS */;
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
  `existencias` int(11) NOT NULL,
  PRIMARY KEY (`Sucursal_id`,`Ingrediente_id`),
  KEY `inv_ingrediente_Ingrediente` (`Ingrediente_id`),
  CONSTRAINT `inv_ingrediente_Ingrediente` FOREIGN KEY (`Ingrediente_id`) REFERENCES `ingrediente` (`id`),
  CONSTRAINT `inv_ingrediente_Sucursal` FOREIGN KEY (`Sucursal_id`) REFERENCES `sucursal` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inv_ingrediente`
--

LOCK TABLES `inv_ingrediente` WRITE;
/*!40000 ALTER TABLE `inv_ingrediente` DISABLE KEYS */;
INSERT INTO `inv_ingrediente` VALUES (4,1,98),(4,2,98),(4,3,98),(4,4,98),(4,5,20),(4,7,3),(4,8,36),(4,9,27),(6,1,58),(6,2,58),(6,3,58),(6,4,58),(6,5,100),(6,7,100),(6,8,10),(6,9,35);
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
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`Sucursal_id`,`Refresco_id`),
  KEY `inv_refresco_Refresco` (`Refresco_id`),
  CONSTRAINT `inv_refresco_Refresco` FOREIGN KEY (`Refresco_id`) REFERENCES `refresco` (`id`),
  CONSTRAINT `inv_refresco_Sucursal` FOREIGN KEY (`Sucursal_id`) REFERENCES `sucursal` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inv_refresco`
--

LOCK TABLES `inv_refresco` WRITE;
/*!40000 ALTER TABLE `inv_refresco` DISABLE KEYS */;
INSERT INTO `inv_refresco` VALUES (4,6,35),(4,8,10),(4,9,7),(4,13,23),(6,6,88),(6,7,15),(6,16,20);
/*!40000 ALTER TABLE `inv_refresco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operacion`
--

DROP TABLE IF EXISTS `operacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Orden_id` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `lat` double(11,5) NOT NULL,
  `lon` double(11,5) NOT NULL,
  `Status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Operacion_Orden` (`Orden_id`),
  KEY `Status_operacion_idx` (`Status_id`),
  CONSTRAINT `Operacion_Orden` FOREIGN KEY (`Orden_id`) REFERENCES `orden` (`id`),
  CONSTRAINT `Status_operacion` FOREIGN KEY (`Status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operacion`
--

LOCK TABLES `operacion` WRITE;
/*!40000 ALTER TABLE `operacion` DISABLE KEYS */;
INSERT INTO `operacion` VALUES (1,35,'2016-06-05 22:42:14',19.30163,-99.11759,1),(6,40,'2016-06-06 18:55:39',19.50447,-99.14714,1),(7,41,'2016-06-06 19:39:43',19.50447,-99.14714,1),(20,42,'2016-06-07 02:14:48',19.50447,-99.14714,1),(21,43,'2016-06-07 02:21:11',19.50447,-99.14714,1),(24,40,'2016-06-07 02:28:26',19.50447,-99.14714,4),(25,41,'2016-06-07 02:28:27',19.50447,-99.14714,4),(26,42,'2016-06-07 02:28:27',19.50447,-99.14714,4),(27,42,'2016-06-07 02:51:26',19.49542,-99.14370,5),(28,41,'2016-06-07 02:52:43',19.50440,-99.14709,5),(29,40,'2016-06-07 02:52:45',19.50436,-99.14712,5),(30,44,'2016-06-07 04:06:00',19.50447,-99.14714,1),(31,45,'2016-06-07 07:03:31',19.50447,-99.14714,1),(32,43,'2016-06-07 07:11:20',19.50447,-99.14714,4),(33,44,'2016-06-07 07:11:20',19.50447,-99.14714,4),(34,43,'2016-06-07 07:11:57',19.49542,-99.14370,5),(35,44,'2016-06-07 07:12:01',19.48542,-99.12300,5),(36,45,'2016-06-07 09:10:06',19.50447,-99.14714,4),(37,45,'2016-06-07 09:38:29',19.50444,-99.14724,5),(38,46,'2016-06-07 10:04:25',19.50447,-99.14714,1),(39,47,'2016-06-07 12:10:00',19.50447,-99.14714,1),(40,48,'2016-06-07 12:12:23',19.50447,-99.14714,1),(41,47,'2016-06-07 12:12:52',19.50447,-99.14714,4),(42,48,'2016-06-07 12:12:52',19.50447,-99.14714,4),(43,47,'2016-06-07 12:14:50',19.50500,-99.14705,5),(44,48,'2016-06-07 12:14:51',19.50500,-99.14705,5),(45,51,'2016-06-07 13:12:23',19.50447,-99.14714,1),(46,52,'2016-06-07 14:46:42',19.50447,-99.14714,1),(47,53,'2016-06-07 14:48:29',19.50447,-99.14714,1),(48,54,'2016-06-08 15:07:22',19.50447,-99.14714,1),(49,55,'2016-06-08 18:28:21',19.50447,-99.14714,1),(50,56,'2016-06-09 20:33:35',19.41024,-99.11339,1),(52,57,'2016-06-10 01:39:40',19.48536,-99.04856,1),(53,58,'2016-06-10 01:46:31',19.48536,-99.04856,1),(54,59,'2016-06-10 02:10:27',19.48536,-99.04856,1),(55,58,'2016-06-10 02:13:38',19.49983,-99.04329,6),(56,59,'2016-06-10 02:22:28',19.49983,-99.04329,6),(57,60,'2016-06-10 02:23:33',19.48536,-99.04856,1),(58,60,'2016-06-10 02:42:42',19.49983,-99.04329,6),(59,57,'2016-06-10 02:48:55',19.48536,-99.04856,2),(60,57,'2016-06-10 02:48:58',19.48536,-99.04856,3);
/*!40000 ALTER TABLE `operacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden`
--

DROP TABLE IF EXISTS `orden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_hora` datetime NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `Sucursal_id` int(11) NOT NULL,
  `Repartidor_id` int(11) DEFAULT NULL,
  `lat` double(11,5) NOT NULL,
  `lon` double(11,5) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `tel_cliente` varchar(20) NOT NULL,
  `email_cliente` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Orden_Repartidor` (`Repartidor_id`),
  KEY `Orden_Sucursal` (`Sucursal_id`),
  CONSTRAINT `Orden_Repartidor` FOREIGN KEY (`Repartidor_id`) REFERENCES `repartidor` (`id`),
  CONSTRAINT `Orden_Sucursal` FOREIGN KEY (`Sucursal_id`) REFERENCES `sucursal` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden`
--

LOCK TABLES `orden` WRITE;
/*!40000 ALTER TABLE `orden` DISABLE KEYS */;
INSERT INTO `orden` VALUES (10,'2016-06-05 15:19:49','Rancho Grande 139 137, Santa Cecilia, Coyoacán, 04930',2,NULL,19.31096,-99.11328,'David Pacheco','5529698494','mikorreomola@gmail.com'),(11,'2016-06-05 15:26:06','Rancho Grande 139 137, Santa Cecilia, México D.F, 04930',2,NULL,19.31096,-99.11328,'David Pacheco','5536546003','mikorreomola@gmail.com'),(12,'2016-06-05 15:35:03','Rancho Grande 139 139, Santa Cecilia, Coyoacán, 04930',2,NULL,19.31096,-99.11324,'David Alberto Pacheco','5529698494','gfdsa@gfds.com'),(13,'2016-06-05 15:36:40','Rancho Grande 139 139, Santa Cecilia, México D.F, 04930',2,NULL,19.31096,-99.11324,'David Pacheco','5536546003','mikorreomola@gmail.com'),(14,'2016-06-05 15:38:26','Rancho Grande 139 139, Santa Cecilia, México D.F, 04930',2,NULL,19.31096,-99.11324,'David Pacheco','5536546003','mikorreomola@gmail.com'),(15,'2016-06-05 15:47:12','Insurgentes Norte 783 139, Santa Cecilia, San Simon Tonahuac, 06920',2,NULL,19.31096,-99.11324,'Salvador Torres Nuñez','5557726519','juan@hola.com'),(16,'2016-06-05 17:09:17','Rancho Grande 139 139, Santa Cecilia, México D.F, 04930',2,NULL,19.31096,-99.11324,'David Pacheco','5536546003','mikorreomola@gmail.com'),(17,'2016-06-05 18:47:04','Rancho Grande 139 139, Santa Cecilia, México D.F, 04930',2,NULL,19.31100,-99.11333,'David Pacheco','5536546003','mikorreomola@gmail.com'),(18,'2016-06-05 19:55:41','Rancho Grande 139 139, Santa Cecilia, México D.F, 04930',2,NULL,19.31097,-99.11327,'David Pacheco','5536546003','mikorreomola@gmail.com'),(19,'2016-06-05 19:57:28','Rancho Grande 139 139, Santa Cecilia, México D.F, 04930',2,NULL,19.31097,-99.11327,'David Pacheco','5536546003','mikorreomola@gmail.com'),(20,'2016-06-05 19:57:58','Calle La Enramada 262, Benito Juárez, Nezahualcóyotl, 57000',3,NULL,19.41025,-99.00737,'Sergio','5519475857','serch_montano@outlook.com'),(21,'2016-06-05 20:10:11','Calle La Enramada 262, Benito Juárez, Nezahualcóyotl, 57000',3,NULL,19.41025,-99.00737,'Sergio','5519475857','serch_montano@outlook.com'),(22,'2016-06-05 20:17:23','Calle La Enramada 262, Benito Juárez, Nezahualcóyotl, 57000',3,NULL,19.41025,-99.00737,'Sergio','5519475857','serch_montano@outlook.com'),(23,'2016-06-05 20:22:50','Calle La Enramada 262, Benito Juárez, Nezahualcóyotl, 57000',3,NULL,19.41025,-99.00737,'Sergio','5512345678','serchomon@outlook.com'),(24,'2016-06-05 20:42:23','Calle La Enramada 262, Benito Juárez, Nezahualcóyotl, 57000',3,NULL,19.41025,-99.00737,'Sergio Montaño','5519475857','serch_montano@outlook.com'),(25,'2016-06-05 20:44:32','Calle La Enramada 262, Benito Juárez, Nezahualcóyotl, 57000',3,NULL,19.41025,-99.00737,'Sergio Montaño','5519475857','serch_montano@outlook.com'),(26,'2016-06-05 20:47:31','Calle La Enramada 262, Benito Juárez, Nezahualcóyotl, 57000',3,NULL,19.41025,-99.00737,'Sergio Montaño','5519475857','serch_montano@outlook.com'),(27,'2016-06-05 19:53:24','Rancho Grande 139 139, Santa Cecilia, México D.F, 04930',2,NULL,19.31096,-99.11320,'David Pacheco','5536546003','mikorreomola@gmail.com'),(28,'2016-06-05 19:57:49','Rancho Grande 139 139, Santa Cecilia, México D.F, 04930',2,NULL,19.31096,-99.11320,'David Pacheco','5536546003','mikorreomola@gmail.com'),(29,'2016-06-05 20:00:07','Rancho Grande 139 139, Santa Cecilia, México D.F, 04930',2,NULL,19.31096,-99.11320,'David Pacheco','5536546003','mikorreomola@gmail.com'),(30,'2016-06-05 20:08:35','Rancho Grande 139 139, Santa Cecilia, México D.F, 04930',2,NULL,19.31096,-99.11320,'David Pacheco','5536546003','mikorreomola@gmail.com'),(31,'2016-06-05 21:38:28','Rancho Grande 139 139, Santa Cecilia, México D.F, 04930',2,NULL,19.31096,-99.11320,'David Pacheco','5536546003','mikorreomola@gmail.com'),(32,'2016-06-05 21:40:14','Insurgentes Norte 783 139, Santa Cecilia, San Simon Tonahuac, 06920',2,NULL,19.31101,-99.11336,'David Pacheco','5557726519','mikorreomola@gmail.com'),(33,'2016-06-05 22:08:52','Rancho Grande 139 139, Santa Cecilia, México D.F, 04930',2,NULL,19.31101,-99.11336,'David Pacheco','5536546003','mikorreomola@gmail.com'),(34,'2016-06-05 22:32:48','Rancho Grande 139 139, Santa Cecilia, México D.F, 04930',2,NULL,19.31101,-99.11336,'David Pacheco','5536546003','mikorreomola@gmail.com'),(35,'2016-06-05 22:42:14','Rancho Grande 139 139, Santa Cecilia, México D.F, 04930',2,NULL,19.31101,-99.11336,'David Pacheco','5536546003','mikorreomola@gmail.com'),(40,'2016-06-06 18:55:39','Insurgentes Norte 783 43, Nueva Industrial Vallejo, San Simon Tonahuac, 06920',6,3,19.50436,-99.14712,'David Pacheco','5557726519','mikorreomola@gmail.com'),(41,'2016-06-06 19:39:43','Rancho Grande 139 43, Nueva Industrial Vallejo, México D.F, 04930',6,3,19.50440,-99.14709,'David Pacheco','5536546003','mikorreomola@gmail.com'),(42,'2016-06-07 02:14:48','Rancho Grande 139 114, San Bartolo Atepehuacan, México D.F, 04930',6,3,19.49542,-99.14370,'Pancho perez','5529698494','mikorreomola@gmail.com'),(43,'2016-06-07 02:21:11','Santa Barbara 114, San Bartolo Atepehuacan, Ciudad de México, 07730',6,3,19.49542,-99.14370,'Alberto Rodriguez','5523015481','beto@lol.com'),(44,'2016-06-07 04:06:00','Valparaíso 7, Tepeyac Insurgentes, Ciudad de México, 07020',6,3,19.48542,-99.12300,'Ola k ase','5529698494','mikorreomola@gmail.com'),(45,'2016-06-07 07:03:31','Neptuno 43, Nueva Industrial Vallejo, Tlalnepantla de Baz, 07700',6,4,19.50444,-99.14724,'Saul Trujas','5510203','bigtruga@lol.com'),(46,'2016-06-07 10:04:24','Neptuno 43, Nueva Industrial Vallejo, Tlalnepantla de Baz, 07700',6,NULL,19.50454,-99.14713,'Juan Perez','55102030','juan@hola.com'),(47,'2016-06-07 12:10:00','Neptuno 43, Nueva Industrial Vallejo, Tlalnepantla de Baz, 07700',6,4,19.50500,-99.14705,'Alberto Rodriguez','5513968495','hola@correo.com'),(48,'2016-06-07 12:12:23','Neptuno 43, Nueva Industrial Vallejo, Tlalnepantla de Baz, 07700',6,4,19.50500,-99.14705,'Juan Perez','53659886','juan@hola.com'),(49,'2016-06-07 12:34:01','Neptuno 43, Nueva Industrial Vallejo, Tlalnepantla de Baz, 07700',6,NULL,19.50500,-99.14705,'Ramiro Perez','55555555','elramo@lol.com'),(50,'2016-06-07 13:07:44','Rancho Grande 139 10, Nueva Industrial Vallejo, México D.F, 04930',6,NULL,19.50507,-99.14621,'David Pacheco','+525536546003','mikorreomola@gmail.com'),(51,'2016-06-07 13:12:23','Rancho Grande 139 7, Tepeyac Insurgentes, México D.F, 04930',6,NULL,19.48542,-99.12300,'David Pacheco','+525536546003','mikorreomola@gmail.com'),(52,'2016-06-07 14:46:42','Miguel Othón de Mendizabal Oriente 343, Nueva Industrial Vallejo, Ciudad de México, 07700',6,NULL,19.50565,-99.14418,'ujsic','5536506147','ulises.velez@gmail.com'),(53,'2016-06-07 14:48:29','Juan de Dios Bátiz 32, Nueva Industrial Vallejo, Ciudad de México, 07700',6,NULL,19.50484,-99.14626,'Sergio Montaño Europa','5519475857','serch_montano@outlook.com'),(54,'2016-06-08 15:07:22','Estella 88 Guerrero 43, Nueva Industrial Vallejo, Mexico, 06300',6,NULL,19.50481,-99.14687,'Oscar Regis','015548831266','oscarsullivanscorpion@gmail.com'),(55,'2016-06-08 18:28:21','LIRIOS MZ 15 LT 19 43, Nueva Industrial Vallejo, TLALPAN, 14748',6,NULL,19.50457,-99.14720,'Cesar Munoz','654645645457','ututyuyuytu@gthtr.com'),(56,'2016-06-09 20:33:35','Viaducto Tlalpan 578, Jardín Balbuena, Ciudad de México, 15900',4,NULL,19.40697,-99.10906,'Demis Gómez','57682111','demisgm@live.com'),(57,'2016-06-10 01:39:40','ሴንትራል ካርሎስ አንክ ጎንሳሌስ 170, Valle de Aragon 3ra Sección, Ecatepec, 55280',1,NULL,19.49983,-99.04329,'erty','etyet','e@e.com.mx.pop.cls'),(58,'2016-06-10 01:46:31','Venustiano Carranza Mz. 24 Lt.18, Popular, Ecatepec de Morelos, 55210',1,NULL,19.49983,-99.04329,'Diego Pascual','5527381387','barcadiego1175@gmail.com'),(59,'2016-06-10 02:10:27','Venustiano Carranza Mz. 24 Lt.18, Popular, Ecatepec de Morelos, 55210',1,NULL,19.49983,-99.04329,'Diego Pascual','5527381387','barcadiego1175@gmail.com'),(60,'2016-06-10 02:23:33','Venustiano Carranza Mz. 24 Lt.18, Popular, Ecatepec de Morelos, 55210',1,NULL,19.49983,-99.04329,'Diego Pascual','5527381387','barcadiego1175@gmail.com');
/*!40000 ALTER TABLE `orden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_especial`
--

DROP TABLE IF EXISTS `orden_especial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_especial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Orden_id` int(11) NOT NULL,
  `Especial_id` int(11) NOT NULL,
  `orilla_id` int(11) NOT NULL,
  `tamano` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Orden_especial_Especial` (`Especial_id`),
  KEY `Orden_especial_Orden` (`Orden_id`),
  KEY `Orden_especial_orilla` (`orilla_id`),
  CONSTRAINT `Orden_especial_Especial` FOREIGN KEY (`Especial_id`) REFERENCES `especial` (`id`),
  CONSTRAINT `Orden_especial_Orden` FOREIGN KEY (`Orden_id`) REFERENCES `orden` (`id`),
  CONSTRAINT `Orden_especial_orilla` FOREIGN KEY (`orilla_id`) REFERENCES `orilla` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_especial`
--

LOCK TABLES `orden_especial` WRITE;
/*!40000 ALTER TABLE `orden_especial` DISABLE KEYS */;
INSERT INTO `orden_especial` VALUES (1,17,3,1,1,1),(2,17,3,1,1,1),(3,19,3,1,1,1),(4,19,3,2,0,2),(5,20,3,1,1,1),(6,28,3,1,1,1),(7,29,3,1,1,1),(8,30,3,2,2,1),(9,31,3,1,1,1),(10,32,3,1,1,1),(11,34,3,1,1,1),(12,35,3,1,1,1),(13,40,3,1,1,1),(14,42,3,1,2,1),(15,43,3,1,1,7),(16,44,3,2,2,1),(17,45,3,1,1,9),(18,46,3,1,1,1),(19,47,3,1,1,1),(20,48,3,1,1,5),(21,52,3,2,2,2),(22,52,3,2,2,2),(23,53,3,1,1,1),(24,55,3,2,1,11),(25,56,3,2,1,2);
/*!40000 ALTER TABLE `orden_especial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_paquete`
--

DROP TABLE IF EXISTS `orden_paquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_paquete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Orden_id` int(11) NOT NULL,
  `Paquete_id` int(11) NOT NULL,
  `orilla_id` int(11) NOT NULL,
  `tamano_pizza` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Orden_paquete_Orden` (`Orden_id`),
  KEY `Orden_paquete_Paquete` (`Paquete_id`),
  KEY `Orden_paquete_orilla` (`orilla_id`),
  CONSTRAINT `Orden_paquete_Orden` FOREIGN KEY (`Orden_id`) REFERENCES `orden` (`id`),
  CONSTRAINT `Orden_paquete_Paquete` FOREIGN KEY (`Paquete_id`) REFERENCES `paquete` (`id`),
  CONSTRAINT `Orden_paquete_orilla` FOREIGN KEY (`orilla_id`) REFERENCES `orilla` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_paquete`
--

LOCK TABLES `orden_paquete` WRITE;
/*!40000 ALTER TABLE `orden_paquete` DISABLE KEYS */;
INSERT INTO `orden_paquete` VALUES (1,19,5,1,1,1),(2,19,5,1,0,2),(3,20,5,2,0,1),(4,21,5,2,0,1),(5,23,5,1,0,1),(6,24,5,2,0,1),(7,25,5,1,0,1),(8,26,5,2,2,1),(9,28,5,1,0,2),(10,29,5,1,0,1),(11,30,5,1,0,1),(12,33,5,1,0,1),(13,41,5,1,0,1),(14,44,5,1,0,1),(15,46,5,1,0,8),(16,51,5,1,0,1);
/*!40000 ALTER TABLE `orden_paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_pizza`
--

DROP TABLE IF EXISTS `orden_pizza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_pizza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Orden_id` int(11) NOT NULL,
  `Pizza_id` int(11) NOT NULL,
  `orilla_id` int(11) NOT NULL,
  `tamano` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Orden_pizza_Orden` (`Orden_id`),
  KEY `Orden_pizza_Pizza` (`Pizza_id`),
  KEY `Orden_pizza_orilla` (`orilla_id`),
  CONSTRAINT `Orden_pizza_Orden` FOREIGN KEY (`Orden_id`) REFERENCES `orden` (`id`),
  CONSTRAINT `Orden_pizza_Pizza` FOREIGN KEY (`Pizza_id`) REFERENCES `pizza` (`id`),
  CONSTRAINT `Orden_pizza_orilla` FOREIGN KEY (`orilla_id`) REFERENCES `orilla` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_pizza`
--

LOCK TABLES `orden_pizza` WRITE;
/*!40000 ALTER TABLE `orden_pizza` DISABLE KEYS */;
INSERT INTO `orden_pizza` VALUES (1,51,24,1,1,1),(2,54,25,1,1,1),(3,57,34,1,1,1),(4,57,35,2,2,3),(5,58,36,1,1,1),(6,59,38,2,1,1),(7,60,41,2,1,1);
/*!40000 ALTER TABLE `orden_pizza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_refresco`
--

DROP TABLE IF EXISTS `orden_refresco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_refresco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Orden_id` int(11) NOT NULL,
  `Refresco_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Orden_refresco_Orden` (`Orden_id`),
  KEY `Orden_refresco_Refresco` (`Refresco_id`),
  CONSTRAINT `Orden_refresco_Orden` FOREIGN KEY (`Orden_id`) REFERENCES `orden` (`id`),
  CONSTRAINT `Orden_refresco_Refresco` FOREIGN KEY (`Refresco_id`) REFERENCES `refresco` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_refresco`
--

LOCK TABLES `orden_refresco` WRITE;
/*!40000 ALTER TABLE `orden_refresco` DISABLE KEYS */;
INSERT INTO `orden_refresco` VALUES (1,29,10,1),(2,30,8,1),(3,31,6,3),(4,42,6,2),(5,47,6,1),(6,48,6,2);
/*!40000 ALTER TABLE `orden_refresco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orilla`
--

DROP TABLE IF EXISTS `orilla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orilla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `precioExtra` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orilla`
--

LOCK TABLES `orilla` WRITE;
/*!40000 ALTER TABLE `orilla` DISABLE KEYS */;
INSERT INTO `orilla` VALUES (1,'Normal',0),(2,'Rellena de queso',30);
/*!40000 ALTER TABLE `orilla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paquete`
--

DROP TABLE IF EXISTS `paquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paquete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Especial_id` int(11) NOT NULL,
  `Refresco_id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` double(6,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Paquete_Especial` (`Especial_id`),
  KEY `Paquete_Refresco` (`Refresco_id`),
  CONSTRAINT `Paquete_Especial` FOREIGN KEY (`Especial_id`) REFERENCES `especial` (`id`),
  CONSTRAINT `Paquete_Refresco` FOREIGN KEY (`Refresco_id`) REFERENCES `refresco` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquete`
--

LOCK TABLES `paquete` WRITE;
/*!40000 ALTER TABLE `paquete` DISABLE KEYS */;
INSERT INTO `paquete` VALUES (5,3,6,'PQT Aloha',500.00);
/*!40000 ALTER TABLE `paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pizza`
--

DROP TABLE IF EXISTS `pizza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pizza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pizza`
--

LOCK TABLES `pizza` WRITE;
/*!40000 ALTER TABLE `pizza` DISABLE KEYS */;
INSERT INTO `pizza` VALUES (1),(2),(3),(4),(5),(6),(7),(8),(9),(10),(11),(12),(13),(14),(15),(16),(17),(18),(19),(20),(21),(22),(23),(24),(25),(26),(27),(28),(29),(30),(31),(32),(33),(34),(35),(36),(37),(38),(39),(40),(41);
/*!40000 ALTER TABLE `pizza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pizza_ingrediente`
--

DROP TABLE IF EXISTS `pizza_ingrediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pizza_ingrediente` (
  `Ingrediente_id` int(11) NOT NULL,
  `Pizza_id` int(11) NOT NULL,
  PRIMARY KEY (`Ingrediente_id`,`Pizza_id`),
  KEY `pizza_ingrediente_Pizza` (`Pizza_id`),
  CONSTRAINT `pizza_ingrediente_Ingrediente` FOREIGN KEY (`Ingrediente_id`) REFERENCES `ingrediente` (`id`),
  CONSTRAINT `pizza_ingrediente_Pizza` FOREIGN KEY (`Pizza_id`) REFERENCES `pizza` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pizza_ingrediente`
--

LOCK TABLES `pizza_ingrediente` WRITE;
/*!40000 ALTER TABLE `pizza_ingrediente` DISABLE KEYS */;
INSERT INTO `pizza_ingrediente` VALUES (1,1),(2,1),(3,1),(4,1),(1,22),(1,23),(2,23),(1,24),(2,24),(3,24),(1,25),(4,25),(1,26),(5,26),(6,26),(1,27),(5,27),(7,27),(8,27),(4,28),(5,28),(6,28),(9,28),(5,29),(9,29),(1,33),(2,33),(3,33),(4,33),(5,33),(6,33),(7,33),(8,33),(9,33),(1,35),(3,35),(4,35),(1,38),(3,38),(4,38),(7,38),(1,39),(3,39),(4,39),(7,39),(1,40),(3,40),(4,40),(7,40),(1,41),(3,41),(4,41),(7,41);
/*!40000 ALTER TABLE `pizza_ingrediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refresco`
--

DROP TABLE IF EXISTS `refresco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `refresco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `precio` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refresco`
--

LOCK TABLES `refresco` WRITE;
/*!40000 ALTER TABLE `refresco` DISABLE KEYS */;
INSERT INTO `refresco` VALUES (6,'Coca cola 500ml',15),(7,'Coca cola 1.5L',30),(8,'Coca cola 3L',45),(9,'Fanta 500ml',15),(10,'Fanta 1.5L',30),(11,'Fanta 3L',45),(12,'Sprite 500ml',15),(13,'Sprite 1.5L',30),(14,'Sprite 3L',45),(15,'Manzanita 500ml',15),(16,'Manzanita 1.5L',30),(17,'Manzanita 3L',45);
/*!40000 ALTER TABLE `refresco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repartidor`
--

DROP TABLE IF EXISTS `repartidor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repartidor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  CONSTRAINT `empleado_rep` FOREIGN KEY (`id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repartidor`
--

LOCK TABLES `repartidor` WRITE;
/*!40000 ALTER TABLE `repartidor` DISABLE KEYS */;
INSERT INTO `repartidor` VALUES (1,0),(2,0),(3,1),(4,0),(8,0),(11,0);
/*!40000 ALTER TABLE `repartidor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Orden confirmada'),(2,'Pizzas ingresadas a horno'),(3,'Orden lista'),(4,'Orden en camino'),(5,'Orden entregada'),(6,'Orden cancelada');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
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
  CONSTRAINT `status_operacion_Operacion` FOREIGN KEY (`Operacion_id`) REFERENCES `operacion` (`id`),
  CONSTRAINT `status_operacion_Status` FOREIGN KEY (`Status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_operacion`
--

LOCK TABLES `status_operacion` WRITE;
/*!40000 ALTER TABLE `status_operacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_operacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(200) NOT NULL,
  `lat` double(11,5) NOT NULL,
  `lon` double(11,5) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursal`
--

LOCK TABLES `sucursal` WRITE;
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT INTO `sucursal` VALUES (1,'Av Hda. de Pastejé 5, Impulsora Popular Avicola, Nezahualcóyotl, Méx.',19.48536,-99.04856,'Impulsora'),(2,'Calz del Hueso 690, Los Sauces, Ciudad de México, D.F.',19.30163,-99.11759,'Coapa'),(3,'La Espiga 299, 57001 Benito Juárez, Méx.',19.41018,-99.00337,'Mariquita Linda'),(4,'Mixiuhca, Jardín Balbuena, Ciudad de México',19.41024,-99.11339,'Balbuena'),(5,'Calle Miguel Lebrija 171, Aviación Civil, Ciudad de México, D.F.',19.41610,-99.07624,'Pantitlán'),(6,'Av. Juan de Dios Bátiz s/n, Gustavo A. Madero, CIDETEC, Nueva Industrial Vallejo, 07700 Ciudad de México, D.F.',19.50447,-99.14714,'Plaza Torres Lindavista');
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-10 13:50:35
