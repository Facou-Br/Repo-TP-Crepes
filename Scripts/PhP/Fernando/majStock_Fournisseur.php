<?php
//Created by Fernando FERREIRA PIAIA
//Date : 2024-03-15

require_once '..\..\..\BaseDeDonnees\codesConnexion.php';

// Connexion à la base de données
try {
    $connexionPDO = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname='
        . DATABASE . ';port=' . PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}


// Mise à jour du stock du fournisseur
if (isset ($_POST)) {
    $fournisseur = $_POST['fournisseurs'];
    foreach ($_POST as $key => $value) {
        if ($key != 'fournisseurs') {
            $commandeSQL = "UPDATE INGREDIENT SET StockReel = " . $value . " WHERE IdIngred = " . $key;
            $connexionPDO->query($commandeSQL);
        }
    }
}
$connexionPDO = null;
header('Location: ../../../HTML-CSS/HTML/StatsEtMajStocks_Fernando/stats&analyse.html');
