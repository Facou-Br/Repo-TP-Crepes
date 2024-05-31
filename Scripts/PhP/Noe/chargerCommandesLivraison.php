<?php
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $bdd = "crepesco_test";
    $port = "3306";

    try {
        $connex = new PDO('mysql:host=' . $host . ';charset=utf8;dbname=' . $bdd . ';port=' . $port, $user, $pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br/>';
        echo 'N° : ' . $e->getCode();
        die();
    }

    try {
        $rq = "SELECT cm.HeureDispo, cm.EtatCde, cm.EtatLivraison, d.NomProd, cm.NomClient, cm.TelClient, cm.AdrClient, cm.CP_Client, cm.VilClient 
        FROM COMMANDE cm
        INNER JOIN COM_DET co ON cm.NumCom = co.NumCom
        INNER JOIN DETAIL d ON co.Num_OF = d.Num_OF
        INNER JOIN PRODUIT p ON d.IdProd = p.IdProd
        WHERE cm.A_Livrer = 1 AND cm.EtatCde = 'Acceptée';";

$result = $connex->query($rq);

$commandes_array = array();

        while ($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
            $commande = array(
                "nomClient" => $ligne["NomClient"],
                "nom" => $ligne["NomProd"],
                "temps" => substr($ligne["HeureDispo"], 0, 5),
                "statutCde" => $ligne["EtatCde"],
                "statutLivraison" => $ligne["EtatLivraison"],
                "tel" => $ligne["TelClient"],
                "adrClient" => $ligne["AdrClient"],
                "cpClient" => substr($ligne["CP_Client"], 0, 5),
                "vilClient" => $ligne["VilClient"],
            );
            $commandes_array[] = $commande;
        }

        $connex = null;
        $commandes_array = array("commandes" => $commandes_array);
        $json_data = json_encode($commandes_array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        $filename = '../.././JavaScript/GestionLivraison/commandes.json';
        if (file_put_contents($filename, $json_data)) {
            echo "Le fichier JSON a été créé avec succès.";
        } else {
            echo "Erreur lors de la création du fichier JSON.";
        }
    } catch (PDOException $e) {
        print $e->getMessage();
    }
?>
