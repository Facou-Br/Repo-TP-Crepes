<?php
// Connexion à la base de données
require_once '../../../../BaseDeDonnees/codesConnexion.php';
$connexionPDO = BaseDeDonnees::connecterBDD('admin');

// Mise à jour du stock du fournisseur
if (isset($_POST['ingredientsObj'])) {
    $ingredientsObj = json_decode($_POST['ingredientsObj'], true);
    foreach ($ingredientsObj as $key => $ingredient) {
        $commandeSQL = "UPDATE INGREDIENT SET StockReel = StockReel + " . $ingredient . " WHERE IdIngred = " . $key;
        echo $commandeSQL;
        $connexionPDO->query($commandeSQL);
    }
}
$connexionPDO = null;
