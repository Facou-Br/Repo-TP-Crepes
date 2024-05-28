<?php
require_once '..\..\..\..\BaseDeDonnees\codesConnexion.php';
$connex = BaseDeDonnees::connecterBDD('admin');

try {
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $sql = "SELECT I.NomIngred, F.NomFourn, I.StockReel, FI.PrixUHT FROM INGREDIENT I JOIN fourn_ingr FI ON I.IdIngred=FI.IdIngred JOIN fournisseur F ON FI.NomFourn=F.NomFourn;";
    $ligne = $connex->query($sql);
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
$result = array();
foreach ($ligne as $row) {
    $result[] = $row;
}
$stocksJson = json_encode($result);
echo $stocksJson;
