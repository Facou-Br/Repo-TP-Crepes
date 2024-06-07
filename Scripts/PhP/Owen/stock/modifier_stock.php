<?php
require_once '..\..\..\..\BaseDeDonnees\codesConnexion.php';
$connex = BaseDeDonnees::connecterBDD('admin');

$nomIngred = $_POST["nomIngred"];
$nomFourn= $_POST["nomFourn"];
$stockReel = $_POST["StockReel"];
$prixUHTMoyen = $_POST["prix"];


try {
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $sql = "UPDATE `ingredient` SET `StockReel` = " . $stockReel . ", `PrixUHT_Moyen` = " . $prixUHTMoyen . " WHERE `NomIngred` = '" . $nomIngred . "';";
    $sql2= "UPDATE `fourn_ingr` SET `NomFourn` = '".$nomFourn."', `PrixUHT` = ".$prixUHTMoyen." WHERE `IdIngred` = (SELECT `IdIngred` FROM `ingredient` WHERE `NomIngred` = '".$nomIngred."');";
    $connex->exec($sql); #essayer le query pour voir si ça marche regarder dans le cours
    $connex->commit();
    $connex->exec($sql2);
    $connex->commit();
    echo "Stock modifié";
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
