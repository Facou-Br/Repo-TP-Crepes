<?php
// Connexion à la base de données
require_once '..\..\..\..\BaseDeDonnees\codesConnexion.php';
$connexionPDO = BaseDeDonnees::connecterBDD('admin');

$tableauFournisseurs = array();
try {
    $commandeSQL = "SELECT NomFourn FROM fourn_ingr";
    $fournisseurs = $connexionPDO->query($commandeSQL);
    $fournisseurs = $fournisseurs->fetchAll(PDO::FETCH_ASSOC);

    foreach ($fournisseurs as $fournisseur) {
        foreach ($fournisseur as $nomFournisseur) {
            array_push($tableauFournisseurs, $nomFournisseur);
        }
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}

$data = json_encode($tableauFournisseurs);
echo $data;
