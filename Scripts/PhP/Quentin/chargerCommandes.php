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
        $rq = "SELECT cm.NumCom, cm.HeureDispo, cm.EtatCde, d.NomProd, d.IngBase1, d.IngBase2, d.IngBase3, d.IngBase4, 
                        d.IngOpt1, d.IngOpt2, d.IngOpt3, d.IngOpt4, co.Quant
                    FROM COMMANDE cm
                    INNER JOIN COM_DET co ON cm.NumCom = co.NumCom
                    INNER JOIN DETAIL d ON co.Num_OF = d.Num_OF;";

        $result = $connex->query($rq);

        $commandes_array = array();

        while ($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
            $ingredients_base = array_filter([$ligne["IngBase1"], $ligne["IngBase2"], $ligne["IngBase3"], $ligne["IngBase4"]]);
            $ingredients_opt = array_filter([$ligne["IngOpt1"], $ligne["IngOpt2"], $ligne["IngOpt3"], $ligne["IngOpt4"]]);

            $commande = array(
                "id" => $ligne["NumCom"],
                "nombre" => $ligne["Quant"],
                "nom" => $ligne["NomProd"],
                "temps" => substr($ligne["HeureDispo"], 0, 5),
                "statut" => $ligne["EtatCde"],
                "ingredients" => array(
                    "base" => $ingredients_base,
                    "optionnels" => $ingredients_opt
                )
            );
            $commandes_array[] = $commande;
        }

        $connex = null;
        $commandes_array = array("commandes" => $commandes_array);
        $json_data = json_encode($commandes_array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        $filename = '../.././JavaScript/GestionsCommandes/commandes.json';

        if (file_put_contents($filename, $json_data)) {
            echo "Le fichier JSON a été créé avec succès.";
        } else {
            echo "Erreur lors de la création du fichier JSON.";
        }
    } catch (PDOException $e) {
        print $e->getMessage();
    }
?>
