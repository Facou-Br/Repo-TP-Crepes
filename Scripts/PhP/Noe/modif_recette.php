<?php

require_once '../../../../BaseDeDonnees/codesConnexion.php';
try {
    $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE . ';port=' . PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
;
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
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $sql = "UPDATE recette SET NomProd = '".$NomProd."', Taille = '".$Taille."',
    Active = '".$Active."', NbIngBase = '".$NbIngBase."' NbIngOpt = '".$NbIngOpt."',
    Image = '".$Image."', IngBase1 = '".$IngBase1."', IngBase2 = '".$IngBase2."',
    IngBase3 = '".$IngBase3."', IngBase4 = '".$IngBase4."', IngBase5 = '".$IngBase5."',
    IngOpt1 = '".$IngOpt1."', IngOpt2 = '".$IngOpt2."', IngOpt3 = '".$IngOpt3."', IngOpt4 = '".$IngOpt4."',
    IngOpt5 = '".$IngOpt5."', IngOpt6 = '".$IngOpt6."', NbOptMax = '".$NbOptMax."', DateArchiv = '".$DateArchiv."',
    WHERE recette.NomProd = '".$nomProd."';";
    var_dump($sql);
    echo($sql);
    $connex->exec($sql);
    $connex->commit();
    echo "Recette modifié";
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}

?>