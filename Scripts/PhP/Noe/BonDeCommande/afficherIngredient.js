$(document).ready(function () {
    var maxIngredients = 10;    // Nombre maximum d'ingrédients qu'on peut choisir

    function chargerIngredients(selectElement, fournisseur) {
        // Charge et affiche les ingredients de façon dynamique, quand un fournisseur est sélectionné
        $.ajax({
            type: "POST",
            url: "chargerIngredients.php",
            data: JSON.stringify({ fournisseur: fournisseur }),
            contentType: "application/json",
            success: function (response) {
                var ingredients = JSON.parse(response);
                selectElement.empty();
                selectElement.append('<option value="" disabled selected>Choisir un ingrédient</option>');
                ingredients.forEach(function (ingredient) {
                    var option = $('<option></option>').attr('value', ingredient.NomIngred).text(ingredient.NomIngred);
                    selectElement.append(option);
                });
                mettreAJourOptionsIngredients();
            },
            error: function (error) {
                console.error("Erreur : ", error);
            }
        });
    }

    function mettreAJourOptionsIngredients() {
        var ingredientsSelectionnes = [];   // On stock les ingrédients sélectionnés
        $('.ingredients').each(function () {
            var valeurSelectionnee = $(this).val(); // On récupère la valeur sélectionnée
            if (valeurSelectionnee) {
                ingredientsSelectionnes.push(valeurSelectionnee);   // On ajoute l'ingrédients au tableau si pas déjà fait
            }
        });

        $('.ingredients').each(function () {
            var selectActuel = $(this);
            selectActuel.find('option').each(function () {
                // On cache les options qui sont déjà sélectionnées
                if (ingredientsSelectionnes.includes($(this).attr('value')) && $(this).attr('value') !== selectActuel.val()) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    }

    // Si le fournisseur change, alors on recharge les ingrédients
    $('#fournisseur').on('change', function () {
        var fournisseur = $(this).val();    // On récupère le fournisseur
        $('.ingredients').each(function () {
            chargerIngredients($(this), fournisseur);   // On recharge et affiche les ingrédients en conséquent
        });
    });

    // Si un ingrédient change, alors on regarde s'il est pas déjà sélectionné
    $(document).on('change', '.ingredients', function () {
        mettreAJourOptionsIngredients();
    });

    // Ajout d'un ingrédient
    $(document).on('click', '.btn-ajouter-ingredient', function () {
        if ($('.ingredient').length < maxIngredients) { // On regarde si on atteint le nombre maximum d'ingrédients
            // On clone le groupe, puis on ajoute le select, l'input et le bouton supprimer pour le nouveau ingrédient
            var nouveauGroupeIngredient = $('.ingredient:first').clone();
            nouveauGroupeIngredient.find('select').empty();
            nouveauGroupeIngredient.find('input').val('');
            nouveauGroupeIngredient.find('.btn-ajouter-ingredient').remove();
            nouveauGroupeIngredient.append('<button type="button" class="btn-supprimer-ingredient">-</button>');
            $('#ingredients').append(nouveauGroupeIngredient);

            var fournisseur = $('#fournisseur').val();  // On récupère le fournisseur
            chargerIngredients(nouveauGroupeIngredient.find('select'), fournisseur);    // Puis on recharge les ingrédients
        }
    });

    // Suppression d'un ingrédient
    $(document).on('click', '.btn-supprimer-ingredient', function () {
        $(this).closest('.ingredient').remove();    // On supprime l'ingrédient en question
        mettreAJourOptionsIngredients();    // On met à jour les ingrédients
    });
});
