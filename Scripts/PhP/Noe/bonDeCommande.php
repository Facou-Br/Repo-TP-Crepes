<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styleBonDeCommande.css">
        <title>Bon de commande</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <form action="generationPDF.php" method="post" target="_blank">
                <div class="groupe-formulaire">
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
                </div>

                <div class="groupe-formulaire">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required>
                </div>

                <div class="groupe-formulaire">
                    <label for="date">Date de livraison :</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div id="conteneur-ingredients">
                    <div class="groupe-formulaire ingredient">
                        <label for="ingredients">Ingrédient</label>
                        <select class="ingredients" name="ingredients[]" required>
                            <!-- Affichage des ingrédients -->
                        </select>
                        <label for="quantite">Quantité</label>
                        <input type="number" class="quantite" name="quantite[]" min="1" required>
                        <button type="button" class="btn-ajouter-ingredient">+</button>
                    </div>
                </div>

                <input type="submit" value="Envoyer">
            </form>
        </div>

        <!-- Affichage dynamique des ingrédients -->
        <script>
            $(document).ready(function() {
                var maxIngredients = 10;

                function chargerIngredients(selectElement, fournisseur) {
                    $.ajax({
                        type: "POST",
                        url: "chargerIngredients.php",
                        data: JSON.stringify({ fournisseur: fournisseur }),
                        contentType: "application/json",
                        success: function(response) {
                            var ingredients = JSON.parse(response);
                            selectElement.empty();
                            ingredients.forEach(function(ingredient) {
                                var option = $('<option></option>').attr('value', ingredient.NomIngred).text(ingredient.NomIngred);
                                selectElement.append(option);
                            });
                            mettreAJourOptionsIngredients();
                        },
                        error: function(error) {
                            console.error("Erreur : ", error);
                        }
                    });
                }

                function mettreAJourOptionsIngredients() {
                    var ingredientsSelectionnes = [];
                    $('.ingredients').each(function() {
                        var valeurSelectionnee = $(this).val();
                        if (valeurSelectionnee) {
                            ingredientsSelectionnes.push(valeurSelectionnee);
                        }
                    });

                    $('.ingredients').each(function() {
                        var selectActuel = $(this);
                        selectActuel.find('option').each(function() {
                            if (ingredientsSelectionnes.includes($(this).attr('value')) && $(this).attr('value') !== selectActuel.val()) {
                                $(this).hide();
                            } else {
                                $(this).show();
                            }
                        });
                    });
                }

                $('#fournisseur').on('change', function() {
                    var fournisseur = $(this).val();
                    $('.ingredients').each(function() {
                        chargerIngredients($(this), fournisseur);
                    });
                });

                $(document).on('change', '.ingredients', function() {
                    mettreAJourOptionsIngredients();
                });

                $(document).on('click', '.btn-ajouter-ingredient', function() {
                    if ($('.ingredient').length < maxIngredients) {
                        var nouveauGroupeIngredient = $('.ingredient:first').clone();
                        nouveauGroupeIngredient.find('select').empty();
                        nouveauGroupeIngredient.find('input').val('');
                        nouveauGroupeIngredient.find('.btn-ajouter-ingredient').remove();
                        nouveauGroupeIngredient.append('<button type="button" class="btn-supprimer-ingredient">-</button>');
                        $('#conteneur-ingredients').append(nouveauGroupeIngredient);
                        var fournisseur = $('#fournisseur').val();
                        chargerIngredients(nouveauGroupeIngredient.find('select'), fournisseur);
                    }
                });

                $(document).on('click', '.btn-supprimer-ingredient', function() {
                    $(this).closest('.ingredient').remove();
                    mettreAJourOptionsIngredients();
                });
            });
        </script>
    </body>
</html>
