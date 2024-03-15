$("select.fournisseurs").change(function() {
    $("form.formulaireIngredients").empty();
    $("form.formulaireIngredients").append("<label for='ingredient'>Ingrédient 1 : </label>"); 
    $("form.formulaireIngredients").append("<input type='text' name='ingredient' placeholder='Ingrédient'>");
    $("form.formulaireIngredients").append("<input type='submit' value='Mettre à jour'>");
});
