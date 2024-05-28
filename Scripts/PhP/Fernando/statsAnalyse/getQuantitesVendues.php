<?php
// Connexion à la base de données
require_once '..\..\..\..\BaseDeDonnees\codesConnexion.php';
$connexionPDO = BaseDeDonnees::connecterBDD('admin');

$tableauProduit = array();
try {
    $commandeSQL = "SELECT IdProd, COUNT(*) FROM `detail` GROUP BY IdProd ORDER BY count(*) DESC";
    $listeProduits = $connexionPDO->query($commandeSQL);
    $listeProduits = $listeProduits->fetchAll(PDO::FETCH_ASSOC);

    var_dump($commandeSQL);
    var_dump($listeProduits);

    foreach ($listeProduits as $produits) {
            $tableauProduit[$produits["IdProd"]] = $produits["COUNT(*)"];
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}

$data = json_encode($tableauProduit);
echo $data;
