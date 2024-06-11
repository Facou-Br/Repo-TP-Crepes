// Requête AJAX pour récupérer les fournisseurs
$.ajax({
    url: "../../../Scripts/PhP/Owen/fournisseur/afficher_fourn.php",
    type: "POST",
    success: function (data) {
        // Analyse les données JSON reçues
        data = JSON.parse(data);
        // Parcourt chaque élément des données
        $.each(data, function (index, fourn) {
            // Ajoute une option dans le select avec le nom des fournisseurs
            $("#fournisseur-select").append(
                $("<option></option>").val(fourn["NomFourn"]).text(fourn["NomFourn"])
            );
        });
    }
});

// Requête AJAX pour récupérer les stocks
$.ajax({
    url: "../../../Scripts/PhP/Owen/stock/afficher_stock.php",
    type: "POST",
    success: function (data){
        // Analyse les données JSON reçues
        data = JSON.parse(data);
        // Parcourt chaque élément des données
        $.each(data, function (index, stocks) {
            // Ajoute une option dans le select avec le nom des stocks
            $("#stocks-select").append(
                $("<option></option>").val(stocks["NomIngred"]).text(stocks["NomIngred"])
            );
        });

        $("#stocks-select").change(function() {
            // Récupère le stock sélectionné
            let selectedStocks = $(this).val();
            // Trouve les informations du stock sélectionné
            let stocks = data.find(f => f.NomIngred === selectedStocks);

            // Remplit les champs de saisie avec les informations du stock
            if (stocks) {
                $("#stockReel").val(stocks.StockReel);
                $("#prix").val(stocks.PrixUHT);
                $("#fournisseur-select").val(stocks["NomFourn"]);
            }
        });
    },
    error: function () {
        alert("Erreur lors de la récupération des stocks.");
    }
});

$(document).ready(function(){
    // Attache une fonction de clic au bouton avec l'ID 'modifier'
    $('#modifier').click(function(e){
        e.preventDefault();

        // Récupère les valeurs des champs de saisie
        let nomIngred = $('#stocks-select').val();
        let nomFourn = $('#fournisseur-select').val();
        let StockReel = $('#stockReel').val();
        let prix = $('#prix').val();

        // Effectue une requête AJAX pour modifier le stock
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
                alert("Ingrédient modifié avec succès");
                $("#resultat").append(response);
                // Réinitialise les champs de saisie
                $("#quantite").val("");
                $("#prix").val("");
                $("#fournisseur-select").val("Choisir un fournisseur");
                $("#stocks-select").val("Choisir un élément");

            },
            fail: function () {
                alert("Erreur");
            }
        });
    });
});
