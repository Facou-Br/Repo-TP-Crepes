<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livreur</title>
    <link rel="stylesheet" href="../.././style.css">
        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <script src="../../.././Scripts/JavaScript/GestionsLivraison/script_livraison.js"></script>

        <style>
            #commandesList {
                display: grid;
                margin: 30px;
                grid-template-columns: repeat(4, 1fr);
                grid-gap: 20px;
            }

            hr {
                margin-right: 50px;
            }

            p {
                margin-bottom: 5px;
            }
        </style>

</head>
    <body>
        <div class="wrapper">
            <header>
                <h1>Crêpes - Liste des commandes</h1>
            </header>
            <div id="commandesList">
                <script type="text/javascript">
                    actualiserCommandesBdD();
                    $(document).ready(function () {
                        chargerCommandes();
                    });
                </script>
            </div>
        </div>  <!-- WRAPPER -->
    </body>
</html>