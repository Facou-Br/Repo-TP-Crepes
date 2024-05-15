<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un stock</title>
    <link rel="stylesheet" type="text/css" href="../../../style.css">
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label id="nomIngred" for="nomIngred">Nom de l'ingrédient :</label>
<input type="text" name="nomIngred" required><br><br>
<label id="seuilStock" for="seuilStock">Seuil de stock :</label>
<input type="number" name="seuilStock" required><br><br>
<label id="stockMin" for="stockMin">Stock minimum :</label>
<input type="number" name="stockMin" required><br><br>
<label id="stockReel" for="stockReel">Stock réel :</label>
<input type="number" name="stockReel" required><br><br>
<label id="prixUHTMoyen" for="prixUHTMoyen">Prix UHT Moyen :</label>
<input type="number" name="prixUHTMoyen" required><br><br>
<label id="fournisseur" for="fournisseur">Fournisseur :</label>

<br><br>
<button type="button" value="Ajouter">Ajouter</button>
</form>
<script src="../../../../Scripts/JavaScript/Owen/stocks_aj.js"></script>
</body>
</html>