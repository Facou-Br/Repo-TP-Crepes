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

// Définir le fuseau horaire
date_default_timezone_set('Europe/Paris');

// Créer un nouvel objet DateTime
$heure = new DateTime();

// Créer un intervalle de 20 minutes
$interval = new DateInterval('PT20M');

// Ajouter l'intervalle à $heure
$heure->add($interval);

// Formater $heure pour l'affichage
$heure_livraison = $heure->format('H:i');
    require_once '../../../BaseDeDonnees/codesConnexion.php';
    $pdo = BaseDeDonnees::connecterBDD('admin');
    try {
        //ajout de la commande dans la base de données
        $requete1 = "INSERT INTO commande (NomClient, TelClient, AdrClient, CP_Client, VilClient, Date, HeureDispo, TypeEmbal, A_Livrer, EtatCde, EtatLivraison, CoutLiv, TotalTTC, IdLivreur)
                            VALUES ('$nom', '$tel', '$adresse', '$cp', '$ville', '$date_actuelle', '$heure_actuelle', 'Carton', 1, 'Acceptée', 'preparation', $coutLiv, $totalTTC, NULL);";
        $pdo->exec($requete1); //creation de la commande

        $requete2 = "SELECT NumCom FROM commande WHERE NomClient = '$nom' AND TelClient = '$tel' AND AdrClient = '$adresse' AND CP_Client = '$cp' AND VilClient = '$ville' AND Date = '$date_actuelle' AND  HeureDispo = '$heure_actuelle' AND TypeEmbal = 'Carton' AND A_Livrer = 1 AND EtatCde = 'Acceptée' AND EtatLivraison = 'preparation' AND CoutLiv = $coutLiv AND TotalTTC = $totalTTC;";
        $result = $pdo->query($requete2);       // on recup le num de commande pour le requete 7
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $numCom = $row['NumCom'];


        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $crepe => $quantity) {


                if ($quantity > 0) {
                    $requete3 = "SELECT IdProd FROM produit where NomProd ='$crepe';";
                    $result = $pdo->query($requete3);              // on recup le num de la derniere commande pour la requete 5
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $IdProd = $row['IdProd'];



                    $requete4 = "SELECT IngBase1, IngBase2, IngBase3, IngBase4 from produit where NomProd = '$crepe';";
                    $result = $pdo->query($requete4);       // on recup les ingredients de la crepe
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $ingBase1 = $row['IngBase1'];
                    $ingBase2 = $row['IngBase2'];
                    $ingBase3 = $row['IngBase3'];
                    $ingBase4 = $row['IngBase4'];


                    $requete5 = "INSERT INTO `detail` (`NomProd`, `IngBase1`, `IngBase2`, `IngBase3`, `IngBase4`, `IngOpt1`, `IngOpt2`, `IngOpt3`, `IngOpt4`, `DateArchiv`, `IdProd`)
                     VALUES ('$crepe', '$ingBase1', '$ingBase2', '$ingBase3', '$ingBase4', NULL, NULL, NULL, NULL, NULL, $IdProd);";
                    $pdo->exec($requete5);              //creation de la crepe dans le detqil des commandes



                    $requete6 = "SELECT MAX(Num_OF) AS max_num_of FROM detail;";
                    $result = $pdo->query($requete6);           // on recup le num de la derniere commande (celle de la requete5) pour la requete 7
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $Num_OF = $row['max_num_of'];


                    $requete7 = "INSERT INTO com_det (Num_OF, Quant, NumCom) VALUES ($Num_OF, $quantity, $numCom); ";
                    $pdo->exec($requete7);              // associer la crepe a la commande
                }
            }
        }
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
        echo "<script>alert('Transaction annulée, veuillez réessayer.'); window.location.href='../../../HTML-CSS/Html/Commande_Remi/index.php';</script>";
        exit();
    }

    $message = "Cher/Chère $nom, vous avez commandé des crepes, Elles vous serons livrées dans une boite isotherme à l'adresse suivante : $adresse vers $heure_livraison.";
    $message = addslashes($message);
    echo "<script>alert('$message'); window.location.href='../../../HTML-CSS/Html/Commande_Remi/index.php';</script>";
    exit();
}
