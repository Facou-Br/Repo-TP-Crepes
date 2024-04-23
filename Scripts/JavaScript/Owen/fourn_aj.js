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


// Trigger an event when the form is submitted
const form = document.getElementById('form_fourn');
form.addEventListener('submit', (event) => {

    // Get form data
    let nameFourn = document.getElementById('nomFourn').value;
    let adresse = document.getElementById('adresse').value;
    let codePostal = document.getElementById('codePostal').value;
    let ville = document.getElementById('ville').value;
    let telephone = document.getElementById('telephone').value;

    // Ajax query
    $.ajax('../../../../HTML')
        .post({ "nameFourn": firstname, "nameFourn": lastname})
        .then(function (response) { output.textContent = response })
        .catch(function(failure) { alert ('Error') })

    // Prevent HTML posting form
    event.preventDefault();
});