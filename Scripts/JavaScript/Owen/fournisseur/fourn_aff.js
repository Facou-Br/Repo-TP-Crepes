$.ajax({
    url: "../../../Scripts/PhP/Owen/fournisseur/afficher_fourn.php",
    type: "POST",
    success: function (data) {
        // Analyse les données JSON reçues
        data = JSON.parse(data);
        // Parcourt chaque élément des données
        $.each(data, function (index, row) {
            // Ajoute une ligne dans la table HTML avec les informations du fournisseur
            $(".fournisseur").append(
                "<tr>" +
                "<td value='" + row["NomFourn"] + "'>" + row["NomFourn"] + "</td>" +
                "<td value='" + row["Adresse"] + "'>" + row["Adresse"] + "</td>" +
                "<td value='" + row["CodePostal"] + "'>" + row["CodePostal"] + "</td>" +
                "<td value='" + row["Ville"] + "'>" + row["Ville"] + "</td>" +
                "<td value='" + row["Tel"] + "'>" + row["Tel"] + "</td>" +
                "</tr>"
            );
        });
    },
    error: function () {
        // Affiche un message d'alerte en cas d'erreur
        alert("Erreur lors de la récupération des fournisseurs.");
    },
});
