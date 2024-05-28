<?php
    require_once '../../../../BaseDeDonnees/codesConnexion.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        $fournisseur = $data['fournisseur'];

        try {
            $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            echo json_encode(['error' => 'Erreur de connexion : ' . $e->getMessage()]);
            die();
        }

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
