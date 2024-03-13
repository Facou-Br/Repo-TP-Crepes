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
                <div class="recherche"><input id="stockMax" placeholder="Stock maximum"/></div>
                <button id="rechercher">Rechercher</button>
            </div>
            <br>
            <div id="resultat">
                <table align="center">
                    <div id="stocks">
                    <tr>
                        <th>Nom Ingrédient</th>
                        <th>Fournisseur</th>
                        <th>Seuil Stock</th>
                        <th>Stock Min</th>
                        <th>Stock Réel</th>
                        <th>Prix UHT</th>
                    </tr>
                    <?php

                    require_once '../../../BaseDeDonnees/connexion_gerant.php';
                    try {
                        $connex = new PDO('mysql:host=' . $host . ';charset=utf8;dbname=' . $bdd.';port='.$port, $user, $pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                    }
                    catch (PDOException $e) {
                        echo 'Erreur : ' . $e->getMessage() . '<br />';
                        echo 'N° : ' . $e->getCode();
                        die();
                    }
                    try{
                        $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
                        $sql = "SELECT F.NomFourn, I.NomIngred FROM INGREDIENT I JOIN fourn_ingr FI ON I.IdIngred=FI.IdIngred JOIN fournisseur F ON FI.NomFourn=F.NomFourn;";
                        $ligne = $connex->query($sql);
                    }
                    catch (PDOException $e) {
                        echo 'Erreur : ' . $e->getMessage() . '<br />';
                        echo 'N° : ' . $e->getCode();
                        die();
                    }

                    foreach($ligne as $row) {
                        echo "<tr>";
                        echo "<td value=".$row['NomIngred'].">".$row['NomIngred']."</td>";
                        echo "<td></td>";
                        echo "<td value='".$row['SeuilStock']."'>".$row['SeuilStock']."</td>";
                        echo "<td value='".$row['StockMin']."'>".$row['StockMin']."</td>";
                        echo "<td value='".$row['StockReel']."'>".$row['StockReel']."</td>";
                        echo "<td value='".$row['PrixUHT_Moyen']."'>".$row['PrixUHT_Moyen']."</td>";
                        echo "<td><button><a href='../../../Scripts/Php/ajouter_stock.php'>Modifier</a></button></td>";
                        echo "</tr>";
                    }

                    ?>
                    </div>
                </table>
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