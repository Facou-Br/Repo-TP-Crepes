$.ajax({
    url: "../../../Scripts/PhP/Owen/fournisseur/afficher_fourn.php",
    type: "POST",
    success: function (data) {
        $.getJSON("../../../Scripts/JavaScript/Owen/fournisseurs.json", function (data) {
            $.each(data, function (index, fournisseur) {
                $("#fournisseur-select").append(
                    $("<option></option>").val(fournisseur["NomFourn"]).text(fournisseur["NomFourn"])
                );
            });
        });
        }, // closing brace and parenthesis for success function

    error: function () {
        alert("Erreur lors de la récupération des fournisseurs.");
    }
});
$("#fournisseur-select").change(function() {
    var selectedFournisseur = $(this).val();

    $.getJSON("../../../Scripts/JavaScript/Owen/fournisseurs.json", function(data) {
        var fournisseur = data.find(f => f.NomFourn === selectedFournisseur);

        if (fournisseur) {
            $("#nom").val(fournisseur.NomFourn);
            $("#adresse").val(fournisseur.Adresse);
            $("#ville").val(fournisseur.Ville);
            $("#codePostal").val(fournisseur.CodePostal);
            $("#tel").val(fournisseur.Tel);
        }
    });
});