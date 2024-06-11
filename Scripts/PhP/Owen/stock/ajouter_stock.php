<?php
require_once '..\..\..\..\BaseDeDonnees\codesConnexion.php';
$connex = BaseDeDonnees::connecterBDD('admin');


$nomIngred = $_POST["nomIngred"];
$stockReel = $_POST["stockReel"];
$prixUHTMoyen = $_POST["prixUHTMoyen"];
$nomFourn = $_POST["nomFourn"];
$categorie = $_POST["categorie"];
$seuilStock = 1;
$stockMin = 0;
    try {
        $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
        $sql = "INSERT INTO `ingredient` (NomIngred, Unite ,SeuilStock, StockMin, StockReel, PrixUHT_Moyen) VALUES ('".$nomIngred."', '".$categorie."' , $seuilStock, $stockMin, $stockReel, $prixUHTMoyen);";
        $connex->exec($sql);
        $connex->commit();

        #$sqlId = "SELECT IdIngred FROM `ingredient` WHERE NomIngred='".$nomIngred."';";
        $sqlId = "SELECT IdIngred FROM `ingredient` WHERE NomIngred='".$nomIngred."';";
        $result = $connex->query($sqlId);
        $idIngred = $result->fetchAll();
        $connex->commit();

        $sql2 = "INSERT INTO `fourn_ingr` (NomFourn, IdIngred, PrixUHT) VALUES ('".$nomFourn."', ".$idIngred[0]['IdIngred'].", ".$prixUHTMoyen.");";
        $connex->exec($sql2);
        $connex->commit();

    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die();

}
