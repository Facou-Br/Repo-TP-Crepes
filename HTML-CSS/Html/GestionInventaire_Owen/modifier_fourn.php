<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des fournisseurs</title>
    <link rel="stylesheet" href="../../Css/styleFormulaire.css">
    <script src="https://code.jquery.com/jquery-latest.js"></script>

</head>

<body>
    <header>
        <h1>Gestion des Fournisseurs</h1>
        <nav>
            <a href="gestion_fournisseurs.php">Retour</a>
        </nav>
    </header>
    <div class="wrapper">
        <select id="fournisseur-select" class="select-centre">
            <option value=#>Choisir un fournisseur</option>
        </select>

        <form id="fournisseur-form">
            <input type="text" id="adresse" name="adresse" placeholder="Adresse" required>
            <input type="text" id="ville" name="ville" placeholder="Ville" required>
            <input type="text" id="codePostal" name="codePostal" placeholder="Code Postal" required>
            <input type="text" id="telephone" name="telephone" placeholder="Téléphone" required>
            <div class="bouton">
                <button id="modifier" type="submit">Envoyer</button>
                <button id="supprimer" type="submit">Supprimer</button>
            </div>
        </form>
        <a id="resultat"></a>

    </div>
    <footer>
        <p>&copy; 2022 La Crêperie. Tous droits réservés.</p>
        <script src="../../../Scripts/JavaScript/Owen/fournisseur/modifs_fourn.js"></script>
        <script src="../../../Scripts/JavaScript/Owen/fournisseur/suppr_fourn.js"></script>
    </footer>
</body>

</html>
