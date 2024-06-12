<?php
// Inclut le fichier contenant les codes de connexion à la base de données
require_once '../../../../BaseDeDonnees/codesConnexion.php';

// Connecte à la base de données en utilisant les informations de connexion pour l'utilisateur 'admin'
$connex = BaseDeDonnees::connecterBDD('admin');

try {
    // Désactive l'autocommit pour les transactions
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);

    // Requête SQL pour sélectionner les fournisseurs dont la date d'archivage est vide (0000-00-00) (encore disponibles)
    $requete1 = 'SELECT NomFourn, Adresse, CodePostal, Ville, Tel FROM `fournisseur` WHERE DateArchiv = "0000-00-00";';
    $ligne = $connex->query($requete1);
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
$fournJson = json_encode($result);

// Renvoie le JSON
echo $fournJson;
