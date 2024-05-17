$.ajax({
    url: "../../../Scripts/PhP/Owen/stock/afficher_stock.php",
    type: "POST",
    success: function (data) {
        $.getJSON("../../../Scripts/JavaScript/Owen/stocks.json", function (data) {
            $.each(data, function (index, fournisseur) {
                $("#stocks-select").append(
                    $("<option></option>").val(stocks["NomIngred"]).text(stocks["NomIngred"])
                );
            });
        });
    }, // closing brace and parenthesis for success function

    error: function () {
        alert("Erreur lors de la récupération des stocks.");
    }
});
$("#stocks-select").change(function() {
    var selectedStocks = $(this).val();

    $.getJSON("../../../Scripts/JavaScript/Owen/stocks.json", function(data) {
        var stocks = data.find(f => f.NomIngred === selectedStocks);

        if (stocks) {
            $("#nom").val(fournisseur.NomFourn);
            $("#adresse").val(fournisseur.Adresse);
            $("#ville").val(fournisseur.Ville);
            $("#codePostal").val(fournisseur.CodePostal);
            $("#telephone").val(fournisseur.Tel);
        }
    });
});

$(document).ready(function(){
    $('#modifier').click(function(e){
        e.preventDefault();
        var nomFourn = $('#fournisseur-select').val();
        var adresse = $('#adresse').val();
        var codePostal = $('#codePostal').val();
        var ville = $('#ville').val();
        var telephone = $('#telephone').val();

        $.ajax({
            type: 'POST',
            url: '../../../Scripts/PHP/Owen/fournisseur/modifier_fourn.php',
            data: {
                nomFourn: nomFourn,
                adresse: adresse,
                codePostal: codePostal,
                ville: ville,
                telephone: telephone
            },
            success: function(response){
                alert("Fournisseur modifié avec succès"); //Popup au lieu d'alerte
                $("#resultat").append(response);
                var fournisseur = data.find(f => f.NomFourn === selectedFournisseur);

                if (fournisseur) {
                    $("#nom").val("");
                    $("#adresse").val("");
                    $("#ville").val("");
                    $("#codePostal").val("");
                    $("#tel").val("");
                }
            },
            fail: function () {
                alert("Erreur");
            }
        });
    });
});