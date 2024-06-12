<?php

require_once '../../../BaseDeDonnees/codesConnexion.php';

$connex = BaseDeDonnees::connecterBDD('admin');

$NomProd = $_POST["NomProd"];
$Taille = $_POST["Taille"];
$Active = $_POST["Active"];
$NbIngBase = $_POST["NbIngBase"];
$NbIngOpt = $_POST["NbIngOpt"];
$Image = $_POST["Image"];
$IngBase1 = $_POST["IngBase1"];
$IngBase2 = $_POST["IngBase2"];
$IngBase3 = $_POST["IngBase3"];
$IngBase4 = $_POST["IngBase4"];
$IngBase5 = $_POST["IngBase5"];
$IngOpt1 = $_POST["IngOpt1"];
$IngOpt2 = $_POST["IngOpt2"];
$IngOpt3 = $_POST["IngOpt3"];
$IngOpt4 = $_POST["IngOpt4"];
$IngOpt5 = $_POST["IngOpt5"];
$IngOpt6 = $_POST["IngOpt6"];
$NbOptMax = $_POST["NbOptMax"];
$DateArchiv = $_POST["DateArchiv"];

try {
    // Disable autocommit to begin a transaction
    $connex->beginTransaction();

    // Corrected SQL query
    $sql = "UPDATE produit SET 
        NomProd = :NomProd, 
        Taille = :Taille,
        Active = :Active, 
        NbIngBase = :NbIngBase, 
        NbIngOpt = :NbIngOpt,
        Image = :Image, 
        IngBase1 = :IngBase1, 
        IngBase2 = :IngBase2,
        IngBase3 = :IngBase3, 
        IngBase4 = :IngBase4, 
        IngBase5 = :IngBase5,
        IngOpt1 = :IngOpt1, 
        IngOpt2 = :IngOpt2, 
        IngOpt3 = :IngOpt3, 
        IngOpt4 = :IngOpt4,
        IngOpt5 = :IngOpt5, 
        IngOpt6 = :IngOpt6, 
        NbOptMax = :NbOptMax, 
        DateArchiv = :DateArchiv
        WHERE NomProd = :NomProdOld";

    $stmt = $connex->prepare($sql);
    $stmt->execute([
        ':NomProd' => $NomProd,
        ':Taille' => $Taille,
        ':Active' => $Active,
        ':NbIngBase' => $NbIngBase,
        ':NbIngOpt' => $NbIngOpt,
        ':Image' => $Image,
        ':IngBase1' => $IngBase1,
        ':IngBase2' => $IngBase2,
        ':IngBase3' => $IngBase3,
        ':IngBase4' => $IngBase4,
        ':IngBase5' => $IngBase5,
        ':IngOpt1' => $IngOpt1,
        ':IngOpt2' => $IngOpt2,
        ':IngOpt3' => $IngOpt3,
        ':IngOpt4' => $IngOpt4,
        ':IngOpt5' => $IngOpt5,
        ':IngOpt6' => $IngOpt6,
        ':NbOptMax' => $NbOptMax,
        ':DateArchiv' => $DateArchiv,
        ':NomProdOld' => $NomProd // Assuming you are updating the same product name
    ]);

    // Commit the transaction
    $connex->commit();
    echo "Recette modifiée";
} catch (PDOException $e) {
    // Rollback the transaction if something went wrong
    $connex->rollBack();
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
