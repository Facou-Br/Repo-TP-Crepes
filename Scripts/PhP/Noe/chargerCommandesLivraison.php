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
        $rq = "SELECT NumCom, NomClient, AdrClient,TelClient, CP_Client, VilClient, HeureDispo, EtatLivraison 
                    FROM commande WHERE commande.EtatLivraison = 'fin_preparation'
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