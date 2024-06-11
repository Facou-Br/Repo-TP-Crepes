$(document).ready(function(){
    // Attache une fonction de clic au bouton avec l'ID 'supprimer'
    $('#supprimer').click(function(e){
        // Empêche le comportement par défaut du bouton (soumission du formulaire)
        e.preventDefault();

        // Récupère la valeur du fournisseur sélectionné
        let nomFourn = $('#fournisseur-select').val();

        $.ajax({
            type: 'POST',
            url: '../../../Scripts/PHP/Owen/fournisseur/supprimer_fourn.php',
            data: {
                nomFourn: nomFourn
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
