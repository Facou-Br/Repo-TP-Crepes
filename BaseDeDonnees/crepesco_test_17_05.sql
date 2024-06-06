-- SQLBook: Code
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 17 mai 2024 à 06:27
-- Version du serveur : 8.3.0
-- Version de PHP : 8.3.6

SET SQL_MODE = NO_AUTO_VALUE_ON_ZERO;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `crepesco_test`
--

DROP DATABASE IF EXISTS `crepesco_test`;
CREATE DATABASE IF NOT EXISTS `crepesco_test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `crepesco_test`;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--
-- Création : ven. 17 mai 2024 à 06:11
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `NumCom` int NOT NULL AUTO_INCREMENT,
  `NomClient` char(25) NOT NULL,
  `TelClient` char(20) NOT NULL,
  `AdrClient` char(30) DEFAULT NULL,
  `CP_Client` char(5) DEFAULT NULL,
  `VilClient` char(20) DEFAULT NULL,
  `Date` date NOT NULL,
  `HeureDispo` time NOT NULL,
  `TypeEmbal` varchar(10) NOT NULL DEFAULT 'C',
  `A_Livrer` tinyint(1) NOT NULL DEFAULT '1',
  `EtatCde` char(15) NOT NULL DEFAULT 'Acceptée',
  `EtatLivraison` char(20) DEFAULT 'preparation',
  `CoutLiv` float DEFAULT NULL,
  `TotalTTC` float DEFAULT NULL,
  `DateArchiv` date DEFAULT NULL,
  `IdLivreur` int DEFAULT NULL,
  PRIMARY KEY (`NumCom`),
  UNIQUE KEY `ID_COMMANDE_IND` (`NumCom`),
  KEY `FKLivre` (`IdLivreur`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `com_det`
--
-- Création : ven. 17 mai 2024 à 06:11
--

DROP TABLE IF EXISTS `com_det`;
CREATE TABLE IF NOT EXISTS `com_det` (
  `Num_OF` int NOT NULL,
  `Quant` int NOT NULL,
  `NumCom` int NOT NULL,
  PRIMARY KEY (`Num_OF`),
  UNIQUE KEY `FKCon_DET_IND` (`Num_OF`),
  KEY `FKCon_COM` (`NumCom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `detail`
--
-- Création : ven. 17 mai 2024 à 06:11
--

DROP TABLE IF EXISTS `detail`;
CREATE TABLE IF NOT EXISTS `detail` (
  `Num_OF` int NOT NULL AUTO_INCREMENT,
  `NomProd` char(30) NOT NULL,
  `IngBase1` char(20) NOT NULL,
  `IngBase2` char(20) DEFAULT NULL,
  `IngBase3` char(20) DEFAULT NULL,
  `IngBase4` char(20) DEFAULT NULL,
  `IngOpt1` char(20) DEFAULT NULL,
  `IngOpt2` char(20) DEFAULT NULL,
  `IngOpt3` char(20) DEFAULT NULL,
  `IngOpt4` char(20) DEFAULT NULL,
  `DateArchiv` date DEFAULT NULL,
  `IdProd` int NOT NULL,
  PRIMARY KEY (`Num_OF`),
  UNIQUE KEY `ID_DETAIL_IND` (`Num_OF`),
  KEY `FKEstChoisi` (`IdProd`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `det_ingr`
--
-- Création : ven. 17 mai 2024 à 06:11
--

DROP TABLE IF EXISTS `det_ingr`;
CREATE TABLE IF NOT EXISTS `det_ingr` (
  `Num_OF` int NOT NULL,
  `IdIngred` int NOT NULL,
  PRIMARY KEY (`IdIngred`,`Num_OF`),
  UNIQUE KEY `ID_Utilise_IND` (`IdIngred`,`Num_OF`),
  KEY `FKUti_DET` (`Num_OF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--
-- Création : ven. 17 mai 2024 à 06:11
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `NomFourn` char(25) NOT NULL,
  `Adresse` char(50) NOT NULL,
  `CodePostal` char(5) NOT NULL,
  `Ville` char(20) NOT NULL,
  `Tel` char(20) NOT NULL,
  `DateArchiv` date DEFAULT NULL,
  PRIMARY KEY (`NomFourn`),
  UNIQUE KEY `ID_FOURNISSEUR_IND` (`NomFourn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `fourn_ingr`
--
-- Création : ven. 17 mai 2024 à 06:11
--

DROP TABLE IF EXISTS `fourn_ingr`;
CREATE TABLE IF NOT EXISTS `fourn_ingr` (
  `NomFourn` char(25) NOT NULL,
  `IdIngred` int NOT NULL,
  `PrixUHT` float NOT NULL,
  PRIMARY KEY (`NomFourn`,`IdIngred`),
  UNIQUE KEY `ID_Provient_IND` (`NomFourn`,`IdIngred`),
  KEY `FKPro_ING` (`IdIngred`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--
-- Création : ven. 17 mai 2024 à 06:11
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `IdIngred` int NOT NULL AUTO_INCREMENT,
  `NomIngred` char(30) NOT NULL,
  `Frais` char(1) DEFAULT NULL,
  `Unite` CHAR(10) NOT NULL DEFAULT "'sans'",
  `SeuilStock` int NOT NULL DEFAULT '1',
  `StockMin` int NOT NULL,
  `StockReel` float NOT NULL,
  `PrixUHT_Moyen` float NOT NULL,
  `Q_A_Com` int NOT NULL,
  `DateArchiv` date DEFAULT NULL,
  PRIMARY KEY (`IdIngred`),
  UNIQUE KEY `ID_INGREDIENT_IND` (`IdIngred`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--
-- Création : ven. 17 mai 2024 à 06:11
--

DROP TABLE IF EXISTS `livreur`;
CREATE TABLE IF NOT EXISTS `livreur` (
  `IdLivreur` int NOT NULL AUTO_INCREMENT,
  `Nom` char(20) NOT NULL,
  `Prenom` char(20) NOT NULL,
  `Tel` char(16) NOT NULL,
  `NumSS` char(30) NOT NULL,
  `Disponible` tinyint(1) NOT NULL,
  `DateArchiv` date DEFAULT NULL,
  PRIMARY KEY (`IdLivreur`),
  UNIQUE KEY `ID_LIVREUR_IND` (`IdLivreur`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb3;

--
-- Structure de la table `produit`
--
-- Création : ven. 17 mai 2024 à 06:11
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `IdProd` int NOT NULL AUTO_INCREMENT,
  `NomProd` char(30) NOT NULL,
  `Active` char(1) NOT NULL,
  `Taille` char(1) DEFAULT NULL,
  `NbIngBase` int DEFAULT NULL,
  `NbIngOpt` int DEFAULT NULL,
  `PrixUHT` float NOT NULL,
  `Image` char(50) DEFAULT NULL,
  `IngBase1` char(20) NOT NULL,
  `IngBase2` char(20) DEFAULT NULL,
  `IngBase3` char(20) DEFAULT NULL,
  `IngBase4` char(20) DEFAULT NULL,
  `IngBase5` char(20) DEFAULT NULL,
  `IngOpt1` char(20) DEFAULT NULL,
  `IngOpt2` char(20) DEFAULT NULL,
  `IngOpt3` char(20) DEFAULT NULL,
  `IngOpt4` char(20) DEFAULT NULL,
  `IngOpt5` char(20) DEFAULT NULL,
  `IngOpt6` char(20) DEFAULT NULL,
  `NbOptMax` int DEFAULT NULL,
  `DateArchiv` date DEFAULT NULL,
  PRIMARY KEY (`IdProd`),
  UNIQUE KEY `ID_PRODUIT_IND` (`IdProd`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `prod_ingr`
--
-- Création : ven. 17 mai 2024 à 06:11
--

DROP TABLE IF EXISTS `prod_ingr`;
CREATE TABLE IF NOT EXISTS `prod_ingr` (
  `IdIngred` int NOT NULL,
  `IdProd` int NOT NULL,
  `Quant` int NOT NULL,
  PRIMARY KEY (`IdIngred`,`IdProd`),
  UNIQUE KEY `ID_Comporte_IND` (`IdIngred`,`IdProd`),
  KEY `FKCom_PRO` (`IdProd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--
-- Création : ven. 17 mai 2024 à 06:11
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE IF NOT EXISTS `responsable` (
  `IdRes` int NOT NULL AUTO_INCREMENT,
  `Nom` char(25) NOT NULL,
  `Prenom` char(20) NOT NULL,
  `Tel` char(10) NOT NULL,
  PRIMARY KEY (`IdRes`),
  UNIQUE KEY `ID_RESPONSABLE_IND` (`IdRes`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FKLivre` FOREIGN KEY (`IdLivreur`) REFERENCES `livreur` (`IdLivreur`);

--
-- Contraintes pour la table `com_det`
--
ALTER TABLE `com_det`
  ADD CONSTRAINT `FKCon_COM` FOREIGN KEY (`NumCom`) REFERENCES `commande` (`NumCom`),
  ADD CONSTRAINT `FKCon_DET_FK` FOREIGN KEY (`Num_OF`) REFERENCES `detail` (`Num_OF`);

--
-- Contraintes pour la table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `FKEstChoisi` FOREIGN KEY (`IdProd`) REFERENCES `produit` (`IdProd`);

--
-- Contraintes pour la table `det_ingr`
--
ALTER TABLE `det_ingr`
  ADD CONSTRAINT `FKUti_DET` FOREIGN KEY (`Num_OF`) REFERENCES `detail` (`Num_OF`),
  ADD CONSTRAINT `FKUti_ING` FOREIGN KEY (`IdIngred`) REFERENCES `ingredient` (`IdIngred`);

--
-- Contraintes pour la table `fourn_ingr`
--
ALTER TABLE `fourn_ingr`
  ADD CONSTRAINT `FKPro_FOU` FOREIGN KEY (`NomFourn`) REFERENCES `fournisseur` (`NomFourn`),
  ADD CONSTRAINT `FKPro_ING` FOREIGN KEY (`IdIngred`) REFERENCES `ingredient` (`IdIngred`);

--
-- Contraintes pour la table `prod_ingr`
--
ALTER TABLE `prod_ingr`
  ADD CONSTRAINT `FKCom_ING` FOREIGN KEY (`IdIngred`) REFERENCES `ingredient` (`IdIngred`),
  ADD CONSTRAINT `FKCom_PRO` FOREIGN KEY (`IdProd`) REFERENCES `produit` (`IdProd`);

-- --------------------------------------------------------------------------------------------------------------------

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`NomProd`, `Active`, `Taille`, `NbIngBase`, `NbIngOpt`, `PrixUHT`, `Image`, `IngBase1`, `IngBase2`, `IngBase3`, `IngBase4`, `IngBase5`, `IngOpt1`, `IngOpt2`, 
`IngOpt3`, `IngOpt4`, `IngOpt5`, `IngOpt6`, `NbOptMax`, `DateArchiv`) VALUES
('CrepesSuzette', '1', 'M', 3, 2, 2, '/jpeg/breton.jpg', 'Farine', 'Oeufs', 'Lait', 'Nutella', 'Chocolat', 'Fraise', 'Banane', 'Chantilly', 'Jambon', 'Bacon', 'Emmental', 2, '0000-00-00'),
('Salade', '1', 'M', 3, 2, 2, 'salade.jpg', 'Tomate', 'Salade', 'Pomme de terre', 'Carotte', 'Courgette', 'Aubergine', 'Poivron', 'Oignon', 'Ail', 'Huile', 'Reblochon', 2, '0000-00-00'),
('Crêpe Kebab', '1', 'M', 3, 2, 2, '/jpeg/kebab.jpg', 'Tomate', 'Salade', 'Pomme de terre', 'Carotte', 'Courgette', 'Aubergine', 'Poivron', 'Oignon', 'Ail', 'Huile', 'Reblochon', 2, '0000-00-00'),
('Crêpe aux fruits de saison', '1', 'M', 3, 2, 2, 'jpeg/fruitsaison.jpg', 'Tomate', 'Salade', 'Pomme de terre', 'Carotte', 'Courgette', 'Aubergine', 'Poivron', 'Oignon', 'Ail', 'Huile', 'Reblochon', 2, '0000-00-00'),
('Crêpe aux fruits de mer', '1', 'M', 3, 2, 2, 'jpeg/fruitdemer.jpg', 'Tomate', 'Salade', 'Pomme de terre', 'Carotte', 'Courgette', 'Aubergine', 'Poivron', 'Oignon', 'Ail', 'Huile', 'Reblochon', 2, '0000-00-00'),
('Crêpe aux épinards', '1', 'M', 3, 2, 2, 'jpeg/epinard.jpeg', 'Tomate', 'Salade', 'Pomme de terre', 'Carotte', 'Courgette', 'Aubergine', 'Poivron', 'Oignon', 'Ail', 'Huile', 'Reblochon', 2, '0000-00-00'),
('Crêpe aux pommes caramélisées', '1', 'M', 3, 2, 2, 'jpeg/pomme.jpg', 'Tomate', 'Salade', 'Pomme de terre', 'Carotte', 'Courgette', 'Aubergine', 'Poivron', 'Oignon', 'Ail', 'Huile', 'Reblochon', 2, '0000-00-00'),
('Crêpe aux champignons', '1', 'M', 3, 2, 2, 'jpeg/champi.jpg', 'Tomate', 'Salade', 'Pomme de terre', 'Carotte', 'Courgette', 'Aubergine', 'Poivron', 'Oignon', 'Ail', 'Huile', 'Reblochon', 2, '0000-00-00');





--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`NomFourn`, `Adresse`, `CodePostal`, `Ville`, `Tel`, `DateArchiv`) VALUES
('Aldi', '40 Rue de la Belle Étoile', '94150', 'RUNGIS', '0800 25 25 30', '0000-00-00'),
('Carrefour', '1 Rue Jean Mermoz', '93100', 'MONTREUIL', '01 41 58 59 00', '0000-00-00'),
('Casino', "148 Rue de l'Université", '75007', 'PARIS', '01 53 65 24 00', '0000-00-00'),
('Coca‑Cola Company', '9 Chemin de Bretagne', '92130', 'ISSY LES MOULINEAUX', '01 46 88 89 00', '0000-00-00'),
('TransGourmet', 'Lieudit Les Bonnes Filles', '21200', 'Levernois', '0826 101 710', '0000-00-00');

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`NomIngred`, `Frais`, `Unite`, `SeuilStock`, `StockMin`, `StockReel`, `PrixUHT_Moyen`, `Q_A_Com`, `DateArchiv`) VALUES
('Farine', NULL, 'kg', 1, 0, 92, 2, 1, '0000-00-00'),
('Oeufs', NULL, 'unite', 1, 0, 88, 2, 1, '0000-00-00'),
('Lait', NULL, 'l', 1, 0, 94, 2, 1, '0000-00-00'),
('Sucre', NULL, 'kg', 1, 0, 100, 2, 1, '0000-00-00'),
('Nutella', NULL, 'kg', 1, 0, 98, 2, 1, '0000-00-00'),
('Chocolat', NULL, 'kg', 1, 0, 98, 2, 1, '0000-00-00'),
('Fraise', NULL, 'g', 1, 0, 94, 2, 1, '0000-00-00'),
('Banane', NULL, 'kg', 1, 0, 92, 2, 1, '0000-00-00'),
('Chantilly', NULL, 'l', 1, 0, 96, 2, 1, '0000-00-00'),
('Jambon', NULL, 'kg', 1, 0, 100, 2, 1, '0000-00-00'),
('Bacon', NULL, 'kg', 1, 0, 100, 2, 1, '0000-00-00'),
('Emmental', NULL, 'kg', 1, 0, 100, 2, 1, '0000-00-00'),
('Tomate', NULL, 'kg', 1, 0, 100, 2, 1, '0000-00-00'),
('Salade', NULL, 'unite', 1, 0, 100, 2, 1, '0000-00-00'),
('Pomme de terre', NULL, 'kg', 1, 0, 100, 2, 1, '0000-00-00'),
('Carotte', NULL, 'kg', 1, 0, 100, 2, 1, '0000-00-00'),
('Poivron', NULL, 'kg', 1, 0, 100, 2, 1, '0000-00-00'),
('Oignon', NULL, 'kg', 1, 0, 100, 2, 1, '0000-00-00'),
('Ail', NULL, 'kg', 1, 0, 100, 2, 1, '0000-00-00'),
('Huile', NULL, 'l', 1, 0, 100, 2, 1, '0000-00-00'),
('Reblochon', NULL, 'kg', 0, 0, 100, 12, 2, '0000-00-00'),
('Poulet', NULL, 'kg', 1, 0, 100, 2, 1, '0000-00-00'),
('Boeuf', NULL, 'kg', 1, 0, 100, 2, 1, '0000-00-00'),
('Thon', NULL, 'kg', 1, 0, 100, 2, 1, '0000-00-00'),
('Saumon', NULL, 'kg', 1, 0, 100, 2, 1, '0000-00-00'),
('Crevettes', NULL, 'kg', 1, 0, 100, 2, 1, '0000-00-00'),
('Persil', NULL, 'g', 1, 0, 100, 2, 1, '0000-00-00'),
('Basilic', NULL, 'g', 1, 0, 100, 2, 1, '0000-00-00'),
('Ciboulette', NULL, 'g', 1, 0, 100, 2, 1, '0000-00-00'),
('Curry', NULL, 'g', 1, 0, 100, 2, 1, '0000-00-00'),
('Paprika', NULL, 'g', 1, 0, 100, 2, 1, '0000-00-00'),
('Thym', NULL, 'g', 1, 0, 100, 2, 1, '0000-00-00'),
('Sauce Soja', NULL, 'l', 1, 0, 100, 2, 1, '0000-00-00'),
('Vinaigre Balsamique', NULL, 'l', 1, 0, 100, 2, 1, '0000-00-00'),
('Vin Blanc', NULL, 'l', 1, 0, 100, 2, 1, '0000-00-00'),
('Vin Rouge', NULL, 'l', 1, 0, 100, 2, 1, '0000-00-00'),
('Whisky', NULL, 'l', 1, 0, 100, 2, 1, '0000-00-00'),
('Rhum', NULL, 'l', 1, 0, 100, 2, 1, '0000-00-00'),
('Coca-cola', NULL, 'l', 1, 0, 100, 2, 1, '0000-00-00');

--
-- Déchargement des données de la table `livreur`
--

INSERT INTO `livreur` (`Nom`, `Prenom`, `Tel`, `NumSS`, `Disponible`, `DateArchiv`) VALUES
('GARCIA', 'Carlos', '01 02 03 04 16', '1 04 07 71 014 248 46', 1, '0000-00-00'),
('FERNANDEZ', 'Luis', '01 02 03 04 17', '1 04 07 71 014 248 47', 1, '0000-00-00'),
('RODRIGUEZ', 'Javier', '01 02 03 04 18', '1 04 07 71 014 248 48', 1, '0000-00-00'),
('LOPEZ', 'Miguel', '01 02 03 04 19', '1 04 07 71 014 248 49', 1, '0000-00-00'),
('MARTINEZ', 'Jose', '01 02 03 04 20', '1 04 07 71 014 248 50', 1, '0000-00-00'),
('SANCHEZ', 'Manuel', '01 02 03 04 21', '1 04 07 71 014 248 51', 1, '0000-00-00'),
('RAMIREZ', 'Pedro', '01 02 03 04 22', '1 04 07 71 014 248 52', 1, '0000-00-00'),
('TORRES', 'Antonio', '01 02 03 04 23', '1 04 07 71 014 248 53', 1, '0000-00-00'),
('GOMEZ', 'Juan', '01 02 03 04 24', '1 04 07 71 014 248 54', 1, '0000-00-00'),
('DIAZ', 'Angel', '01 02 03 04 25', '1 04 07 71 014 248 55', 1, '0000-00-00'),
('ALVAREZ', 'Fernando', '01 02 03 04 26', '1 04 07 71 014 248 56', 1, '0000-00-00'),
('MORENO', 'Santiago', '01 02 03 04 27', '1 04 07 71 014 248 57', 1, '0000-00-00'),
('ROMERO', 'Jorge', '01 02 03 04 28', '1 04 07 71 014 248 58', 1, '0000-00-00'),
('ALONSO', 'Diego', '01 02 03 04 29', '1 04 07 71 014 248 59', 1, '0000-00-00'),
('MORALES', 'Raul', '01 02 03 04 30', '1 04 07 71 014 248 60', 1, '0000-00-00'),
('ORTIZ', 'Pablo', '01 02 03 04 31', '1 04 07 71 014 248 61', 1, '0000-00-00'),
('GUTIERREZ', 'Manuel', '01 02 03 04 32', '1 04 07 71 014 248 62', 1, '0000-00-00'),
('CRUZ', 'Sergio', '01 02 03 04 33', '1 04 07 71 014 248 63', 1, '0000-00-00'),
('TORO', 'Ramon', '01 02 03 04 34', '1 04 07 71 014 248 64', 1, '0000-00-00'),
('VEGA', 'Francisco', '01 02 03 04 35', '1 04 07 71 014 248 65', 1, '0000-00-00'),
('MOLINA', 'Emilio', '01 02 03 04 36', '1 04 07 71 014 248 66', 1, '0000-00-00'),
('GALLEGOS', 'Andres', '01 02 03 04 37', '1 04 07 71 014 248 67', 1, '0000-00-00'),
('SERRANO', 'Joaquin', '01 02 03 04 38', '1 04 07 71 014 248 68', 1, '0000-00-00'),
('GARRIDO', 'Marcos', '01 02 03 04 39', '1 04 07 71 014 248 69', 1, '0000-00-00'),
('GIMENEZ', 'Enrique', '01 02 03 04 40', '1 04 07 71 014 248 70', 1, '0000-00-00'),
('DIEZ', 'Ruben', '01 02 03 04 41', '1 04 07 71 014 248 71', 1, '0000-00-00'),
('REYES', 'Alfonso', '01 02 03 04 42', '1 04 07 71 014 248 72', 1, '0000-00-00'),
('NAVARRO', 'Ivan', '01 02 03 04 43', '1 04 07 71 014 248 73', 1, '0000-00-00'),
('IGLESIAS', 'Eduardo', '01 02 03 04 44', '1 04 07 71 014 248 74', 1, '0000-00-00'),
('RUIZ', 'Roberto', '01 02 03 04 45', '1 04 07 71 014 248 75', 1, '0000-00-00');

--
-- Déchargement des données de la table `responsable`
--

INSERT INTO `responsable` (`Nom`, `Prenom`, `Tel`) VALUES
('Boudon', 'Owen', '0638045422');

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`NomClient`, `TelClient`, `AdrClient`, `CP_Client`, `VilClient`, `Date`, `HeureDispo`, `TypeEmbal`, `A_Livrer`, `EtatCde`, `EtatLivraison`, `CoutLiv`, `TotalTTC`, `DateArchiv`, `IdLivreur`) VALUES
('DUPONT', '01 02 03 04 05', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:10:00', 'Sac', 1, 'Acceptée', 'preparation', 5, 10, '0000-00-00', 1),
('DURAND', '01 02 03 04 06', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:12:00', 'Sac', 1, 'Acceptée', 'fin_preparation', 5, 10, '0000-00-00', 2),
('MARTIN', '01 02 03 04 07', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:05:00', 'Sac', 1, 'Acceptée', 'livree', 5, 10, '2024-05-06', 3),
('PETIT', '01 02 03 04 08', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:05:00', 'Sac', 1, 'Acceptée', 'livree', 5, 10, '2024-05-06', 4),
('LEROY', '01 02 03 04 09', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:50:00', 'Sac', 1, 'Acceptée', 'preparation', 5, 10, '0000-00-00', 5),
('MOREAU', '01 02 03 04 10', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:45:00', 'Sac', 1, 'Acceptée', 'en_livraision', 5, 10, '0000-00-00', 6),
('SIMON', '01 02 03 04 11', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:50:00', 'Sac', 1, 'Acceptée', 'livree', 5, 10, '2024-05-06', 7),
('CLERC', '01 02 03 04 12', '20 avenue des Roses', '69001', 'LYON', '2019-02-01', '13:02:00', 'Boîte', 1, 'Acceptée', 'preparation', 7, 15, '0000-00-00', 8),
('ROUX', '01 02 03 04 13', '25 rue de la Liberté', '75001', 'PARIS', '2019-02-02', '13:10:00', 'Sac', 1, 'Acceptée', 'fin_preparation', 7, 15, '0000-00-00', 9),
('LEFEBVRE', '01 02 03 04 14', '30 rue du Commerce', '44000', 'NANTES', '2019-02-03', '12:10:00', 'Carton', 1, 'Acceptée', 'en_livraison', 7, 15, '0000-00-00', 10),
('ROUSSEAU', '01 02 03 04 15', '10 avenue des Champs', '33000', 'BORDEAUX', '2019-02-04', '13:10:00', 'Boîte', 1, 'Acceptée', 'livree', 7, 15, '2024-05-06', 11),
('VINCENT', '01 02 03 04 16', '5 rue du Moulin', '59000', 'LILLE', '2019-02-05', '14:00:00', 'Sac', 1, 'Acceptée', 'preparation', 7, 15, '0000-00-00', 12),
('FOURNIER', '01 02 03 04 17', '15 avenue de la République', '13001', 'MARSEILLE', '2019-02-06', '12:00:00', 'Carton', 1, 'Acceptée', 'en_livraison', 7, 15, '0000-00-00', 13);

--
-- Déchargement des données de la table `detail`
--

INSERT INTO `detail` (`NomProd`, `IngBase1`, `IngBase2`, `IngBase3`, `IngBase4`, `IngOpt1`, `IngOpt2`, `IngOpt3`, `IngOpt4`, `DateArchiv`, `IdProd`) VALUES
('Crepe Suzette', 'Farine', 'Oeufs', 'Lait', 'Nutella', 'Chocolat', 'Fraise', 'Banane', 'Chantilly', '0000-00-00', 1),
('Crepe Bretonne', 'Farine', 'Oeufs', 'Lait', 'Quentin', 'Jambom', 'Emental', 'Fraise', 'Banane', '0000-00-00', 2),
('Salade', 'Tomate', 'Salade', 'Pomme de terre', 'Carotte', 'Courgette', 'Aubergine', 'Poivron', 'Oignon', '0000-00-00', 3),
('Crepe Suzette', 'Farine', 'Oeufs', 'Lait', 'Nutella', 'Chocolat', 'Fraise', 'Banane', 'Chantilly', '0000-00-00', 1),
('Crepe Bretonne', 'Farine', 'Oeufs', 'Lait', 'Quentin', 'Jambom', 'Emental', 'Fraise', 'Banane', '0000-00-00', 2),
('Salade', 'Tomate', 'Salade', 'Pomme de terre', 'Carotte', 'Courgette', 'Aubergine', 'Poivron', 'Oignon', '0000-00-00', 3),
('Crepe Suzette', 'Farine', 'Oeufs', 'Lait', 'Nutella', 'Chocolat', 'Fraise', 'Banane', 'Chantilly', '0000-00-00', 1),
('Crepe Bretonne', 'Farine', 'Oeufs', 'Lait', 'Quentin', 'Jambom', 'Emental', 'Fraise', 'Banane', '0000-00-00', 2),
('Salade', 'Tomate', 'Salade', 'Pomme de terre', 'Carotte', 'Courgette', 'Aubergine', 'Poivron', 'Oignon', '0000-00-00', 3),
('Crepe Suzette', 'Farine', 'Oeufs', 'Lait', 'Nutella', 'Chocolat', 'Fraise', 'Banane', 'Chantilly', '0000-00-00', 1),
('Crepe Bretonne', 'Farine', 'Oeufs', 'Lait', 'Quentin', 'Jambom', 'Emental', 'Fraise', 'Banane', '0000-00-00', 2),
('Crepe Bretonne', 'Farine', 'Oeufs', 'Lait', 'Quentin', 'Jambom', 'Emental', 'Fraise', 'Banane', '0000-00-00', 2),
('Crepe Bretonne', 'Farine', 'Oeufs', 'Lait', 'Quentin', 'Jambom', 'Emental', 'Fraise', 'Banane', '0000-00-00', 2);

--
-- Déchargement des données de la table `fourn_ingr`
--

INSERT INTO `fourn_ingr` (`NomFourn`, `IdIngred`, `PrixUHT`) VALUES
('Casino', 1, 7),
('Casino', 2, 5),
('Casino', 3, 6),
('Casino', 4, 4),
('Casino', 5, 8),
('Casino', 6, 9),
('Casino', 7, 10),
('Casino', 8, 11),
('Casino', 9, 12),
('Casino', 10, 13),
('Casino', 11, 14),
('Casino', 12, 15),
('Casino', 13, 16),
('Casino', 14, 17),
('Casino', 15, 18),
('Casino', 16, 19),
('Casino', 17, 20),
('Casino', 18, 21),
('Casino', 19, 22),
('Casino', 20, 23),
('TransGourmet',21, 4),
('TransGourmet', 22, 7),
('TransGourmet', 23, 5),
('TransGourmet', 24, 6),
('TransGourmet', 25, 4),
('TransGourmet', 26, 8),
('TransGourmet', 27, 9),
('Aldi', 28, 10),
('Aldi', 29, 11),
('Aldi', 30, 12),
('Carrefour', 31, 13),
('Carrefour', 32, 14),
('Carrefour', 33, 15),
('Carrefour', 34, 16),
('Carrefour', 35, 17),
('Carrefour', 36, 18),
('Carrefour', 37, 19),
('Coca‑Cola Company', 39, 3);



--
-- Déchargement des données de la table `prod_ingr`
--

INSERT INTO `prod_ingr` (`IdIngred`, `IdProd`, `Quant`) VALUES
(1, 1, 1),
(1, 2, 1),
(2, 1, 2),
(2, 2, 1),
(3, 1, 1),
(3, 3, 2),
(5, 1, 1),
(6, 1, 1),
(7, 1, 3),
(8, 1, 4),
(9, 1, 1);


--
-- Déchargement des données de la table `com_det`
--

INSERT INTO `com_det` (`Num_OF`, `Quant`, `NumCom`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 5, 4),
(5, 3, 5),
(6, 4, 6),
(7, 1, 7),
(8, 2, 8),
(9, 4, 9),
(10, 2, 10),
(11, 2, 11),
(12, 6, 12),
(13, 4, 13);

--
-- Déchargement des données de la table `det_ingr`
--

INSERT INTO `det_ingr` (`Num_OF`, `IdIngred`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 1),
(5, 2),
(6, 3),
(7, 1),
(8, 2),
(9, 3),
(10, 1),
(11, 2),
(12, 3),
(13, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
