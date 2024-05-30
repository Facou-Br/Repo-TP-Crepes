<?php
$host = "localhost";
$port = "3306";
$user = "crepesco_test";
$pwd = "Cnam2024_crepes";

try {
    $connex = new PDO('mysql:host=' . $host . ';charset=utf8;dbname=' . $bdd . ';port=' . $port, $user, $pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}

/*
* Ne plus utiliser ce script, il est obsolète.
* Une classe pour une connexion à la base de données est disponible pour une utilisation plus simple et plus sécurisée aussi qu'homogène.
* Utiliser la classe dans /BaseDeDonnees/codesConnexion.php
* @Facou-Br
*/
