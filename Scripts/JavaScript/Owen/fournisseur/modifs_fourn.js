$.ajax({
    url: "../../../../Scripts/PhP/Owen/fournisseur/afficher_fourn.php",
    type: "POST",
    success: function (data) {
        data = JSON.parse(data);
            $.each(data, function (index, fournisseur) {
                $("#fournisseur-select").append(
                    $("<option></option>").val(fournisseur["NomFourn"]).text(fournisseur["NomFourn"])
                );
            });
        $("#fournisseur-select").change(function() {
            var selectedFournisseur = $(this).val();
            var fournisseur = data.find(f => f.NomFourn === selectedFournisseur);

            if (fournisseur) {
                $("#nom").val(fournisseur.NomFourn);
                $("#adresse").val(fournisseur.Adresse);
                $("#ville").val(fournisseur.Ville);
                $("#codePostal").val(fournisseur.CodePostal);
                $("#telephone").val(fournisseur.Tel);
            }
        });
        }, // closing brace and parenthesis for success function

    error: function () {
        alert("Erreur lors de la récupération des fournisseurs.");
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