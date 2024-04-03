
    <?php
    require_once '../../../BaseDeDonnees/codesConnexion.php';
    try {
        $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE.';port='.PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die();
    }
    ?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomFourn = $_POST["nomFourn"];
    $adresse = $_POST["adresse"];
    $cp = $_POST["codePostal"];
    $ville = $_POST["ville"];
    $tel = $_POST["telephone"];

    try {
        $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
        $sql = "INSERT INTO `fournisseur` (`NomFourn`, `Adresse`, `CodePostal`, `Ville`, `Tel`, `DateArchiv`) VALUES ('$nomFourn', '$adresse', '$cp', '$ville', '$tel', NOW()";
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die();
    }
/*
    if ($connex->query($sql) === TRUE) {
        echo "Le fournisseur a été ajouté avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $connex->error;
    }*/
}
?>

