<?php
session_start();

// Vérifiez si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crepes'])) {
    foreach ($_POST['crepes'] as $id => $quantity) {
        // Vous pouvez ajouter une logique pour gérer chaque type de crêpe séparément
        $_SESSION['cart'][$id] = $quantity;
    }

    // Rediriger vers une page de confirmation ou une autre page
    header('Location: ../../../Scripts/PhP/Remi/panier.php');
    exit;
}
