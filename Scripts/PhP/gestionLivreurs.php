<?php
include '../../BaseDeDonnees/connexionBdB.php';

$action = $_POST['action'];

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
}

function ajouterLivreur($pdo) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $numSS = $_POST['numSS'];
    $disponible = $_POST['disponible'];

    $sql = "INSERT INTO livreurs (Nom, Prenom, Tel, NumSS, Disponible) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $tel, $numSS, $disponible]);
    echo json_encode(['message' => 'Livreur ajouté avec succès']);
}


function modifierLivreur($pdo) {
    $idLivreur = $_POST['idLivreur'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $numSS = $_POST['numSS'];
    $disponible = $_POST['disponible'];

    $sql = "UPDATE livreurs SET Nom = ?, Prenom = ?, Tel = ?, NumSS = ?, Disponible = ? WHERE IdLivreur = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $tel, $numSS, $disponible, $idLivreur]);
    echo json_encode(['message' => 'Livreur modifié avec succès']);
}


function archiverLivreur($pdo) {
    $idLivreur = $_POST['idLivreur'];

    $sql = "UPDATE livreurs SET DateArchiv = NOW() WHERE IdLivreur = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$idLivreur])) {
        echo json_encode(['message' => 'Livreur archivé avec succès']);
    } else {
        echo json_encode(['error' => 'Une erreur est survenue lors de l\'archivage']);
    }
}


function afficherLivreurs($pdo) {
    $sql = "SELECT IdLivreur, Nom, Prenom, Tel, NumSS, Disponible FROM livreurs WHERE DateArchiv IS NULL OR DateArchiv = '0000-00-00'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $livreurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($livreurs);
}

?>
