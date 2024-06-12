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
    // Désactive l'autocommit pour les transactions
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);

    // Requête SQL pour insérer les données du fournisseur dans la table 'fournisseur'
    $sql = "INSERT INTO `fournisseur` (`NomFourn`, `Adresse`, `CodePostal`, `Ville`, `Tel`, `DateArchiv`) VALUES ('$nomFourn', '$adresse', '$cp', '$ville', '$tel', '0000-00-00');";
    // Exécute la requête SQL
    $connex->exec($sql);
    $connex->commit();
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
