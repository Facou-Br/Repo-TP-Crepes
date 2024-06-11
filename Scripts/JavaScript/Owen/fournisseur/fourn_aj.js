$(document).ready(function(){
    // Attache une fonction de clic au bouton avec l'ID 'Ajouter'
    $('#Ajouter').click(function(e){
        // Empêche le comportement par défaut du bouton (soumission du formulaire)
        e.preventDefault();

        // Récupère les valeurs des champs de saisie
        let nomFourn = $('#nomFourn').val();
        let adresse = $('#adresse').val();
        let codePostal = $('#codePostal').val();
        let ville = $('#ville').val();
        let telephone = $('#telephone').val();

        $.ajax({
            type: 'POST',
            url: '../../../Scripts/PHP/Owen/fournisseur/ajouter_fourn.php',
            data: {
                nomFourn: nomFourn,
                adresse: adresse,
                codePostal: codePostal,
                ville: ville,
                telephone: telephone
            },
            success: function(response){
                // Affiche la réponse du serveur
                alert("Fournisseur ajouté avec succès");
            },
            fail: function () {
                // Affiche un message d'erreur
                alert("Erreur");
            }
        });
    });
});
