<?php

require_once '../../../../BaseDeDonnees/codesConnexion.php';
try {
    $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE.';port='.PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
try{
    $nomFourn = $_POST["nomFourn"];
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $sql = "UPDATE `fournisseur` SET `DateArchiv`=CAST(NOW() AS DATE) WHERE `NomFourn` = '".$nomFourn."';";

    $connex->exec($sql); #essayer le query pour voir si ça marche regarder dans le cours
    $connex->commit();
    echo "Fournisseur archivé";
}
catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
