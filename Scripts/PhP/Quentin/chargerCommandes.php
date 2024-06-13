<?php
    // Connexion à la BdD
    require_once '../../../BaseDeDonnees/codesConnexion.php';
    $connex = BaseDeDonnees::connecterBDD('admin');

    try {
        // Requête SQL pour charger les commandes avec les détails
        $rq = "SELECT cm.NumCom, co.Num_OF, co.Quant, cm.HeureDispo, cm.EtatCde, d.NomProd, d.IngBase1, d.IngBase2, d.IngBase3, d.IngBase4, d.IngOpt1, d.IngOpt2, d.IngOpt3, d.IngOpt4, 
                GROUP_CONCAT(i.NomIngred, ':', pi.Quant, ':', i.Unite SEPARATOR ';') AS Ingredients 
                FROM COMMANDE cm 
                INNER JOIN COM_DET co ON cm.NumCom = co.NumCom 
                INNER JOIN DETAIL d ON co.Num_OF = d.Num_OF 
                INNER JOIN PROD_INGR pi ON d.IdProd = pi.IdProd 
                INNER JOIN INGREDIENT i ON pi.IdIngred = i.IdIngred 
                WHERE cm.EtatCde = 'Acceptée' OR cm.EtatCde = 'En préparation' 
                GROUP BY cm.NumCom, co.Num_OF, co.Quant, cm.HeureDispo, cm.EtatCde, d.NomProd, d.IngBase1, d.IngBase2, d.IngBase3, d.IngBase4, d.IngOpt1, d.IngOpt2, d.IngOpt3, d.IngOpt4 
                ORDER BY `cm`.`HeureDispo` ASC";

        $result = $connex->query($rq);
        $tabCommandes = array();

        // On enregistre les commandes dans un tableau
        while ($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
            // On filtre les éléments des ingrédients, pour ne plus avoir de null
            $ingredientsBase = array_filter([$ligne["IngBase1"], $ligne["IngBase2"], $ligne["IngBase3"], $ligne["IngBase4"]]);
            $ingredientsOption = array_filter([$ligne["IngOpt1"], $ligne["IngOpt2"], $ligne["IngOpt3"], $ligne["IngOpt4"]]);
            $tabIngredient = explode(';', $ligne["Ingredients"]);   // On retourne un tableau des ingrédients avec ; comme séparateur
            $ingredients = array();

            foreach ($tabIngredient as $ing) {
                list($ingredient, $quantite, $unite) = explode(':', $ing);
                $ingredients[$ingredient] = array((int)$quantite, $unite);
            }

            $commande = array(
                "id" => $ligne["NumCom"],
                "OF" => $ligne["Num_OF"],
                "nombre" => $ligne["Quant"],
                "nom" => $ligne["NomProd"],
                "temps" => substr($ligne["HeureDispo"], 0, 5),
                "statut" => $ligne["EtatCde"],
                "ingredients" => $ingredients
            );
            $tabCommandes[] = $commande;
        }

        $connex = null;

        // On l'encode en JSON, puis on echo la chaine de caractères, pour ne pas passer par un fichier JSON
        $tabCommandes = array("commandes" => $tabCommandes);
        $jsonData = json_encode($tabCommandes);
        echo $jsonData;

    } catch (PDOException $e) {
        print $e->getMessage();
    }
?>
