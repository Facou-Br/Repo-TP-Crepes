<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styleBonDeCommande.css">
        <title>Bon de commande</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div>
            <form action="generationPDF.php" metxzhod="post">
                <label for="fournisseur">Fournisseur :</label>
                <select id="fournisseur" name="fournisseur" required>
                    <?php
                        require_once '../../../BaseDeDonnees/codesConnexion.php';

                        try {
                            $connex = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                        } catch (Exception $e) {
                            echo 'Erreur : ' . $e->getMessage() . '<br/>';
                            echo 'N° : ' . $e->getCode();
                            die();
                        }

                        $rq = "SELECT NomFourn FROM FOURNISSEUR ORDER BY NomFourn ASC";
                        $resultat = $connex->query($rq);

                        while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$ligne['NomFourn']}'>{$ligne['NomFourn']}</option>";
                        }
                    ?>
                </select>

                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>

                <label for="date">Date de livraison :</label>
                <input type="date" id="date" name="date" required>

                <label for="ingredients">Ingrédients :</label>
                <select id="ingredients" name="ingredients" required>
                    <!-- Affichage des ingrédients -->
                </select>

                <label for="quantite">Quantité :</label>
                <input type="number" id="quantite" name="quantite" min="1">

                <input type="submit" value="Envoyer">
            </form>
        </div>

        <script>
            $(document).ready(function() {
                $('#fournisseur').on('change', function() {
                    var fournisseur = $(this).val();

                    $.ajax({
                        type: "POST",
                        url: "chargerIngredients.php",
                        data: JSON.stringify({ fournisseur: fournisseur }),
                        contentType: "application/json",
                        success: function(response) {
                            var ingredientsSelect = $('#ingredients');
                            ingredientsSelect.empty();

                            var ingredients = JSON.parse(response);
                            ingredients.forEach(function(ingredient) {
                                var option = $('<option></option>').attr('value', ingredient.NomIngred).text(ingredient.NomIngred);
                                ingredientsSelect.append(option);
                            });
                        },
                        error: function(error) {
                            console.error("Erreur : ", error);
                        }
                    });
                });
            });
        </script>
    </body>
</html>
