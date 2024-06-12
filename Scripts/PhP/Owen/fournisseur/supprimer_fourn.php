<?php
// Inclut le fichier contenant les codes de connexion à la base de données
require_once '../../../../BaseDeDonnees/codesConnexion.php';

// Connecte à la base de données en utilisant les informations de connexion pour l'utilisateur 'admin'
$connex = BaseDeDonnees::connecterBDD('admin');

try {
    // Récupère le nom du fournisseur envoyé par la méthode POST
    $nomFourn = $_POST["nomFourn"];

    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);

    // Requête SQL pour mettre à jour la date d'archivage du fournisseur dans la table 'fournisseur'
    $sql = "UPDATE `fournisseur` SET `DateArchiv`=CAST(NOW() AS DATE) WHERE `NomFourn` = '" . $nomFourn . "';";

    $connex->exec($sql);
    $connex->commit();
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
