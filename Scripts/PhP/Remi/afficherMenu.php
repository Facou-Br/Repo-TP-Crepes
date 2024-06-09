<?php
// Connexion à la BdD
require_once '../../../BaseDeDonnees/codesConnexion.php';
$connex = BaseDeDonnees::connecterBDD('admin');
echo "<link rel='stylesheet' href='../../style.css'>";
echo "<link rel='stylesheet' href='../../../HTML-CSS/Css/StyleMenu.css'>";

try {
    $rq = "SELECT NomProd, 	PrixUHT, Image, IngBase1, IngBase2, IngBase3, IngBase4, IngBase5, IngOpt1, IngOpt2, IngOpt3, IngOpt4, IngOpt5, IngOpt6 FROM produit";
    $result = $connex->query($rq);

    $counter = 0;
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        if ($counter % 3 == 0) {
            echo "<div class='flex-container'>";
        }
        // on affiche les produits
        echo "<div class='titreContent'>
            <h3>" . $row['NomProd'] . "</h3> 
            <p id='prix'>" . $row['PrixUHT'] . "€</p>
        <p>Ingredients: <ul>";
        for ($i = 1; $i <= 6; $i++) {
            if (!empty($row['IngBase'.$i])) {
                echo "<li>" . $row['IngBase'.$i] . "</li>";
            }
            if (!empty($row['IngOpt'.$i])) {
                echo "<li>" . $row['IngOpt'.$i] . "</li>";
            }
        }
        echo "</ul></p>
                <img src='../../../HTML-CSS/Images/" . $row['Image'] . "' alt='" . $row['NomProd'] . "'>
            
            <div class='input-group'>
                <button type='button' class='decrement'>-</button>
                <input type='number' id='input1' name='crepes[" . $row['NomProd'] . "]' class='input' value='0'>
                <button type='button' class='increment'>+</button>
            </div> <!-- input-group -->
            </div>           
            ";


        $counter++;
        if ($counter % 3 == 0) {
            echo "</div>";
        }
    }

    // si la derniere ligne a moims  de 3 div on en met une vide pour aligner les flexbox
    while ($counter % 3 != 0) {
        echo "<div></div>";
        $counter++;
    }

    // ferme les dif si il en reste ouvert
    if ($counter % 3 != 0) {
        echo "</div>";
    }

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
echo "<script src='../../JavaScript/remi/buttonCtrl.js'></script>";
?>