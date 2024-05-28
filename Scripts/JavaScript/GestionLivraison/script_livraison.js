listeCommandes = null;
let commandeEnCours = null;
chargerCommandesBdD();

$(document).ready(function () {
    afficherCommandes(listeCommandes);
});


function chargerCommandesBdD() {
    $.ajax({
        type: "POST",
        url: "../../.././Scripts/PhP/Quentin/chargerCommandesLivraison.php",
        contentType: "application/json",
        success: function(response) {
            listeCommandes = JSON.parse(response);
            afficherCommandes(listeCommandes);
        },
        error: function(error) {
            console.error("Erreur lors de la sauvegarde des commandes :", error);
            alert("Une erreur s'est produite lors de la sauvegarde des commandes.");
        }
    });
}


function afficherCommandes(data) {
    let listeCommandes = $("#commandes");
    listeCommandes.html("");

    data.commandes.forEach(commande => {
        if (commande.statut === "Acceptée" || commande.statut === "En préparation") {
            let elementCommande = `
                <div>
                    <h2>Numéro Commande : ${commande.id} </h2><br>
                    <p>À faire : ${commande.nombre} ${commande.nom}</p>
                    <p>Heure de mise à disposition : ${commande.temps}</p>
                    <p>Statut : ${commande.statut}</p>
                    <br>
                    <button onclick="commencerCommande(${commande.id})">Commencer</button>
                    <button onclick="terminerCommande(${commande.id})">Terminer</button>
                    <button onclick="afficherIngredients(${commande.id})">Voir les details</button>
                    <hr>
                </div>
            `;
            listeCommandes.append(elementCommande);
        }
    });
}

function mettreAJourBDD(idCommande, nouveauStatut) {
    $.ajax({
        type: "POST",
        url: "../../.././Scripts/PhP/Quentin/modifierCommande.php",
        data: { id: idCommande, statut: nouveauStatut },
        success: function(response) {
            chargerCommandesBdD();
            console.log("Commande mise à jour dans la base de données avec succès ! : " + idCommande + " -> " + nouveauStatut);
        },
        error: function(error) {
            console.error("Erreur lors de la mise à jour de la commande dans la base de données :", error);
            alert("Une erreur s'est produite lors de la mise à jour de la commande dans la base de données.");
        }
    });
}



function commencerCommande(idCommande) {
    if (commandeEnCours !== null) {
        alert("Une commande est déjà en préparation. Terminez-la d'abord.");
    }

    let commande = listeCommandes.commandes.find(commande => commande.id === idCommande);

    if (commande) {
        if (commande.statut === "Acceptée") {
            commandeEnCours = idCommande;
            mettreAJourBDD(idCommande, "En préparation");
        } else {
            alert("Cette commande ne peut pas être commencée car elle n'est pas acceptée.");
        }
    } else {
        alert("Commande non trouvée.");
    }
}


function terminerCommande(idCommande) {
    if (commandeEnCours !== idCommande) {
        alert("Cette commande ne peut pas être terminée car elle n'est pas en préparation.");
        return;
    }

    let commande = listeCommandes.commandes.find(commande => commande.id === idCommande);

    if (commande) {
        if (commande.statut === "En préparation") {   
            mettreAJourBDD(idCommande, "Prête");    
            miseAJourIngredients(idCommande);  
            commandeEnCours = null; 
        } else {
            alert("Cette commande ne peut pas être terminée car elle n'est pas en cours.");
        }
    } else {
        alert("Commande non trouvée.");
    }
}


function miseAJourIngredients(id) {
    let commande = listeCommandes.commandes.find(commande => commande.id === id); 
    let quantiteCrepe = commande.nombre; 

    for (const [nom, [quantite, unite]] of Object.entries(commande.ingredients)) {
        $.ajax({
            type: "POST",
            url: "../../.././Scripts/PhP/Quentin/miseAJourStock.php",
            data: { nomIngredient: nom, quantiteIngredient: quantite, quantiteCrepe: quantiteCrepe },  
            success: function(response) {
                console.log("Stock mis à jour avec succès !");
            },
            error: function(error) {
                console.error("Erreur lors de la mise à jour du stock :", error);
                alert("Une erreur s'est produite lors de la mise à jour du stock.");
            }
        });
    }
}


function afficherIngredients(id) {
    let commande = listeCommandes.commandes.find(commande => commande.id === id); 

    if (commande) {
        let ingredientsText = "Ingrédients de la commande " + id + " :\n\n";

        for (const [nom, [quantite, unite]] of Object.entries(commande.ingredients)) {
            ingredientsText += `• ${nom} : ${quantite} ${unite}\n`;
        }

        alert(ingredientsText);
    } else {
        alert("Ingrédients non trouvés.");
    }
}
