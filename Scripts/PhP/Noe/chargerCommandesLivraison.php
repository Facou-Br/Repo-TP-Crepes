<?php
    require_once '../../../BaseDeDonnees/codesConnexion.php';
    $connex = BaseDeDonnees::connecterBDD('adminQuentin')

    try {
        $rq = "SELECT cm.NumCom, cm.HeureDispo, cm.EtatCde, cm.EtatLivraison, d.NomProd, cm.NomClient, cm.TelClient, cm.AdrClient, cm.CP_Client, cm.VilClient, l.nom, l.prenom
        FROM COMMANDE cm
        INNER JOIN COM_DET co ON cm.NumCom = co.NumCom
        INNER JOIN DETAIL d ON co.Num_OF = d.Num_OF
        INNER JOIN PRODUIT p ON d.IdProd = p.IdProd
        INNER JOIN LIVREUR l ON l.IdLivreur = cm.IdLivreur
        WHERE cm.A_Livrer = 1 AND cm.EtatCde = 'Acceptée';";

        $result = $connex->query($rq);

        $commandes_array = array();

        while ($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
            $commande = array(
                "id" => $ligne["NumCom"],
                "nomClient" => $ligne["NomClient"],
                "nom" => $ligne["NomProd"],
                "temps" => substr($ligne["HeureDispo"], 0, 5),
                "statutCde" => $ligne["EtatCde"],
                "statutLivraison" => $ligne["EtatLivraison"],
                "tel" => $ligne["TelClient"],
                "adrClient" => $ligne["AdrClient"],
                "cpClient" => $ligne["CP_Client"],
                "vilClient" => $ligne["VilClient"],
                "nomLivreur" => $ligne["nom"],
                "prenomLivreur" => $ligne["prenom"],
            );
            $commandes_array[] = $commande;
        }

        $connex = null;

        $commandes_array = array("commandes" => $commandes_array);
        $jsonData = json_encode($commandes_array);
        echo $jsonData;

    } catch (PDOException $e) {
        print $e->getMessage();
    }
?>
