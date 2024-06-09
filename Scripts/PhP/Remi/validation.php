<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les informations du formulaire
    $nom = $_POST['nom'];
    $tel = $_POST['tel'];
    $adresse = $_POST['adresse'];
    $cp = $_POST['cp'];
    $ville = $_POST['ville'];}

$date_actuelle = date("Y-m-d");
$heure_actuelle = date("H:i:s"); // HH:MM:SS

require_once '..\..\..\BaseDeDonnees\codesConnexion.php';
$pdo = BaseDeDonnees::connecterBDD('admin');

try {
    $requete1 = "INSERT INTO commande (NomClient, TelClient, AdrClient, CP_Client, VilClient, Date, HeureDispo, TypeEmbal, A_Livrer, EtatCde, EtatLivraison, CoutLiv, TotalTTC, IdLivreur)
                            VALUES ('$nom', '$tel', '$adresse', '$cp', '$ville', '$date_actuelle', '$heure_actuelle', 'Sac', 1, 'Acceptée', 'preparation', 5.00, 25.00, 1);";
    $pdo->exec($requete1);
    echo "Records inserted successfully.";
    echo "<br>";
    $requete2 = "SELECT NumCom FROM commande WHERE NomClient = 'aylay00000000000aya' AND TelClient = '0123456789' AND AdrClient = 'Adresse Client' AND CP_Client = '75001' AND VilClient = 'Paris' AND   Date = '2024-06-08' AND  HeureDispo = '13:00:00' AND TypeEmbal = 'C' AND A_Livrer = 1 AND EtatCde = 'Acceptée' AND EtatLivraison = 'preparation' AND CoutLiv = 5.00 AND TotalTTC = 25.00 AND IdLivreur = 1;";
    $result = $pdo->query($requete2);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $numCom = $row['NumCom']; // on recup le num de commande pour le requete 6
    echo $numCom;
    echo "<br>";


    $requete3 = "SELECT MAX(IdProd) FROM detail;";
    $result = $pdo->query($requete3);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $IdProd = $row['MAX(IdProd)']+1; // on recup le num de la derniere commande pour la requete 4
    echo $IdProd;
    echo "<br>";



    $requete4 = "INSERT INTO `detail` (`NomProd`, `IngBase1`, `IngBase2`, `IngBase3`, `IngBase4`, `IngOpt1`, `IngOpt2`, `IngOpt3`, `IngOpt4`, `DateArchiv`, `IdProd`)
                            VALUES ('ProduitExemple', 'Base1', 'Base2', 'Base3', 'Base4', 'Option1', 'Option2', 'Option3', 'Option4', '2024-06-08', $IdProd);";
    $pdo->exec($requete4);
    echo "Records inserted successfully2.";
    echo "<br>";

  $requete5 = "SELECT Num_OF FROM detail WHERE NomProd = 'ProduitExemple' AND IngBase1 = 'Base1' AND IngBase2 = 'Base2' AND IngBase3 = 'Base3' AND IngBase4 = 'Base4' AND IngOpt1 = 'Option1' AND IngOpt2 = 'Option2' AND IngOpt3 = 'Option3' AND IngOpt4 = 'Option4' AND DateArchiv = '2024-06-08' AND IdProd = $IdProd;";
    $result = $pdo->query($requete5);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $Num_OF = $row['Num_OF']; // 654687
    echo $Num_OF;
    echo "<br>";

    $requete6 = "INSERT INTO com_det (Num_OF, Quant, NumCom) VALUES ($Num_OF, 2, $numCom); ";
    $pdo->exec($requete6);
    echo "Records inserted successfully3.";




} catch(PDOException $e) {
    die("ERROR: Could not able to execute the query. " . $e->getMessage());
}