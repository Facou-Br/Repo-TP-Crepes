<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Interface de stockage</title>
        <link rel="stylesheet" href="../../style.css">
        <meta charset="utf-8">
        <style>
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
                <div class="recherche"><input id="stockMax" placeholder="Stock maximum"/></div>
                <button id="rechercher">Rechercher</button>
            </div>
            <br>
            <div id="resultat">
                <table>
                    <tr>
                        <th>Id_Ingrédient</th>
                        <th>Nom Ingrédient</th>
                        <th>Nombre d'Unité</th>
                        <th>Stock Min</th>
                        <th>Stock Max</th>
                        <th>Prix UHT</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Tomate</td>
                        <td>50</td>
                        <td>10</td>
                        <td>32</td>
                        <td>0.6€</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Carotte</td>
                        <td>30</td>
                        <td>5</td>
                        <td>20</td>
                        <td>0.5€</td>
                    </tr>
                </table>
            </div>
            <br>
            <div id="bas">
                <p>Inventaire en date du : </p>
                <input placeholder="Date"/>
                <a href="#"><button id="rapport" class="bouton">Rapport</button></a>
                <a href="#"><button id="ajouter" class="bouton">Ajouter</button></a>
                <a href="#"><button id="modifier" class="bouton">Modifier</button></a>
            </div>
            <br><br>
            <footer>
                <p>Interface de stockage</p>
            </footer>
        </div>
    </body>
</html>