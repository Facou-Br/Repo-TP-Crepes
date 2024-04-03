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
if (isset($_POST["ingredientsObj"])) {
    $ingredients = json_decode($_POST["ingredientsObj"], true);

    foreach ($ingredients as $key => $value) {
        try {
            $sqlCommande = "UPDATE ingredient SET StockReel = $value  + StockReel WHERE IdIngred = $key";
            $stmt = $connexionPDO->prepare($sqlCommande);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
$connexionPDO = null;
