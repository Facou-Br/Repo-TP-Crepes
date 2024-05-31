<?php
// Connexion à la base de données
require_once '..\..\..\..\BaseDeDonnees\codesConnexion.php';
$connexionPDO = BaseDeDonnees::connecterBDD('admin');

$tableauNomProduits= array();
try {
    $commandeSQL = "SELECT NomProd 'Nom Produit', COUNT(IdProd) 'Numero Ventes' FROM `detail` GROUP BY IdProd ORDER BY COUNT(IdProd) DESC LIMIT 5;";
    $produits = $connexionPDO->query($commandeSQL);
    $produits = $produits->fetchAll(PDO::FETCH_ASSOC);

    foreach ($produits as $produit) {
        foreach ($produit as $nomProduit) {
            array_push($tableauNomProduits, $nomProduit);
        }
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}

$data = json_encode($tableauNomProduits);
echo $data;
