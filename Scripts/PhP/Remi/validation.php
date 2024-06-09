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
    echo "$total <br>";
    echo "$totalTTC <br>";
    require_once '..\..\..\BaseDeDonnees\codesConnexion.php';
    $pdo = BaseDeDonnees::connecterBDD('admin');

try {
    $requete1 = "INSERT INTO commande (NomClient, TelClient, AdrClient, CP_Client, VilClient, Date, HeureDispo, TypeEmbal, A_Livrer, EtatCde, EtatLivraison, CoutLiv, TotalTTC, IdLivreur)
                            VALUES ('$nom', '$tel', '$adresse', '$cp', '$ville', '$date_actuelle', '$heure_actuelle', 'Sac', 1, 'Acceptée', 'preparation', $coutLiv, $totalTTC, NULL);";
    $pdo->exec($requete1);
    echo "requete1 inserted successfully.";

    echo "<br>";
    $requete2 = "SELECT NumCom FROM commande WHERE NomClient = '$nom' AND TelClient = '$tel' AND AdrClient = '$adresse' AND CP_Client = '$cp' AND VilClient = '$ville' AND Date = '$date_actuelle' AND  HeureDispo = '$heure_actuelle' AND TypeEmbal = 'Sac' AND A_Livrer = 1 AND EtatCde = 'Acceptée' AND EtatLivraison = 'preparation' AND CoutLiv = $coutLiv AND TotalTTC = $totalTTC;";
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

    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $crepe => $quantity) {
        $requete4 = "INSERT INTO `detail` (`NomProd`, `IngBase1`, `IngBase2`, `IngBase3`, `IngBase4`, `IngOpt1`, `IngOpt2`, `IngOpt3`, `IngOpt4`, `DateArchiv`, `IdProd`)
                     VALUES ('$crepe', 'Base6661', 'Base2', 'Base3', 'Base4', 'Option1', 'Option2', 'Option3', 'Option4', $date_actuelle, $IdProd);";

        echo "$requete4";
        $pdo->exec($requete4);
        echo "Records inserted successfully for $crepe.";
        echo "<br>";

        $requete5 = "SELECT Num_OF FROM detail WHERE NomProd = :crepe AND IngBase1 = 'Base6661' AND IngBase2 = 'Base2' AND IngBase3 = 'Base3' AND IngBase4 = 'Base4' AND IngOpt1 = 'Option1' AND IngOpt2 = 'Option2' AND IngOpt3 = 'Option3' AND IngOpt4 = 'Option4' AND DateArchiv = :dateArchiv AND IdProd = :idProd;";
        $stmt = $pdo->prepare($requete5);
        $stmt->execute(['crepe' => $crepe, 'dateArchiv' => date('Y-m-d'), 'idProd' => $IdProd]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $Num_OF = $row['Num_OF']; // 654687
        echo $Num_OF;
        echo "<br>";

        $requete6 = "INSERT INTO com_det (Num_OF, Quant, NumCom) VALUES (:numOF, :quantity, :numCom); ";
        $stmt = $pdo->prepare($requete6);
        $stmt->execute(['numOF' => $Num_OF, 'quantity' => $quantity, 'numCom' => $numCom]);
        echo "Records inserted successfully3.";
    }
}



} catch(PDOException $e) {
    die("ERROR: Could not able to execute the query. " . $e->getMessage());
}}