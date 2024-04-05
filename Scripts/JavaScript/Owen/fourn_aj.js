$(document).ready(function (){
$("#Ajouter").click(function(){
    $.ajax({
        type:'POST',
        url:'../../../../PHP/Owen/fournisseur/ajouter_fournisseur.php',
        data: $(".form_fourn").serialize(),
        success: function(){
            alert("Fournisseur ajouté avec succès.");
        },
        error: function (){
            alert("Erreur lors de l'envoi du formulaire.");
        }
    });
});
});