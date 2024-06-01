<?php
session_start();

// Afficher le contenu de la session
var_dump($_SESSION);

// Afficher les données de session
foreach ($_SESSION as $id => $value) {
    echo "<p>ID: " . $id . ", Value: " . $value . "</p>";
}
?>

<button type="button" onclick="location.href='validation.php'">Valider</button>