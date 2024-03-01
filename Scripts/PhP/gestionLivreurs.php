<?php
header('Content-Type: application/json');

include '../../BaseDeDonnees/connexionBdB.php';

$action = $_POST['action'] ?? ''; // Utilisation de l'opérateur de coalescence nulle pour éviter des notices undefined index

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
    default:
        echo json_encode(['error' => 'Action non reconnue']);
        break;
}

function ajouterLivreur($pdo) {
    try {
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $tel = $_POST['tel'] ?? '';
        $numSS = $_POST['numSS'] ?? '';
        $disponible = $_POST['disponible'] ?? '';

        $sql = "INSERT INTO livreur (Nom, Prenom, Tel, NumSS, Disponible) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $prenom, $tel, $numSS, $disponible]);
        echo json_encode(['message' => 'Livreur ajouté avec succès']);
    } catch (PDOException $e) {
        // En cas d'erreur SQL, renvoyez un message d'erreur JSON
        http_response_code(500); // Optionnel: Définir le code de réponse HTTP approprié
        echo json_encode(['error' => 'Erreur de base de données : ' . $e->getMessage()]);
        exit();
    }
}

function modifierLivreur($pdo) {
    $idLivreur = $_POST['idLivreur'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $numSS = $_POST['numSS'] ?? '';
    $disponible = $_POST['disponible'] ?? '';

    $sql = "UPDATE livreur SET Nom = ?, Prenom = ?, Tel = ?, NumSS = ?, Disponible = ? WHERE IdLivreur = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $tel, $numSS, $disponible, $idLivreur]);
    echo json_encode(['message' => 'Livreur modifié avec succès']);
}

function archiverLivreur($pdo) {
    $idLivreur = $_POST['idLivreur'] ?? '';

    $sql = "UPDATE livreur SET DateArchiv = NOW() WHERE IdLivreur = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$idLivreur])) {
        echo json_encode(['message' => 'Livreur archivé avec succès']);
    } else {
        echo json_encode(['error' => 'Une erreur est survenue lors de l\'archivage']);
    }
}

function afficherLivreurs($pdo) {
    $sql = "SELECT IdLivreur, Nom, Prenom, Tel, NumSS, Disponible FROM livreur WHERE DateArchiv IS NULL OR DateArchiv = '0000-00-00'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $livreurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($livreurs);
}
