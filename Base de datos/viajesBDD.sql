-- MySQL dump 10.13  Distrib 8.0.14, for Win64 (x86_64)
--
-- Host: localhost    Database: viajesbdd
-- ------------------------------------------------------
-- Server version	8.0.14

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
-- Table structure for table `asiento`
--

DROP TABLE IF EXISTS `asiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `asiento` (
  `NUM_ASIENTO` int(11) NOT NULL,
  `NUM_BUS` int(11) DEFAULT NULL,
  `TIPO_ASIENTO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NUM_ASIENTO`),
  KEY `FK_ESTA_RESERVADO` (`NUM_BUS`),
  CONSTRAINT `FK_ESTA_RESERVADO` FOREIGN KEY (`NUM_BUS`) REFERENCES `bus` (`NUM_BUS`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asiento`
--

LOCK TABLES `asiento` WRITE;
/*!40000 ALTER TABLE `asiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `asiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bus`
--

DROP TABLE IF EXISTS `bus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `bus` (
  `NUM_BUS` int(11) NOT NULL,
  `ID_EMP` int(11) DEFAULT NULL,
  `ID_LUGAR` int(11) DEFAULT NULL,
  `NOMBRE_CONDUCTOR` varchar(50) NOT NULL,
  `NUM_ASIENTOS` int(11) NOT NULL,
  `TIPO_BUS` varchar(50) NOT NULL,
  PRIMARY KEY (`NUM_BUS`),
  KEY `FK_FORMA_PARTE_DE` (`ID_EMP`),
  KEY `FK_RELATIONSHIP_10` (`ID_LUGAR`),
  CONSTRAINT `FK_FORMA_PARTE_DE` FOREIGN KEY (`ID_EMP`) REFERENCES `emp__afiliada` (`ID_EMP`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ID_LUGAR`) REFERENCES `lugares` (`ID_LUGAR`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bus`
--

LOCK TABLES `bus` WRITE;
/*!40000 ALTER TABLE `bus` DISABLE KEYS */;
/*!40000 ALTER TABLE `bus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ciudad` (
  `COD_CIUDAD` int(11) NOT NULL,
  `ID_TERM` int(11) DEFAULT NULL,
  `CODPROV` int(11) DEFAULT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `LONGITUD` decimal(15,7) NOT NULL,
  `LATITUD` decimal(15,7) NOT NULL,
  PRIMARY KEY (`COD_CIUDAD`),
  KEY `FK_RELATIONSHIP_11` (`CODPROV`),
  KEY `FK_RELATIONSHIP_15` (`ID_TERM`),
  CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`CODPROV`) REFERENCES `provincia` (`CODPROV`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`ID_TERM`) REFERENCES `terminal` (`ID_TERM`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `compra` (
  `IDCOMPRA` int(11) NOT NULL,
  `IDPAQUETE` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `FECHA_COM` date DEFAULT NULL,
  `NO_ASIENTOS` int(11) DEFAULT NULL,
  `TOTAL_ASIENTOS` decimal(10,0) DEFAULT NULL,
  `NO_HABITA` int(11) DEFAULT NULL,
  `NO_PAQUETES` int(11) DEFAULT NULL,
  `TOTAL_HABITA` decimal(10,0) DEFAULT NULL,
  `TOTAL_PAQUETES` decimal(10,0) DEFAULT NULL,
  `TOTAL` decimal(10,2) NOT NULL,
  PRIMARY KEY (`IDCOMPRA`),
  KEY `FK_REALIZA` (`ID`),
  KEY `FK_RELATIONSHIP_17` (`IDPAQUETE`),
  CONSTRAINT `FK_REALIZA` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`IDPAQUETE`) REFERENCES `paquetes` (`IDPAQUETE`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `con__climatologicas`
--

DROP TABLE IF EXISTS `con__climatologicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `con__climatologicas` (
  `IDCON` int(11) NOT NULL,
  `ID_LUGAR` int(11) DEFAULT NULL,
  `TEMPERATURA` decimal(15,7) NOT NULL,
  `PRESION` decimal(15,7) NOT NULL,
  `ESTADO` varchar(50) NOT NULL,
  `DESCRIPCION` text NOT NULL,
  `FECHA_HORA` datetime DEFAULT NULL,
  PRIMARY KEY (`IDCON`),
  KEY `FK_RELATIONSHIP_8` (`ID_LUGAR`),
  CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_LUGAR`) REFERENCES `lugares` (`ID_LUGAR`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `con__climatologicas`
--

LOCK TABLES `con__climatologicas` WRITE;
/*!40000 ALTER TABLE `con__climatologicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `con__climatologicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp__afiliada`
--

DROP TABLE IF EXISTS `emp__afiliada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `emp__afiliada` (
  `ID_EMP` int(11) NOT NULL,
  `ID_TERM` int(11) DEFAULT NULL,
  `NOMBRE_EMP` varchar(100) NOT NULL,
  `EMAIL_EMP` varchar(100) NOT NULL,
  `TEL_EMP` decimal(10,0) NOT NULL,
  PRIMARY KEY (`ID_EMP`),
  KEY `FK_SE_ENCUENTRA_EN_UN` (`ID_TERM`),
  CONSTRAINT `FK_SE_ENCUENTRA_EN_UN` FOREIGN KEY (`ID_TERM`) REFERENCES `terminal` (`ID_TERM`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp__afiliada`
--

LOCK TABLES `emp__afiliada` WRITE;
/*!40000 ALTER TABLE `emp__afiliada` DISABLE KEYS */;
/*!40000 ALTER TABLE `emp__afiliada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `habitaciones`
--

DROP TABLE IF EXISTS `habitaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `habitaciones` (
  `ID_HAB` int(11) NOT NULL,
  `ID_HOTEL` int(11) DEFAULT NULL,
  `NO` int(11) NOT NULL,
  `TIPO_HAB` varchar(50) NOT NULL,
  `ESTADO_HAB` varchar(50) NOT NULL,
  `NO_CAMAS` int(11) NOT NULL,
  PRIMARY KEY (`ID_HAB`),
  KEY `FK_TIENE1` (`ID_HOTEL`),
  CONSTRAINT `FK_TIENE1` FOREIGN KEY (`ID_HOTEL`) REFERENCES `hotel` (`ID_HOTEL`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habitaciones`
--

LOCK TABLES `habitaciones` WRITE;
/*!40000 ALTER TABLE `habitaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `habitaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `hotel` (
  `ID_HOTEL` int(11) NOT NULL,
  `COD_CIUDAD` int(11) DEFAULT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `TELEFONO` decimal(20,0) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `SITIO_WEB` varchar(200) DEFAULT NULL,
  `NO_HABITACIONES` int(11) NOT NULL,
  PRIMARY KEY (`ID_HOTEL`),
  KEY `FK_RELATIONSHIP_14` (`COD_CIUDAD`),
  CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`COD_CIUDAD`) REFERENCES `ciudad` (`COD_CIUDAD`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel`
--

LOCK TABLES `hotel` WRITE;
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lugares`
--

DROP TABLE IF EXISTS `lugares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `lugares` (
  `ID_LUGAR` int(11) NOT NULL,
  `COD_CIUDAD` int(11) DEFAULT NULL,
  `IDPAQUETE` int(11) DEFAULT NULL,
  `NOMBRE_LUGAR` varchar(100) NOT NULL,
  `LONGITUD` decimal(15,7) NOT NULL,
  `LATITUD` decimal(15,7) NOT NULL,
  PRIMARY KEY (`ID_LUGAR`),
  KEY `FK_RELATIONSHIP_12` (`COD_CIUDAD`),
  KEY `FK_RELATIONSHIP_18` (`IDPAQUETE`),
  CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`COD_CIUDAD`) REFERENCES `ciudad` (`COD_CIUDAD`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RELATIONSHIP_18` FOREIGN KEY (`IDPAQUETE`) REFERENCES `paquetes` (`IDPAQUETE`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugares`
--

LOCK TABLES `lugares` WRITE;
/*!40000 ALTER TABLE `lugares` DISABLE KEYS */;
/*!40000 ALTER TABLE `lugares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paquetes`
--

DROP TABLE IF EXISTS `paquetes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `paquetes` (
  `IDPAQUETE` int(11) NOT NULL,
  `ID_LUGAR` int(11) DEFAULT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `NO_DIAS` int(11) NOT NULL,
  `NO_NOCHES` int(11) NOT NULL,
  `DESCRIP` text NOT NULL,
  PRIMARY KEY (`IDPAQUETE`),
  KEY `FK_RELATIONSHIP_16` (`ID_LUGAR`),
  CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`ID_LUGAR`) REFERENCES `lugares` (`ID_LUGAR`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquetes`
--

LOCK TABLES `paquetes` WRITE;
/*!40000 ALTER TABLE `paquetes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paquetes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincia`
--

DROP TABLE IF EXISTS `provincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `provincia` (
  `CODPROV` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  PRIMARY KEY (`CODPROV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincia`
--

LOCK TABLES `provincia` WRITE;
/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `reserva` (
  `IDCOMPRA` int(11) NOT NULL,
  `ID_HAB` int(11) NOT NULL,
  PRIMARY KEY (`IDCOMPRA`,`ID_HAB`),
  KEY `FK_RESERVA2` (`ID_HAB`),
  CONSTRAINT `FK_RESERVA` FOREIGN KEY (`IDCOMPRA`) REFERENCES `compra` (`IDCOMPRA`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_RESERVA2` FOREIGN KEY (`ID_HAB`) REFERENCES `habitaciones` (`ID_HAB`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terminal`
--

DROP TABLE IF EXISTS `terminal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `terminal` (
  `ID_TERM` int(11) NOT NULL,
  `NOMBRE_TERM` varchar(50) NOT NULL,
  `LONGITUD` decimal(15,7) NOT NULL,
  `LATITUD` decimal(15,7) NOT NULL,
  PRIMARY KEY (`ID_TERM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terminal`
--

LOCK TABLES `terminal` WRITE;
/*!40000 ALTER TABLE `terminal` DISABLE KEYS */;
/*!40000 ALTER TABLE `terminal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiene`
--

DROP TABLE IF EXISTS `tiene`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tiene` (
  `IDCOMPRA` int(11) NOT NULL,
  `NUM_ASIENTO` int(11) NOT NULL,
  PRIMARY KEY (`IDCOMPRA`,`NUM_ASIENTO`),
  KEY `FK_TIENE2` (`NUM_ASIENTO`),
  CONSTRAINT `FK_TIENE` FOREIGN KEY (`IDCOMPRA`) REFERENCES `compra` (`IDCOMPRA`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_TIENE2` FOREIGN KEY (`NUM_ASIENTO`) REFERENCES `asiento` (`NUM_ASIENTO`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiene`
--

LOCK TABLES `tiene` WRITE;
/*!40000 ALTER TABLE `tiene` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiene` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `TELEFONO` decimal(20,0) DEFAULT NULL,
  `FECHA_NAC` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
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

-- Dump completed on 2019-07-01 21:27:25
