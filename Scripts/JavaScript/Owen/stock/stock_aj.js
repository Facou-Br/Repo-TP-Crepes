$(document).ready(function(){
    $('#Ajouter').click(function(e){
        e.preventDefault();
        var nomIngred = $('#nomIngred').val();
        var seuilStock = $('#seuilStock').val();
        var prix = $('#prix').val();
        var nomFourn = $('#fournisseur-select').val();

        $.ajax({
            type: 'POST',
            url: '../../../Scripts/PHP/Owen/stock/ajouter_stock.php',
            data: {
                nomFourn: nomFourn,
                adresse: adresse,
                codePostal: codePostal,
                ville: ville,
                telephone: telephone
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