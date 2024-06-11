<?php
    // Connexion à la BdD
    require_once '../../../BaseDeDonnees/codesConnexion.php';
    $connex = BaseDeDonnees::connecterBDD('admin');

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

        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    $connex = null;
?>
