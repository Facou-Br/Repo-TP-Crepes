<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Ajouter un stock</title>
    <link rel="stylesheet" type="text/css" href="../../../HTML-CSS/Css/styleFormulaire.css">
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <header>
            <h1>Ajouter un ingrédient</h1>
            <nav>
                <a href="gestions_stocks.php">Retour</a>
            </nav>
        </header>
        <form>
            <label for="nomIngred">Nom de l'ingrédient :</label>
            <input type="text" id="nomIngred" name="nomIngred" required><br><br>

            <label for="stockReel">Nombre en stocks :</label>
            <input type="number" id="stockReel" name="stockReel" required><br><br>

            <label for="prixUHTMoyen">Prix UHT Moyen :</label>
            <input type="number" id="prixUHTMoyen" name="prixUHTMoyen" required><br><br>

            <select id="categorie-select" class="select-centre">
                <option value=#>Choisir une catégorie</option>
                <option value="kg">kg</option>
                <option value="g">g</option>
                <option value="L">L</option>
                <option value="unite">unité</option>

            </select>

            <select id="fournisseur-select" class="select-centre">
                <option value=#>Choisir un fournisseur</option>
            </select>

            <br><br>
            <div class="bouton">
                <button id="Ajouter" type="submit" value="Ajouter">Ajouter</button>
            </div>
        </form>
        <footer>
            <p>&copy; 2022 La Crêperie. Tous droits réservés.</p>
            <script src="../../../Scripts/JavaScript/Owen/stock/stock_aj.js"></script>
        </footer>

    </div>
</body>

</html>
