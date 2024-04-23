<?php
require_once '../../../BaseDeDonnees/codesConnexion.php';
try {
    $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE.';port='.PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
$form= $_POST;
$nomFourn = $form["nomFourn"];
$adresse = $form["adresse"];
$cp = $form["codePostal"];
$ville = $form["ville"];
$tel = $form["telephone"];
var_dump($form);
try {
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $sql = "INSERT INTO `fournisseur` (`NomFourn`, `Adresse`, `CodePostal`, `Ville`, `Tel`, `DateArchiv`) VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $connex->prepare($sql);
    $stmt->execute([$nomFourn, $adresse, $cp, $ville, $tel]);
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
?>