<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestion des fournisseurs</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../Css/Style_gestionFourn.css">
    <script src="https://code.jquery.com/jquery-latest.js"></script>

</head>

<body>
    <header>
        <h1>Gestion des Recettes - Modifier une recette</h1>
        <nav>
            <a href="../../../HTML-CSS/Html/Gerant/index.php">Accueil</a>
            <a href="../../../HTML-CSS/Html/gerantRecette_noe/ajout_recette.php">Ajouter une recette</a>
        </nav>
    </header>
    <div class="wrapper">
        <select id="recette-select">
            <option value=#>Choisir une recette</option>
        </select>

        <form id="fournisseur-form">
            <label for="NomProd">Nom de la recette:</label>
            <input type="text" id="NomProd" name="NomProd" placeholder="Nom du produit" required>
            <label for="Active">Activation de la recette (Oui:1 - Non:0) :</label>
            <input type="text" id="Active" name="Active" placeholder="Activer" required>
            <label for="Taille">Taille de la recette:</label>
            <input type="text" id="Taille" name="Taille" placeholder="Taille de la crêpe" required>
            <label for="NbIngBase">Nombre d'ingrédients de base:</label>
            <input type="text" id="NbIngBase" name="NbIngBase" placeholder="Nombre d'ingrédients de base" required>
            <label for="NbIngOpt">Nombre d'ingrédients optionnel:</label>
            <input type="text" id="NbIngOpt" name="NbIngOpt" placeholder="Nombre d'ingrédients de optionnel" required>
            <label for="Image">Image de la recette</label>
            <input type="text" id="Image" name="Image" placeholder="URL de l'image" required>
            <label for="PrixUHT">Prix Unitaire HT:</label>
            <input type="text" id="PrixUHT" name="PrixUHT" placeholder="Prix Unitaire Hors Taxe" required>
            <label for="IngBase1">Ingrédient de base 1:</label>
            <input type="text" id="IngBase1" name="IngBase1" placeholder="Ingrédient de base 1" required>
            <label for="IngBase2">Ingrédient de base 2:</label>
            <input type="text" id="IngBase2" name="IngBase2" placeholder="Ingrédient de base 2" required>
            <label for="IngBase3">Ingrédient de base 3:</label>
            <input type="text" id="IngBase3" name="IngBase3" placeholder="Ingrédient de base 3" required>
            <label for="IngBase4">Ingrédient de base 4:</label>
            <input type="text" id="IngBase4" name="IngBase4" placeholder="Ingrédient de base 4" required>
            <label for="IngBase5">Ingrédient de base 5:</label>
            <input type="text" id="IngBase5" name="IngBase5" placeholder="Ingrédient de base 5" required>
            <label for="IngOpt1">Ingrédient optionnel 1:</label>
            <input type="text" id="IngOpt1" name="IngOpt1" placeholder="Ingrédient optionnel 1" required>
            <label for="IngOpt2">Ingrédient optionnel 2:</label>
            <input type="text" id="IngOpt2" name="IngOpt2" placeholder="Ingrédient optionnel 2" required>
            <label for="IngOpt3">Ingrédient optionnel 3:</label>
            <input type="text" id="IngOpt3" name="IngOpt3" placeholder="Ingrédient optionnel 3" required>
            <label for="IngOpt4">Ingrédient optionnel 4:</label>
            <input type="text" id="IngOpt4" name="IngOpt4" placeholder="Ingrédient optionnel 4" required>
            <label for="IngOpt5">Ingrédient optionnel 5:</label>
            <input type="text" id="IngOpt5" name="IngOpt5" placeholder="Ingrédient optionnel 5" required>
            <label for="IngOpt6">Ingrédient optionnel 6:</label>
            <input type="text" id="IngOpt6" name="IngOpt6" placeholder="Ingrédient optionnel 6" required>
            <label for="NbOptMax">Nombre d'ingrédient optionnel maximum:</label>
            <input type="text" id="NbOptMax" name="NbOptMax" placeholder="Nombre d'ingrédient optionnel maximum" required>
            <button id="modifier" type="submit">Envoyer</button>
        </form>
    </div>

    <script src="../../../Scripts/JavaScript/GestionsRecettes/modif_recette.js"></script>
</body>

</html>