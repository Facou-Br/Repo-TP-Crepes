<?php
header('Content-Type: application/json');

include '../../BaseDeDonnees/connexionBdB.php';

$action = $_POST['action'] ?? '';

try {
    switch ($action) {
        case 'ajouter':
            ajouterLivreur($connexionBDB);
            break;
        case 'modifier':
            modifierLivreur($connexionBDB);
            break;
        case 'archiver':
            archiverLivreur($connexionBDB);
            break;
        case 'afficher':
            afficherLivreurs($connexionBDB);
            break;
        case 'obtenirDetails':
            $idLivreur = $_POST['idLivreur'] ?? '';
            obtenirDetailsLivreur($connexionBDB, $idLivreur);
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
    // Validation et nettoyage des entrées (exemple basique)
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
    $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
    $numSS = filter_input(INPUT_POST, 'numSS', FILTER_SANITIZE_STRING);
    $disponible = filter_var($_POST['disponibilite'], FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ? 1 : 0;

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
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$nom, $prenom, $tel, $numSS, $disponible, $idLivreur])) {
        echo json_encode(['success' => true, 'message' => 'Livreur modifié avec succès']);
    } else {
        throw new Exception('Erreur lors de la modification du livreur.');
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
    $sql = "SELECT IdLivreur, Nom, Prenom, Tel, NumSS, Disponible FROM livreur WHERE DateArchiv IS NULL OR DateArchiv = '0000-00-00'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $livreurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'livreurs' => $livreurs]);
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
