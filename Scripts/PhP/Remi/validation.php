<?php

require_once '../../../BaseDeDonnees/codesConnexion.php';
try {
    $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE.';port='.PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
try{
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);

    $requete1 = "INSERT INTO `detail` (`Num_OF`, `NomProd`, `IngBase1`, `IngBase2`, `IngBase3`, `IngBase4`,`IngOpt1`, `IngOpt2`, `IngOpt3`, `IngOpt4`, `DateArchiv`, `IdProd`) VALUES (17, 'loufkutluyf', 'A', 'B', 'C', 'D', NULL, NULL, NULL, NULL, '2021-11-01', '1');";
    $requete2 = "INSERT INTO `com_det` (`Num_OF`, `Quant`, `NumCom`) VALUES (197, '19', 199);";
    $requete3 = "INSERT INTO `commande` (`NumCom`, `NomClient`, `TelClient`, `AdrClient`, `CP_Client`, `VilClient`, `Date`, `HeureDispo`, `TypeEmbal`, `A_Livrer`, `EtatCde`, `EtatLivraison`, `CoutLiv`, `TotalTTC`, `DateArchiv`, `IdLivreur`) VALUES (NULL, 'loufkutluyf', '0000000000', '1 rue de la rue', '00000', 'Ville', '2021-11-01', '12:00:00', 'Emballage', '1', 'En cours', 'En cours', '0', '0', '2021-11-01', '1');";

    $connex->exec($requete1);
    $connex->exec($requete2);
    $connex->exec($requete3);
}
catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}

?>