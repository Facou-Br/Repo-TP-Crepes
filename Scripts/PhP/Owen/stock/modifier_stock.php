<?php

require_once '../../../../BaseDeDonnees/codesConnexion.php';
try {
    $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE . ';port=' . PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
;
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
