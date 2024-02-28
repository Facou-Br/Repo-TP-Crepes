<?php
$tabCde = array();
require_once '../../BaseDeDonnees/connexionBdB.php';
try {
    echo 'mysql:host=' . $host . ';dbname=' . $bdd, $user, $pwd . '<br />';
    $connex = new PDO(
        'mysql:host=' . $host . ';dbname='
        . $bdd,
        $user,
        $pwd,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode() . '<br />';
    ;
    die();
}

try {
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $rq = "select * "
        . "from Responsable ";
    $result = $connex->query($rq);
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}

foreach ($result as $row) {
    $tabCde[] = $row;
}
echo 'test';
var_dump($tabCde);