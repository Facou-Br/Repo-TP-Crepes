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
    $sql = "SELECT I.NomIngred, F.NomFourn, I.SeuilStock, I.StockMin, I.StockReel, I.PrixUHT_Moyen FROM INGREDIENT I JOIN fourn_ingr FI ON I.IdIngred=FI.IdIngred JOIN fournisseur F ON FI.NomFourn=F.NomFourn;";
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
    echo "<td value=".$row['NomFourn'].">".$row['NomFourn']."</td>";
    echo "<td value='".$row['SeuilStock']."'>".$row['SeuilStock']."</td>";
    echo "<td value='".$row['StockMin']."'>".$row['StockMin']."</td>";
    echo "<td value='".$row['StockReel']."'>".$row['StockReel']."</td>";
    echo "<td value='".$row['PrixUHT_Moyen']."'>".$row['PrixUHT_Moyen']."</td>";
    echo "<td><button type='button' class='modif_stock'>'>Modifier</button></td>";
    echo "</tr>";
}

?>
