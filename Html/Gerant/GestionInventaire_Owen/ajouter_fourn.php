<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un fournisseur</title>
    <link rel="stylesheet" type="text/css" href="../../../../HTML-CSS/style.css">
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
<label id="nomFourn" for="nomFourn">Nom du fournisseur :</label>
<input type="text" name="nomFourn" required><br><br>
<label id="adresse" for="adresse">Adresse :</label>
<input type="text" name="adresse" required><br><br>
<label id="codePostal" for="codePostal">Code postal :</label>
<input type="text" name="codePostal" required><br><br>
<label id="ville" for="ville">Ville :</label>
<input type="text" name="ville" required><br><br>
<label id="telephone" for="telephone">Téléphone :</label>
<input type="text" name="telephone" required><br><br>
<button type="button" value="Ajouter">Ajouter</button>
</form>

</body>
</html>