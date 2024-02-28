<?php
    $host = "localhost";
    $port = "3306";
    $user = "crepesco_test";
    $pwd = "Cnam2024_crepes";

    try {
            $connex = new PDO('mysql:host=' . $host . ';charset=utf8;dbname=' . $bdd.';port='.$port, $user, $pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br />';
            echo 'N° : ' . $e->getCode();
            die();
        }
?>