$(document).ready(function(){
    $('#supprimer').click(function(e){
        e.preventDefault();
        var nomFourn = $('#fournisseur-select').val();

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