<!DOCTYPE html">
<html lang="fr" >
    <head>
        <title>PDO3-recup</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <?php
        require_once '../../BaseDeDonnees/connexionBdB.php';
        try {
            echo 'mysql:host=' . $host . ';dbname='. $bdd, $user, $pwd . '<br />';
            $connex = new PDO('mysql:host=' . $host . ';dbname='
                    . $bdd, $user, $pwd,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br />';
            echo 'N° : ' . $e->getCode() . '<br />';;
            die();
        }

        ?>
        <br/>
        <button onclick="document.location = './PDO3-formTP.php'">Retour</button>
    </body>
</html>