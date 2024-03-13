function chargerCommandes() {
    $.getJSON("../../.././Scripts/JavaScript/GestionsCommandes/commandes.json", function (data) {
        data.commandes.sort((a, b) => {
            return a.temps.localeCompare(b.temps);
        });

        let listeCommandes = $("#commandesList");
        listeCommandes.html("");

        data.commandes.forEach(commande => {
            if (commande.statut !== "Terminée") {
                let elementCommande = `
                    <div>
                        <p>Nom : ${commande.nom}</p>
                        <p>Heure de mise à disposition : ${commande.temps}</p>
                        <p>Statut : ${commande.statut}</p>
                        <button onclick="commencerCommande(${commande.id})">Commencer</button>
                        <button onclick="terminerCommande(${commande.id})">Terminer</button>
                        <button onclick="afficherIngredients(${commande.id})">Voir les details</button>
                        <hr>
                    </div>
                `;
                listeCommandes.append(elementCommande);
            }
        });
    });
}

let commandeEnCours = null;

function commencerCommande(idCommande) {
    if (commandeEnCours !== null) {
        alert("Une commande est déjà en cours. Terminez-la d'abord.");
        return;
    }

    $.getJSON("../../.././Scripts/JavaScript/GestionsCommandes/commandes.json", function (data) {
        let commande = data.commandes.find(commande => commande.id === idCommande);

        if (commande) {
            if (commande.statut === "En attente") {
                commande.statut = "En cours";
                commandeEnCours = idCommande;
                sauvegarderCommandes(data);
            } else {
                alert("Cette commande ne peut pas être commencée car elle n'est pas en attente.");
            }
        } else {
            alert("Commande non trouvée.");
        }
    });
}

function terminerCommande(idCommande) {
    if (commandeEnCours !== idCommande) {
        alert("Cette commande ne peut pas être terminée car elle n'est pas en cours.");
        return;
    }

    $.getJSON("../../.././Scripts/JavaScript/GestionsCommandes/commandes.json", function (data) {
        let commande = data.commandes.find(commande => commande.id === idCommande);

        if (commande) {
            if (commande.statut === "En cours") {
                commande.statut = "Terminée";
                commandeEnCours = null;
                sauvegarderCommandes(data);
            } else {
                alert("Cette commande ne peut pas être terminée car elle n'est pas en cours.");
            }
        } else {
            alert("Commande non trouvée.");
        }
    });
}


function sauvegarderCommandes(data) {
    $.ajax({
        type: "POST",
        url: "../../.././Scripts/PhP/sauvegarderCommandes.php",
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function(response) {
            console.log("Commande terminée avec succès !");
            chargerCommandes();
        },
        error: function(error) {
            console.error("Erreur lors de la sauvegarde des commandes :", error);
            alert("Une erreur s'est produite lors de la sauvegarde des commandes.");
        }
    });
}

function afficherIngredients(id) {
    $.getJSON("../../.././Scripts/JavaScript/GestionsCommandes/commandes.json", function (data) {
        let commande = data.commandes.find(commande => commande.id === id);

        if (commande) {
            let ingredients = [];
            for (let i = 1; i <= 5; i++) {
                let ingredientKey = "ingBase" + i;
                if (commande[ingredientKey]) {
                    ingredients.push(commande[ingredientKey]);
                }
            }
            for (let i = 1; i <= 6; i++) {
                let ingredientKey = "ingOpt" + i;
                if (commande[ingredientKey]) {
                    if (commande[ingredientKey] !== null) {
                        ingredients.push(commande[ingredientKey]);
                    }
                }
            }
            alert("Ingrédients de " + commande.nom + " : \n\n" + ingredients.join("\n"));
        } else {
            alert("Commande non trouvée.");
        }
    });
}

