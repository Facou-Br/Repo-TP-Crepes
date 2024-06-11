$.ajax({
    url: "../../../../Scripts/PhP/Owen/fournisseur/afficher_fourn.php",
    type: "POST",
    success: function (data) {
        data = JSON.parse(data);
        $.each(data, function (index, fournisseur) {
            // Ajoute une option dans le select avec les informations du fournisseur
            $("#fournisseur-select").append(
                $("<option></option>").val(fournisseur["NomFourn"]).text(fournisseur["NomFourn"])
            );
        });

        $("#fournisseur-select").change(function() {
            // Récupère le fournisseur sélectionné
            let selectedFournisseur = $(this).val();
            // Trouve les informations du fournisseur sélectionné
            let fournisseur = data.find(f => f.NomFourn === selectedFournisseur);

            // Remplit les champs de saisie avec les informations du fournisseur
            if (fournisseur) {
                $("#nom").val(fournisseur.NomFourn);
                $("#adresse").val(fournisseur.Adresse);
                $("#ville").val(fournisseur.Ville);
                $("#codePostal").val(fournisseur.CodePostal);
                $("#telephone").val(fournisseur.Tel);
            }
        });
    },
    error: function () {
        alert("Erreur lors de la récupération des fournisseurs.");
    }
});

$(document).ready(function(){
    // Attache une fonction de clic au bouton avec l'ID 'modifier'
    $('#modifier').click(function(e){
        // Empêche le comportement par défaut du bouton (soumission du formulaire)
        e.preventDefault();

        // Récupère les valeurs des champs de saisie
        let nomFourn = $('#fournisseur-select').val();
        let adresse = $('#adresse').val();
        let codePostal = $('#codePostal').val();
        let ville = $('#ville').val();
        let telephone = $('#telephone').val();

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
                alert("Fournisseur modifié avec succès");
                // Ajoute la réponse au résultat
                $("#resultat").append(response);
                // Réinitialise les champs de saisie
                let fournisseur = data.find(f => f.NomFourn === selectedFournisseur);
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
