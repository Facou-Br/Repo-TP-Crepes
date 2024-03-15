<?php
$host = "localhost";
$user = "root";
$pwd = "root";
$bdd = "crespesco_test";
$port = "8889";

try {
    $connex = new PDO('mysql:host=' . $host . ';charset=utf8;dbname=' . $bdd . ';port=' . $port, $user, $pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    $response = array('success' => false, 'message' => 'Erreur de connexion à la base de données.');
    echo json_encode($response);
    die();
}

$jsonData = file_get_contents('php://input');

if ($jsonData) {
    $data = json_decode($jsonData, true);

    $idCommande = $data['id'];
    $nouveauStatut = $data['statut'];

    try {
        $stmt = $connex->prepare("UPDATE COMMANDE SET EtatCde = :nouveauStatut WHERE NumCom = :idCommande");
        $stmt->bindValue(':nouveauStatut', $nouveauStatut, PDO::PARAM_STR);
        $stmt->bindValue(':idCommande', $idCommande, PDO::PARAM_INT);
        $stmt->execute();

        $response = array('success' => true, 'message' => 'Commande mise à jour dans la base de données avec succès.');
        echo json_encode($response);

    } catch (PDOException $e) {
        $response = array('success' => false, 'message' => 'Erreur lors de la mise à jour de la commande dans la base de données.');
        echo json_encode($response);
    }
} else {
    $response = array('success' => false, 'message' => 'Aucune donnée reçue.');
    echo json_encode($response);
}

$connex = null;
?>
