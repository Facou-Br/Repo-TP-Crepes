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
    if ($(this).attr("id") === "debut") {
        document.getElementById("fin").min = $(this).val();
    }
    if ($(this).attr("id") === "fin") {
        document.getElementById("debut").max = $(this).val();
        if (document.getElementById("debut").value != "") {
            let dateDebut = new Date($("#debut").val());
            let dateFin = new Date($(this).val());
            let moisDebut = dateDebut.getMonth();
            let moisFin = dateFin.getMonth();
            let str = $("#debut").val();
            let jourDebut = str.slice(-2);
            str = $(this).val();
            let jourFin = str.slice(-2);

            console.log("Date jour de début : " + jourDebut);
            console.log("Date jour de fin : " + jourFin);

            if ($("#ChoixTypeDate").val() === "annee") {
                console.log(moisDebut);
                console.log(moisFin);
                creerLignePoints(moisDebut, moisFin, jourDebut, jourFin, 'annee');
                creerStackedBars(moisDebut, moisFin, jourDebut, jourFin, 'annee');
            } else {
                creerLignePoints(moisDebut, moisFin, jourDebut, jourFin, 'mois');
                creerStackedBars(moisDebut, moisFin, jourDebut, jourFin, 'mois');
            }

        }
    }
    if ($(this).attr("id") === "semaine") {
        let semaine = $(this).val();
        let premierJour = moment(semaine, "YYYY-Www").startOf('isoWeek').format("YYYY-MM-DD");
        let dernierJour = moment(semaine, "YYYY-Www").endOf('isoWeek').format("YYYY-MM-DD");
        console.log("Premier jour de la semaine : " + premierJour); // Affiche "2024-05-13"
        console.log("Dernier jour de la semaine : " + dernierJour); // Affiche "2024-05-19"
    }
});

