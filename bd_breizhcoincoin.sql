-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 03 juin 2022 à 22:00
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_breizhcoincoin`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(42) DEFAULT NULL,
  `motpass` varchar(42) DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idadmin`, `matricule`, `motpass`) VALUES
(1, 'MABD', '1234r');

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `idannonce` int(11) NOT NULL AUTO_INCREMENT,
  `titreannonce` varchar(42) DEFAULT NULL,
  `texteannonce` varchar(42) DEFAULT NULL,
  `prix` double DEFAULT NULL,
  `dateannonce` date DEFAULT NULL,
  `idcategorie` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idannonce`),
  KEY `user_id` (`user_id`),
  KEY `idcategorie` (`idcategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`idannonce`, `titreannonce`, `texteannonce`, `prix`, `dateannonce`, `idcategorie`, `user_id`, `photo`) VALUES
(1, 'Porsche', 'Une belle porsche pour une belle parfaite', 1234, '2022-05-31', 1, 1, 'ser-pic5.jpg'),
(2, 'Mercedes', 'Berline 5 portes, mononpace ', 132536, '2022-05-30', 3, 1, 'mercedes-classe-a-18_1.jpg'),
(3, 'Bague en or jaune', '18Cts avec ue amÃ©thyste cabochon ', 234, '2022-05-31', 6, 1, 'bague gendraud.JPG'),
(4, 'Bracelet fred ', 'Grand modÃ¨le en or 18Cs et diamant', 345, '2022-05-11', 1, 1, '66-tm_categorylist.jpg'),
(5, 'Broche en platine', 'avec 1,5CTS de diamant', 3456, '2022-06-15', 6, 1, 'broche-en-platine-avec-150-cts-de-diamants-central-040-cts-h-si-vers-1930.png'),
(6, 'GSX-S1000GT-MillÃ©sime 2022|Suziki Moto', 'Bonne vitesse ', 2425, '2022-06-01', 4, 1, 'yamaha-700-mt-07-2018-700px-526x410.jpg'),
(7, 'Coolier double perle', 'de culture japon en chute', 3456, '2022-05-30', 6, 1, 'collier-double-de-perles-de-culture-du-japon-en-chute-fermoir-avec-diamants.png');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idcategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nomcategorie` varchar(42) DEFAULT NULL,
  PRIMARY KEY (`idcategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idcategorie`, `nomcategorie`) VALUES
(1, 'jeux'),
(2, 'jouet'),
(3, 'voiture'),
(4, 'location'),
(5, 'Livre'),
(6, 'Bijoux');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `idannonce` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`idannonce`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(42) DEFAULT NULL,
  `prenoms` varchar(42) DEFAULT NULL,
  `mail` varchar(42) DEFAULT NULL,
  `mot_pass` varchar(42) DEFAULT NULL,
  `role` varchar(42) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`user_id`, `nom`, `prenoms`, `mail`, `mot_pass`, `role`) VALUES
(1, 'Tchimou', 'Alvine', 'tchimoualvine1122@gmail.com', 'sweetie1912', NULL),
(2, 'sam', 'josee', 'sam@gmail.com', '1234', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`user_id`),
  ADD CONSTRAINT `annonce_ibfk_2` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilisateur` (`user_id`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`idannonce`) REFERENCES `annonce` (`idannonce`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
