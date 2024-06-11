listeCommandes = null
chargerCommandes()

    $(document).ready(function () {
        afficherCommandes(listeCommandes)
})

// Fonction pour charger les commandes
function chargerCommandes() {
    $.ajax({
        type: "POST",
        url: "../../.././Scripts/PhP/Noe/chargerCommandesLivraison.php",
        contentType: "application/json",
        success: function(response) {
            listeCommandes = JSON.parse(response);
            afficherCommandes(listeCommandes);
        },
        error: function(error) {
            console.log("Erreur lors du chargement des commandes :", error);
            alert("Une erreur s'est produite lors du chargement des commandes.");
        }
    });
}

// Fonction pour afficher les commandes sur la page
function afficherCommandes(data) {
    let listeCommandes = $("#commandes")
    listeCommandes.html("")
    
    data.commandes.forEach(commande => {
            if (commande.statutLivraison === "fin_preparation" || commande.statutLivraison === "en_livraison") {
                let buttons = ''
                if (commande.statutLivraison === 'fin_preparation') {
                    buttons = `<button onclick="prendreCommande(${commande.id})">Prendre la commande</button>`
                } else if (commande.statutLivraison === 'en_livraison') {
                    buttons = `<button onclick="termineCommande(${commande.id})">Commande livrée</button>`
                }
                    let livreur = ''
                    if (commande.nomLivreur === null && commande.prenomLivreur === null) {
                        livreur = `<select id="livreur-select">
                                        <option value=#>Choisir un livreur</option>
                                   </select>`
                    } else {
                        livreur = `${commande.nomLivreur} ${commande.prenomLivreur}`
                    }
                let elementCommande = `
                    <div>
                        <h2>Nom du client : ${commande.nomClient}</h2>
                        <p>Nom du livreur : ${livreur} </p>
                        <p>Heure de mise à disposition : ${commande.temps}</p>
                        <p>Statut de livraison: ${commande.statutLivraison}</p>
                        <p>Téléphone : ${commande.tel}</p>
                        <p>Adresse de la commande : </p><a href="https://www.google.fr/maps/search/${commande.adrClient}+${commande.cpClient}+${commande.vilClient}">
                            ${commande.adrClient} ${commande.cpClient} ${commande.vilClient}
                        </a>
                        <br/><br/>
                        ${buttons}
                        <hr>
                    </div>
                `
                listeCommandes.append(elementCommande)
            }
        })
}

// Fonction pour mettre à jour le statut de la commande dans la base de données
function mettreAJourBDD(idCommande, nouveauStatut) {
    $.ajax({
        type: "POST",
        url: "../../../Scripts/PHP/Noe/modification_commande.php",
        data: { id: idCommande, statutLivraison: nouveauStatut },
        success: function(response) {
            console.log("Commande mise à jour dans la base de données avec succès !")
            chargerCommandes()
        },
        error: function(error) {
            console.error("Erreur lors de la mise à jour de la commande dans la base de données :", error)
            alert("Une erreur s'est produite lors de la mise à jour de la commande dans la base de données.")
        }
    })
}


// Fonction pour mettre à jour le statut de la commande dans la base de données
function actualiserCommandesBdD(data) {
    $.ajax({
        type: "POST",
        url: "../../../Scripts/PhP/Noe/chargerCommandesLivraison.php",
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function(response) {
            console.log("Commandes chargées dans la BdD avec succès !")
            chargerCommandes()
        },
        error: function(error) {
            console.error("Erreur lors de la sauvegarde des commandes :", error)
            alert("Une erreur s'est produite lors de la sauvegarde des commandes sorry.")
        }
    })
}

// Fonction pour prendre une commande
function prendreCommande(idCommande) {
    let commande = listeCommandes.commandes.find(commande => commande.id === idCommande)
    if (commande.nomLivreur === null && commande.prenomLivreur === null) {
        alert("Vous n'avez choisi aucun livreur")
        return
    }
    if (commande) {
        if (commande.statutLivraison === "fin_preparation") {
            mettreAJourBDD(idCommande, "en_livraison")
            actualiserCommandesBdD()
        } else {
            alert("Cette commande ne peut pas être prise car elle n'est pas fini de préparer.")
        }
    } else {
        alert("Commande non trouvée.")
    }
}

// Fonction pour terminer une commande
function termineCommande(idCommande) {
    let commande = listeCommandes.commandes.find(commande => commande.id === idCommande)
    if (commande.nomLivreur === null && commande.prenomLivreur === null) {
        alert("Vous n'avez choisi aucun livreur")
        return
    }
    if (commande) {
        if (commande.statutLivraison === "en_livraison") {
            mettreAJourBDD(idCommande, "livree")
            commandeEnCours = null
            actualiserCommandesBdD()
        } else {
            alert("Cette commande ne peut pas être livrée car elle n'est pas en cours de livraison.")
        }
    } else {
        alert("Commande non trouvée.")
    }
}
