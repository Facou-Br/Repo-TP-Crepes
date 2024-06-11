listeCommandes = null;  // On initialise la liste des commandes à null
let commandeEnCours = null; // On initialise la commande en cours à null
chargerCommandesBdD();  // On charge les commandes depuis la base de données

$(document).ready(function () {
    afficherCommandes(listeCommandes);  // On affiche les commandes avec AJAX
});


/*
    Permet de charger les commandes depuis la base de données avec AJAX
    On enregistre la liste des commandes en récupérant la chaine de caractères
*/
function chargerCommandesBdD() {
    $.ajax({
        type: "POST",
        url: "../../.././Scripts/PhP/Quentin/chargerCommandes.php",
        contentType: "application/json",
        success: function(response) {
            listeCommandes = JSON.parse(response);  // On enregistre la réponse JSON dans listeCommandes
            afficherCommandes(listeCommandes);  // On affiche les commandes avec les données chargées
        },
        error: function(error) {
            console.log("Erreur lors du chargement des commandes :", error);
            alert("Une erreur s'est produite lors du chargement des commandes.");
        }
    });
}


/*
    Permet d'afficher les commandes à faire
*/
function afficherCommandes(data) {
    let listeCommandes = $("#commandes");   // On donne le style de la class 'commandes' à la liste des commandes
    listeCommandes.html("");    // On réinitialise le contenu affiché de la liste des commandes

    data.commandes.forEach(commande => {
        // Toutes les infos regroupées dans la div
        let elementCommande = `
            <div>
                <h2>Numéro Commande : ${commande.id} </h2><br>
                <p>À faire : ${commande.nombre} ${commande.nom}</p>
                <p>Heure de mise à disposition : ${commande.temps}</p>
                <p>Statut : ${commande.statut}</p>
                <br>
        `;

        // Ajout des boutons en fonction du statut
        if (commande.statut === "Acceptée") {
            elementCommande += `
                <button onclick="commencerCommande(${commande.id})">Commencer</button>
            `;
        } else {
            elementCommande += `
                <button onclick="terminerCommande(${commande.id})">Terminer</button>
            `;
        }

        // Bouton pour afficher les détails
        elementCommande += `
                <button onclick="afficherIngredients(${commande.id, commande.OF})">Voir les détails</button>
                <hr>
            </div>
        `;

        listeCommandes.append(elementCommande); // On ajoute l'élément de commande à la liste
    });
}



/*
    Permet de mettre à jour le statut d'une commande dans la base de données
    On modifie le statut d'une commande avec son id, et le nouveauStatut
*/
function mettreAJourBDD(idCommande, nouveauStatut) {
    $.ajax({
        type: "POST",
        url: "../../.././Scripts/PhP/Quentin/modifierCommande.php",
        data: { id: idCommande, statut: nouveauStatut },    // On envoie les données nécéssaires pour l'update
        success: function(response) {
            chargerCommandesBdD();
            console.log("Commande mise à jour dans la base de données avec succès ! : " + idCommande + " -> " + nouveauStatut);
        },
        error: function(error) {
            console.log("Erreur lors de la mise à jour de la commande dans la base de données :", error);
            alert("Une erreur s'est produite lors de la mise à jour de la commande dans la base de données.");
        }
    });
}


/*
    Permet de commencer une commande
*/
function commencerCommande(idCommande) {
    if (commandeEnCours !== null) {
        alert("Une commande est déjà en préparation. Terminez-la d'abord.");    // On vérifie si une commande est déjà en cours
        return;
    }

    let commande = listeCommandes.commandes.find(commande => commande.id === idCommande);   // Sinon on récupère la commande grâce à l'id

    if (commande) {
        if (commande.statut === "Acceptée") {   // On vérifie que la commande est 'Acceptée'
            commandeEnCours = idCommande;   // On met à jour l'id de la commande en cours, pour ne pas pouvoir en commencer une autre
            mettreAJourBDD(idCommande, "En préparation");   // On met à jour le statut de la commande dans la base de données
        } else {
            alert("Cette commande ne peut pas être commencée car elle n'est pas acceptée.");
        }
    } else {
        alert("Commande non trouvée.");
    }
}


/*
    Permet de terminer une commande
*/
function terminerCommande(idCommande) {
    if (commandeEnCours !== idCommande) {   // On vérifie si la commande est en cours
        alert("Cette commande ne peut pas être terminée car elle n'est pas en préparation.");
        return;
    }

    let commande = listeCommandes.commandes.find(commande => commande.id === idCommande);   // On récupère la commande grâce à l'id

    if (commande) {
        if (commande.statut === "En préparation") {   // On vérifie que la commande est 'En préparation'
            mettreAJourBDD(idCommande, "Prête");    // On met à jour le statut de la commande dans la base de données
            miseAJourIngredients(idCommande);   // On met à jour le stocks des ingrédients dans la base de données
            commandeEnCours = null; // On réinitialise la commande en cours, afin de pouvoir commencer une autre commande
        } else {
            alert("Cette commande ne peut pas être terminée car elle n'est pas en cours.");
        }
    } else {
        alert("Commande non trouvée.");
    }
}


/*
    Permet de mettre à jour les stocks d'ingrédients
*/
function miseAJourIngredients(id) {
    let commandes = listeCommandes.commandes

    commandes.forEach(commande => {
        // On regarde si cela fait parti de la commande
        if (commande.id === id) {
            let quantiteCrepe = commande.nombre; // On récupère la quantité de crêpe commandée

            for (const [nom, [quantite, unite]] of Object.entries(commande.ingredients)) {
                $.ajax({
                    type: "POST",
                    url: "../../../Scripts/PhP/Quentin/miseAJourStock.php",
                    data: { nomIngredient: nom, quantiteIngredient: quantite, quantiteCrepe: quantiteCrepe }, // On envoie les données nécéssaires pour l'update
                    success: function(response) {
                        console.log("Stock mis à jour avec succès !");
                        console.log("OK : " + quantite + " " + unite + " " + nom);
                    },
                    error: function(xhr, status, error) {
                        console.log("Erreur lors de la mise à jour du stock ingrédient :", error);
                        console.log("NOP : " + quantite + " " + unite + " " + nom);
                    }
                });
            }
        }
    });
}


/*
    Permet d'afficher les détails des ingrédients d'une commande
*/
function afficherIngredients(id) {
    let commande = listeCommandes.commandes.find(commande => commande.OF === id);   // On récupère la commande grâce à l'id

    if (commande) {
        // On affiche avec une alert les ingrédients avec la quantité
        let ingredientsText = "Ingrédients de la commande " + id + " :\n\n";

        for (const [nom, [quantite, unite]] of Object.entries(commande.ingredients)) {
            ingredientsText += `• ${nom} : ${quantite} ${unite}\n`;
        }

        alert(ingredientsText);
    } else {
        alert("Ingrédients non trouvés.");
    }
}
