$(document).ready(function(){
    $('#Ajouter').click(function(e){
        e.preventDefault();
        var nomFourn = $('#nomFourn').val();
        var adresse = $('#adresse').val();
        var codePostal = $('#codePostal').val();
        var ville = $('#ville').val();
        var telephone = $('#telephone').val();

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
                alert(response);
            },
            fail: function () {
                alert("Erreur");
            }
        });
    });
});