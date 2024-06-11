<?php
require_once '..\..\..\..\BaseDeDonnees\codesConnexion.php';
$connex = BaseDeDonnees::connecterBDD('admin');

$nomFourn = $_POST["nomFourn"];
$adresse = $_POST["adresse"];
$cp = $_POST["codePostal"];
$ville = $_POST["ville"];
$tel = $_POST["telephone"];

try {
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $sql = "INSERT INTO `fournisseur` (`NomFourn`, `Adresse`, `CodePostal`, `Ville`, `Tel`) VALUES ($nomFourn, $adresse, $cp, $ville, $tel);";
    $connex->exec($sql); #essayer le query pour voir si ça marche regarder dans le cours
    $connex->commit();
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
