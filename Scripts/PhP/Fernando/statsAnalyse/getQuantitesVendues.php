<?php
// Connexion à la base de données
require_once '..\..\..\..\BaseDeDonnees\codesConnexion.php';
$connexionPDO = BaseDeDonnees::connecterBDD('admin');

$tableauProduit = array();
try {
    $commandeSQL = "SELECT IdProd, NomProd FROM produit";
    $listeProduits = $connexionPDO->query($commandeSQL);
    $listeProduits = $listeProduits->fetchAll(PDO::FETCH_ASSOC);

    foreach ($listeProduits as $produits) {
            $tableauProduit[$produits["IdProd"]] = $produits["NomProd"];
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}

$data = json_encode($tableauProduit);
echo $data;
