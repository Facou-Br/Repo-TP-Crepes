<<<<<<< HEAD:Base de donnees/Crepes-Create.sql
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

DROP DATABASE IF EXISTS `ProjetCnam-Crepes`;
CREATE DATABASE `ProjetCnam-Crepes`;
USE `ProjetCnam-Crepes`;

-- --------------------------------------------------------

--
-- Structure de la BD `ProjetCnam-Crepes` :
--

DROP TABLE IF EXISTS `Commande`;
CREATE TABLE `Commande` (
    `NumCom` INT NOT NULL AUTO_INCREMENT,
    `IdLivreur` INT NOT NULL,
    `NomClient` VARCHAR(30) NOT NULL,
    `TelClient` VARCHAR(30) NOT NULL,
    `AdrClient` VARCHAR(30) NOT NULL,
    `CP_Client` VARCHAR(30) NOT NULL,
    `Date` DATE NOT NULL,
    `HeureDispo` TIME NOT NULL,
    `TypeEmballage` VARCHAR(30) NOT NULL,
    `A_Livrer` BOOLEAN NOT NULL,
    `EtatCde` VARCHAR(30) NOT NULL,
    `EtatLivraison` BOOLEAN NOT NULL,
    `CoutLivraison` FLOAT NOT NULL,
    `TotalTTC` FLOAT NOT NULL,
    `DateArchivage` DATE NOT NULL,
    PRIMARY KEY (`NumCom`),
    FOREIGN KEY (`IdLivreur`) REFERENCES `Livreur`(`IdLivreur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

DROP TABLE IF EXISTS `Livreur`;
CREATE TABLE `Livreur` (
    `IdLivreur` INT NOT NULL AUTO_INCREMENT,
    `Nom` VARCHAR(30) NOT NULL,
    `Prenom` VARCHAR(30) NOT NULL,
    `Tel` VARCHAR(30) NOT NULL,
    `NumSS` VARCHAR(30) NOT NULL,
    `Disponible` BOOLEAN NOT NULL,
    `DateArchiv` DATE NOT NULL,
    PRIMARY KEY (`IdLivreur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

DROP TABLE IF EXISTS `Detail`;
CREATE TABLE `Detail`(
    `Num_OF` INT NOT NULL AUTO_INCREMENT,
    `NomProd` VARCHAR(30) NOT NULL,
    `IngBase1` TINYINT(1) NOT NULL,
    `IngBase2` TINYINT(1) NOT NULL,
    `IngBase3` TINYINT(1) NOT NULL,
    `IngBase4` TINYINT(1) NOT NULL,
    `IngBase5` TINYINT(1) NOT NULL,
    `IngOpt1` TINYINT(1) NOT NULL,
    `IngOpt2` TINYINT(1) NOT NULL,
    `IngOpt3` TINYINT(1) NOT NULL,
    `IngOpt4` TINYINT(1) NOT NULL,
    `IngOpt5` TINYINT(1) NOT NULL,
    `IngOpt6` TINYINT(1) NOT NULL,
)

-- --------------------------------------------------------

DROP TABLE IF EXISTS `Produit`;
CREATE TABLE `Produit` (
    `IdProd` INT NOT NULL AUTO_INCREMENT,
    `IdIngredient` INT NOT NULL,
    `NomProd` VARCHAR(30) NOT NULL,
    `Active` BOOLEAN NOT NULL,
    `Taille` INT NOT NULL,
    `NombreIngredientBase` INT NOT NULL,
    `NombreIngredientOption` INT NOT NULL,
    `PrixUHT` FLOAT NOT NULL,
    `Image` VARCHAR(30) NOT NULL,
    `IngredientBase1` VARCHAR(30) NOT NULL,
    `IngredientBase2` VARCHAR(30) NOT NULL,
    `IngredientBase3` VARCHAR(30) NOT NULL,
    `IngredientBase4` VARCHAR(30) NOT NULL,
    `IngredientBase5` VARCHAR(30) NOT NULL,
    `IngredientOption1` VARCHAR(30) NOT NULL,
    `IngredientOption2` VARCHAR(30) NOT NULL,
    `IngredientOption3` VARCHAR(30) NOT NULL,
    `IngredientOption4` VARCHAR(30) NOT NULL,
    `IngredientOption5` VARCHAR(30) NOT NULL,
    `IngredientOption6` VARCHAR(30) NOT NULL,
    `NombreOptionsMax` INT NOT NULL,
    `DateArchivage` DATE NOT NULL,
    PRIMARY KEY (`IdProd`),
    FOREIGN KEY (`IdIngredient`) REFERENCES `Ingredient` (`IdIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

DROP TABLE IF EXISTS `Ingredient`;
CREATE TABLE `Ingredient` (
    `IdIngredient` INT NOT NULL AUTO_INCREMENT,
    `NomIngredient` VARCHAR(30) NOT NULL,
    `Frais` FLOAT NOT NULL,
    `Unite` INT NOT NULL,
    `StockMinimum` INT NOT NULL,
    `StockReel` INT NOT NULL,
    `PrixUHTMoyen` FLOAT NOT NULL,
    `QuantitesACommander` INT NOT NULL,
    `DateArchivage` DATE NOT NULL,
    PRIMARY KEY (`IdIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `Fournisseur` (
    `NomFourn` VARCHAR(50) NOT NULL,
    `Addresse` VARCHAR(30) NOT NULL,
    `CP_Fourn` VARCHAR(10) NOT NULL,
    `Ville` VARCHAR(30) NOT NULL,
    `Telephone` VARCHAR(15) NOT NULL,
    `DateArchiv` TINYINT(1) NOT NULL,
    PRIMARY KEY (`NomFourn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `Responsable` (
    `IdRes` INT NOT NULL,
    `Nom` VARCHAR(30) NOT NULL,
    `Prenom` VARCHAR(10) NOT NULL,
    `Telephone` VARCHAR(15) NOT NULL,
    PRIMARY KEY (`IdRes`)
)

=======
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- --------------------------------------------------------

DROP DATABASE IF EXISTS `ProjetCnam-Crepes`;
CREATE DATABASE `ProjetCnam-Crepes`;
USE `ProjetCnam-Crepes`;

-- --------------------------------------------------------

--
-- Structure de la BD `ProjetCnam-Crepes` :
--

DROP TABLE IF EXISTS `Commande`;
CREATE TABLE `Commande` (
    `NumCom` INT NOT NULL AUTO_INCREMENT,
    `IdLivreur` INT NOT NULL,
    `NomClient` VARCHAR(30) NOT NULL,
    `TelClient` VARCHAR(30) NOT NULL,
    `AdrClient` VARCHAR(30) NOT NULL,
    `CP_Client` VARCHAR(30) NOT NULL,
    `Date` DATE NOT NULL,
    `HeureDispo` TIME NOT NULL,
    `TypeEmballage` VARCHAR(30) NOT NULL,
    `A_Livrer` BOOLEAN NOT NULL,
    `EtatCde` VARCHAR(30) NOT NULL,
    `EtatLivraison` BOOLEAN NOT NULL,
    `CoutLivraison` FLOAT NOT NULL,
    `TotalTTC` FLOAT NOT NULL,
    `DateArchivage` DATE NOT NULL,
    PRIMARY KEY (`NumCom`),
    FOREIGN KEY (`IdLivreur`) REFERENCES `Livreur`(`IdLivreur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

DROP TABLE IF EXISTS `Livreur`;
CREATE TABLE `Livreur` (
    `IdLivreur` INT NOT NULL AUTO_INCREMENT,
    `Nom` VARCHAR(30) NOT NULL,
    `Prenom` VARCHAR(30) NOT NULL,
    `Tel` VARCHAR(30) NOT NULL,
    `NumSS` VARCHAR(30) NOT NULL,
    `Disponible` BOOLEAN NOT NULL,
    `DateArchiv` DATE NOT NULL,
    PRIMARY KEY (`IdLivreur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

DROP TABLE IF EXISTS `Detail`;
CREATE TABLE `Detail`(
    `Num_OF` INT NOT NULL AUTO_INCREMENT,
    `NomProd` VARCHAR(30) NOT NULL,
    `IngBase1` TINYINT(1) NOT NULL,
    `IngBase2` TINYINT(1) NOT NULL,
    `IngBase3` TINYINT(1) NOT NULL,
    `IngBase4` TINYINT(1) NOT NULL,
    `IngBase5` TINYINT(1) NOT NULL,
    `IngOpt1` TINYINT(1) NOT NULL,
    `IngOpt2` TINYINT(1) NOT NULL,
    `IngOpt3` TINYINT(1) NOT NULL,
    `IngOpt4` TINYINT(1) NOT NULL,
    `IngOpt5` TINYINT(1) NOT NULL,
    `IngOpt6` TINYINT(1) NOT NULL,
    `DateArchiv` DATE NOT NULL,
    `IdProd` INT NOT NULL,
    PRIMARY KEY (`Num_OF`),
    FOREIGN KEY (`IdProd`) REFERENCES `Produit`(`IdProd`)
)

-- --------------------------------------------------------

DROP TABLE IF EXISTS `Produit`;
CREATE TABLE `Produit` (
    `IdProd` INT NOT NULL AUTO_INCREMENT,
    `IdIngredient` INT NOT NULL,
    `NomProd` VARCHAR(30) NOT NULL,
    `Active` BOOLEAN NOT NULL,
    `Taille` INT NOT NULL,
    `NombreIngredientBase` INT NOT NULL,
    `NombreIngredientOption` INT NOT NULL,
    `PrixUHT` FLOAT NOT NULL,
    `Image` VARCHAR(30) NOT NULL,
    `IngredientBase1` VARCHAR(30) NOT NULL,
    `IngredientBase2` VARCHAR(30) NOT NULL,
    `IngredientBase3` VARCHAR(30) NOT NULL,
    `IngredientBase4` VARCHAR(30) NOT NULL,
    `IngredientBase5` VARCHAR(30) NOT NULL,
    `IngredientOption1` VARCHAR(30) NOT NULL,
    `IngredientOption2` VARCHAR(30) NOT NULL,
    `IngredientOption3` VARCHAR(30) NOT NULL,
    `IngredientOption4` VARCHAR(30) NOT NULL,
    `IngredientOption5` VARCHAR(30) NOT NULL,
    `IngredientOption6` VARCHAR(30) NOT NULL,
    `NombreOptionsMax` INT NOT NULL,
    `DateArchivage` DATE NOT NULL,
    PRIMARY KEY (`IdProd`),
    FOREIGN KEY (`IdIngredient`) REFERENCES `Ingredient` (`IdIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

DROP TABLE IF EXISTS `Ingredient`;
CREATE TABLE `Ingredient` (
    `IdIngredient` INT NOT NULL AUTO_INCREMENT,
    `NomIngredient` VARCHAR(30) NOT NULL,
    `Frais` FLOAT NOT NULL,
    `Unite` INT NOT NULL,
    `StockMinimum` INT NOT NULL,
    `StockReel` INT NOT NULL,
    `PrixUHTMoyen` FLOAT NOT NULL,
    `QuantitesACommander` INT NOT NULL,
    `DateArchivage` DATE NOT NULL,
    PRIMARY KEY (`IdIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

CREATE TABLE `Fournisseur` (
    `NomFourn` VARCHAR(50) NOT NULL,
    `Addresse` VARCHAR(30) NOT NULL,
    `CP_Fourn` VARCHAR(10) NOT NULL,
    `Ville` VARCHAR(30) NOT NULL,
    `Telephone` VARCHAR(15) NOT NULL,
    `DateArchiv` TINYINT(1) NOT NULL,
    PRIMARY KEY (`NomFourn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `Responsable` (
    `IdRes` INT NOT NULL,
    `Nom` VARCHAR(30) NOT NULL,
    `Prenom` VARCHAR(10) NOT NULL,
    `Telephone` VARCHAR(15) NOT NULL,
    PRIMARY KEY (`IdRes`)
)

>>>>>>> 4ee4b109bcdd37ecb8e3ed4d357e1a0b49625af5:sql/Crepes-Create.sql

