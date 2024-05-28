<?php
// Lire les données de session à partir du fichier JSON
$sessionDataJson = file_get_contents('sessionData.json');
$sessionData = json_decode($sessionDataJson, true);

// Afficher les données de session
foreach ($sessionData as $id => $value) {
    echo "<p>ID: " . $id . ", Value: " . $value . "</p>";
}
?>


<button type="button" onclick="location.href='validation.php'">Valider</button>
