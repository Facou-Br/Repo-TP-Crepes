<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordre de Livraison - Crêpes</title>
    <link rel="stylesheet" href="../.././style.css">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="../../.././Scripts/JavaScript/GestionLivraison/script_livraison.js"></script>
    <style>
        #commandes {
            display: grid;
            margin: 30px;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 20px;
            text-align: center;
        }

        p {
            margin-bottom: 5px;
        }

        hr {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <header>
            <h1>Crêpes - Liste des commandes pour les livreurs</h1>
        </header>
        <div id="commandes">
        </div>
    </div>
</body>

</html>
