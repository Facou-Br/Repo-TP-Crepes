$.ajax({
    url: "../../../PhP/Owen/fournisseur/afficher_fournisseur.php",
    type: "POST",
    success: function (data) {
        alert(data);
        data = JSON.parse(data);
        $.each(data, function (index, fournisseur) {
            $("#fournisseur-select").append(
                $("<option></option>").val(fournisseur["NomFourn"]).text(fournisseur["NomFourn"])
            );
        });
    }, // closing brace and parenthesis for success function

    error: function () {
        alert("Erreur lors de la récupération des fournisseurs.");
    }
});


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
                nomIngred: nomIngred,
                seuilStock: seuilStock,
                prix: prix
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