<?php

require_once '../../../../BaseDeDonnees/codesConnexion.php';
try {
    $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE.';port='.PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
try{
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $requete1 = 'SELECT NomFourn, Adresse, CodePostal, Ville, Tel FROM `fournisseur`;';
    $ligne = $connex->query($requete1);
}
catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}

$result=array();
foreach ($ligne as $row) {
    $result[]=$row;
}
$stocksJson = json_encode($result);
file_put_contents("../../../JavaScript/Owen/fournisseurs.json", $stocksJson);

?>