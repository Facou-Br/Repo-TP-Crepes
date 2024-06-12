<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un fournisseur</title>
    <link rel="stylesheet" href="../../Css/styleFormulaire.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        footer {
            position: relative;
        }
    </style>

</head>
<body>
<div class="wrapper">
    <header>
        <h1>Ajouter un fournisseur</h1>
        <nav>
            <a href="gestion_fournisseurs.php">Retour</a>
        </nav>
    </header>
    <div id="form_fourn" class="form_fourn">
        <form>
        <div id="nom">
            <label id="nomFournL" for="nomFourn">Nom du fournisseur :</label>
            <input type="text" id="nomFourn" name="nomFourn" required>
        </div>
        <br><br>
        <div id="adresseFourn">
            <label id="adresseL" for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" required>
        </div>
        <br><br>
        <div id="codePostalFourn">
            <label id="codePostalL" for="codePostal">Code postal :</label>
            <input type="text" id="codePostal" name="codePostal" required>
        </div>
        <br><br>
        <div id="villeFourn">
            <label id="villeL" for="ville">Ville :</label>
            <input type="text" id="ville" name="ville" required>
        </div>
        <br><br>
        <div id="telephoneFourn">
            <label id="telephoneL" for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" required>
        </div>
        <br><br>
            <div class="bouton">
                <button id="Ajouter" type="submit" value="Ajouter">Ajouter</button>
                <button id="Annuler" type="reset" value="Annuler">Annuler</button>
                <a href="gestion_fournisseurs.php"><button id="Retour" type="button" value="Retour">Retour</button></a>
            </div>
        </form>
    </div>
</div>
<footer>
    <p>&copy; 2022 La Crêperie. Tous droits réservés.</p>
    <script src="../../../Scripts/JavaScript/Owen/fournisseur/fourn_aj.js"></script>
</footer>
</body>
</html>
