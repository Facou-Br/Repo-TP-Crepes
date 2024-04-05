-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 192.168.0.100
-- Généré le : ven. 15 mars 2024 à 10:43
-- Version du serveur : 8.0.36-28
-- Version de PHP : 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `crepesco_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `COMMANDE`
--

CREATE TABLE `COMMANDE` (
                            `NumCom` int NOT NULL,
                            `NomClient` char(25) NOT NULL,
                            `TelClient` char(12) NOT NULL,
                            `AdrClient` char(30) DEFAULT NULL,
                            `CP_Client` char(5) DEFAULT NULL,
                            `VilClient` char(20) DEFAULT NULL,
                            `Date` date NOT NULL,
                            `HeureDispo` date NOT NULL,
                            `TypeEmbal` char(1) NOT NULL DEFAULT 'C',
                            `A_Livrer` tinyint(1) NOT NULL DEFAULT '1',
                            `EtatCde` char(15) NOT NULL,
                            `EtatLivraison` char(20) DEFAULT 'preparation',
                            `CoutLiv` float DEFAULT NULL,
                            `TotalTTC` float DEFAULT NULL,
                            `DateArchiv` date DEFAULT NULL,
                            `IdLivreur` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `COMMANDE`
--

INSERT INTO `COMMANDE` (`NumCom`, `NomClient`, `TelClient`, `AdrClient`, `CP_Client`, `VilClient`, `Date`, `HeureDispo`, `TypeEmbal`, `A_Livrer`, `EtatCde`, `EtatLivraison`, `CoutLiv`, `TotalTTC`, `DateArchiv`, `IdLivreur`) VALUES
                                                                                                                                                                                                                                    (1, 'DUPONT', '01 02 03 04', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '0000-00-00', 'S', 1, '', 'preparation', 5, 10, '2024-03-13', 1),
                                                                                                                                                                                                                                    (2, 'DURAND', '01 02 03 04', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '0000-00-00', 'S', 1, '', 'fin_preparation', 5, 10, '2024-03-13', 2),
                                                                                                                                                                                                                                    (3, 'MARTIN', '01 02 03 04', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '0000-00-00', 'S', 1, '', 'en_livraision', 5, 10, '2024-03-13', 3),
                                                                                                                                                                                                                                    (4, 'PETIT', '01 02 03 04', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '0000-00-00', 'S', 1, '', 'livree', 5, 10, '2024-03-13', 4),
                                                                                                                                                                                                                                    (5, 'LEROY', '01 02 03 04', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '0000-00-00', 'S', 1, '', 'preparation', 5, 10, '2024-03-13', 5),
                                                                                                                                                                                                                                    (6, 'MOREAU', '01 02 03 04', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '0000-00-00', 'S', 1, '', 'en_livraision', 5, 10, '2024-03-13', 6),
                                                                                                                                                                                                                                    (7, 'SIMON', '01 02 03 04', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '0000-00-00', 'S', 1, '', 'livree', 5, 10, '2024-03-13', 7);

-- --------------------------------------------------------

--
-- Structure de la table `COM_DET`
--

CREATE TABLE `COM_DET` (
                           `Num_OF` int NOT NULL,
                           `Quant` int NOT NULL,
                           `NumCom` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `COM_DET`
--

INSERT INTO `COM_DET` (`Num_OF`, `Quant`, `NumCom`) VALUES
                                                        (1, 5, 1),
                                                        (2, 10, 2),
                                                        (3, 15, 3);

-- --------------------------------------------------------

--
-- Structure de la table `DETAIL`
--

CREATE TABLE `DETAIL` (
                          `Num_OF` int NOT NULL,
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
                          `IdProd` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `DETAIL`
--

INSERT INTO `DETAIL` (`Num_OF`, `NomProd`, `IngBase1`, `IngBase2`, `IngBase3`, `IngBase4`, `IngOpt1`, `IngOpt2`, `IngOpt3`, `IngOpt4`, `DateArchiv`, `IdProd`) VALUES
                                                                                                                                                                   (1, 'CrepesSuzette', 'Farine', 'Oeufs', 'Lait', 'Nutella', 'Chocolat', 'Fraise', 'Banane', 'Chantilly', '2024-03-13', 1),
                                                                                                                                                                   (2, 'CrepesBretonnes', 'Farine', 'Oeufs', 'Lait', 'Oeuf', 'Jambom', 'Emental', 'Fraise', 'Banane', '2024-03-13', 2),
                                                                                                                                                                   (3, 'Salade', 'Tomate', 'Salade', 'Pomme de terre', 'Carotte', 'Courgette', 'Aubergine', 'Poivron', 'Oignon', '2024-03-13', 3);

-- --------------------------------------------------------

--
-- Structure de la table `DET_INGR`
--

CREATE TABLE `DET_INGR` (
                            `Num_OF` int NOT NULL,
                            `IdIngred` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `DET_INGR`
--

INSERT INTO `DET_INGR` (`Num_OF`, `IdIngred`) VALUES
                                                  (1, 1),
                                                  (2, 2),
                                                  (3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `FOURNISSEUR`
--

CREATE TABLE `FOURNISSEUR` (
                               `NomFourn` char(25) NOT NULL,
                               `Adresse` char(30) NOT NULL,
                               `CodePostal` char(5) NOT NULL,
                               `Ville` char(20) NOT NULL,
                               `Tel` char(12) NOT NULL,
                               `DateArchiv` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `FOURNISSEUR`
--

INSERT INTO `FOURNISSEUR` (`NomFourn`, `Adresse`, `CodePostal`, `Ville`, `Tel`, `DateArchiv`) VALUES
                                                                                                  ('Coca-Cola', '9 Chemin de Bretagne', '92130', 'ISSY LES MOULINEAUX', '01 46 88 89', '2024-03-13'),
                                                                                                  ('Danone', '17 boulevard Haussmann', '75009', 'PARIS', '01 44 35 20', '2024-03-13'),
                                                                                                  ('Ferrero', '18 Rue Jacques Monod CS 90058', '76136', 'MONT SAINT AIGNAN', '0800 553 553', '2024-03-13'),
                                                                                                  ('Heineken', '4 rue de la Mare Blanche', '77186', 'NOISIEL', '01 60 37 68', '2024-03-13'),
                                                                                                  ('Lactalis', '42 rue Rieussec', '53000', 'LAVAL', '02 43 59 59', '2024-03-13'),
                                                                                                  ('Mozzalat', '28 rue Gay Lussac - France', '75005', 'PARIS', '02 32 39 71', '2024-03-13'),
                                                                                                  ('Nestle', '7 boulevard Pierre Carle', '77186', 'NOISIEL', '01 60 37 68', '2024-03-13'),
                                                                                                  ('Nutella', '18 Rue Jacques Monod CS 90058', '76136', 'MONT SAINT AIGNAN', '0800 553 553', '2024-03-13'),
                                                                                                  ('PepsiCo', '420 rue d\'Estienne d\'Orves', '92705', 'COLOMBES', '01 41 04 11', '2024-03-13'),
                                                                                                  ('TransGourmet', 'Lieudit Les Bonnes Filles', '21200', 'Levernois', '0826 101 710', '2024-03-13');

-- --------------------------------------------------------

--
-- Structure de la table `FOURN_INGR`
--

CREATE TABLE `FOURN_INGR` (
                              `NomFourn` char(25) NOT NULL,
                              `IdIngred` int NOT NULL,
                              `PrixUHT` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `FOURN_INGR`
--

INSERT INTO `FOURN_INGR` (`NomFourn`, `IdIngred`, `PrixUHT`) VALUES
                                                                 ('Coca-Cola', 29, 3),
                                                                 ('Ferrero', 5, 12),
                                                                 ('Nestle', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `INGREDIENT`
--

CREATE TABLE `INGREDIENT` (
                              `IdIngred` int NOT NULL,
                              `NomIngred` char(30) NOT NULL,
                              `Frais` char(1) NOT NULL,
                              `Unite` char(10) NOT NULL DEFAULT '"sans"',
                              `SeuilStock` int NOT NULL DEFAULT '1',
                              `StockMin` int NOT NULL,
                              `StockReel` float NOT NULL,
                              `PrixUHT_Moyen` float NOT NULL,
                              `Q_A_Com` int NOT NULL,
                              `DateArchiv` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `INGREDIENT`
--

INSERT INTO `INGREDIENT` (`IdIngred`, `NomIngred`, `Frais`, `Unite`, `SeuilStock`, `StockMin`, `StockReel`, `PrixUHT_Moyen`, `Q_A_Com`, `DateArchiv`) VALUES
                                                                                                                                                          (1, 'Farine', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (2, 'Oeufs', '', 'unite', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (3, 'Lait', '', 'l', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (4, 'Sucre', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (5, 'Nutella', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (6, 'Chocolat', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (7, 'Fraise', '', 'g', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (8, 'Banane', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (9, 'Chantilly', '', 'l', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (10, 'Jambon', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (11, 'Bacon', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (12, 'Emmental', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (13, 'Tomate', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (14, 'Salade', '', 'unite', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (15, 'Pomme de terre', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (16, 'Carotte', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (17, 'Courgette', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (18, 'Aubergine', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (19, 'Poivron', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (20, 'Oignon', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (21, 'Ail', '', 'kg', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (22, 'Huile', '', 'l', 1, 0, 5, 2, 1, '2024-03-13'),
                                                                                                                                                          (23, 'Reblochon', '', 'kg', 0, 0, 0, 12, 2, '2024-03-13'),
                                                                                                                                                          (29, 'Coca-Cola', '1', 'l', 1, 0, 2, 3, 0, '2024-03-13');

-- --------------------------------------------------------

--
-- Structure de la table `LIVREUR`
--

CREATE TABLE `LIVREUR` (
                           `IdLivreur` int NOT NULL,
                           `Nom` char(20) NOT NULL,
                           `Prenom` char(20) NOT NULL,
                           `Tel` char(16) NOT NULL,
                           `NumSS` char(15) NOT NULL,
                           `Disponible` char(1) NOT NULL,
                           `DateArchiv` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `LIVREUR`
--

INSERT INTO `LIVREUR` (`IdLivreur`, `Nom`, `Prenom`, `Tel`, `NumSS`, `Disponible`, `DateArchiv`) VALUES
                                                                                                     (1, 'ROULLET', 'Rémi', '01 02 03 04 06', '1 04 07 71 014', '1', '2024-03-13'),
                                                                                                     (2, 'DUPONT', 'Jean', '01 02 03 04 07', '1 04 07 71 014', '1', '2024-03-13'),
                                                                                                     (3, 'DURAND', 'Pierre', '01 02 03 04 08', '1 04 07 71 014', '1', '2024-03-13'),
                                                                                                     (4, 'MARTIN', 'Paul', '01 02 03 04 09', '1 04 07 71 014', '1', '2024-03-13'),
                                                                                                     (5, 'PETIT', 'Jacques', '01 02 03 04 10', '1 04 07 71 014', '1', '2024-03-13'),
                                                                                                     (6, 'LEROY', 'Alain', '01 02 03 04 11', '1 04 07 71 014', '1', '2024-03-13'),
                                                                                                     (7, 'MOREAU', 'René', '01 02 03 04 12', '1 04 07 71 014', '1', '2024-03-13'),
                                                                                                     (8, 'SIMON', 'Jean-Pierre', '01 02 03 04 13', '1 04 07 71 014', '1', '2024-03-13'),
                                                                                                     (9, 'LAURENT', 'Michel', '01 02 03 04 14', '1 04 07 71 014', '1', '2024-03-13'),
                                                                                                     (10, 'LACROIX', 'Philippe', '01 02 03 04 15', '1 04 07 71 014', '1', '2024-03-13');

-- --------------------------------------------------------

--
-- Structure de la table `PRODUIT`
--

CREATE TABLE `PRODUIT` (
                           `IdProd` int NOT NULL,
                           `NomProd` char(20) NOT NULL,
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
                           `DateArchiv` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `PRODUIT`
--

INSERT INTO `PRODUIT` (`IdProd`, `NomProd`, `Active`, `Taille`, `NbIngBase`, `NbIngOpt`, `PrixUHT`, `Image`, `IngBase1`, `IngBase2`, `IngBase3`, `IngBase4`, `IngBase5`, `IngOpt1`, `IngOpt2`, `IngOpt3`, `IngOpt4`, `IngOpt5`, `IngOpt6`, `NbOptMax`, `DateArchiv`) VALUES
                                                                                                                                                                                                                                                                         (1, 'CrepesSuzette', '1', 'M', 3, 2, 2, 'crepes.jpg', 'Farine', 'Oeufs', 'Lait', 'Nutella', 'Chocolat', 'Fraise', 'Banane', 'Chantilly', 'Jambon', 'Bacon', 'Emmental', 2, '2024-03-13'),
                                                                                                                                                                                                                                                                         (2, 'CrepesBretonnes', '1', 'M', 3, 2, 2, 'crepes.jpg', 'Farine', 'Oeufs', 'Lait', 'Oeuf', 'Jambom', 'Emental', 'Fraise', 'Banane', 'Chantilly', 'Jambon', 'Bacon', 2, '2024-03-13'),
                                                                                                                                                                                                                                                                         (3, 'Salade', '1', 'M', 3, 2, 2, 'salade.jpg', 'Tomate', 'Salade', 'Pomme de terre', 'Carotte', 'Courgette', 'Aubergine', 'Poivron', 'Oignon', 'Ail', 'Huile', 'Reblochon', 2, '2024-03-13');

-- --------------------------------------------------------

--
-- Structure de la table `PROD_INGR`
--

CREATE TABLE `PROD_INGR` (
                             `IdIngred` int NOT NULL,
                             `IdProd` int NOT NULL,
                             `Quant` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `PROD_INGR`
--

INSERT INTO `PROD_INGR` (`IdIngred`, `IdProd`, `Quant`) VALUES
                                                            (1, 1, 5),
                                                            (2, 2, 10),
                                                            (3, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `RESPONSABLE`
--

CREATE TABLE `RESPONSABLE` (
                               `IdRes` int NOT NULL,
                               `Nom` char(25) NOT NULL,
                               `Prenom` char(20) NOT NULL,
                               `Tel` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `RESPONSABLE`
--

INSERT INTO `RESPONSABLE` (`IdRes`, `Nom`, `Prenom`, `Tel`) VALUES
    (1, 'Boudon', 'Owen', '0638045422');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `COMMANDE`
--
ALTER TABLE `COMMANDE`
    ADD PRIMARY KEY (`NumCom`),
  ADD UNIQUE KEY `ID_COMMANDE_IND` (`NumCom`),
  ADD KEY `FKLivre` (`IdLivreur`);

--
-- Index pour la table `COM_DET`
--
ALTER TABLE `COM_DET`
    ADD PRIMARY KEY (`Num_OF`),
  ADD UNIQUE KEY `FKCon_DET_IND` (`Num_OF`),
  ADD KEY `FKCon_COM` (`NumCom`);

--
-- Index pour la table `DETAIL`
--
ALTER TABLE `DETAIL`
    ADD PRIMARY KEY (`Num_OF`),
  ADD UNIQUE KEY `ID_DETAIL_IND` (`Num_OF`),
  ADD KEY `FKEstChoisi` (`IdProd`);

--
-- Index pour la table `DET_INGR`
--
ALTER TABLE `DET_INGR`
    ADD PRIMARY KEY (`IdIngred`,`Num_OF`),
  ADD UNIQUE KEY `ID_Utilise_IND` (`IdIngred`,`Num_OF`),
  ADD KEY `FKUti_DET` (`Num_OF`);

--
-- Index pour la table `FOURNISSEUR`
--
ALTER TABLE `FOURNISSEUR`
    ADD PRIMARY KEY (`NomFourn`),
  ADD UNIQUE KEY `ID_FOURNISSEUR_IND` (`NomFourn`);

--
-- Index pour la table `FOURN_INGR`
--
ALTER TABLE `FOURN_INGR`
    ADD PRIMARY KEY (`NomFourn`,`IdIngred`),
  ADD UNIQUE KEY `ID_Provient_IND` (`NomFourn`,`IdIngred`),
  ADD KEY `FKPro_ING` (`IdIngred`);

--
-- Index pour la table `INGREDIENT`
--
ALTER TABLE `INGREDIENT`
    ADD PRIMARY KEY (`IdIngred`),
  ADD UNIQUE KEY `ID_INGREDIENT_IND` (`IdIngred`);

--
-- Index pour la table `LIVREUR`
--
ALTER TABLE `LIVREUR`
    ADD PRIMARY KEY (`IdLivreur`),
  ADD UNIQUE KEY `ID_LIVREUR_IND` (`IdLivreur`);

--
-- Index pour la table `PRODUIT`
--
ALTER TABLE `PRODUIT`
    ADD PRIMARY KEY (`IdProd`),
  ADD UNIQUE KEY `ID_PRODUIT_IND` (`IdProd`);

--
-- Index pour la table `PROD_INGR`
--
ALTER TABLE `PROD_INGR`
    ADD PRIMARY KEY (`IdIngred`,`IdProd`),
  ADD UNIQUE KEY `ID_Comporte_IND` (`IdIngred`,`IdProd`),
  ADD KEY `FKCom_PRO` (`IdProd`);

--
-- Index pour la table `RESPONSABLE`
--
ALTER TABLE `RESPONSABLE`
    ADD PRIMARY KEY (`IdRes`),
  ADD UNIQUE KEY `ID_RESPONSABLE_IND` (`IdRes`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `COMMANDE`
--
ALTER TABLE `COMMANDE`
    MODIFY `NumCom` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `DETAIL`
--
ALTER TABLE `DETAIL`
    MODIFY `Num_OF` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `INGREDIENT`
--
ALTER TABLE `INGREDIENT`
    MODIFY `IdIngred` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `LIVREUR`
--
ALTER TABLE `LIVREUR`
    MODIFY `IdLivreur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `PRODUIT`
--
ALTER TABLE `PRODUIT`
    MODIFY `IdProd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `RESPONSABLE`
--
ALTER TABLE `RESPONSABLE`
    MODIFY `IdRes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `COMMANDE`
--
ALTER TABLE `COMMANDE`
    ADD CONSTRAINT `FKLivre` FOREIGN KEY (`IdLivreur`) REFERENCES `LIVREUR` (`IdLivreur`);

--
-- Contraintes pour la table `COM_DET`
--
ALTER TABLE `COM_DET`
    ADD CONSTRAINT `FKCon_COM` FOREIGN KEY (`NumCom`) REFERENCES `COMMANDE` (`NumCom`),
  ADD CONSTRAINT `FKCon_DET_FK` FOREIGN KEY (`Num_OF`) REFERENCES `DETAIL` (`Num_OF`);

--
-- Contraintes pour la table `DETAIL`
--
ALTER TABLE `DETAIL`
    ADD CONSTRAINT `FKEstChoisi` FOREIGN KEY (`IdProd`) REFERENCES `PRODUIT` (`IdProd`);

--
-- Contraintes pour la table `DET_INGR`
--
ALTER TABLE `DET_INGR`
    ADD CONSTRAINT `FKUti_DET` FOREIGN KEY (`Num_OF`) REFERENCES `DETAIL` (`Num_OF`),
  ADD CONSTRAINT `FKUti_ING` FOREIGN KEY (`IdIngred`) REFERENCES `INGREDIENT` (`IdIngred`);

--
-- Contraintes pour la table `FOURN_INGR`
--
ALTER TABLE `FOURN_INGR`
    ADD CONSTRAINT `FKPro_FOU` FOREIGN KEY (`NomFourn`) REFERENCES `FOURNISSEUR` (`NomFourn`),
  ADD CONSTRAINT `FKPro_ING` FOREIGN KEY (`IdIngred`) REFERENCES `INGREDIENT` (`IdIngred`);

--
-- Contraintes pour la table `PROD_INGR`
--
ALTER TABLE `PROD_INGR`
    ADD CONSTRAINT `FKCom_ING` FOREIGN KEY (`IdIngred`) REFERENCES `INGREDIENT` (`IdIngred`),
  ADD CONSTRAINT `FKCom_PRO` FOREIGN KEY (`IdProd`) REFERENCES `PRODUIT` (`IdProd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
