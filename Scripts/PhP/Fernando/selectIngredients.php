
<?php
//Created by Fernando FERREIRA PIAIA
//Date : 2024-03-15

require_once '../../../BaseDeDonnees/codesConnexion.php';

// Connexion à la base de données


try {
    $connexionPDO = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname='
        . DATABASE . ';port=' . PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}


if (isset($_POST['fournisseurs'])) {
    $fournisseurs = $_POST['fournisseurs'];
$tableauIngredients = array();
try {
    $commandeSQL = "SELECT IdIngred FROM fourn_ingr where NomFourn = '$fournisseurs'";
    $idIngredients = $connexionPDO->query($commandeSQL);
    $idIngredients = $idIngredients->fetchAll(PDO::FETCH_ASSOC);

    foreach ($idIngredients as $id) {
        foreach ($id as $sousId) {
            $tableauIngredients[$sousId] = null;
        }
    }
}catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die();
}

foreach ($tableauIngredients as $id => $ingredient) {
    try {
        $commandeSQL = "SELECT NomIngred FROM ingredient where IdIngred = $id";
        $ingred = $connexionPDO->query($commandeSQL);
        $ingred = $ingred->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($ingred as $ingredien) {
            foreach ($ingredien as $sousingredien) {
                $tableauIngredients[$id] = $sousingredien;
            }
        }
    }catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die();
    }
}
    
var_dump($tableauIngredients);
$data = json_encode($tableauIngredients);
$fileadress = "../../../Scripts/JavaScript/Fernando/ingredientsId.json";
file_put_contents($fileadress, $data);
} else {
    echo "Erreur";
}
