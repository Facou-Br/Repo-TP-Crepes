$(document).ready(function(){
    // Attache une fonction de clic au bouton avec l'ID 'supprimer'
    $('#supprimer').click(function(e){
        // Empêche le comportement par défaut du bouton (soumission du formulaire)
        e.preventDefault();

        // Récupère la valeur de l'ingrédient sélectionné
        let nomIngred = $('#stocks-select').val();

        // Effectue une requête AJAX pour supprimer l'ingrédient
        $.ajax({
            type: 'POST',
            url: '../../../Scripts/PHP/Owen/stock/supprimer_stock.php',
            data: {
                nomIngred: nomIngred
            },
            success: function(response){
                alert(response);
            },
            fail: function () {
                alert("Erreur");
            }
        });
    });
});
