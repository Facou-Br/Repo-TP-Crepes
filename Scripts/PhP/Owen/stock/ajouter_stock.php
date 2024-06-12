<?php
// Inclut le fichier contenant les codes de connexion à la base de données
require_once '../../../../BaseDeDonnees/codesConnexion.php';

// Connecte à la base de données en utilisant les informations de connexion pour l'utilisateur 'admin'
$connex = BaseDeDonnees::connecterBDD('admin');

// Récupère les données envoyées par la méthode POST
$nomIngred = $_POST["nomIngred"];
$stockReel = $_POST["stockReel"];
$prixUHTMoyen = $_POST["prixUHTMoyen"];
$nomFourn = $_POST["nomFourn"];
$categorie = $_POST["categorie"];
$seuilStock = 1;
$stockMin = 0;

try {
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);

    // Requête SQL pour insérer les informations de l'ingrédient dans la table 'ingredient'
    $sql = "INSERT INTO `ingredient` (NomIngred, Unite, SeuilStock, StockMin, StockReel, PrixUHT_Moyen, DateArchiv) 
        VALUES ('$nomIngred', '$categorie', $seuilStock, $stockMin, $stockReel, $prixUHTMoyen, '0000-00-00');";
    $connex->exec($sql);

    // Récupère l'ID de l'ingrédient nouvellement ajouté
    $sqlId = "SELECT IdIngred FROM `ingredient` WHERE NomIngred='$nomIngred';";
    $result = $connex->query($sqlId);
    $idIngred = $result->fetchAll();

    // Requête SQL pour insérer les informations dans la table de liaison 'fourn_ingr'
    $sql2 = "INSERT INTO `fourn_ingr` (NomFourn, IdIngred, PrixUHT) 
        VALUES ('$nomFourn', " . $idIngred[0]['IdIngred'] . ", $prixUHTMoyen);";
    $connex->exec($sql2);
    $connex->commit();
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
