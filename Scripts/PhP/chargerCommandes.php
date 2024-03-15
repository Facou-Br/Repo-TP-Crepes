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
        $rq = "SELECT cm.NumCom, cm.HeureDispo, cm.EtatCde, d.NomProd, p.IngBase1, p.IngBase2, p.IngBase3, p.IngBase4, p.IngBase5, p.IngOpt1, p.IngOpt2, p.IngOpt3, p.IngOpt4, p.IngOpt5 , p.IngOpt6 
                    FROM COMMANDE cm
                    INNER JOIN COM_DET co ON cm.NumCom = co.NumCom
                    INNER JOIN DETAIL d ON co.Num_OF = d.Num_OF
                    INNER JOIN PRODUIT p ON d.IdProd = p.IdProd;";

        $result = $connex->query($rq);

        $commandes_array = array();

        while ($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
            $commande = array(
                "id" => $ligne["NumCom"],
                "nom" => $ligne["NomProd"],
                "temps" => substr($ligne["HeureDispo"], 0, 5),
                "statut" => $ligne["EtatCde"],
                "ingredients" => array(
                    "base" => array(
                        $ligne["IngBase1"],
                        $ligne["IngBase2"],
                        $ligne["IngBase3"],
                        $ligne["IngBase4"],
                        $ligne["IngBase5"]
                    ),
                    "optionnels" => array(
                        $ligne["IngOpt1"],
                        $ligne["IngOpt2"],
                        $ligne["IngOpt3"],
                        $ligne["IngOpt4"],
                        $ligne["IngOpt5"],
                        $ligne["IngOpt6"]
                    )
                )
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
