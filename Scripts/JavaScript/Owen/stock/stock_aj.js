// Requête AJAX pour récupérer les fournisseurs
$.ajax({
    url: "../../../Scripts/PHP/Owen/fournisseur/afficher_fourn.php",
    type: "POST",
    success: function (data) {
        // Analyse les données JSON reçues
        data = JSON.parse(data);
        // Parcourt chaque élément des données
        $.each(data, function (index, fournisseur) {
            // Ajoute une option dans le select avec les informations du fournisseur
            $("#fournisseur-select").append(
                $("<option></option>").val(fournisseur["NomFourn"]).text(fournisseur["NomFourn"])
            );
        });
    },
    error: function () {
        alert("Erreur lors de la récupération des fournisseurs.");
    }
});

$(document).ready(function(){
    // Attache une fonction de clic au bouton avec l'ID 'Ajouter'
    $('#Ajouter').click(function(e){
        e.preventDefault();

        // Récupère les valeurs des champs de saisie
        let nomIngred = $('#nomIngred').val();
        let stockReel = $('#stockReel').val();
        let prixUHTMoyen = $('#prixUHTMoyen').val();
        let nomFourn = $('#fournisseur-select').val();
        let categorie = $('#categorie-select').val();

        // Effectue une requête AJAX pour ajouter un stock
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
