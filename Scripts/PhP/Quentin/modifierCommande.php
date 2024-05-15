<?php
    require_once '../../../BaseDeDonnees/codesConnexion.php';

    try {
        $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br/>';
        echo 'N° : ' . $e->getCode();
        die();
    }

    $jsonData = file_get_contents('php://input');

    if ($jsonData) {
        $data = json_decode($jsonData, true);

        $idCommande = $data['id'];
        $nouveauStatut = $data['statut'];

        try {
            $rq = $connex->prepare("UPDATE COMMANDE SET EtatCde = :nouveauStatut WHERE NumCom = :idCommande");
            $rq->bindValue(':nouveauStatut', $nouveauStatut, PDO::PARAM_STR);
            $rq->bindValue(':idCommande', $idCommande, PDO::PARAM_INT);
            $rq->execute();

            $result = array('success' => true, 'message' => 'Commande mise à jour dans la base de données avec succès.');
            echo json_encode($result);

        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    $connex = null;
?>
