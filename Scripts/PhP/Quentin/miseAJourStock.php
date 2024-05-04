<?php
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $bdd = "crespesco_test";
    $port = "8889";

    try {
        $connex = new PDO('mysql:host=' . $host . ';charset=utf8;dbname=' . $bdd . ';port=' . $port, $user, $pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        $response = array('success' => false, 'message' => 'Erreur de connexion à la base de données.');
        echo json_encode($response);
        die();
    }

    $jsonData = file_get_contents('php://input');

    if ($jsonData) {
        $data = json_decode($jsonData, true);

        $nomIngredient = $data['nomIngredient'];
        $quantiteIngredient = $data['quantiteIngredient'];
        $quantiteCrepe = $data['quantiteCrepe'];

        try {
            $stmt = $connex->prepare("UPDATE INGREDIENT SET StockReel = StockReel - (:quantiteCrepe * :quantiteIngredient) WHERE NomIngred = :ingredient");
            $stmt->bindValue(':quantiteCrepe', $quantiteCrepe, PDO::PARAM_INT);
            $stmt->bindValue(':quantiteIngredient', $quantiteIngredient, PDO::PARAM_INT);
            $stmt->bindValue(':ingredient', $nomIngredient, PDO::PARAM_STR);
            $stmt->execute();

            $response = array('success' => true, 'message' => 'Commande mise à jour dans la base de données avec succès.');
            echo json_encode($response);

        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    $connex = null;
?>
