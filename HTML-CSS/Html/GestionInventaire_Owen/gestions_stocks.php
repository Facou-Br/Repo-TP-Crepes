<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Interface de stockage</title>
        <link rel="stylesheet" href="../../style.css">
        <meta charset="utf-8">
        <style>
            a {
                color: white;
                text-decoration: none;
            }
            .recherche, #bas{
                height: fit-content;
                width: fit-content;
                float: left;
                padding: 0 10px;
            }
            #rechercher {
                margin: 0 10px;
            }
            #resultat {
                margin: 0 10px;
            }
            footer{
                color: white;
                text-align: center;
                position: absolute;
                bottom: 0;
                left: 0; 
                right: 0;

            }
            table{
                align-items: center;
                border-collapse : separate;
                border-spacing : 15px;
            }
            #stocks{
                color: #333333;
                border-color: #333333;
            }
            td{
                text-align: center;

            }
        </style>
    </head>
    <body>
        <div id="page" class="wrapper">
            <header>
                <h1>Interface de stockage</h1>
                <nav>
                    <a href="gestion_fournisseurs.php">Fournisseurs</a>
                </nav>
            </header>
            <br>
            <div id="rechercher">
                <div class="recherche"><input id="id" placeholder="ID"/></div>
                <div class="recherche"><input id="nom" placeholder="Nom"/></div>
                <div class="recherche"><input id="unite" placeholder="Nombre d'unité"/></div>
                <div class="recherche"><input id="stockMin" placeholder="Stock minimum"/></div>
                <div class="recherchton id="rechercher"><button>Rechercher</button></div>
            </div>
            <br>
            <div id="resultat">
                <table>
                    <div id="stocks">
                        <tr>
                            <th>Nom Ingrédient</th>
                            <th>Fournisseur</th>
                            <th>Seuil Stock</th>
                            <th>Stock Min</th>
                            <th>Stock Réel</th>
                            <th>Prix UHT</th>e"><input id="stockMax" placeholder="Stock maximum"/>

                    </tr>
                        <div action="../../../Scripts/PhP/Owen/stock/afficher_stock.php" class="aff_stock"></div>
                    </div>
                </table>
                <script src="../../../Scripts/JavaScript/Owen/stocks_aff.js"></script>
            </div>
            <br>
            <div id="bas">
                <p>Inventaire en date du : </p>
                <input placeholder="Date"/>
                <a href="#"><button id="rapport" class="bouton">Rapport</button></a>
            </div>
            <br><br>
            <footer>
                <p>Interface de stockage</p>
            </footer>
        </div>
    </body>
</html>