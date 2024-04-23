$(document).ready(function (){
    $("#form_fourn").submit(function(event){
        event.preventDefault();
        $.ajax({
            type:'POST',
            url:'../../../../PHP/Owen/fournisseur/ajouter_fournisseur.php',
            data: $(this).serialize(),
            success: function(){
                alert("Fournisseur ajouté avec succès.");
            },
            error: function (){
                alert("Erreur lors de l'envoi du formulaire.");
            }
        });
    });
});