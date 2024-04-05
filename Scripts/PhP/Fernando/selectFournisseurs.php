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

$tableauFournisseurs = array();
try {
    $commandeSQL = "SELECT NomFourn FROM FOURNISSEUR";
    $fournisseurs = $connexionPDO->query($commandeSQL);
    $fournisseurs = $fournisseurs->fetchAll(PDO::FETCH_ASSOC);

    foreach ($fournisseurs as $fournisseur) {
        foreach ($fournisseur as $nomFournisseur) {
            array_push($tableauFournisseurs, $nomFournisseur);
        }
    }
}catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}

$data = json_encode($tableauFournisseurs);
$fileadress = "../../../Scripts/JavaScript/Fernando/fournisseurs.json";
file_put_contents($fileadress, $data);
