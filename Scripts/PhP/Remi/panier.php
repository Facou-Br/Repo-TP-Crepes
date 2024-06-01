<?php
session_start();

// Vérifiez si la session est valide et contient les données du panier
if (isset($_SESSION['cart'])) {
    // Affichez le contenu de la session
    echo '<h2>Votre panier :</h2><ul>';
    foreach ($_SESSION['cart'] as $id => $quantity) {
        if ($quantity > 0){
            echo "<li>$id x $quantity</li>";
        }
    }
    echo '</ul>';
} else {
    echo 'Votre panier est vide.';
}

function annulerCommande() {
    $_SESSION['cart'] = array();
    header('Location: ../../../HTML-CSS/index.html');
    exit();
}

if (isset($_POST['annulerCommande'])) {
    annulerCommande();
}
?>

<button type="button" onclick="location.href='validation.php'">Valider</button>
<form method="post">
    <button type="submit" name="annulerCommande">Annuler la commande</button>
</form>
<img src="../../../HTML-CSS/Images/jpeg/breton.jpg">