<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <?php
    require_once "../../../Scripts/PhP/Fernando/selectFournisseurs.php";
    ?>
    <title>Mise à jour Stock</title>
</head>

<body>
    <fieldset>
        <legend> Mise à jour Stock </legend>
        <form action="../../../Scripts/PhP/Fernando/selectIngredients.php" method="post">

            <label for="fournisseurs">Nom fournisseur:</label>
            <select id="fournisseurs" class="fournisseurs" name="fournisseurs" title="fournisseurs" required>
                <option value="">Choissisez un fournisseur parmi la liste</option>
            </select>

            <br>
        </form><BR>

        <?php
        require_once "../../../Scripts/PhP/Fernando/selectFournisseurs.php";
        ?>
        
        <form action="../../../Scripts/PhP/Fernando/majStock_Fournisseur.php" method="post"
            class="formulaireIngredients">
        </form>
    </fieldset>
</body>

<script src="../../../Scripts/JavaScript/Fernando/affichageDynamiqueFournisseurs.js"></script>
<script src="../../../Scripts/JavaScript/Fernando/affichageDynamiqueIngredients.js"></script>

</html>