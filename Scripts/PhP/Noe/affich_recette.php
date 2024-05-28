<?php

require_once '../../../BaseDeDonnees/codesConnexion.php';
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
    $requete1 = 'SELECT IdProd, NomProd, Active, Taille, NbIngBase, NbIngOpt, PrixUHT, Image, IngBase1, IngBase2, IngBase3, IngBase4, IngBase5, IngOpt1, IngOpt2, IngOpt3, IngOpt4, IngOpt5, IngOpt6, NbOptMax, DateArchiv FROM PRODUIT ;';
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
echo $stocksJson;
?>