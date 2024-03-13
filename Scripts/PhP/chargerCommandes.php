<?php
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $bdd = "crespesco_test";
    $port = "8889";

    try {
        $connex = new PDO('mysql:host=' . $host . ';charset=utf8;dbname=' . $bdd . ';port=' . $port, $user, $pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br/>';
        echo 'N° : ' . $e->getCode();
        die();
    }

    try {
        $rq = "SELECT cm.NumCom, cm.HeureDispo, cm.EtatCde, d.NomProd, d.IngBase1, d.IngBase2, d.IngBase3, d.IngBase4, d.IngOpt1, d.IngOpt2, d.IngOpt3, d.IngOpt4 FROM COMMANDE cm
                INNER JOIN COM_DET co ON cm.NumCom = co.NumCom
                INNER JOIN DETAIL d ON co.Num_OF = d.Num_OF;";

        $result = $connex->query($rq);

        $commandes_array = array();

        while ($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
            $commande = array(
                "id" => $ligne["NumCom"],
                "nom" => $ligne["NomProd"],
                "temps" => substr($ligne["HeureDispo"], 0, 5),
                "statut" => $ligne["EtatCde"],
                "ingBase1" => $ligne["IngBase1"],
                "ingBase2" => $ligne["IngBase2"],
                "ingBase3" => $ligne["IngBase3"],
                "ingBase4" => $ligne["IngBase4"],
                "ingOpt1" => $ligne["IngOpt1"],
                "ingOpt2" => $ligne["IngOpt2"],
                "ingOpt3" => $ligne["IngOpt3"],
                "ingOpt4" => $ligne["IngOpt4"]
            );
            $commandes_array[] = $commande;
        }

        $connex = null;
        $commandes_array = array("commandes" => $commandes_array);
        $json_data = json_encode($commandes_array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        $filename = '.././JavaScript/GestionsCommandes/commandes.json';

        if (file_put_contents($filename, $json_data)) {
            echo "Le fichier JSON a été créé avec succès.";
        } else {
            echo "Erreur lors de la création du fichier JSON.";
        }

    } catch (PDOException $e) {
        print $e->getMessage();
    }
?>
