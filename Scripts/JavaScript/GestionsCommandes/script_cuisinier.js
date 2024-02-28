let commandes = [
    { id: 1, nom: "Crepe au Nutella", temps: "10:00", statut: "En attente" },
    { id: 2, nom: "Crepe à la confiture", temps: "10:30", statut: "En attente" },
    { id: 3, nom: "Crepe au sucre", temps: "11:00", statut: "En attente" },
    { id: 4, nom: "Crepe au Nutella", temps: "10:00", statut: "En attente" },
    { id: 5, nom: "Crepe à la confiture", temps: "10:30", statut: "En attente" },
    { id: 6, nom: "Crepe au sucre", temps: "15:00", statut: "En attente" },
    { id: 7, nom: "Crepe à la confiture", temps: "14:00", statut: "En attente" },
    { id: 8, nom: "Crepe au Nutella", temps: "13:00", statut: "En attente" },
    { id: 9, nom: "Crepe au sucre", temps: "10:00", statut: "En attente" },
    { id: 10, nom: "Crepe à la confiture", temps: "22:00", statut: "En attente" }
];


let crepes = [
    { idCrepe: 1, nom: "Crepe au Nutella", ingredient1: "Farine", ingredient2: "Oeuf", ingredient3: "Lait", ingredient4: "Nutella" },
    { idCrepe: 2, nom: "Crepe à la confiture", ingredient1: "Farine", ingredient2: "Oeuf", ingredient3: "Lait", ingredient4: "Confiture" },
    { idCrepe: 3, nom: "Crepe au sucre", ingredient1: "Farine", ingredient2: "Oeuf", ingredient3: "Lait", ingredient4: "Sucre" }
];


document.addEventListener('DOMContentLoaded', function() {
    afficherCommandes();
});

function afficherCommandes() {
    let listeCommandes = document.getElementById("commandesList");
    listeCommandes.innerHTML = "";

    commandes.sort((a, b) => {
        return a.temps.localeCompare(b.temps);
    });

    commandes.forEach(commande => {
        let elementCommande = document.createElement("div");
        elementCommande.innerHTML = `
            <div class="commande">
                <p>Nom : ${commande.nom}</p>
                <p>Heure de mise à disposition : ${commande.temps}</p>
                <p>Statut : ${commande.statut}</p>
                <button onclick="commencerCommande(${commande.id})">Commencer</button>
                <button onclick="terminerCommande(${commande.id})">Terminer</button>
                <button onclick="afficherIngredients(${commande.id})">Voir les details</button>
                <hr>
            </div>
        `;
        listeCommandes.appendChild(elementCommande);
    });
}


function commencerCommande(idCommande) {
    let commande = commandes.find(commandes => commandes.id === idCommande);
    if (commande.statut === "En attente") {
        let progressionCommande = commandes.some(commande => commande.statut === "En cours");
        if (!progressionCommande) {
            commande.statut = "En cours";
            afficherCommandes();
        } else {
            alert("Une commande est dejà en cours. Terminez-la d'abord.");
        }
    } else {
        alert("Cette commande a dejà ete commencee ou terminee.");
    }
}

function terminerCommande(idCommande) {
    let commande = commandes.find(commandes => commandes.id === idCommande);
    if (commande.statut === "En cours") {
        commande.statut = "Terminée";
        afficherCommandes();
    } else {
        alert("Cette commande ne peut pas etre terminee car elle n'est pas en cours.");
    }
}

function afficherIngredients(id) {

}
