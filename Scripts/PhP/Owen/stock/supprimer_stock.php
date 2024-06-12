<?php
// Inclut le fichier contenant les codes de connexion à la base de données
require_once '../../../../BaseDeDonnees/codesConnexion.php';

// Connecte à la base de données en utilisant les informations de connexion pour l'utilisateur 'admin'
$connex = BaseDeDonnees::connecterBDD('admin');

try {
    // Récupère le nom de l'ingrédient envoyé par la méthode POST
    $nomIngred = $_POST["nomIngred"];

    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);

    // Requête SQL pour mettre à jour la date d'archivage de l'ingrédient dans la table 'ingredient'
    $sql = "UPDATE `ingredient` SET `DateArchiv`=CAST(NOW() AS DATE) WHERE `nomIngred` = '" . $nomIngred . "';";
    $connex->exec($sql);
    $connex->commit();

} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}