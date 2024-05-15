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
                    "<td><button type='button' class='modif_fourn'>Modifier</button></td>" +
                    "</tr>"
                );
            });
        });
    }, // closing brace and parenthesis for success function
    error: function () {
        alert("Erreur lors de la récupération des fournisseurs.");
    },
});

const buttons = document.getElementsByClassName("modif_fourn");
console.log(buttons.length);

for(let i = 0; i < buttons.length; i++) {
    console.log("boucle");
    buttons[i].addEventListener("click", (event) => {
        console.log("click");

        var footer = document.getElementById("footer");
        footer.style.position = "page";
        document.getElementById('modif_stocks').style.display = 'block';
        // Récupère la ligne du tableau contenant le bouton qui a été cliqué
        var row = $(this).closest('tr');
        console.log(row);

        // Récupère les valeurs actuelles des cellules de la ligne
        var nomFourn = row.find('td:eq(0)').text();
        var adresse = row.find('td:eq(1)').text();
        var codePostal = row.find('td:eq(2)').text();
        var ville = row.find('td:eq(3)').text();
        var tel = row.find('td:eq(4)').text();
        console.log(nomFourn + " " + adresse + " " + codePostal + " " + ville + " " + tel);
        // Remplace le contenu de la ligne par des champs de texte préremplis et un bouton "Envoyer"
        row.html(
            "<td><input type='text' value='" + nomFourn + "'></td>" +
            "<td><input type='text' value='" + adresse + "'></td>" +
            "<td><input type='text' value='" + codePostal + "'></td>" +
            "<td><input type='text' value='" + ville + "'></td>" +
            "<td><input type='text' value='" + tel + "'></td>" +
            "<td><button type='button' class='envoyer_modif'>Envoyer</button></td>"
        );
        /**
         // Ajoute un gestionnaire d'événements au bouton "Envoyer" de chaque ligne
         $(document).on('click', '.envoyer_modif', function() {
         // Récupère la ligne du tableau contenant le bouton qui a été cliqué
         var row = $(this).closest('tr');

         // Récupère les valeurs des champs de texte
         var nomFourn = row.find('input:eq(0)').val();
         var adresse = row.find('input:eq(1)').val();
         var codePostal = row.find('input:eq(2)').val();
         var ville = row.find('input:eq(3)').val();
         var tel = row.find('input:eq(4)').val();

         // Remplace le contenu de la ligne par les nouvelles valeurs et un bouton "Modifier"
         row.html(
         "<td>" + nomFourn + "</td>" +
         "<td>" + adresse + "</td>" +
         "<td>" + codePostal + "</td>" +
         "<td>" + ville + "</td>" +
         "<td>" + tel + "</td>" +
         "<td><button type='button' class='modif_stock'>Modifier</button></td>"
         );

         // Ici, vous pouvez ajouter du code pour envoyer les nouvelles valeurs au serveur


         });
         **/
    });
}