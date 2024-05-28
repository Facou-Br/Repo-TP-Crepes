<?php
    require_once '../../../BaseDeDonnees/codesConnexion.php';

    try {
        // Connexion à la base de données
        $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br/>';
        echo 'N° : ' . $e->getCode();
        die();
    }

    // Lecture des données JSON reçues dans la requête POST
    $jsonData = file_get_contents('php://input');

    if ($jsonData) {
        $data = json_decode($jsonData, true);

        // On récupère les données envoyées avec AJAX
        $idCommande = $data['id'];
        $nouveauStatut = $data['statut'];

        try {
            // Requête SQL pour mettre à jour le statut de la commande
            $rq = $connex->prepare("UPDATE COMMANDE SET EtatCde = :nouveauStatut WHERE NumCom = :idCommande");
            $rq->bindValue(':nouveauStatut', $nouveauStatut, PDO::PARAM_STR);
            $rq->bindValue(':idCommande', $idCommande, PDO::PARAM_INT);
            $rq->execute();

            // Réponse JSON en cas de succès
            $result = array('success' => true, 'message' => 'Commande mise à jour dans la base de données avec succès.');
            echo json_encode($result);

        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    $connex = null;
?>
