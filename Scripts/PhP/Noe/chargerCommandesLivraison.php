<?php
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $bdd = "repo-tp-crepes";
    $port = "8889";

    try {
        $connex = new PDO('mysql:host=' . $host . ';charset=utf8;dbname=' . $bdd . ';port=' . $port, $user, $pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br/>';
        echo 'N° : ' . $e->getCode();
        die();
    }

    try {
        $rq = "SELECT NumCom, NomClient, AdrClient, CP_Client, VilClient, HeureDispo, EtatLivraison 
                    FROM commande
                    ";

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
