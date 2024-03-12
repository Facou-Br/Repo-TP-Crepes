<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestion des fournisseurs</title>
        <link rel="stylesheet" href="../../style.css">
        <style>
            a {
                color: white;
                text-decoration: none;
            }
            footer{
                position: fixed;
                bottom:0
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
        <header>
            <h1>Gestion des Fournisseurs</h1>
            <nav>
                <a href="gestions_stocks.php">Gestion des stocks</a>
            </nav>
        </header>
            <div id="rechercher">
                <div class="recherche"><input id="nom" placeholder="Nom"></input></div>
                <button id="rechercher">Rechercher</button>
            </div>
            <div id="resultat">
                <h2>Gestion des fournisseurs</h2>
                <table>
                    <tr>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                    </tr>
                    <tr>
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
                            $requete1 = 'SELECT NomFourn, Adresse, CodePostal, Ville FROM `fournisseur`;';
                            $ligne = $connex->query($requete1);
                        }
                        catch (PDOException $e) {
                            echo 'Erreur : ' . $e->getMessage() . '<br />';
                            echo 'N° : ' . $e->getCode();
                            die();
                        }

                        foreach($ligne as $row) {
                            echo "<tr>";
                            echo "<td value='".$row['NomFourn']."'>".$row['NomFourn']."</td>";
                            echo "<td value='".$row['Adresse']."'>".$row['Adresse']."</td>";
                            echo "<td value='".$row['CodePostal']."'>".$row['CodePostal']."</td>";
                            echo "<td value='".$row['Ville']."'>".$row['Ville']."</td>";
                            echo "<td><button><a href='../../../Scripts/Php/ajouter_fourn.php'>Modifier</a></button></td>";
                            echo "</tr>";
                        }

                        ?>
                    </tr>
                </table>
            </div>
        </div>
        <div id="bas">
            <a href="#"><button id="rapport" class="bouton">Rapport</button></a>
            <a href="#"><button id="ajouter" class="bouton">Ajouter</button></a>
            <a href="#"></a><button id="modifier" class="bouton">Modifier</button>
            <a href="#"></a><button id="supprimer" class="bouton">Supprimer</button>
        </div>
        <footer>
            <p>Interface de stockage</p>
        </footer>
    </div>
    </body>
</html>