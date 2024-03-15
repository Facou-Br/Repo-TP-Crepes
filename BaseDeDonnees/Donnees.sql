-- Insertion des données de FOURNISSEUR exemple. Assez simple
INSERT INTO FOURNISSEUR (NomFourn, Adresse, CodePostal, Ville, Tel, DateArchiv)
VALUES
('Nutella', '18 Rue Jacques Monod CS 90058', '76136', 'MONT SAINT AIGNAN', '0800 553 553 ', NOW()),
('Mozzalat', '28 rue Gay Lussac - France', '75005', 'PARIS', '02 32 39 71 68', NOW()),
('TransGourmet', 'Lieudit Les Bonnes Filles', '21200', 'Levernois','0826 101 710', NOW()),
('Lactalis', '42 rue Rieussec', '53000', 'LAVAL', '02 43 59 59 59', NOW()),
('Ferrero', '18 Rue Jacques Monod CS 90058', '76136', 'MONT SAINT AIGNAN', '0800 553 553 ', NOW()),
('Coca-Cola', '9 Chemin de Bretagne', '92130', 'ISSY LES MOULINEAUX', '01 46 88 89 00', NOW()),
('PepsiCo', '420 rue d''Estienne d''Orves', '92705', 'COLOMBES', '01 41 04 11 11', NOW()),
('Heineken', '4 rue de la Mare Blanche', '77186', 'NOISIEL', '01 60 37 68 00', NOW()),
('Danone', '17 boulevard Haussmann', '75009', 'PARIS', '01 44 35 20 20', NOW()),
('Nestle', '7 boulevard Pierre Carle', '77186', 'NOISIEL', '01 60 37 68 00', NOW());
('Mondelez', '13 Rue Benjamin Franklin', '75116', 'PARIS', '01 40 69 70 00', NOW()),
('Unilever', '20 Rue des Deux Gares', '92500', 'RUEIL MALMAISON', '01 41 42 23 23', NOW()),
('Ferrero', '18 Rue Jacques Monod CS 90058', '76136', 'MONT SAINT AIGNAN', '0800 553 553', NOW()),
('Carrefour', '1 Rue Jean Mermoz', '93100', 'MONTREUIL', '01 41 58 59 00', NOW()),
('Metro', '191 Avenue Aristide Briand', '94230', 'CACHAN', '01 49 69 60 00', NOW()),
('Auchan', '200 Rue de la Recherche', '59650', 'Villeneuve-d''Ascq', '03 20 67 37 37', NOW()),
('Casino', '148 Rue de l''Université', '75007', 'PARIS', '01 53 65 24 00', NOW()),
('Intermarché', '24 Rue Auguste Chabrières', '75015', 'PARIS', '01 44 37 10 00', NOW()),
('Système U', '48 rue du Général Leclerc', '92130', 'ISSY LES MOULINEAUX', '01 41 46 17 17', NOW()),
('Lidl', '35 Rue Charles Péguy', '91120', 'PALAISEAU', '0800 90 03 69', NOW()),
('Rewe', '25 Avenue Victor Hugo', '93300', 'AUBERVILLIERS', '01 48 39 77 77', NOW()),
('Aldi', '40 Rue de la Belle Étoile', '94150', 'RUNGIS', '0800 25 25 30', NOW()),
('E.Leclerc', '26 Rue de Paris', '94220', 'CHARENTON LE PONT', '01 41 79 59 59', NOW()),
('Lactalis', '42 rue Rieussec', '53000', 'LAVAL', '02 43 59 59 59', NOW()),
('Danone', '17 boulevard Haussmann', '75009', 'PARIS', '01 44 35 20 20', NOW()),
('Nestle', '7 boulevard Pierre Carle', '77186', 'NOISIEL', '01 60 37 68 00', NOW()),
('Pepsico', '420 rue d''Estienne d''Orves', '92705', 'COLOMBES', '01 41 04 11 11', NOW()),
('Fanta', '9 Rue de l''Industrie', '93200', 'SAINT DENIS', '01 49 46 50 00', NOW()),
('Sprite', '12 Rue du Commerce', '92160', 'ANTONY', '01 46 74 26 26', NOW()),
('Evian', '42 Rue Saint-Dominique', '75007', 'PARIS', '0800 00 00 55', NOW()),
('Perrier', '13-15 Rue du Quatre Septembre', '75002', 'PARIS', '01 49 87 37 00', NOW()),
('San Pellegrino', '2 Rue Andreï Sakharov', '93140', 'BONDY', '0800 00 52 52', NOW()),
('Badoit', '6-10 Rue Troyon', '92316', 'SEVRES', '01 41 14 40 00', NOW()),
('Volvic', '67-69 Avenue Pierre Brossolette', '94170', 'LE PERREUX SUR MARNE', '01 49 77 14 14', NOW()),
('Pernod Ricard', '12 Place des États-Unis', '92120', 'MONTROUGE', '01 64 85 81 00', NOW()),
('Diageo', '2 Rue du Général de Gaulle', '94510', 'LA QUEUE EN BRIE', '01 45 76 54 00', NOW()),
('Bacardi', '32 Avenue Hoche', '75008', 'PARIS', '01 53 76 60 00', NOW()),
('Remy Cointreau', '8 Rue de l''Amiral Hamelin', '75116', 'PARIS', '01 44 13 44 13', NOW()),
('Campari', '23 Rue de l''Amiral Courbet', '94160', 'SAINT MANDE', '01 49 57 45 45', NOW());

-- Insertion des données de INGREDIENT exemple. Assez simple
INSERT INTO INGREDIENT (NomIngred, Unite, SeuilStock, StockMin, StockTheorique, PrixUHT_Moyen, Q_A_Com, DateArchiv)
VALUES
('Farine', 'kg', 1, 0, 5, 2, 1, NOW()),
('Oeufs', 'unite', 1, 0, 5, 2, 1, NOW()),
('Lait', 'l', 1, 0, 5, 2, 1, NOW()),
('Sucre', 'kg', 1, 0, 5, 2, 1, NOW()),
('Nutella', 'kg', 1, 0, 5, 2, 1, NOW()),
('Chocolat', 'kg', 1, 0, 5, 2, 1, NOW()),
('Fraise', 'g', 1, 0, 5, 2, 1, NOW()),
('Banane', 'kg', 1, 0, 5, 2, 1, NOW()),
('Chantilly', 'l', 1, 0, 5, 2, 1, NOW()),
('Jambon', 'kg', 1, 0, 5, 2, 1, NOW()),
('Bacon', 'kg', 1, 0, 5, 2, 1, NOW()),
('Emmental', 'kg', 1, 0, 5, 2, 1, NOW()),
('Tomate', 'kg', 1, 0, 5, 2, 1, NOW()),
('Salade', 'unite', 1, 0, 5, 2, 1, NOW()),
('Pomme de terre', 'kg', 1, 0, 5, 2, 1, NOW()),
('Carotte', 'kg', 1, 0, 5, 2, 1, NOW()),
('Courgette', 'kg', 1, 0, 5, 2, 1, NOW()),
('Aubergine', 'kg', 1, 0, 5, 2, 1, NOW()),
('Poivron', 'kg', 1, 0, 5, 2, 1, NOW()),
('Oignon', 'kg', 1, 0, 5, 2, 1, NOW()),
('Ail', 'kg', 1, 0, 5, 2, 1, NOW()),
('Huile', 'l', 1, 0, 5, 2, 1, NOW()),
('Reblochon', 'kg', 0,0,0,12,2,NOW());
('Pâtes', 'kg', 1, 0, 5, 2, 1, NOW()),
('Riz', 'kg', 1, 0, 5, 2, 1, NOW()),
('Poulet', 'kg', 1, 0, 5, 2, 1, NOW()),
('Boeuf', 'kg', 1, 0, 5, 2, 1, NOW()),
('Thon', 'kg', 1, 0, 5, 2, 1, NOW()),
('Saumon', 'kg', 1, 0, 5, 2, 1, NOW()),
('Crevettes', 'kg', 1, 0, 5, 2, 1, NOW()),
('Ananas', 'kg', 1, 0, 5, 2, 1, NOW()),
('Mangue', 'kg', 1, 0, 5, 2, 1, NOW()),
('Aneth', 'g', 1, 0, 5, 2, 1, NOW()),
('Persil', 'g', 1, 0, 5, 2, 1, NOW()),
('Basilic', 'g', 1, 0, 5, 2, 1, NOW()),
('Ciboulette', 'g', 1, 0, 5, 2, 1, NOW()),
('Curry', 'g', 1, 0, 5, 2, 1, NOW()),
('Cumin', 'g', 1, 0, 5, 2, 1, NOW()),
('Paprika', 'g', 1, 0, 5, 2, 1, NOW()),
('Thym', 'g', 1, 0, 5, 2, 1, NOW()),
('Laurier', 'g', 1, 0, 5, 2, 1, NOW()),
('Muscade', 'g', 1, 0, 5, 2, 1, NOW()),
('Sauce Soja', 'l', 1, 0, 5, 2, 1, NOW()),
('Vinaigre Balsamique', 'l', 1, 0, 5, 2, 1, NOW()),
('Vinaigre de Vin', 'l', 1, 0, 5, 2, 1, NOW()),
('Vin Blanc', 'l', 1, 0, 5, 2, 1, NOW()),
('Vin Rouge', 'l', 1, 0, 5, 2, 1, NOW()),
('Whisky', 'l', 1, 0, 5, 2, 1, NOW()),
('Rhum', 'l', 1, 0, 5, 2, 1, NOW()),
('Gin', 'l', 1, 0, 5, 2, 1, NOW()),
('Triple Sec', 'l', 1, 0, 5, 2, 1, NOW());

INSERT INTO LIVREUR ( Nom, Prenom, Tel, NumSS, Disponible, DateArchiv)
VALUES
('ROULLET','Rémi', '01 02 03 04 06', '1 04 07 71 014 248 36',1,NULL),
('DUPONT','Jean', '01 02 03 04 07', '1 04 07 71 014 248 37',1,NULL),
('DURAND','Pierre', '01 02 03 04 08', '1 04 07 71 014 248 38',1,NULL),
('MARTIN','Paul', '01 02 03 04 09', '1 04 07 71 014 248 39',1,NULL),
('PETIT','Jacques', '01 02 03 04 10', '1 04 07 71 014 248 40',1,NULL),
('LEROY','Alain', '01 02 03 04 11', '1 04 07 71 014 248 41',1,NULL),
('MOREAU','René', '01 02 03 04 12', '1 04 07 71 014 248 42',1,NULL),
('SIMON','Jean-Pierre', '01 02 03 04 13', '1 04 07 71 014 248 43',1,NULL),
('LAURENT','Michel', '01 02 03 04 14', '1 04 07 71 014 248 44',1,NULL),
('LACROIX','Philippe', '01 02 03 04 15', '1 04 07 71 014 248 45',1,NULL);
('GARCIA', 'Carlos', '01 02 03 04 16', '1 04 07 71 014 248 46', 1, NULL),
('FERNANDEZ', 'Luis', '01 02 03 04 17', '1 04 07 71 014 248 47', 1, NULL),
('RODRIGUEZ', 'Javier', '01 02 03 04 18', '1 04 07 71 014 248 48', 1, NULL),
('LOPEZ', 'Miguel', '01 02 03 04 19', '1 04 07 71 014 248 49', 1, NULL),
('MARTINEZ', 'Jose', '01 02 03 04 20', '1 04 07 71 014 248 50', 1, NULL),
('SANCHEZ', 'Manuel', '01 02 03 04 21', '1 04 07 71 014 248 51', 1, NULL),
('RAMIREZ', 'Pedro', '01 02 03 04 22', '1 04 07 71 014 248 52', 1, NULL),
('TORRES', 'Antonio', '01 02 03 04 23', '1 04 07 71 014 248 53', 1, NULL),
('GOMEZ', 'Juan', '01 02 03 04 24', '1 04 07 71 014 248 54', 1, NULL),
('DIAZ', 'Angel', '01 02 03 04 25', '1 04 07 71 014 248 55', 1, NULL),
('ALVAREZ', 'Fernando', '01 02 03 04 26', '1 04 07 71 014 248 56', 1, NULL),
('MORENO', 'Santiago', '01 02 03 04 27', '1 04 07 71 014 248 57', 1, NULL),
('ROMERO', 'Jorge', '01 02 03 04 28', '1 04 07 71 014 248 58', 1, NULL),
('ALONSO', 'Diego', '01 02 03 04 29', '1 04 07 71 014 248 59', 1, NULL),
('MORALES', 'Raul', '01 02 03 04 30', '1 04 07 71 014 248 60', 1, NULL),
('ORTIZ', 'Pablo', '01 02 03 04 31', '1 04 07 71 014 248 61', 1, NULL),
('GUTIERREZ', 'Manuel', '01 02 03 04 32', '1 04 07 71 014 248 62', 1, NULL),
('CRUZ', 'Sergio', '01 02 03 04 33', '1 04 07 71 014 248 63', 1, NULL),
('TORO', 'Ramon', '01 02 03 04 34', '1 04 07 71 014 248 64', 1, NULL),
('VEGA', 'Francisco', '01 02 03 04 35', '1 04 07 71 014 248 65', 1, NULL),
('MOLINA', 'Emilio', '01 02 03 04 36', '1 04 07 71 014 248 66', 1, NULL),
('GALLEGOS', 'Andres', '01 02 03 04 37', '1 04 07 71 014 248 67', 1, NULL),
('SERRANO', 'Joaquin', '01 02 03 04 38', '1 04 07 71 014 248 68', 1, NULL),
('GARRIDO', 'Marcos', '01 02 03 04 39', '1 04 07 71 014 248 69', 1, NULL),
('GIMENEZ', 'Enrique', '01 02 03 04 40', '1 04 07 71 014 248 70', 1, NULL),
('DIEZ', 'Ruben', '01 02 03 04 41', '1 04 07 71 014 248 71', 1, NULL),
('REYES', 'Alfonso', '01 02 03 04 42', '1 04 07 71 014 248 72', 1, NULL),
('NAVARRO', 'Ivan', '01 02 03 04 43', '1 04 07 71 014 248 73', 1, NULL),
('IGLESIAS', 'Eduardo', '01 02 03 04 44', '1 04 07 71 014 248 74', 1, NULL),
('RUIZ', 'Roberto', '01 02 03 04 45', '1 04 07 71 014 248 75', 1, NULL);

INSERT INTO COMMANDE (NomClient, TelClient, AdrClient, CP_Client, VilClient, Date, HeureDispo, TypeEmbal, A_Livrer, EtatLivraison, CoutLiv, TotalTTC,	DateArchiv, IdLivreur)
VALUES
('DUPONT', '01 02 03 04 05', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'preparation', 5, 10, NOW(), 1),
('DURAND', '01 02 03 04 06', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'fin_preparation', 5, 10, NOW(), 2),
('MARTIN', '01 02 03 04 07', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'en_livraision', 5, 10, NOW(), 3),
('PETIT', '01 02 03 04 08', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'livree', 5, 10, NOW(), 4),
('LEROY', '01 02 03 04 09', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'preparation', 5, 10, NOW(), 5),
('MOREAU', '01 02 03 04 10', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'en_livraision', 5, 10, NOW(), 6),
('SIMON', '01 02 03 04 11', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'livree', 5, 10, NOW(), 7);
('CLERC', '01 02 03 04 12', '20 avenue des Roses', '69001', 'LYON', '2019-02-01', '14:00', 'Boîte', 1, 'preparation', 7, 15, NOW(), 8),
('ROUX', '01 02 03 04 13', '25 rue de la Liberté', '75001', 'PARIS', '2019-02-02', '15:00', 'Sac', 1, 'fin_preparation', 7, 15, NOW(), 9),
('LEFEBVRE', '01 02 03 04 14', '30 rue du Commerce', '44000', 'NANTES', '2019-02-03', '16:00', 'Carton', 1, 'en_livraison', 7, 15, NOW(), 10),
('ROUSSEAU', '01 02 03 04 15', '10 avenue des Champs', '33000', 'BORDEAUX', '2019-02-04', '17:00', 'Boîte', 1, 'livree', 7, 15, NOW(), 11),
('VINCENT', '01 02 03 04 16', '5 rue du Moulin', '59000', 'LILLE', '2019-02-05', '18:00', 'Sac', 1, 'preparation', 7, 15, NOW(), 12),
('FOURNIER', '01 02 03 04 17', '15 avenue de la République', '13001', 'MARSEILLE', '2019-02-06', '12:00', 'Carton', 1, 'en_livraison', 7, 15, NOW(), 13),
('MOREL', '01 02 03 04 18', '8 rue des Ecoles', '69002', 'LYON', '2019-02-07', '13:00', 'Boîte', 1, 'livree', 7, 15, NOW(), 14),
('DUBOIS', '01 02 03 04 19', '42 rue Victor Hugo', '33001', 'BORDEAUX', '2019-02-08', '14:00', 'Sac', 1, 'preparation', 7, 15, NOW(), 15),
('MOREAU', '01 02 03 04 20', '2 avenue du Général de Gaulle', '75002', 'PARIS', '2019-02-09', '15:00', 'Boîte', 1, 'fin_preparation', 7, 15, NOW(), 16),
('LAURENT', '01 02 03 04 21', '9 rue Pasteur', '59001', 'LILLE', '2019-02-10', '16:00', 'Carton', 1, 'en_livraison', 7, 15, NOW(), 17),
('LEFORT', '01 02 03 04 22', '12 avenue Victor Hugo', '75003', 'PARIS', '2019-02-11', '17:00', 'Boîte', 1, 'livree', 7, 15, NOW(), 18),
('ROBERT', '01 02 03 04 23', '6 rue des Lilas', '44001', 'NANTES', '2019-02-12', '18:00', 'Sac', 1, 'preparation', 7, 15, NOW(), 19),
('RICHARD', '01 02 03 04 24', '18 rue de la Paix', '75002', 'PARIS', '2019-02-13', '12:00', 'Boîte', 1, 'fin_preparation', 7, 15, NOW(), 20),
('PETIT', '01 02 03 04 25', '1 place de la Liberté', '69003', 'LYON', '2019-02-14', '14:00', 'Carton', 1, 'en_livraison', 7, 15, NOW(), 21),
('DURAND', '01 02 03 04 26', '7 avenue du Général Leclerc', '75004', 'PARIS', '2019-02-15', '16:00', 'Boîte', 1, 'livree', 7, 15, NOW(), 22),
('LEGRAND', '01 02 03 04 27', '3 rue de la Paix', '59002', 'LILLE', '2019-02-16', '18:00', 'Sac', 1, 'preparation', 7, 15, NOW(), 23),
('DUBOIS', '01 02 03 04 28', '14 avenue des Fleurs', '69004', 'LYON', '2019-02-17', '12:00', 'Boîte', 1, 'en_livraison', 7, 15, NOW(), 24),
('BERNARD', '01 02 03 04 29', '11 rue Victor Hugo', '33002', 'BORDEAUX', '2019-02-18', '14:00', 'Carton', 1, 'livree', 7, 15, NOW(), 25),
('THOMAS', '01 02 03 04 30', '4 place de la République', '75005', 'PARIS', '2019-02-19', '16:00', 'Boîte', 1, 'preparation', 7, 15, NOW(), 26),
('PETIT', '01 02 03 04 31', '22 avenue Gambetta', '44002', 'NANTES', '2019-02-20', '18:00', 'Sac', 1, 'fin_preparation', 7, 15, NOW(), 27),
('ROBERT', '01 02 03 04 32', '17 rue de la Liberté', '59003', 'LILLE', '2019-02-21', '12:00', 'Boîte', 1, 'en_livraison', 7, 15, NOW(), 28),
('RICHARD', '01 02 03 04 33', '13 avenue de Gaulle', '75006', 'PARIS', '2019-02-22', '14:00', 'Carton', 1, 'livree', 7, 15, NOW(), 29),
('MARTIN', '01 02 03 04 34', '8 rue Victor Hugo', '33003', 'BORDEAUX', '2019-02-23', '16:00', 'Boîte', 1, 'preparation', 7, 15, NOW(), 30),
('FOURNIER', '01 02 03 04 35', '6 place de la Paix', '69005', 'LYON', '2019-02-24', '18:00', 'Sac', 1, 'fin_preparation', 7, 15, NOW(), 31),
('MOREL', '01 02 03 04 36', '11 avenue des Roses', '75007', 'PARIS', '2019-02-25', '12:00', 'Carton', 1, 'en_livraison', 7, 15, NOW(), 32),
('DUBOIS', '01 02 03 04 37', '9 rue du Commerce', '44003', 'NANTES', '2019-02-26', '14:00', 'Boîte', 1, 'livree', 7, 15, NOW(), 33),
('MOREAU', '01 02 03 04 38', '15 rue Victor Hugo', '33004', 'BORDEAUX', '2019-02-27', '16:00', 'Sac', 1, 'preparation', 7, 15, NOW(), 34),
('LAURENT', '01 02 03 04 39', '3 avenue du Général Leclerc', '75008', 'PARIS', '2019-02-28', '18:00', 'Boîte', 1, 'fin_preparation', 7, 15, NOW(), 35),
('LEFORT', '01 02 03 04 40', '12 rue des Lilas', '69006', 'LYON', '2019-03-01', '12:00', 'Carton', 1, 'en_livraison', 7, 15, NOW(), 36),
('ROBERT', '01 02 03 04 41', '8 avenue Gambetta', '44004', 'NANTES', '2019-03-02', '14:00', 'Sac', 1, 'livree', 7, 15, NOW(), 37),
('RICHARD', '01 02 03 04 42', '14 rue de la Liberté', '33005', 'BORDEAUX', '2019-03-03', '16:00', 'Boîte', 1, 'preparation', 7, 15, NOW(), 38);

INSERT INTO PRODUIT (NomProd, Active, Taille, NbIngBase, NbIngOpt, 	PrixUHT, Image, IngBase1, IngBase2, IngBase3, IngBase4, IngBase5, IngOpt1, IngOpt2, IngOpt3, IngOpt4, IngOpt5, IngOpt6, NbOptMax, DateArchiv)
VALUES
('CrepesSuzette', 1, 'M', 3, 2, 2, 'crepes.jpg', 'Farine', 'Oeufs', 'Lait', 'Nutella', 'Chocolat', 'Fraise', 'Banane', 'Chantilly', 'Jambon', 'Bacon', 'Emmental', 2, NOW()),
('CrepesBretonnes', 1, 'M', 3, 2, 2, 'crepes.jpg', 'Farine', 'Oeufs', 'Lait', 'Oeuf', 'Jambom', 'Emental', 'Fraise', 'Banane', 'Chantilly', 'Jambon', 'Bacon', 2, NOW()),
('Salade', 1, 'M', 3, 2, 2, 'salade.jpg', 'Tomate', 'Salade', 'Pomme de terre', 'Carotte', 'Courgette', 'Aubergine', 'Poivron', 'Oignon', 'Ail', 'Huile', 'Reblochon', 2, NOW());

INSERT INTO DETAIL (`NomProd`, `IngBase1`, `IngBase2`, `IngBase3`, `IngBase4`, `IngOpt1`, `IngOpt2`, `IngOpt3`, `IngOpt4`, `DateArchiv`, `IdProd`) 
VALUES 
('CrepesSuzette', 'Farine', 'Oeufs', 'Lait', 'Nutella', 'Chocolat', 'Fraise', 'Banane', 'Chantilly', NOW(), 0),
('CrepesBretonnes', 'Farine', 'Oeufs', 'Lait', 'Oeuf', 'Jambom', 'Emental', 'Fraise', 'Banane', NOW(), 1),
('Salade', 'Tomate', 'Salade', 'Pomme de terre', 'Carotte', 'Courgette', 'Aubergine', 'Poivron', 'Oignon', NOW(), 2);

INSERT INTO COM_DET (`Num_OF`, `Quant`, `NumCom`)
VALUES
    (4, 8, 4),
    (5, 12, 5),
    (6, 20, 6),
    (7, 15, 7),
    (8, 6, 8),
    (9, 18, 9),
    (10, 9, 10),
    (11, 11, 11),
    (12, 14, 12),
    (13, 7, 13);


INSERT INTO DET_INGR (`Num_OF`, `IdIngred`)
VALUES
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (9, 9),
    (10, 10),
    (11, 11),
    (12, 12),
    (13, 13);


INSERT INTO FOURN_INGR (`NomFourn`, `IdIngred`, `PrixUHT`)
VALUES
    ('Pepsi', 4, 2.5),
    ('Mars', 6, 10),
    ('Hershey', 7, 5),
    ('Unilever', 8, 3),
    ('Kellogg', 9, 4.5),
    ('General Mills', 10, 6),
    ('Danone', 11, 2),
    ('Kraft Heinz', 12, 8),
    ('Mondelez', 13, 7),
    ('Campbell Soup', 14, 4);


INSERT INTO PROD_INGR (`IdIngred`, `IdProd`, `Quant`)
VALUES
    (4, 2, 8),
    (5, 2, 12),
    (6, 3, 20),
    (7, 3, 15),
    (8, 4, 6),
    (9, 4, 18),
    (10, 5, 9),
    (11, 5, 11),
    (12, 6, 14),
    (13, 6, 7);



INSERT INTO RESPONSABLE (`Nom`, `Prenom`, `Tel`) 
VALUES 
('Boudon', 'Owen', '0638045422');


INSERT INTO Inventaire (IdProd, Date, Quantite, StockTheorique) VALUES
-- Inventaires pour le produit avec IdProd = 1
(1, CURDATE(), 100, 95),
(1, DATE_ADD(CURDATE(), INTERVAL 1 DAY), 105, 100),
(1, DATE_ADD(CURDATE(), INTERVAL 2 DAY), 110, 108),
(1, DATE_ADD(CURDATE(), INTERVAL 3 DAY), 95, 90),
(1, DATE_ADD(CURDATE(), INTERVAL 4 DAY), 120, 118),
(1, DATE_ADD(CURDATE(), INTERVAL 5 DAY), 105, 102),
(1, DATE_ADD(CURDATE(), INTERVAL 6 DAY), 100, 99),

-- Inventaires pour le produit avec IdProd = 2
(2, CURDATE(), 150, 145),
(2, DATE_ADD(CURDATE(), INTERVAL 1 DAY), 155, 150),
(2, DATE_ADD(CURDATE(), INTERVAL 2 DAY), 160, 158),
(2, DATE_ADD(CURDATE(), INTERVAL 3 DAY), 145, 140),
(2, DATE_ADD(CURDATE(), INTERVAL 4 DAY), 170, 168),
(2, DATE_ADD(CURDATE(), INTERVAL 5 DAY), 155, 152),
(2, DATE_ADD(CURDATE(), INTERVAL 6 DAY), 150, 149),

-- Inventaires pour le produit avec IdProd = 3
(3, CURDATE(), 200, 195),
(3, DATE_ADD(CURDATE(), INTERVAL 1 DAY), 205, 200),
(3, DATE_ADD(CURDATE(), INTERVAL 2 DAY), 210, 208),
(3, DATE_ADD(CURDATE(), INTERVAL 3 DAY), 195, 190),
(3, DATE_ADD(CURDATE(), INTERVAL 4 DAY), 220, 218),
(3, DATE_ADD(CURDATE(), INTERVAL 5 DAY), 205, 202),
(3, DATE_ADD(CURDATE(), INTERVAL 6 DAY), 200, 199);
