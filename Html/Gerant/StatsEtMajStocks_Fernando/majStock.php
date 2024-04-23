<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../style.css">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <title>Mise à jour Stock</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <h1>Mise à jour Stock<</h1>
            <nav>
                <a href="../">Retour</a>
            </nav>
        </header>

        <fieldset>
            <legend> Mise à jour Stock lors de la réception</legend>
            <form class="formulaireIngredients" id="formulaireIngredients">

                <label for="fournisseurs">Nom fournisseur:</label>
                <select id="fournisseurs" class="fournisseurs" name="fournisseurs" title="fournisseurs" required>
                    <option value="">Choissisez un fournisseur parmi la liste</option>
                </select>

                <div id="ingredients" class="ingredients">
                </div>
                
            </form>
        </fieldset>
    </div>
</body>


<footer>
    <script src="../../../Scripts/JavaScript/Fernando/majStock/affichageDynamiqueFournisseurs.js"></script>
    <script src="../../../Scripts/JavaScript/Fernando/majStock/affichageDynamiqueIngredients.js"></script>
</footer>

</html>