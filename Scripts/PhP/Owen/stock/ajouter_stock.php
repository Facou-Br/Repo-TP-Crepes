<?php
require_once '..\..\..\..\BaseDeDonnees\codesConnexion.php';
$connex = BaseDeDonnees::connecterBDD('admin');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomIngred = $_POST["nomIngred"];
    $stockReel = $_POST["stockReel"];
    $prixUHTMoyen = $_POST["prixUHTMoyen"];
    $nomFourn = $_POST["fournisseur"];
    $seuilStock = 1;
    $stockMin = 0;

    try {
        $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
        $sql = "INSERT INTO `ingredient` (NomIngred, SeuilStock, StockMin, StockReel, PrixUHT_Moyen) VALUES ('$nomIngred', $seuilStock, $stockMin, $stockReel, $prixUHTMoyen)";
        $test1 = $connex->query($sql);
        var_dump($test1);

        $sqlId = "SELECT IdIngred FROM `ingredient` WHERE NomIngred='$nomIngred';";
        var_dump($sqlId);
        $result = $connex->query($sqlId);
        $idIngred = $result->fetch(PDO::FETCH_ASSOC);
        var_dump($idIngred[1]);

        $sql2 = "INSERT INTO `fourn_ingr` (NomFourn, IdIngred) VALUES ('$nomFourn', $idIngred);";
        $test2 = $connex->query($sql2);
        var_dump($test2);
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die();
    }
    if ($test1 === true && $test2 === true) {
        echo "";
    } else {
        echo "Erreur";
    }
}
