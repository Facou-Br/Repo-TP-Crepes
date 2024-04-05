<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestion des fournisseurs</title>
        <link rel="stylesheet" href="../../style.css">
        <link rel="stylesheet" href="../../Css/Style_gestionFourn.css">
    </head>
    <body class="gestionFourn">
        <div class="wrapper">
        <header>
            <h1>Gestion des Fournisseurs</h1>
            <nav>
                <a href="gestions_stocks.html">Gestion des stocks</a>
            </nav>
        </header>

            <div id="resultat">
                <table>
                    <tr>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Ville</th>
                        <th>Code Postal</th>
                        <th>Téléphone</th>
                    </tr>
                    <tr>
                        <?php

                        require_once '../../../BaseDeDonnees/codesConnexion.php';
                        try {
                            $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE.';port='.PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                        }
                        catch (PDOException $e) {
                            echo 'Erreur : ' . $e->getMessage() . '<br />';
                            echo 'N° : ' . $e->getCode();
                            die();
                        }
                        try{
                            $connex->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
                            $requete1 = 'SELECT NomFourn, Adresse, CodePostal, Ville, Tel FROM `fournisseur`;';
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
                            echo "<td value='".$row['Ville']."'>".$row['Ville']."</td>";
                            echo "<td value='".$row['CodePostal']."'>".$row['CodePostal']."</td>";
                            echo "<td value='".$row['Tel']."'>".$row['Tel']."</td>";
                            echo "<td><button><a href='../../../Scripts/Php/Owen/ajouter_fourn.php'>Modifier</a></button></td>";
                            echo "</tr>";
                        }

                        ?>
                    </tr>
                </table>
            </div>
        </div>
        <div id="bas">
            <a href="#"><button id="rapport" class="bouton">Rapport</button></a>
            <a href="#"></a><button id="supprimer" class="bouton">Supprimer</button>
        </div>
        <footer>
            <p>Interface de stockage</p>
        </footer>
    </div>
    </body>
</html>