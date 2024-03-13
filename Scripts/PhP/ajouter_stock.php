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
    <label for="nomIngred">Nom de l'ingrédient :</label>
    <input type="text" name="nomIngred" required><br><br>
    <label for="seuilStock">Seuil de stock :</label>
    <input type="number" name="seuilStock" required><br><br>
    <label for="stockMin">Stock minimum :</label>
    <input type="number" name="stockMin" required><br><br>
    <label for="stockReel">Stock réel :</label>
    <input type="number" name="stockReel" required><br><br>
    <label for="prixUHTMoyen">Prix UHT Moyen :</label>
    <input type="number" name="prixUHTMoyen" required><br><br>
    <label for="fournisseur">Fournisseur :</label>
    <?php
    try {
        $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
        $sql = "SELECT nomFourn FROM `FOURNISSEUR`;";
        $ligne = $connex->query($sql);
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die();
    }
    echo "<select>";
    foreach ($ligne as $row) {

        echo "<option value ='". $row['NomFourn'] ."'>" . $row['NomFourn'] . "</option>";
    }
    echo "</select>";
    ?>
    <button type="submit" value="Ajouter">Ajouter</button>
</form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomIngred = $_POST["nomIngred"];
        $seuilStock = $_POST["seuilStock"];
        $stockMin = $_POST["stockMin"];
        $stockReel = $_POST["stockReel"];
        $prixUHTMoyen = $_POST["prixUHTMoyen"];
        try {
            $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
            $sql = "INSERT INTO 'ingredient' (NomIngred, SeuilStock, StockMin, StockReel, PrixUHT_Moyen, DateArchiv)
                VALUES ('$nomIngred', '$seuilStock', '$stockMin', '$stockReel', '$prixUHTMoyen', NOW()";
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br />';
            echo 'N° : ' . $e->getCode();
            die();
        }
/*
        if ($connex->query($sql) === TRUE) {
            echo "L'article a été ajouté avec succès.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $connex->error;
        }*/
    }
    ?>
    
</body>
</html>
