<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/HTML-CSS/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <nav>
        <a href="../../../HTML-CSS/Html/Gerant/index.php">Retour</a>
    </nav>
</head>

<div id="bodyStatistiques">

    <div id="stats">
        <fieldset>
            <legend> Analyse des ventes des produtis </legend>
            <form class="formStats" id="formulaireIngredients">
                <label for="produits">Nom produits:</label>
                <select id="produits" class="produits" name="produits" title="produits" required>
                    <option value="">Choissisez un produit parmi la liste</option>
                </select>

                <br>

                <label for="ChoixTypeDate">Choix de la période:</label>
                <select id="ChoixTypeDate" class="ChoixTypeDate" name="ChoixTypeDate" title="ChoixTypeDate" required>
                    <option value="">Choissisez une période</option>
                    <option value="annee">Année</option>
                    <option value="mois">Mois</option>
                    <option value="semaine">Semaine</option>
                </select>

                <div id="spaceChoixDate" class="spaceChoixDate">

                </div>
            </form>
        </fieldset>

    </div>

    </form>
    </fieldset>
    <div>
        <canvas id="pieChart"></canvas>
    </div>
    <div>
        <canvas id="lineChart"></canvas>
    </div>
    <div>
        <canvas id="stackedBarChar"></canvas>
    </div>
</div id="bodyStatistiques">

<footer>

    <script src=/Scripts/JavaScript/Fernando/statsAnalyse/choixDate.js></script>
    <script src=/Scripts/JavaScript/Fernando/statsAnalyse/affichageProduits.js></script>
    <script src=/Scripts/JavaScript/Fernando/statsAnalyse/pie.js></script>
    <script src=/Scripts/JavaScript/Fernando/statsAnalyse/line.js></script>
    <script src=/Scripts/JavaScript/Fernando/statsAnalyse/stackedBar.js></script>
</footer>

</html>
