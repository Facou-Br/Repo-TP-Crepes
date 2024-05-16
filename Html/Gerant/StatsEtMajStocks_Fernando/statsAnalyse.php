<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../style.css">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <title>Statistiques</title>
</head>

<body>
    <label for="produits">Produits :</label>
    <select id="produits" class="produits" name="produits" title="produits" required>
        <option value="">Choissisez un produit parmi la liste</option>
    </select>

    <br>
    <br>

    <div class="containerOne">
        <label for="periodeMois">Période de mois:</label>
        <label for="dateDebut">Du</label>
        <input type="month" id="dateDebut" name="dateDebut" title="dateDebut" class="periodeMois" required>
        <label for="dateFin">Au</label>
        <input type="month" id="dateFin" name="dateFin" title="dateFin" class="periodeMois" required>
    </div>

    <div class="containerTwo">
        <label for="periodeSemaine">Période de semaine:</label>
        <label for="numeroSemaine">Semaine n°</label>
        <input type="week" id="numeroSemaine" name="numeroSemaine" title="numeroSemaine" class="periodeSemaine" required>
    </div>

    <div class="containerThree">
        <label for="periodeJour">Période de jour:</label>
        <label for="dateJour">Le</label>
        <input type="date" id="dateJour" name="dateJour" title="dateJour" class="periodeJour" required>
    </div>

</body>

<footer>
    <script src="../../../../Scripts/JavaScript/Fernando/statsAnalyse/affichageProduits.js"></script>
</footer>

</html>
