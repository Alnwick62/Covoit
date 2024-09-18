-- MySQL dump 10.19  Distrib 10.3.39-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: covoit2024
-- ------------------------------------------------------
-- Server version	10.3.39-MariaDB-0+deb10u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `CovoitUser`
--

DROP TABLE IF EXISTS `CovoitUser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CovoitUser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `tel` char(10) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `mdp` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CovoitUser`
--

LOCK TABLES `CovoitUser` WRITE;
/*!40000 ALTER TABLE `CovoitUser` DISABLE KEYS */;
INSERT INTO `CovoitUser` VALUES (1,'Dupont','Jean','0612345678','jean.dupont@example.com','testupdate'),(2,'Martin','Julie','0612345678','julie.martin@example.com','$2b$12$2s/zN5lgZ9E0z1o7QuDZs.TsW3z58eCksFMP2XzQX02dGsz1x51Nu'),(3,'Bernard','Lucas','0622334455','lucas.bernard@example.com','$2b$12$ZXQAfRLU6nDW4JmU4XfN5.rjR6gG9uFi9MfZs4zD5M8MTXe5/A1CO'),(4,'Dupont','Claire','0633445566','claire.dupont@example.com','$2b$12$8tFNeQi6zJoj9zK.QrxS4Opf9pzxA3zz4e5f2kD3clA63qOeofv/a'),(5,'Petit','Jean','0644556677','jean.petit@example.com','$2b$12$LV0pJ7tS9EjgAVFZ2JVo1.IVmZ8Jq3W1dKH0Ko8v/NsHtmIQJniHS'),(6,'Lemoine','Sophie','0655667788','sophie.lemoine@example.com','$2b$12$LQDP53Pxj.pxSkV/dI25lupfA7WyR.H/sUmk4w6c7qlhhF9uXh8bK'),(7,'Rousseau','Paul','0666778899','paul.rousseau@example.com','$2b$12$KxP7rGBoVYM54ZZRyfr6d.7lwLiy8JZZhF3nPuc2INy5MkY2uecpa'),(8,'Gauthier','Nathalie','0677889900','nathalie.gauthier@example.com','$2b$12$KB3TST3MBz5Al5LoPxmVu.Lksy9r/rpJ7L1J/fbgu1ysW7BxLEQoa'),(9,'Laurent','Michel','0688990011','michel.laurent@example.com','$2b$12$OqizRczLKkJ2cH/qZT3w6.LzeykZukXqjRbuFSbiULz8sQd/U3lE6'),(10,'Moreau','Anne','0699001122','anne.moreau@example.com','$2b$12$G6U5ymTL0/4czR2IkqJ8a.S/yTAz5DnxKTN2iRQOWIL3w/Jj4RY.'),(11,'Fournier','Étienne','0600112233','etienne.fournier@example.com','$2b$12$4QZStikTTf8lMzbXDOhsZ.Q5bF7z6MCjGEnWkwWwS5WJXfZ3Vu23S'),(12,'Dubois','Marie','0611223344','marie.dubois@example.com','$2b$12$uXjO.Zq.Q9Wd/LldEl60OC5zjLxaL2rqBL0LpWyZ7xPV2AkaV7s8K'),(13,'Charpentier','François','0622334455','francois.charpentier@example.com','$2b$12$k5u4grr4xzQJK0HVVJ9Ode3a2vO1'),(14,'Catteau','Corentin','0769197577','corentin.catteau@gmail.com','Coco62');
/*!40000 ALTER TABLE `CovoitUser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OffreCovoit`
--

DROP TABLE IF EXISTS `OffreCovoit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OffreCovoit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jour` enum('lundi','mardi','mercredi','jeudi','vendredi') DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `lieu` varchar(40) DEFAULT NULL,
  `chauffeur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chauffeur` (`chauffeur`),
  CONSTRAINT `OffreCovoit_ibfk_1` FOREIGN KEY (`chauffeur`) REFERENCES `CovoitUser` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OffreCovoit`
--

LOCK TABLES `OffreCovoit` WRITE;
/*!40000 ALTER TABLE `OffreCovoit` DISABLE KEYS */;
INSERT INTO `OffreCovoit` VALUES (1,'lundi','08:00:00','2024-09-09','Paris',1),(2,'mardi','09:30:00','2024-09-10','Lyon',2),(3,'mercredi','15:30:00','2024-09-11','Marseille',3),(4,'jeudi','13:00:00','2024-09-12','Toulouse',4),(5,'vendredi','18:00:00','2024-09-13','Nice',5),(6,'lundi','07:30:00','2024-09-16','Nantes',6),(7,'mardi','16:00:00','2024-09-17','Bordeaux',7),(8,'mercredi','14:30:00','2024-09-18','Strasbourg',8),(9,'jeudi','10:00:00','2024-09-19','Lille',9),(10,'vendredi','19:30:00','2024-09-20','Rennes',10),(11,'lundi','08:15:00','2024-09-23','Grenoble',11),(12,'mardi','11:00:00','2024-09-24','Montpellier',12),(13,'mercredi','12:30:00','2024-09-25','Dijon',13);
/*!40000 ALTER TABLE `OffreCovoit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-17 22:49:21
