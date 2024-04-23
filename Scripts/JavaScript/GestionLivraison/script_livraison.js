function chargerCommandes() {
    $.getJSON("../../.././Scripts/JavaScript/GestionLivraison/commandes.json", function (data) {
        data.commandes.sort((a, b) => {
            return a.temps.localeCompare(b.temps);
        });

        let listeCommandes = $("#commandesList");
        listeCommandes.html("");

        data.commandes.forEach(commande => {
            if (commande.statut !== "Prête") {
                let elementCommande = `
                    <div>
                        <p>Nom du client : ${commande.NomClient}</p>
                        <p>Heure de mise à disposition : ${commande.temps}</p>
                        <p>Téléphone du client : ${commande.statut}</p>
                        <button onclick="afficherCommande(${commande.id})">Voir la commande</button>
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
        url: "../../.././Scripts/PhP/Noe/modifierCommandeLivraison.php",
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
        url: "../../.././Scripts/PhP/Noe/chargerCommandesLivraison.php",
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function(response) {
            console.log("Commandes chargées dans la BdD avec succès !");
            chargerCommandes();
        },
        error: function(error) {
            console.error("Erreur lors de la récupération des commandes :", error);
            alert("Une erreur s'est produite lors de la récupération des commandes.");
        }
    });
}


function afficherCommande(id) {
    // Faire en sorte d'afficher la commande dans la page page_commande
    $.ajax({
        url: "../../../Html/livreur_noe/page_commande.php"
    })
}
