<?php

require_once '../../../../BaseDeDonnees/codesConnexion.php';
$connex = BaseDeDonnees::connecterBDD('admin');

$nomIngred = $_POST["nomIngred"];
$stockReel = $_POST["StockReel"];
$prixUHTMoyen = $_POST["prixUHTMoyen"];


try {
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $sql = "UPDATE `ingredient` SET `StockReel` = '".$stockReel."', `PrixUHT_Moyen` = '".$prixUHTMoyen."' WHERE `ingredient`.`NomIngred ` = '".$nomIngred."';";
    $connex->exec($sql); #essayer le query pour voir si ça marche regarder dans le cours
    $connex->commit();
    echo "Stock modifié";
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
