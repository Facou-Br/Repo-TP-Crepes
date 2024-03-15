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

if (isset ($_POST["fournisseurs"])) {
    $tableauIdIngredients = array();
    try {
        $commandeSQL = "SELECT IdIngred FROM fourn_ingr WHERE NomFourn = '" . $_POST["fournisseurs"] . "'";
        $ingredients = $connexionPDO->query($commandeSQL);
        $ingredients = $ingredients->fetchAll(PDO::FETCH_ASSOC);

        foreach ($ingredients as $ingredient => $idIngredient) {
            foreach ($idIngredient as $id) {
                array_push($tableauIdIngredients, $id);
            }
        }
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die();
    }
}
json_encode($tableauIdIngredients);
