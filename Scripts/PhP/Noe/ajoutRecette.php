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
        $NomProd = $connex->quote($_GET['NomProd'], PDO::PARAM_STR);
        $Active = $_GET['Active'];
        $Taille = $connex->quote($_GET['Taille'], PDO::PARAM_STR);
        $NbIngBase = $_GET['NbIngBase'];
        $NbIngOpt = $_GET['NbIngOpt'];
        $PrixUHT = $_GET['PrixUHT'];
        $Image = $connex->quote($_GET['Image'], PDO::PARAM_STR);
        $IngBase1 = $connex->quote($_GET['IngBase1'], PDO::PARAM_STR);
        $IngBase2 = $connex->quote($_GET['IngBase2'], PDO::PARAM_STR);
        $IngBase3 = $connex->quote($_GET['IngBase3'], PDO::PARAM_STR);
        $IngBase4 = $connex->quote($_GET['IngBase4'], PDO::PARAM_STR);
        $IngBase5 = $connex->quote($_GET['IngBase5'], PDO::PARAM_STR);
        $IngOpt1 = $connex->quote($_GET['IngOpt1'], PDO::PARAM_STR);
        $IngOpt2 = $connex->quote($_GET['IngOpt2'], PDO::PARAM_STR);
        $IngOpt3 = $connex->quote($_GET['IngOpt3'], PDO::PARAM_STR);
        $IngOpt4 = $connex->quote($_GET['IngOpt4'], PDO::PARAM_STR);
        $IngOpt5 = $connex->quote($_GET['IngOpt5'], PDO::PARAM_STR);
        $IngOpt6 = $connex->quote($_GET['IngOpt6'], PDO::PARAM_STR);
        $NbOptMax = $_GET['NbOptMax'];

        $rq = "INSERT INTO `produit` (NomProd, Active, Taille, NbIngBase, NbIngOpt,
            PrixUHT, Image, IngBase1, IngBase2, IngBase3, IngBase4, IngBase5, IngOpt1, IngOpt2, IngOpt3,
            IngOpt4, IngOpt5, IngOpt6, NbOptMax) VALUES ($NomProd, $Active, $Taille, $NbIngBase, $NbIngOpt,
            $PrixUHT, $Image, $IngBase1, $IngBase2, $IngBase3, $IngBase4, $IngBase5, $IngOpt1, $IngOpt2, $IngOpt3,
            $IngOpt4, $IngOpt5, $IngOpt6, $NbOptMax)";

        echo $rq."<br/>";


        $connex->query($rq);

        // if (file_put_contents($filename, $json_data)) {
        //     echo "Le fichier JSON a été créé avec succès.";
        // } else {
        //     echo "Erreur lors de la création du fichier JSON.";
        // }
    } catch (PDOException $e) {
        print $e->getMessage();
    }
?>
</body>
</html>