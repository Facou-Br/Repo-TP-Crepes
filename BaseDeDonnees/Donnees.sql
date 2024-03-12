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

-- Insertion des données de INGREDIENT exemple. Assez simple
INSERT INTO INGREDIENT (IdIngred, NomIngred, Unite, SeuilStock, StockMin, StockReel, PrixUHT_Moyen, Q_A_Com, DateArchiv)
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
("Reblochon", 'kg', 0,0,0,12,2,NOW());

-- Insertion des données de FOURN_INGR exemple. Faire attention aux clés étrangères entre les tables FOURNISSEUR et INGREDIENT.
INSERT INTO FOURN_INGR (NomFourn, IdIngred, PrixUHT)
VALUES
()

INSERT INTO LIVREUR (IdLivreur, Nom, Prenom, Tel, NumSS, Disponible, DateArchiv)
VALUES
('ROULLET','Rémi', '01 02 03 04 06', '1 04 07 71 014 248 36',1,NOW()),
('DUPONT','Jean', '01 02 03 04 07', '1 04 07 71 014 248 37',1,NOW()),
('DURAND','Pierre', '01 02 03 04 08', '1 04 07 71 014 248 38',1,NOW()),
('MARTIN','Paul', '01 02 03 04 09', '1 04 07 71 014 248 39',1,NOW()),
('PETIT','Jacques', '01 02 03 04 10', '1 04 07 71 014 248 40',1,NOW()),
('LEROY','Alain', '01 02 03 04 11', '1 04 07 71 014 248 41',1,NOW()),
('MOREAU','René', '01 02 03 04 12', '1 04 07 71 014 248 42',1,NOW()),
('SIMON','Jean-Pierre', '01 02 03 04 13', '1 04 07 71 014 248 43',1,NOW()),
('LAURENT','Michel', '01 02 03 04 14', '1 04 07 71 014 248 44',1,NOW()),
('LACROIX','Philippe', '01 02 03 04 15', '1 04 07 71 014 248 45',1,NOW());


INSERT INTO COMMANDE (NumCom, NomClient, TelClient, AdrClient, CP_Client, VilleClient, Date, HeureDispo, TypeEmbal, A_Livrer, EtatLivraison, CoutLiv, TotalTTC,	DateArchiv, IdLivreur)
VALUES
('DUPONT', '01 02 03 04 05', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'En cours', 5, 10, NOW(), 1),
('DURAND', '01 02 03 04 06', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'En cours', 5, 10, NOW(), 2),
('MARTIN', '01 02 03 04 07', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'En cours', 5, 10, NOW(), 3),
('PETIT', '01 02 03 04 08', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'En cours', 5, 10, NOW(), 4),
('LEROY', '01 02 03 04 09', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'En cours', 5, 10, NOW(), 5),
('MOREAU', '01 02 03 04 10', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'En cours', 5, 10, NOW(), 6),
('SIMON', '01 02 03 04 11', '18 rue de la Paix', '75000', 'PARIS', '2019-01-01', '12:00', 'Sac', 1, 'En cours', 5, 10, NOW(), 7);