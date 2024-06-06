/**
 * Evenement qui permet de récupérer les ingrédiens en fonction du fournisseur sélectionné et de mettre à jour l'interface utilisateur.
 * Les ingrédients sont récupérés via un script PHP et affichés dynamiquement.
 * 
 * @Facou-Br
 */
$("select.ChoixTypeDate").change(function () {
    $(".spaceChoixDate").empty();
    let valeur = $(this).val();

    switch (valeur) {
        case "annee":
            $(".spaceChoixDate").append("<label for='debut'>Début</label><br>");
            $(".spaceChoixDate").append("<input type='month' id='debut' class='debut' /><br>");

            $(".spaceChoixDate").append("<label for='fin'>Fin</label><br>");
            $(".spaceChoixDate").append("<input type='month' id='fin' class='fin'/>");
            break;
        case "mois":
            $(".spaceChoixDate").append("<label for='debut'>Début</label><br>");
            $(".spaceChoixDate").append("<input type='date' id='debut' class='debut' /><br>");

            $(".spaceChoixDate").append("<label for='fin'>Fin</label><br>");
            $(".spaceChoixDate").append("<input type='date' id='fin' class='fin' />");
            break;
        case "semaine":
            $(".spaceChoixDate").append("<input type='week' id='semaine'/>");
            break;
        default:
            console.log("Erreur ?");
    }
});

$(".spaceChoixDate").on('change', 'input[type="month"],input[type="week"],input[type="date"]', function () {
    console.log("Date selected: " + $(this).val() + " || Id : " + $(this).attr("id"));
    if ($(this).attr("id") === "debut") {
        document.getElementById("fin").min = $(this).val();
    }
    if ($(this).attr("id") === "fin") {
        document.getElementById("debut").max = $(this).val();
    }
    if ($(this).attr("id") === "semaine") {
        let semaine = $(this).val();
        let premierJour = moment(semaine, "YYYY-Www").startOf('isoWeek').format("YYYY-MM-DD");
        let dernierJour = moment(semaine, "YYYY-Www").endOf('isoWeek').format("YYYY-MM-DD");
        console.log("Premier jour de la semaine : " + premierJour); // Affiche "2024-05-13"
        console.log("Dernier jour de la semaine : " + dernierJour); // Affiche "2024-05-19"
    }
});

