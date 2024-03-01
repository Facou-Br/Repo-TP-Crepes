function chargerCommandes() {
    $.getJSON("commandes.json", function (data) {
        data.commandes.sort((a, b) => {
            return a.temps.localeCompare(b.temps);
        });

        let listeCommandes = $("#commandesList");
        listeCommandes.html("");

        data.commandes.forEach(commande => {
            if (commande.statut === "En attente") {
                let elementCommande = `
                    <div>
                        <p>Nom : ${commande.nom}</p>
                        <p>Heure de mise à disposition : ${commande.temps}</p>
                        <p>Statut : ${commande.statut}</p>
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


function terminerCommande(idCommande) {
    $.getJSON("commandes.json", function (data) {
        let commandes = data.commandes;

        let commande = commandes.find(commande => commande.id === idCommande);

        if (commande) {
            if (commande.statut === "En attente") {
                commande.statut = "Terminée";
                sauvegarderCommandes(data);
            } else {
                alert("Cette commande ne peut pas être terminée car elle n'est pas en attente.");
            }
        } else {
            alert("Commande non trouvée.");
        }
    });
}

function sauvegarderCommandes(data) {
    $.ajax({
        type: "POST",
        url: "sauvegarder_commandes.php",
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
    $.getJSON("commandes.json", function (data) {
        let commande = data.commandes.find(commande => commande.id === id);

        if (commande) {
            let ingredients = [];
            for (let i = 1; i <= 4; i++) {
                let ingredientKey = "ingredient" + i;
                if (commande[ingredientKey]) {
                    ingredients.push(commande[ingredientKey]);
                }
            }

            alert("Ingrédients de la commande " + commande.nom + " : \n\n" + ingredients.join("\n"));
        } else {
            alert("Commande non trouvée.");
        }
    });
}

