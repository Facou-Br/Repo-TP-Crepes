<?php
    require_once '../../../BaseDeDonnees/codesConnexion.php';

    try {
        $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br/>';
        echo 'N° : ' . $e->getCode();
        die();
    }

    try {
        $rq = "SELECT cm.NumCom, co.Quant, cm.HeureDispo, cm.EtatCde, d.NomProd, d.IngBase1, d.IngBase2, d.IngBase3, d.IngBase4, d.IngOpt1, d.IngOpt2, d.IngOpt3, d.IngOpt4,
                GROUP_CONCAT(i.NomIngred, ':', pi.Quant, ':', i.Unite SEPARATOR ';') AS Ingredients
                FROM COMMANDE cm
                INNER JOIN COM_DET co ON cm.NumCom = co.NumCom
                INNER JOIN DETAIL d ON co.Num_OF = d.Num_OF
                INNER JOIN PROD_INGR pi ON d.IdProd = pi.IdProd
                INNER JOIN INGREDIENT i ON pi.IdIngred = i.IdIngred
                GROUP BY cm.NumCom, co.Quant, cm.HeureDispo, cm.EtatCde, d.NomProd, d.IngBase1, d.IngBase2, d.IngBase3, d.IngBase4, d.IngOpt1, d.IngOpt2, d.IngOpt3, d.IngOpt4;";
        $result = $connex->query($rq);

        $tabCommandes = array();

        while ($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
            $ingredientsBase = array_filter([$ligne["IngBase1"], $ligne["IngBase2"], $ligne["IngBase3"], $ligne["IngBase4"]]);
            $ingredientsOption = array_filter([$ligne["IngOpt1"], $ligne["IngOpt2"], $ligne["IngOpt3"], $ligne["IngOpt4"]]);
            $tabIngredient = explode(';', $ligne["Ingredients"]);
            $ingredients = array();

            foreach ($tabIngredient as $ing) {
                list($ingredient, $quantite, $unite) = explode(':', $ing);
                $ingredients[$ingredient] = array((int)$quantite, $unite);
            }

            $commande = array(
                "id" => $ligne["NumCom"],
                "nombre" => $ligne["Quant"],
                "nom" => $ligne["NomProd"],
                "temps" => substr($ligne["HeureDispo"], 0, 5),
                "statut" => $ligne["EtatCde"],
                "ingredients" =>
                 $ingredients
            );

            $tabCommandes[] = $commande;
        }

        $connex = null;
        $tabCommandes = array("commandes" => $tabCommandes);
        $jsonData = json_encode($tabCommandes, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        echo $jsonData;

    } catch (PDOException $e) {
        print $e->getMessage();
    }
?>
