$.ajax({
    url: "../../../Scripts/PhP/Owen/fournisseur/afficher_fourn.php",
    type: "POST",
    success: function (data) {
        data = JSON.parse(data);
        console.log(data);
        $.each(data, function (index, fourn) {
                $("#fournisseur-select").append(
                    $("<option></option>").val(fourn["NomFourn"]).text(fourn["NomFourn"])
                );
            }
        );
    }
});

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
        $("#stocks-select").change(function() {
            var selectedStocks = $(this).val();
            var stocks = data.find(f => f.NomIngred === selectedStocks);

            if (stocks) {
                $("#stockReel").val(stocks.StockReel);
                $("#prix").val(stocks.PrixUHT);
                $("#fournisseur-select").val(stocks["NomFourn"]);


            }
        });
         // closing brace and parenthesis for success function;
    }, // closing brace and parenthesis for success function

    error: function () {
        alert("Erreur lors de la récupération des stocks.");
    }
});




$(document).ready(function(){
    $('#modifier').click(function(e){
        e.preventDefault();
        var nomIngred = $('#stocks-select').val();
        var nomFourn = $('#fournisseur-select').val();
        var StockReel = $('#stockReel').val();
        var prix = $('#prix').val();

        $.ajax({
            type: 'POST',
            url: '../../../Scripts/PHP/Owen/stock/modifier_stock.php',
            data: {
                nomIngred : nomIngred,
                nomFourn: nomFourn,
                StockReel: StockReel,
                prix: prix
            },
            success: function(response){
                alert("Ingrédient modifié avec succès"); //Popup au lieu d'alerte
                $("#resultat").append(response);
                var ingredient = data.find(i => i.nom === selectedIngredient);

                if (ingredient) {
                    $("#quantite").val("");
                    $("#unite").val("");

                }
            },
            fail: function () {
                alert("Erreur");
            }
        });
    });
});