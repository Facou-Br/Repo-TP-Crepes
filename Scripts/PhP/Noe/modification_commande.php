<?php
    require_once '../../../BaseDeDonnees/codesConnexion.php';
    $connex = BaseDeDonnees::connecterBDD('admin');


    if (isset($_POST['id']) && isset($_POST['statut'])) {
        $idCommande = $_POST['id'];
        $nouveauStatut = $_POST['statutLivraison'];

        try {
            //Prépare une requête sql pour la mmise à jour de la commande
            $rq = $connex->prepare("UPDATE COMMANDE SET EtatCde = :nouveauStatut WHERE NumCom = :idCommande");
            $rq->bindValue(':nouveauStatut', $nouveauStatut, PDO::PARAM_STR);
            $rq->bindValue(':idCommande', $idCommande, PDO::PARAM_INT);
            $rq->execute();


        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    $connex = null;
?>
