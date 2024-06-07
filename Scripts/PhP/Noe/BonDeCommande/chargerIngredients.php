<?php
    require_once '../../../../BaseDeDonnees/codesConnexion.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        $fournisseur = $data['fournisseur'];

        $connex = BaseDeDonnees::connecterBDD('admin');

        $rq = "SELECT i.NomIngred
               FROM INGREDIENT i
               INNER JOIN FOURN_INGR fi ON i.IdIngred = fi.IdIngred
               WHERE fi.NomFourn = :fournisseur
               ORDER BY i.NomIngred ASC";

        $rq = $connex->prepare($rq);
        $rq->bindParam(':fournisseur', $fournisseur, PDO::PARAM_STR);
        $rq->execute();
        $result = $rq->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    }
?>
