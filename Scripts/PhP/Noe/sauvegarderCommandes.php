<?php
$jsonData = file_get_contents('php://input');

if ($jsonData) {
    $data = json_decode($jsonData, true);
    $file = '../.././JavaScript/GestionLivraison/commandes.json';

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    $response = array('success' => true, 'message' => 'Commandes sauvegardées avec succès.');
    echo json_encode($response);
} else {
    $response = array('success' => false, 'message' => 'Aucune donnée reçue.');
    echo json_encode($response);
}
