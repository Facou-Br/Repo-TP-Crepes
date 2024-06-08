<?php
    require_once '../../../BaseDeDonnees/codesConnexion.php';
    $connex = BaseDeDonnees::connecterBDD('admin');

    try {
        //Prépare une requête sql pour le chargement de la commande
        $rq = "SELECT cm.NumCom, cm.HeureDispo, cm.EtatCde, cm.EtatLivraison, d.NomProd, cm.NomClient, cm.TelClient, cm.AdrClient, cm.CP_Client, cm.VilClient, l.nom, l.prenom, cm.IdLivreur
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
                "nom" => $ligne["NomClient"],
                "tel" => $ligne["TelClient"],
                "adresse" => $ligne["AdrClient"],
                "cp" => $ligne["CP_Client"],
                "ville" => $ligne["VilClient"],
                "temps" => substr($ligne["HeureDispo"], 0, 5),
                "statut" => $ligne["EtatLivraison"],
                );
            $commandes_array[] = $commande;
        }
        var_dump($commandes_array);

        $connex = null;
        $commandes_array = array("commandes" => $commandes_array);
        $json_data = json_encode($commandes_array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        $filename = '.././JavaScript/Gestions/commandes.json';

        if (file_put_contents($filename, $json_data)) {
            echo "Le fichier JSON a été créé avec succès.";
        } else {
            echo "Erreur lors de la création du fichier JSON.";
        }
    } catch (PDOException $e) {
        print $e->getMessage();
    }
?>
