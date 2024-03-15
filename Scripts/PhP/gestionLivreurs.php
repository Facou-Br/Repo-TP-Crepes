<?php
header('Content-Type: application/json');

include '../../BaseDeDonnees/connexionBDD.php';

$action = $_POST['action'] ?? ''; //filtering is not required, sql injection is not possible on this variable

try {
    switch ($action) {
        case 'ajouter':
            ajouterLivreur($conn);
            break;
        case 'modifier':
            modifierLivreur($conn);
            break;
        case 'archiver':
            archiverLivreur($conn);
            break;
        case 'afficher':
            afficherLivreurs($conn);
            break;
        case 'obtenirDetails':
            $idLivreur = filter_input(INPUT_POST, 'idLivreur', FILTER_SANITIZE_NUMBER_INT);
            obtenirDetailsLivreur($conn, $idLivreur);
            break;
        case 'specifierDisponibiliteSoir':
            specifierDisponibiliteSoir($conn);
            break;

        default:
            http_response_code(400); // Bad Request
            echo json_encode(['error' => 'Action non reconnue']);
            break;
    }
} catch (Exception $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Erreur serveur : ' . $e->getMessage()]);
}

function ajouterLivreur($pdo) {
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
    $numSS = filter_input(INPUT_POST, 'numSS', FILTER_SANITIZE_STRING);
    $disponible = filter_input(INPUT_POST, 'disponible', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ? 1 : 0;

    $sql = "INSERT INTO livreur (Nom, Prenom, Tel, NumSS, Disponible) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $tel, $numSS, $disponible]);
    echo json_encode(['success' => true, 'message' => 'Livreur ajouté avec succès']);
}

function modifierLivreur($pdo) {
    $idLivreur = filter_input(INPUT_POST, 'idLivreur', FILTER_SANITIZE_NUMBER_INT);
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
    $numSS = filter_input(INPUT_POST, 'numSS', FILTER_SANITIZE_STRING);
    $disponible = filter_input(INPUT_POST, 'disponible', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ? 1 : 0;

    $sql = "UPDATE livreur SET Nom = ?, Prenom = ?, Tel = ?, NumSS = ?, Disponible = ? WHERE IdLivreur = ?";
    $stmt = $pdo->prepare($sql); //pdo.prepare sanitizes the sql query
    if ($stmt->execute([$nom, $prenom, $tel, $numSS, $disponible, $idLivreur])) {
        echo json_encode(['success' => true, 'message' => 'Livreur modifié avec succès']);
    } else {
        throw new Exception('Erreur lo rs de la modification du livreur.');
    }
}

function archiverLivreur($pdo) {
    $idLivreur = filter_input(INPUT_POST, 'idLivreur', FILTER_SANITIZE_NUMBER_INT);

    $sql = "UPDATE livreur SET DateArchiv = NOW() WHERE IdLivreur = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$idLivreur])) {
        echo json_encode(['success' => true, 'message' => 'Livreur archivé avec succès']);
    } else {
        throw new Exception('Erreur lors de l\'archivage du livreur.');
    }
}

function afficherLivreurs($pdo) {
    // La date d'aujourd'hui pour filtrer les disponibilités du soir
    $today = date('Y-m-d');

    $sql = "SELECT l.IdLivreur, l.Nom, l.Prenom, l.Tel, l.NumSS, l.Disponible, 
                   COALESCE(ds.Present, FALSE) AS PresentCeSoir
            FROM livreur l
            LEFT JOIN DisponibiliteSoir ds ON l.IdLivreur = ds.IdLivreur AND ds.Date = ?
            WHERE l.DateArchiv IS NULL OR l.DateArchiv = '0000-00-00'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$today]);
    $livreurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($livreurs) {
        echo json_encode(['success' => true, 'livreurs' => $livreurs]);
    } else {
        throw new Exception('Aucun livreur trouvé.');
    }
}

function obtenirDetailsLivreur($pdo, $idLivreur) {
    $sql = "SELECT * FROM livreur WHERE IdLivreur = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$idLivreur]);
    $livreur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($livreur) {
        echo json_encode(['success' => true, 'livreur' => $livreur]);
    } else {
        throw new Exception('Livreur non trouvé.');
    }
}

function specifierDisponibiliteSoir($pdo) {
    $idLivreur = filter_input(INPUT_POST, 'idLivreur', FILTER_SANITIZE_NUMBER_INT);
    $present = filter_input(INPUT_POST, 'present', FILTER_VALIDATE_BOOLEAN);

    // Vérifiez si l'entrée pour ce livreur et cette date existe déjà
    $sqlVerif = "SELECT IdDisponibilite FROM DisponibiliteSoir WHERE IdLivreur = ? AND Date = CURDATE()";
    $stmtVerif = $pdo->prepare($sqlVerif);
    $stmtVerif->execute([$idLivreur]);
    $exist = $stmtVerif->fetch();

    if ($exist) {
        // Mise à jour si l'entrée existe déjà
        $sqlUpdate = "UPDATE DisponibiliteSoir SET Present = ? WHERE IdDisponibilite = ?";
        $stmtUpdate = $pdo->prepare($sqlUpdate);
        $stmtUpdate->execute([$present, $exist['IdDisponibilite']]);
    } else {
        // Insertion d'une nouvelle entrée si elle n'existe pas
        $sqlInsert = "INSERT INTO DisponibiliteSoir (IdLivreur, Date, Present) VALUES (?, CURDATE(), ?)";
        $stmtInsert = $pdo->prepare($sqlInsert);
        $stmtInsert->execute([$idLivreur, $present]);
    }

    echo json_encode(['success' => true, 'message' => 'Disponibilité spécifiée avec succès']);
}