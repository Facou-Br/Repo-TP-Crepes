<?php
require_once '..\..\..\..\BaseDeDonnees\codesConnexion.php';
$connex = BaseDeDonnees::connecterBDD('admin');

try {
    $nomIngred = $_POST["nomIngred"];
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $sql = "UPDATE `ingredient` SET `DateArchiv`=CAST(NOW() AS DATE) WHERE `nomIngred` = '" . $nomIngred . "';";

    $connex->exec($sql); #essayer le query pour voir si ça marche regarder dans le cours
    $connex->commit();
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
