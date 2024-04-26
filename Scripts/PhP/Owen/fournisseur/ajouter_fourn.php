<?php
require_once '../../../../BaseDeDonnees/codesConnexion.php';
try {
    $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE.';port='.PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
$nomFourn = $_POST["nomFourn"];
$adresse = $_POST["adresse"];
$cp = $_POST["codePostal"];
$ville = $_POST["ville"];
$tel = $_POST["telephone"];
echo $nomFourn . " + " . $adresse . " " . $cp . " " . $ville . " " . $tel;
try {
    $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
    $sql = "INSERT INTO `fournisseur` (`NomFourn`, `Adresse`, `CodePostal`, `Ville`, `Tel`) VALUES ($nomFourn, $adresse, $cp, $ville, $tel);";
    echo $sql."<br>";
    $connex->exec($sql); #essayer le query pour voir si ça marche regarder dans le cours
    $connex->commit();
    echo "Fournisseur ajouté";
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}
?>