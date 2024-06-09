<?php
require_once '..\..\..\..\BaseDeDonnees\codesConnexion.php';
$connex = BaseDeDonnees::connecterBDD('admin');

try {
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $requete1 = 'SELECT NomFourn, Adresse, CodePostal, Ville, Tel FROM `fournisseur` WHERE DateArchiv = 0000-00-00;';
    $ligne = $connex->query($requete1);
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}

$result = array();
foreach ($ligne as $row) {
    $result[] = $row;
}
$fournJson = json_encode($result);
echo $fournJson;
