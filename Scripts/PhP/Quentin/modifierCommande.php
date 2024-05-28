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

    if (isset($_POST['id']) && isset($_POST['statut'])) {
        $idCommande = $_POST['id'];
        $nouveauStatut = $_POST['statut'];

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
            $result = array('success' => false, 'message' => 'Erreur lors de la mise à jour de la commande.');
            echo json_encode($result);
        }
    }

    $connex = null;
?>
