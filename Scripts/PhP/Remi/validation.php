<?php
const HOST = "localhost";
const DATABASE = "crepesco_test";
const PORT = "3306";
const ADMIN_USER = "root2";
const ADMIN_PASSWORD = "";

try {
    $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE.';port='.PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode() . ';';
    die();
}
try {
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE, ADMIN_USER, ADMIN_PASSWORD);

    $requete1 = "INSERT INTO `detail` (`Num_OF`, `NomProd`, `IngBase1`, `IngBase2`, `IngBase3`, `IngBase4`,`IngOpt1`, `IngOpt2`, `IngOpt3`, `IngOpt4`, `DateArchiv`, `IdProd`) VALUES (17, 'product_name', 'A', 'B', 'C', 'D', NULL, NULL, NULL, NULL, '2021-11-01', '1');";
    $requete0 = "INSERT INTO `det_ingr` (`Num_OF`,`IdIngred`) VALUES (17, 1);";
    $requete2 = "INSERT INTO `com_det` (`Num_OF`, `Quant`, `NumCom`) VALUES (197, '19', 199);";
    $requete3 = "INSERT INTO `commande` (`NumCom`, `NomClient`, `TelClient`, `AdrClient`, `CP_Client`, `VilClient`, `Date`, `HeureDispo`, `TypeEmbal`, `A_Livrer`, `EtatCde`, `EtatLivraison`, `CoutLiv`, `TotalTTC`, `DateArchiv`, `IdLivreur`) VALUES (NULL, 'client_name', '0000000000', '1 rue de la rue', '00000', 'City', '2021-11-01', '12:00:00', 'Packaging', '1', 'In progress', 'In progress', '0', '0', '2021-11-01', '1');";

    $pdo->exec($requete1);
    $pdo->exec($requete0);
    $pdo->exec($requete2);
    $pdo->exec($requete3);

    echo "Records inserted successfully.";
} catch(PDOException $e) {
    die("ERROR: Could not able to execute the query. " . $e->getMessage());
}