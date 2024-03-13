<?php
$host = "localhost";
$user = "root";
$pwd = "";
$bdd = "physique";


//Connexion à la base de données
try {
    $connexionBDB = new PDO('mysql:host='.$host.';dbname='.$bdd.';charset=utf8', $user, $pwd);
} catch (Exception $e) {
    echo "Erreur de connexion à la base de données <BR>";
    die('Erreur : ' . $e->getMessage());
}
