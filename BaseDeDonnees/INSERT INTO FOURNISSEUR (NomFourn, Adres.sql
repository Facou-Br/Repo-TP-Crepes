INSERT INTO FOURNISSEUR (NomFourn, Adresse, CodePostal, Ville, Tel, DateArchiv)
VALUES
('Nutella', '18 Rue Jacques Monod CS 90058', '76136', 'MONT SAINT AIGNAN', '0800 553 553 ', NOW())
('Mozzalat', '28 rue Gay Lussac - France', '75005', 'PARIS', '02 32 39 71 68', NOW()),
('TransGourmet', 'Lieudit Les Bonnes Filles', '21200', 'Levernois','0826 101 710', NOW()),
('Lactalis', '42 rue Rieussec', '53000', 'LAVAL', '02 43 59 59 59', NOW()),
('Ferrero', '18 Rue Jacques Monod CS 90058', '76136', 'MONT SAINT AIGNAN', '0800 553 553 ', NOW()),
('Coca-Cola', '9 Chemin de Bretagne', '92130', 'ISSY LES MOULINEAUX', '01 46 88 89 00', NOW()),
('PepsiCo', '420 rue d''Estienne d''Orves', '92705', 'COLOMBES', '01 41 04 11 11', NOW()),
('Heineken', '4 rue de la Mare Blanche', '77186', 'NOISIEL', '01 60 37 68 00', NOW()),
('Danone', '17 boulevard Haussmann', '75009', 'PARIS', '01 44 35 20 20', NOW()),
('Nestle', '7 boulevard Pierre Carle', '77186', 'NOISIEL', '01 60 37 68 00', NOW());


INSERT INTO INGREDIENT (IdIngred, NomIngred, Unite, SeuilStock, StockMin, StockReel, PrixUHT_Moyen, Q_A_Com, DateArchiv)
VALUES
(1, 'Farine', 'kg', 1, 0, 5, 2, 1, NOW()),
(2, 'Oeufs', 'unite', 1, 0, 5, 2, 1, NOW()),
(3, 'Lait', 'l', 1, 0, 5, 2, 1, NOW()),
(4, 'Sucre', 'kg', 1, 0, 5, 2, 1, NOW()),
(5, 'Nutella', 'kg', 1, 0, 5, 2, 1, NOW()),
(6, 'Chocolat', 'kg', 1, 0, 5, 2, 1, NOW()),
(7, 'Fraise', 'g', 1, 0, 5, 2, 1, NOW()),
(8, 'Banane', 'kg', 1, 0, 5, 2, 1, NOW()),
(9, 'Chantilly', 'l', 1, 0, 5, 2, 1, NOW()),
(10, 'Jambon', 'kg', 1, 0, 5, 2, 1, NOW()),
(11, 'Bacon', 'kg', 1, 0, 5, 2, 1, NOW()),
(12, 'Emmental', 'kg', 1, 0, 5, 2, 1, NOW()),
(13, 'Tomate', 'kg', 1, 0, 5, 2, 1, NOW()),
(14, 'Salade', 'unite', 1, 0, 5, 2, 1, NOW()),
(20, 'Pomme de terre', 'kg', 1, 0, 5, 2, 1, NOW()),
(21, 'Carotte', 'kg', 1, 0, 5, 2, 1, NOW()),
(22, 'Courgette', 'kg', 1, 0, 5, 2, 1, NOW()),
(23, 'Aubergine', 'kg', 1, 0, 5, 2, 1, NOW()),
(24, 'Poivron', 'kg', 1, 0, 5, 2, 1, NOW()),
(25, 'Oignon', 'kg', 1, 0, 5, 2, 1, NOW()),
(26, 'Ail', 'kg', 1, 0, 5, 2, 1, NOW()),
(27, 'Huile', 'l', 1, 0, 5, 2, 1, NOW()),
(28, "Reblochon", 'kg', 0,0,0,12,2,NOW());

INSERT INTO FOURN_INGR (NomFourn, IdIngred, PrixUHT)
VALUES
()

INSERT INTO LIVREUR (IdLivreur, Nom, Prenom, Tel, NumSS, Disponible, DateArchiv)
VALUES
(1, 'ROULLET','Rémi', '01 02 03 04 06', '1 04 07 71 014 248 36',1,NOW()),
(2, 'DUPONT','Jean', '01 02 03 04 07', '1 04 07 71 014 248 37',1,NOW()),
(3, 'DURAND','Pierre', '01 02 03 04 08', '1 04 07 71 014 248 38',1,NOW()),
(4, 'MARTIN','Paul', '01 02 03 04 09', '1 04 07 71 014 248 39',1,NOW()),
(5, 'PETIT','Jacques', '01 02 03 04 10', '1 04 07 71 014 248 40',1,NOW()),
(6, 'LEROY','Alain', '01 02 03 04 11', '1 04 07 71 014 248 41',1,NOW()),
(7, 'MOREAU','René', '01 02 03 04 12', '1 04 07 71 014 248 42',1,NOW()),
(8, 'SIMON','Jean-Pierre', '01 02 03 04 13', '1 04 07 71 014 248 43',1,NOW()),
(9, 'LAURENT','Michel', '01 02 03 04 14', '1 04 07 71 014 248 44',1,NOW()),
(10, 'LACROIX','Philippe', '01 02 03 04 15', '1 04 07 71 014 248 45',1,NOW());


INSERT INTO COMMANDE (NumCom, NomClient, TelClient, AdrClient, CP_Client, VilleClient, Date, HeureDispo, TypeEmbal, A_Livrer, EtatLivraison, CoutLiv, TotalTTC,	DateArchiv, IdLivreur)
VALUES
(1, 'DUPONT', '01 02 03 04 05', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'En cours', 5, 10, NOW(), 1),
(2, 'DURAND', '01 02 03 04 06', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'En cours', 5, 10, NOW(), 2),
(3, 'MARTIN', '01 02 03 04 07', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'En cours', 5, 10, NOW(), 3),
(4, 'PETIT', '01 02 03 04 08', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'En cours', 5, 10, NOW(), 4),
(5, 'LEROY', '01 02 03 04 09', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'En cours', 5, 10, NOW(), 5),
(6, 'MOREAU', '01 02 03 04 10', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'En cours', 5, 10, NOW(), 6),
(7, 'SIMON', '01 02 03 04 11', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'En cours', 5, 10, NOW(), 7);