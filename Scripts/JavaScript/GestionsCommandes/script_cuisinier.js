function chargerCommandes() {
    $.getJSON("../../.././Scripts/JavaScript/GestionsCommandes/commandes.json", function (data) {
        data.commandes.sort((a, b) => {
            return a.temps.localeCompare(b.temps);
        });

        let listeCommandes = $("#commandes");
        listeCommandes.html("");

        data.commandes.forEach(commande => {
            if (commande.statut !== "Prête") {
                let elementCommande = `
                    <div>
                        <h2>Numéro Commande : ${commande.id} </h2><br>
                        <p>À faire : ${commande.nombre} ${commande.nom}</p>
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

function mettreAJourBDD(idCommande, nouveauStatut) {
    $.ajax({
        type: "POST",
        url: "../../.././Scripts/PhP/Quentin/modifierCommande.php",
        data: JSON.stringify({ id: idCommande, statut: nouveauStatut }),
        contentType: "application/json",
        success: function(response) {
            console.log("Commande mise à jour dans la base de données avec succès !");
        },
        error: function(error) {
            console.error("Erreur lors de la mise à jour de la commande dans la base de données :", error);
            alert("Une erreur s'est produite lors de la mise à jour de la commande dans la base de données.");
        }
    });
}


function actualiserCommandesBdD(data) {
    $.ajax({
        type: "POST",
        url: "../../.././Scripts/PhP/Quentin/chargerCommandes.php",
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function(response) {
            console.log("Commandes chargées dans la BdD avec succès !");
            chargerCommandes();
        },
        error: function(error) {
            console.error("Erreur lors de la sauvegarde des commandes :", error);
            alert("Une erreur s'est produite lors de la sauvegarde des commandes.");
        }
    });
}

let commandeEnCours = null;

function commencerCommande(idCommande) {
    if (commandeEnCours !== null) {
        alert("Une commande est déjà en préparation. Terminez-la d'abord.");
        return;
    }

    $.getJSON("../../.././Scripts/JavaScript/GestionsCommandes/commandes.json", function (data) {
        let commande = data.commandes.find(commande => commande.id === idCommande);

        if (commande) {
            if (commande.statut === "Acceptée") {
                commandeEnCours = idCommande;
                mettreAJourBDD(idCommande, "En préparation");
                actualiserCommandesBdD();
            } else {
                alert("Cette commande ne peut pas être commencée car elle n'est pas acceptée.");
            }
        } else {
            alert("Commande non trouvée.");
        }
    });
}

function terminerCommande(idCommande) {
    if (commandeEnCours !== idCommande) {
        alert("Cette commande ne peut pas être terminée car elle n'est pas en préparation.");
        return;
    }

    $.getJSON("../../.././Scripts/JavaScript/GestionsCommandes/commandes.json", function (data) {
        let commande = data.commandes.find(commande => commande.id === idCommande);

        if (commande) {
            if (commande.statut === "En préparation") {
                mettreAJourBDD(idCommande, "Prête");
                miseAJourIngredients(idCommande);
                commandeEnCours = null;
                actualiserCommandesBdD();
            } else {
                alert("Cette commande ne peut pas être terminée car elle n'est pas en cours.");
            }
        } else {
            alert("Commande non trouvée.");
        }
    });
}

function miseAJourIngredients(idCommande) {
    $.ajax({
        type: "POST",
        url: "../../.././Scripts/PhP/Quentin/miseAJourStock.php",
        data: { id: idCommande },
        success: function(response) {
            var data = JSON.parse(response);
            if (data.success) {
                console.log("Les stocks ont bien été mis à jour !");
            } else {
                console.error("Erreur lors de la mise à jour des stocks dans la base de données :", data.message);
                alert("Une erreur s'est produite lors de la mise à jour des stocks dans la base de données.");
            }
        },
        error: function(error) {
            console.error("Erreur lors de la requête AJAX :", error);
            alert("Une erreur s'est produite lors de la requête AJAX.");
        }
    });
}

function afficherIngredients(id) {
    // Faire en sorte d'afficher la quantité pour chaque ingrédient
    // --> Dans la table PROD_INGR

    $.getJSON("../../.././Scripts/JavaScript/GestionsCommandes/commandes.json", function (data) {
        let commande = data.commandes.find(commande => commande.id === id);

        if (commande) {
            let ingredientsText = "Ingrédients de " + commande.nom + " :\n\n";

            if (commande.ingredients.base.length > 0) {
                ingredientsText += "Ingrédients de base :\n";
                ingredientsText += "• " + commande.ingredients.base.join("\n• ") + "\n\n";
            }

            if (commande.ingredients.optionnels.length > 0) {
                ingredientsText += "Ingrédients optionnels :\n";
                ingredientsText += "• " + commande.ingredients.optionnels.join("\n• ");
            }

            alert(ingredientsText);
        } else {
            alert("Commande non trouvée.");
        }
    });
}

/*
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
*/
