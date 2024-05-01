let actionValue = $(".fournisseur").val();
//$(".stocks").empty();

$.ajax({
    url: "../../../Scripts/PhP/Owen/fournisseur/afficher_fourn.php",
    type: "POST",
    success: function (data) {
        $.getJSON("../../../Scripts/JavaScript/Owen/fournisseurs.json", function (data) {
            $.each(data, function (index, row) {
                $(".fournisseur").append(
                    "<tr>" +
                    "<td value='" + row["NomFourn"] + "'>" + row["NomFourn"] + "</td>" +
                    "<td value='" + row["Adresse"] + "'>" + row["Adresse"] + "</td>" +
                    "<td value='" + row["CodePostal"] + "'>" + row["CodePostal"] + "</td>" +
                    "<td value='" + row["Ville"] + "'>" + row["Ville"] + "</td>" +
                    "<td value='" + row["Tel"] + "'>" + row["Tel"] + "</td>" +
                    "<td><a href='../../../HTML-CSS/Html/GestionInventaire_Owen/modifier_fourn.html'><button type='button' class='modif_stock'>Modifier</button></a></td>" +
                    "</tr>"
                );
            });
        });
    }, // closing brace and parenthesis for success function
    error: function () {
        alert("Erreur lors de la récupération des fournisseurs.");
    },
});
