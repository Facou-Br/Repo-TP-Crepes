function ajouterCommande(nouvelleCommande) {

    $.ajax({
        type: "POST",
        url: "../../.././Scripts/PhP/Noe/ajouterRecette.php",
        data: JSON.stringify(nouvelleCommande),
        contentType: "application/json",
        success: function(response) {
            console.log("Nouvelle commande ajoutée à la base de données avec succès !")
            chargerCommandes()
        },
        error: function(error) {
            console.error("Erreur lors de l'ajout de la nouvelle commande dans la base de données :", error)
            alert("Une erreur s'est produite lors de l'ajout de la nouvelle commande dans la base de données.")
        }
    })
}