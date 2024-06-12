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
            <h1>Gestion des Recettes - Ajouter une recette</h1>
            <nav>
                <a href="../../../HTML-CSS/Html/Gerant/index.php">Accueil</a>
                <a href="../../../HTML-CSS/Html/gerantRecette_noe/modif_recette.php">Modifier une recette</a>
            </nav>
        </header>

            <!-- Formulaire pour ajouter une recette -->
    <form id="ajouterRecetteForm" action="../../../Scripts//PhP/Noe/ajoutRecette.php">
        <label for="NomProd">Nom de la recette*:</label><br>
        <input type="text" id="NomProd" name="NomProd" required><br>
        
        <label for="Active">Activation de la recette (Oui:1 - Non:0)*:</label><br>
        <input type="number" id="Active" name="Active" required><br>

        <label for="Taille">Taille de la recette*:</label><br>
        <input type="text" id="Taille" name="Taille" required><br>

        <label for="NbIngBase">Nombre d'ingrédients de base*:</label><br>
        <input type="number" id="NbIngBase" name="NbIngBase" required><br>
        
        <label for="NbIngOpt">Nombre d'ingrédients optionnel*:</label><br>
        <input type="number" id="NbIngOpt" name="NbIngOpt" required><br>

        <label for="Image">Image de la recette:<label><br>
        <input type="text" id="Image" name="Image" ><br>

        <label for="PrixUHT">Prix Unitaire HT*:</label><br>
        <input type="number" id="PrixUHT" name="PrixUHT" step="0.01" required><br>

        <label for="IngBase1">Ingrédient de base 1:</label><br>
        <input type="text" id="IngBase" name="IngBase1"><br>

        <label for="IngBase2">Ingrédient de base 2:</label><br>
        <input type="text" id="IngBase" name="IngBase2"><br>

        <label for="IngBase3">Ingrédient de base 3:</label><br>
        <input type="text" id="IngBase" name="IngBase3" ><br>

        <label for="IngBase4">Ingrédient de base 4:</label><br>
        <input type="text" id="IngBase" name="IngBase4" ><br>

        <label for="IngBase5">Ingrédient de base 5:</label><br>
        <input type="text" id="IngBase" name="IngBase5" ><br>

        <label for="IngOpt1">Ingrédient optionnel 1:</label><br>
        <input type="text" id="IngOpt" name="IngOpt1" ><br>

        <label for="IngOpt2">Ingrédient optionnel 2:</label><br>
        <input type="text" id="IngOpt" name="IngOpt2" ><br>

        <label for="IngOpt3">Ingrédient optionnel 3:</label><br>
        <input type="text" id="IngOpt" name="IngOpt3" ><br>

        <label for="IngOpt4">Ingrédient optionnel 4:</label><br>
        <input type="text" id="IngOpt" name="IngOpt4" ><br>

        <label for="IngOpt5">Ingrédient optionnel 5:</label><br>
        <input type="text" id="IngOpt" name="IngOpt5" ><br>

        <label for="IngOpt6">Ingrédient optionnel 6:</label><br>
        <input type="text" id="IngOpt" name="IngOpt6" ><br>

        <label for="NbOptMax">Nombre d'ingrédient optionnel maximum*:</label><br>
        <input type="number" id="NbOptMax" name="NbOptMax" required><br>

        <button type="submit">Ajouter recette</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#ajouterCommandeForm').submit(function (event) {
                event.preventDefault(); 

                let formData = {
                    id: $('#id').val(),
                    NomProd: $('#NomProd').val(),
                    Taille: $('#Taille').val(),
                    NbIngBase: $('#NbIngBase').val(),
                    Image: $('#Image').val(),
                    PrixUHT: $('#PrixUHT').val(),
                    IngBase1: $('#IngBase1').val(),
                    IngBase2: $('#IngBase2').val(),
                    IngBase3: $('#IngBase3').val(),
                    IngBase4: $('#IngBase4').val(),
                    IngBase5: $('#IngBase5').val(),
                    IngOpt1: $('#IngOpt1').val(),
                    IngOpt2: $('#IngOpt2').val(),
                    IngOpt3: $('#IngOpt3').val(),
                    IngOpt4: $('#IngOpt4').val(),
                    IngOpt5: $('#IngOpt5').val(),
                    IngOpt6: $('#IngOpt6').val(),
                    NbOptMax: $('#NbOptMax').val(),
                    DateArchiv: $('#DateArchiv').val()
                };

            });
        });
    </script>
</body>
</html>
