-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.6.4-MariaDB-1:10.6.4+maria~focal - mariadb.org binary distribution
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour restaurant
DROP DATABASE IF EXISTS `restaurant`;
CREATE DATABASE IF NOT EXISTS `restaurant` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `restaurant`;

-- Listage de la structure de la table restaurant. admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table restaurant.admin : ~0 rows (environ)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `email`, `password`) VALUES
	(1, 'test3@mail.Com', '$2y$10$080o1M8bczBgO9v1o/FCcuvepdsB4tddxwX7iUMCCYNvEBrycgq7m'),
	(2, 'test4@mail.Com', '$2y$10$K3SIv0XpAUw37.qFmtHRfufYvjLxm/4RztdGfkmewLuMOsRmqmVoq'),
	(3, 'test4@mail.Com', '$2y$10$uIS2NpMocYh0n2UYJOXyxOk7UMBCAqMYc9KL5nKug1VMYZw.fAati'),
	(4, 'test4@mail.Com', '$2y$10$c.4F7KKfsOHNzoVRn891OOrn21vf4fWQe/vVLBWk.H1ScHHNcumZ2');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Listage de la structure de la table restaurant. auth_app
DROP TABLE IF EXISTS `auth_app`;
CREATE TABLE IF NOT EXISTS `auth_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `apikey` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table restaurant.auth_app : ~0 rows (environ)
DELETE FROM `auth_app`;
/*!40000 ALTER TABLE `auth_app` DISABLE KEYS */;
INSERT INTO `auth_app` (`id`, `name`, `apikey`) VALUES
	(1, 'testnameapikey', 'toto');
/*!40000 ALTER TABLE `auth_app` ENABLE KEYS */;

-- Listage de la structure de la table restaurant. client
DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(40) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `codepostal` int(11) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table restaurant.client : ~0 rows (environ)
DELETE FROM `client`;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
/*!40000 ALTER TABLE `client` ENABLE KEYS */;

-- Listage de la structure de la table restaurant. commande
DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) DEFAULT NULL,
  `id_payement` int(11) DEFAULT NULL,
  `statut` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commande_ibfk_1` (`id_client`),
  KEY `commande_ibfk_2` (`id_payement`),
  CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_payement`) REFERENCES `payement` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table restaurant.commande : ~0 rows (environ)
DELETE FROM `commande`;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;

-- Listage de la structure de la table restaurant. menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table restaurant.menu : ~3 rows (environ)
DELETE FROM `menu`;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `type`, `name`, `description`, `prix`) VALUES
	(1, 'entrée', 'test entree', 'test entree description', 5),
	(2, 'dessert', 'test dessert', 'test desssert description', 7);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Listage de la structure de la table restaurant. payement
DROP TABLE IF EXISTS `payement`;
CREATE TABLE IF NOT EXISTS `payement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_carte` int(11) DEFAULT NULL,
  `crypto` int(11) DEFAULT NULL,
  `nom_carte` varchar(40) DEFAULT NULL,
  `date_exp` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table restaurant.payement : ~0 rows (environ)
DELETE FROM `payement`;
/*!40000 ALTER TABLE `payement` DISABLE KEYS */;
/*!40000 ALTER TABLE `payement` ENABLE KEYS */;

-- Listage de la structure de la table restaurant. place
DROP TABLE IF EXISTS `place`;
CREATE TABLE IF NOT EXISTS `place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nb_personne` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table restaurant.place : ~0 rows (environ)
DELETE FROM `place`;
/*!40000 ALTER TABLE `place` DISABLE KEYS */;
/*!40000 ALTER TABLE `place` ENABLE KEYS */;

-- Listage de la structure de la table restaurant. reserve
DROP TABLE IF EXISTS `reserve`;
CREATE TABLE IF NOT EXISTS `reserve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  `date` int(11) DEFAULT NULL,
  `heure` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`),
  KEY `id_place` (`id_place`),
  CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  CONSTRAINT `reserve_ibfk_2` FOREIGN KEY (`id_place`) REFERENCES `place` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table restaurant.reserve : ~0 rows (environ)
DELETE FROM `reserve`;
/*!40000 ALTER TABLE `reserve` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserve` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
