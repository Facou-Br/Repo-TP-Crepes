<?php
    $idCommande = $_POST['id'];

    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $bdd = "crespesco_test";
    $port = "8889";

    try {
        $connex = new PDO('mysql:host=' . $host . ';charset=utf8;dbname=' . $bdd . ';port=' . $port, $user, $pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        echo json_encode(array('success' => false, 'message' => 'Erreur de connexion à la base de données.'));
        die();
    }

    try {
        $rq = "SELECT d.IngBase1, d.IngBase2, d.IngBase3, d.IngBase4, d.IngOpt1, d.IngOpt2, d.IngOpt3, d.IngOpt4, co.Quant
                    FROM COMMANDE cm
                    INNER JOIN COM_DET co ON cm.NumCom = co.NumCom
                    INNER JOIN DETAIL d ON co.Num_OF = d.Num_OF
                    WHERE cm.NumCom = :idCommande";

        $stmt = $connex->prepare($rq);
        $stmt->bindParam(':idCommande', $idCommande, PDO::PARAM_INT);
        $stmt->execute();

        $ingredients = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ingredients[] = $row;
        }

        foreach ($ingredients as $ingredient) {
            foreach ($ingredient as $key => $value) {
                if (!empty($value)) {
                    $updateStock = "UPDATE INGREDIENT SET StockReel = StockReel - (0.01 * :quantiteCrepes) WHERE NomIngred = :ingredient";
                    $stmtUpdate = $connex->prepare($updateStock);
                    $stmtUpdate->bindParam(':quantiteCrepes', $ingredient['Quant'], PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':ingredient', $value, PDO::PARAM_STR);
                    $stmtUpdate->execute();
                }
            }
        }

        echo json_encode(array('success' => true, 'message' => 'Stocks mis à jour avec succès.'));
    } catch (PDOException $e) {
        echo json_encode(array('success' => false, 'message' => 'Erreur lors de la mise à jour des stocks : ' . $e->getMessage()));
    }
?>
