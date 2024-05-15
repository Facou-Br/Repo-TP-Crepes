<?php
    require_once '../../../BaseDeDonnees/codesConnexion.php';

    try {
        $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br/>';
        echo 'N° : ' . $e->getCode();
        die();
    }

    $jsonData = file_get_contents('php://input');

    if ($jsonData) {
        $data = json_decode($jsonData, true);

        $nomIngredient = $data['nomIngredient'];
        $quantiteIngredient = $data['quantiteIngredient'];
        $quantiteCrepe = $data['quantiteCrepe'];

        try {
            $rq = $connex->prepare("UPDATE INGREDIENT SET StockReel = StockReel - (:quantiteCrepe * :quantiteIngredient) WHERE NomIngred = :ingredient");
            $rq->bindValue(':quantiteCrepe', $quantiteCrepe, PDO::PARAM_INT);
            $rq->bindValue(':quantiteIngredient', $quantiteIngredient, PDO::PARAM_INT);
            $rq->bindValue(':ingredient', $nomIngredient, PDO::PARAM_STR);
            $rq->execute();

            $result = array('success' => true, 'message' => 'Commande mise à jour dans la base de données avec succès.');
            echo json_encode($result);

        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    $connex = null;
?>
