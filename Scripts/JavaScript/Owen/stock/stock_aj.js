$.ajax({
    url: "../../../Scripts/PHP/Owen/fournisseur/afficher_fourn.php",
    type: "POST",
    success: function (data) {
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
        var stockReel = $('#stockReel').val();
        var prixUHTMoyen = $('#prixUHTMoyen').val();
        var nomFourn = $('#fournisseur-select').val();
        var categorie = $('#categorie-select').val();
        $.ajax({
            type: 'POST',
            url: '../../../Scripts/PHP/Owen/stock/ajouter_stock.php',
            data: {
                nomFourn: nomFourn,
                nomIngred: nomIngred,
                stockReel: stockReel,
                prixUHTMoyen: prixUHTMoyen,
                categorie: categorie
            },
            success: function(response){
                console.log("response");
                alert(response);
                },
            fail: function () {
                console.log("fail");
                alert("Erreur");
            }
        });
    });
});