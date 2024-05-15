<!DOCTYPE>
<html>

<body>
<?php
    require_once '..\..\..\BaseDeDonnees\codesConnexion.php';
    try {
        $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname='
            . DATABASE . ';port=' . PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die();
    }
    

    try {
        $rq = "INSERT NomProd, Taille, NbIngBase, PrixUHT, Image, IngBase1, IngBase2, IngBase3, IngBase4, IngBase5,
        IngOpt1, IngOpt2, IngOpt3, IngOpt4, IngOpt5, IngOpt6, NbOptMax
                    FROM produit
                    ";

        $result = $connex->query($rq);

        $commandes_array = array();

        while ($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
            $commande = array(
                "NomProd" => $ligne["NomProd"],
                "Taille" => $ligne["Taille"],
                "NbIngBase" => $ligne["NbIngBase"],
                "PrixUHT" => $ligne["PrixUHT"],
                "Image" => $ligne["Image"],
                "IngBase1" => $ligne["IngBase1"],
                "IngBase2" => substr($ligne["IngBase2"], 0, 5),
                "IngBase3" => $ligne["IngBase3"],
                "IngBase4" => $ligne["IngBase4"],
                "IngBase5" => $ligne["IngBase5"],
                "IngOpt1" => $ligne["IngOpt1"],
                "IngOpt2" => $ligne["IngOpt2"],
                "IngOpt3" => $ligne["IngOpt3"],
                "IngOpt4" => $ligne["IngOpt4"],
                "IngOpt5" => $ligne["IngOpt5"],
                "IngOpt6" => $ligne["IngOpt6"],
                "NbOptMax" => $ligne["NbOptMax"],
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
</body>
</html>