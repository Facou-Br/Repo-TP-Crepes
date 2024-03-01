<?php
$host = "localhost";
$user = "crepesco";
$pwd = "4s2P7R2nmm";
$bdd = "crepesco_test";

//Connexion à la base de données
try {
    $connexionBDB = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $pass);
} catch (Exception $e) {
    echo "Erreur de connexion à la base de données <BR>";
    die('Erreur : ' . $e->getMessage());
}
?>