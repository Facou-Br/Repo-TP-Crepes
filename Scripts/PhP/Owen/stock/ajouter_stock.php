<?php
require_once '..\..\..\..\BaseDeDonnees\codesConnexion.php';
$connex = BaseDeDonnees::connecterBDD('admin');


$nomIngred = $_POST["nomIngred"];
$stockReel = $_POST["stockReel"];
$prixUHTMoyen = $_POST["prixUHTMoyen"];
$nomFourn = $_POST["nomFourn"];
$seuilStock = 1;
$stockMin = 0;
    try {
        $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
        $sql = "INSERT INTO `ingredient` (NomIngred, SeuilStock, StockMin, StockReel, PrixUHT_Moyen) VALUES ('".$nomIngred."', $seuilStock, $stockMin, $stockReel, $prixUHTMoyen);";
        $connex->exec($sql);
        $connex->commit();

        $sqlId = "SELECT IdIngred FROM `ingredient` WHERE NomIngred='".$nomIngred."';";
        $result = $connex->exec($sqlId);
        $idIngred = $result->fetch(PDO::FETCH_ASSOC);
        $connex->commit();

        $sql2 = "INSERT INTO `fourn_ingr` (NomFourn, IdIngred) VALUES ('".$nomFourn."', $idIngred);";
        $connex->exec($sql2);
        $connex->commit();

    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die();

}
