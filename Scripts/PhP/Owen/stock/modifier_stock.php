<?php
// Inclut le fichier contenant les codes de connexion à la base de données
require_once '../../../../BaseDeDonnees/codesConnexion.php';

// Connecte à la base de données en utilisant les informations de connexion pour l'utilisateur 'admin'
$connex = BaseDeDonnees::connecterBDD('admin');

// Récupère les données envoyées par la méthode POST
$nomIngred = $_POST["nomIngred"];
$nomFourn = $_POST["nomFourn"];
$stockReel = $_POST["StockReel"];
$prixUHTMoyen = $_POST["prix"];

try {
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);

    // Requête SQL pour mettre à jour le stock réel et le prix moyen de l'ingrédient dans la table 'ingredient'
    $sql = "UPDATE `ingredient` SET `StockReel` = $stockReel, `PrixUHT_Moyen` = $prixUHTMoyen WHERE `NomIngred` = '$nomIngred';";

    // Requête SQL pour mettre à jour le nom du fournisseur et le prix UHT dans la table 'fourn_ingr'
    $sql2 = "UPDATE `fourn_ingr` SET `NomFourn` = '$nomFourn', `PrixUHT` = $prixUHTMoyen WHERE `IdIngred` = (SELECT `IdIngred` FROM `ingredient` WHERE `NomIngred` = '$nomIngred');";
    $connex->exec($sql);
    $connex->exec($sql2);

    $connex->commit();
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
