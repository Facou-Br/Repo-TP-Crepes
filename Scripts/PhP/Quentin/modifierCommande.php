<?php
    // Connexion à la BdD
    require_once '../../../BaseDeDonnees/codesConnexion.php';
    $connex = BaseDeDonnees::connecterBDD('admin');

    if (isset($_POST['id']) && isset($_POST['statut'])) {
        $idCommande = $_POST['id'];
        $nouveauStatut = $_POST['statut'];

        try {
            // Requête SQL pour mettre à jour le statut de la commande
            $rq = $connex->prepare("UPDATE COMMANDE SET EtatCde = :nouveauStatut WHERE NumCom = :idCommande");
            $rq->bindValue(':nouveauStatut', $nouveauStatut, PDO::PARAM_STR);
            $rq->bindValue(':idCommande', $idCommande, PDO::PARAM_INT);
            $rq->execute();

            // On met en place la demande de Livraison + On archive les Détails
            if ($nouveauStatut == "Prête") {
                $rq = $connex->prepare("UPDATE COMMANDE SET EtatLivraison = 'fin_preparation' WHERE NumCom = :idCommande");
                $rq->bindValue(':idCommande', $idCommande, PDO::PARAM_INT);
                $rq->execute();

                $rq = $connex->prepare("UPDATE detail d
                                                SET d.DateArchiv = NOW()
                                                WHERE d.Num_OF IN (SELECT co.Num_OF FROM com_det co WHERE co.NumCom = :idCommande);");
                $rq->bindValue(':idCommande', $idCommande, PDO::PARAM_INT);
                $rq->execute();
            }

        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    $connex = null;
?>
