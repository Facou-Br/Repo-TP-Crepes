<?php
    $jsonData = file_get_contents('php://input');

    if ($jsonData) {
        $data = json_decode($jsonData, true);
        $file = '../.././JavaScript/Quentin/commandes.json';

        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
        $result = array('success' => true, 'message' => 'Commandes sauvegardées avec succès.');
        echo json_encode($result);
    } else {
        $result = array('success' => false, 'message' => 'Aucune donnée reçue.');
        echo json_encode($result);
    }
?>