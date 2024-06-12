<?php
// Connexion à la base de données
require_once '../../../../BaseDeDonnees/codesConnexion.php';
$connexionPDO = BaseDeDonnees::connecterBDD('admin');

$tableauNomProduits= array();
try {
    $commandeSQL = "SELECT NomProd, IdProd FROM `produit` GROUP BY NomProd ORDER BY NomProd ASC;";
    $produits = $connexionPDO->query($commandeSQL);
    $produits = $produits->fetchAll(PDO::FETCH_ASSOC);

    foreach ($produits as $produit) {
        $tableauNomProduits[$produit['IdProd']] = $produit['NomProd'];
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}

$data = json_encode($tableauNomProduits);
echo $data;
