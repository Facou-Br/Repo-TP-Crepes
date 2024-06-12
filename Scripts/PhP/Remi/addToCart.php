<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crepes'])) {
    foreach ($_POST['crepes'] as $id => $quantity) {
        $_SESSION['cart'][$id] = $quantity;
    }
    header('Location: ../../../Scripts/PhP/Remi/panier.php');
    exit;
}
