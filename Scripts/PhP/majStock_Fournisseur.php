<?php
require_once '..\..\BaseDeDonnees\codesConnexion.php';

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

if (isset($_POST)) {
    var_dump($_POST);

    $fournisseur = $_POST['fournisseurs'];
    foreach ($_POST as $key => $value) {
        if ($key != 'fournisseurs') {
            $commandeSQL = "UPDATE INGREDIENT SET StockReel";
        }
    }
}
