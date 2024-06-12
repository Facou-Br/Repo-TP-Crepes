<?php
// Inclut le fichier contenant les codes de connexion à la base de données
require_once '../../../../BaseDeDonnees/codesConnexion.php';

// Connecte à la base de données en utilisant les informations de connexion pour l'utilisateur 'admin'
$connex = BaseDeDonnees::connecterBDD('admin');

try {
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);

    // Requête SQL pour sélectionner les informations sur les stocks des ingrédients
    $sql = "SELECT I.NomIngred, F.NomFourn, I.StockReel, FI.PrixUHT FROM INGREDIENT I JOIN fourn_ingr FI ON I.IdIngred=FI.IdIngred JOIN fournisseur F ON FI.NomFourn=F.NomFourn WHERE I.DateArchiv = '0000-00-00';";
    $ligne = $connex->query($sql);
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}

// Crée un tableau pour stocker les résultats
$result = array();
foreach ($ligne as $row) {
    // Ajoute chaque ligne de résultat au tableau
    $result[] = $row;
}

// Encode le tableau en JSON
$stocksJson = json_encode($result);
// Renvoie le JSON
echo $stocksJson;
