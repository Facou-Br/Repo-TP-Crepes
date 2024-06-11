<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les informations du formulaire
    $nom = $_POST['nom'];
    $tel = $_POST['tel'];
    $adresse = $_POST['adresse'];
    $cp = $_POST['cp'];
    $ville = $_POST['ville'];
    $heure_actuelle = $_POST['heure'];
    $date_actuelle = $_POST['date'];
    $coutLiv = 5.00;
    $total = floatval($_POST['total']);
    $totalTTC = $total + $coutLiv;

    require_once '..\..\..\BaseDeDonnees\codesConnexion.php';
    $pdo = BaseDeDonnees::connecterBDD('admin');

    try {
        $requete1 = "INSERT INTO commande (NomClient, TelClient, AdrClient, CP_Client, VilClient, Date, HeureDispo, TypeEmbal, A_Livrer, EtatCde, EtatLivraison, CoutLiv, TotalTTC, IdLivreur)
                            VALUES ('$nom', '$tel', '$adresse', '$cp', '$ville', '$date_actuelle', '$heure_actuelle', 'Sac', 1, 'Acceptée', 'preparation', $coutLiv, $totalTTC, NULL);";
        $pdo->exec($requete1);

        echo "<br>";
        $requete2 = "SELECT NumCom FROM commande WHERE NomClient = '$nom' AND TelClient = '$tel' AND AdrClient = '$adresse' AND CP_Client = '$cp' AND VilClient = '$ville' AND Date = '$date_actuelle' AND  HeureDispo = '$heure_actuelle' AND TypeEmbal = 'Sac' AND A_Livrer = 1 AND EtatCde = 'Acceptée' AND EtatLivraison = 'preparation' AND CoutLiv = $coutLiv AND TotalTTC = $totalTTC;";
        $result = $pdo->query($requete2);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $numCom = $row['NumCom']; // on recup le num de commande pour le requete TODO MODIF LE CHIFFRE
        echo "numCom : " . $numCom;
        echo "<br>";

        var_dump($_SESSION['cart']);
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $crepe => $quantity) {

                if ($quantity > 0) {
                    $requete3 = "SELECT IdProd FROM produit where NomProd ='$crepe';";
                    $result = $pdo->query($requete3);
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $IdProd = $row['IdProd'] + 1; // on recup le num de la derniere commande pour la requete TODO MODIF LE CHIFFRE
                    echo "IdProd : " . $row['IdProd'];
                    echo "<br>";
                    echo "crepe : " . $crepe;
                    echo "<br>";

                    $requete35 = "SELECT IngBase1, IngBase2, IngBase3, IngBase4 from produit where NomProd = '$crepe';";
                    $result = $pdo->query($requete35);
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $ingBase1 = $row['IngBase1'];
                    $ingBase2 = $row['IngBase2'];
                    $ingBase3 = $row['IngBase3'];
                    $ingBase4 = $row['IngBase4'];
                    $requete4 = "INSERT INTO `detail` (`NomProd`, `IngBase1`, `IngBase2`, `IngBase3`, `IngBase4`, `IngOpt1`, `IngOpt2`, `IngOpt3`, `IngOpt4`, `DateArchiv`, `IdProd`)
                     VALUES ('$crepe', '$ingBase1', '$ingBase2', '$ingBase3', '$ingBase4', NULL, NULL, NULL, NULL, NULL, $IdProd);";

                    $pdo->exec($requete4);
                    echo $requete4;
                    echo "<br>";

                    $requete5 = "SELECT MAX(Num_OF) FROM detail;";
                    $requete5 = "SELECT MAX(Num_OF) AS max_num_of FROM detail;";
                    $result = $pdo->query($requete5);
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $Num_OF = $row['max_num_of']; // 654687
                    echo "Num_OF : " . $Num_OF;
                    echo "<br>";


                    $requete6 = "INSERT INTO com_det (Num_OF, Quant, NumCom) VALUES (:numOF, :quantity, :numCom); ";
                    $stmt = $pdo->prepare($requete6);
                    $stmt->execute(['numOF' => $Num_OF, 'quantity' => $quantity, 'numCom' => $numCom]);

                }
            }

        }

    } catch(PDOException $e) {
        /* header("Location: ../../../HTML-CSS/Html/Commande_Remi/index.html");*/

        die("ERROR: Could not able to execute the query. " . $e->getMessage());

    }}
/*header("Location: ../../../HTML-CSS/Html/Commande_Remi/index.html");*/
