<?php
    require_once '../../../BaseDeDonnees/codesConnexion.php';
    $connex = BaseDeDonnees::connecterBDD('adminQuentin');

    if (isset($_POST['nomIngredient']) && isset($_POST['quantiteIngredient']) && isset($_POST['quantiteCrepe'])) {
        $nomIngredient = $_POST['nomIngredient'];
        $quantiteIngredient = $_POST['quantiteIngredient'];
        $quantiteCrepe = $_POST['quantiteCrepe'];

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
    }

    $connex = null;
?>
