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
        $rq = "SELECT cm.NumCom, 
                    GROUP_CONCAT(i.NomIngred, ':', pi.Quant, ':', i.Unite SEPARATOR ';') AS Ingredients
                    FROM COMMANDE cm
                    INNER JOIN COM_DET co ON cm.NumCom = co.NumCom                    
                    INNER JOIN DETAIL d ON co.Num_OF = d.Num_OF
                    INNER JOIN PROD_INGR pi ON d.IdProd = pi.IdProd
                    INNER JOIN INGREDIENT i ON pi.IdIngred = i.IdIngred
                    WHERE cm.EtatCde != 'Prête'
                    GROUP BY cm.NumCom;";
        $result = $connex->query($rq);

        $commandes_array = array();

        while ($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
            $ingredients_array = explode(';', $ligne["Ingredients"]);
            $ingredients = array();
            foreach ($ingredients_array as $ing) {
                list($ingredient, $quantite, $unite) = explode(':', $ing);
                $ingredients[$ingredient] = array((int)$quantite, $unite);
            }

            $commande = array(
                "id" => $ligne["NumCom"],
                "ingredients" => $ingredients
            );

            $commandes_array[] = $commande;
        }

        $connex = null;
        $commandes_array = array("commandes" => $commandes_array);
        $json_data = json_encode($commandes_array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        $filename = '../.././JavaScript/GestionsCommandes/ingredients.json';

        if (file_put_contents($filename, $json_data)) {
            echo "Le fichier JSON a été créé avec succès.";
        } else {
            echo "Erreur lors de la création du fichier JSON.";
        }
    } catch (PDOException $e) {
        print $e->getMessage();
    }
?>
