
<?php
// Connexion à la base de données
require_once '../../../../BaseDeDonnees/codesConnexion.php';
$connexionPDO = BaseDeDonnees::connecterBDD('admin');
// Fin connexion

if (isset($_GET['fournisseurs'])) {
    $fournisseurs = $_GET['fournisseurs'];
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
    } catch (Exception $e) {
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
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br />';
            echo 'N° : ' . $e->getCode();
            die();
        }
    }
    $data = json_encode($tableauIngredients);
    echo $data;
} else {
    echo "Erreur";
}
