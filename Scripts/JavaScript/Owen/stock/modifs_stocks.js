$.ajax({
    url: "../../../Scripts/PhP/Owen/stock/afficher_stock.php",
    type: "POST",
    success: function (data){
        data = JSON.parse(data);
        $.each(data, function (index, stocks) {
            $("#stocks-select").append(
                $("<option></option>").val(stocks["NomIngred"]).text(stocks["NomIngred"])
            );
        });
        $("#fournisseur-select").append(
            $("<option></option>").val(data["NomFourn"]).text(data["NomFourn"])
        );
        $.ajax({
            url: "../../../Scripts/PhP/Owen/fournisseur/afficher_fourn.php",
            type: "POST",
            success: function (data){
                data2 = JSON.parse(data);
                $.each(data2, function (index, fournisseur) {
                    $("#fournisseur-select").append(
                        $("<option></option>").val(fournisseur["NomFourn"]).text(fournisseur["NomFourn"])
                    );
                });
            },
        });

        $("#stocks-select").change(function() {
            var selectedStocks = $(this).val();

            var stocks = data.find(f => f.NomIngred === selectedStocks);

            if (stocks) {
                $("#seuilStock").val(stocks.StockReel);
                $("#prix").val(stocks.PrixUHT_Moyen);
            }
        });
    }, // closing brace and parenthesis for success function

    error: function () {
        alert("Erreur lors de la récupération des stocks.");
    }
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