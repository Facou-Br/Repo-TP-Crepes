<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un stock</title>
    <link rel="stylesheet" type="text/css" href="../../HTML-CSS/style.css">
    <meta charset="utf-8">
    <?php
    require_once '../../BaseDeDonnees/codesConnexion.php';
    try {
        $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE.';port='.PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die();
    }
    ?>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <label for="NumCom">NumCom :</label>
    <input type="number" name="NumCom" required><br><br>

    <label for="NomClient">NomClient :</label>
    <input type="number" name="NomClient" required><br><br>

    <label for="TelClient">TelClient :</label>
    <input type="number" name="TelClient" required><br><br>

    <label for="AdrClient">AdrClient :</label>
    <input type="number" name="AdrClient" required><br><br>

    <label for="CP_Client">CP_Client :</label>
    <input type="number" name="CP_Client" required><br><br>

    <label for="VilClient">VilClient :</label>
    <input type="number" name="VilClient" required><br><br>

    <label for="Date">Date :</label>
    <input type="number" name="Date" required><br><br>

    <label for="HeureDispo">HeureDispo :</label>
    <input type="number" name="HeureDispo" required><br><br>

    <label for="TypeEmbal">TypeEmbal :</label>
    <input type="number" name="TypeEmbal" required><br><br>

    <label for="A_Livrer">A_Livrer :</label>
    <input type="number" name="A_Livrer" required><br><br>

    <label for="EtatCde">EtatCde :</label>
    <input type="number" name="EtatCde" required><br><br>

    <label for="EtatLivraison">EtatLivraison :</label>
    <input type="number" name="EtatLivraison" required><br><br>

    <label for="CoutLiv">CoutLiv :</label>
    <input type="number" name="CoutLiv" required><br><br>

    <label for="TotalTTC">TotalTTC :</label>
    <input type="number" name="TotalTTC" required><br><br>

    <label for="DateArchiv">DateArchiv :</label>
    <input type="number" name="DateArchiv" required><br><br>

    <label for="Date">Date :</label>
    <input type="number" name="Date" required><br><br>

    <label for="IdLivreu">IdLivreu :</label>
    <input type="number" name="IdLivreu" required><br><br>

    <label for="Num_OF">Num_OF :</label>
    <input type="number" name="Num_OF" required><br><br>

    <label for="Quant">Quant :</label>
    <input type="number" name="Quant" required><br><br>

    <button type="submit" value="Ajouter">Ajouter</button>
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Num_OF = $_POST["Num_OF"];
    $Quant = $_POST["Quant"];
    $NumCom = $_POST["NumCom"];
    try {
        $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
        $sqlDetail = "INSERT INTO `com_det` (`Num_OF`, `Quant`, `NumCom`) VALUES ('$Num_OF', '$Quant', '$NumCom');";
        $sqlCommande = "INSERT INTO `com_det` (`NumCom`) VALUES ('$NumCom');"; //TODO : complete

    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die();
    }
}
?>

</body>
</html>

