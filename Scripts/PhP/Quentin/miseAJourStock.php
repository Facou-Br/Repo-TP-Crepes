<?php
    require_once '../../../BaseDeDonnees/codesConnexion.php';

    try {
        // Connexion à la base de données
        $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br/>';
        echo 'N° : ' . $e->getCode();
        die();
    }

    // Lecture des données JSON reçues dans la requête POST
    $jsonData = file_get_contents('php://input');

    if ($jsonData) {
        $data = json_decode($jsonData, true);

        // On récupère les données envoyées avec AJAX
        $nomIngredient = $data['nomIngredient'];
        $quantiteIngredient = $data['quantiteIngredient'];
        $quantiteCrepe = $data['quantiteCrepe'];

        try {
            // Requête SQL pour mettre à jour le stock des ingrédients
            $rq = $connex->prepare("UPDATE INGREDIENT SET StockReel = StockReel - (:quantiteCrepe * :quantiteIngredient) WHERE NomIngred = :ingredient");
            $rq->bindValue(':quantiteCrepe', $quantiteCrepe, PDO::PARAM_INT);
            $rq->bindValue(':quantiteIngredient', $quantiteIngredient, PDO::PARAM_INT);
            $rq->bindValue(':ingredient', $nomIngredient, PDO::PARAM_STR);
            $rq->execute();

            // Réponse JSON en cas de succès
            $result = array('success' => true, 'message' => 'Stock mis à jour avec succès.');
            echo json_encode($result);

        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Erreur lors de la mise à jour du stock : ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Aucune donnée reçue.']);
    }

    $connex = null;
?>
