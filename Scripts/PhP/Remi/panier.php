<?php
session_start();
echo "<!DOCTYPE html>
<html lang='fr'>
<head>
  <meta charset='UTF-8' />
  <meta name='viewport' content='width=device-width, initial-scale=1.0' />
  <title>La Creperie 🥞</title>
  <link rel='stylesheet' href='../../../HTML-CSS/style.css' />
  <link rel='stylesheet' href='../../../HTML-CSS/Css/StylePanier.css' />
</head>
<body>
<div class='wrapper'>
  <header>
    <h1>La Crêperie</h1>
    <nav>
      <table>
        <th><a href='../../../HTML-CSS/Html/Commande_Remi/index.html'>Accueil</a></th>
        <th><a href='../../../HTML-CSS/Html/Commande_Remi/menu.php'>Menu</a></th>
        <th><a href='../../../HTML-CSS/Html/Commande_Remi/contactUs.html'>Contact</a></th>
      </table>
    </nav>
  </header>
  <main>";
require_once '../../../BaseDeDonnees/codesConnexion.php';
$connex = BaseDeDonnees::connecterBDD('admin');
$total = 0;

try {
    if (isset($_SESSION['cart'])) {
        // Affichez le contenu de la session
        echo '<h2>Votre panier :</h2>';
        echo '<table id="tabCrepes">';
        echo '<tr><th>Crêpe</th><th>Quantité</th><th>Sous-total</th></tr>';
        $totalQuantity = 0; // Nombre total de crêpes

        foreach ($_SESSION['cart'] as $crepe => $quantity) {
            if ($quantity > 0) {
                $rq = "SELECT PrixUHT FROM produit WHERE NomProd = :crepe";
                $stmt = $connex->prepare($rq);
                $stmt->execute(['crepe' => $crepe]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    $subtotal = $result['PrixUHT'] * $quantity;
                    $total += $subtotal;
                    $totalQuantity += $quantity;
                    echo "<tr><td>$crepe</td><td>$quantity</td><td>" . $subtotal . "€</td></tr>";
                }
            }
        }

        echo "<tr><td>Livraison</td><td>1</td><td>" . 5 . "€</td></tr>";
        echo "<tr><td>Total</td><td>$totalQuantity</td><td>" . $total+5 . "€</td></tr>";
        echo '<br>';
        echo '</table>';
    } else {
        echo 'Votre panier est vide.';
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
function annulerCommande() {
    $_SESSION['cart'] = array();
    header('Location: ../../../HTML-CSS/Html/Commande_Remi/index.html');
    exit();
}

if (isset($_POST['annulerCommande'])) {
    annulerCommande();
}
?>
<form method="post" action="validation.php">
    <label for="nom">Nom:</label><br>
    <input type="text" id="nom" name="nom" required><br>
    <label for="tel">Téléphone:</label><br>
    <input type="tel" id="tel" name="tel" required><br>
    <label for="adresse">Adresse:</label><br>
    <input type="text" id="adresse" name="adresse" required><br>
    <label for="cp">Code Postal:</label><br>
    <input type="text" id="cp" name="cp" required><br>
    <label for="ville">Ville:</label><br>
    <input type="text" id="ville" name="ville" required><br>
    <input type="hidden" id="total" name="total" value=$total>
    <input type="hidden" id="date" name="date" value="<?php echo date('Y-m-d'); ?>">
    <input type="hidden" id="heure" name="heure" value="<?php echo date('H:i:s'); ?>">
    <button type="submit" name="valider">Valider</button>
</form>
<form method="post">
    <button type="submit" name="annulerCommande">Annuler la commande</button>
</form>