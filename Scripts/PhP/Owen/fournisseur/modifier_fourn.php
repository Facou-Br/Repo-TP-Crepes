<?php
// Inclut le fichier contenant les codes de connexion à la base de données
require_once '../../../../BaseDeDonnees/codesConnexion.php';

// Connecte à la base de données en utilisant les informations de connexion pour l'utilisateur 'admin'
$connex = BaseDeDonnees::connecterBDD('admin');

// Récupère les données envoyées par la méthode POST
$nomFourn = $_POST["nomFourn"];
$adresse = $_POST["adresse"];
$cp = $_POST["codePostal"];
$ville = $_POST["ville"];
$tel = $_POST["telephone"];

try {
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);

    // Requête SQL pour mettre à jour les informations du fournisseur dans la table 'fournisseur'
    $sql = "UPDATE `fournisseur` SET `Adresse` = '" . $adresse . "', `CodePostal` = '" . $cp . "', `Ville` = '" . $ville . "', `Tel` = '" . $tel . "' WHERE `fournisseur`.`NomFourn` = '" . $nomFourn . "';";
    $connex->exec($sql);
    $connex->commit();
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
