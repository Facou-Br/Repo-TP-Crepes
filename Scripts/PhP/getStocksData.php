<?php
header('Content-Type: application/json');

try {
    include '../../BaseDeDonnees/connexionBDD.php';
} catch (Exception $ex) {
    echo json_encode(['error' => 'DB connection failed']);
    die();
}

try {
    $sql = "SELECT Inventaire.IdIngred, Inventaire.Date, Inventaire.Quantite, Inventaire.StockTheorique, INGREDIENT.NomIngred, RenouvellementIngredients.QuantiteARecommander
        FROM Inventaire
        JOIN INGREDIENT ON Inventaire.IdIngred = INGREDIENT.IdIngred
        LEFT JOIN RenouvellementIngredients ON INGREDIENT.IdIngred = RenouvellementIngredients.IdIngred
        ORDER BY Inventaire.Date ASC, Inventaire.IdIngred ASC;
        ";
    $stmt = $conn->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    // Affichage des détails de l'erreur PDO
    echo json_encode(['error' => 'Unable to get data', 'details' => $ex->getMessage()]);
    die();
} catch (Exception $ex) {
    // Affichage des autres types d'erreurs
    echo json_encode(['error' => 'An error occurred', 'details' => $ex->getMessage()]);
    die();
}
$ids = [];
$dates = [];
$quantities = [];
$theoreticalStocks = [];
$productNames = [];
$percentages = [];

foreach ($results as $row) {
    $ids[] = $row['IdIngred'];
    $dates[] = $row['Date'];
    $quantities[] = $row['Quantite'];
    $theoreticalStocks[] = $row['StockTheorique'];
    $percentage = $row['QuantiteARecommander'] != 0 ? (($row['Quantite'] - $row['StockTheorique']) / $row['QuantiteARecommander']) * 100 : 0;
    $percentages[] = $percentage;
    $productNames[$row['IdIngred']] = $row['NomIngred']; //Chaque ID est associé à son nom
}

echo json_encode([
    'ids' => $ids,
    'dates' => $dates,
    'quantities' => $quantities,
    'theoreticalStocks' => $theoreticalStocks,
    'percentages' => $percentages,
    'productNames' => $productNames
]);
