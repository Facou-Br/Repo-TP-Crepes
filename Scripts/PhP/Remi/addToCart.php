<?php
session_start();

if (isset($_POST['id']) && isset($_POST['value'])) {
    $_SESSION[$_POST['id']] = $_POST['value'];
}
$sessionDataJson = json_encode($_SESSION);

// Stocker les données JSON dans un fichier
file_put_contents('sessionData.json', $sessionDataJson);

header('Location: panier.php');
exit;
?>