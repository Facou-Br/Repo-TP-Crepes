$(document).ready(function(){
    $('#modifier').click(function(e){
        e.preventDefault();
        var NomProd = $('#recette-select').val();
        var Taille = $('#Taille').val();
        var Active = $('#Active').val();
        var NbIngBase = $('#NbIngBase').val();
        var NbIngOpt = $('#NbIngOpt').val();
        var Image = $('#Image').val();
        var IngBase1 = $('#IngBase1').val();
        var IngBase2 = $('#IngBase2').val();
        var IngBase3 = $('#IngBase3').val();
        var IngBase4 = $('#IngBase4').val();
        var IngBase5 = $('#IngBase5').val();
        var IngOpt1 = $('#IngOpt1').val();
        var IngOpt2 = $('#IngOpt2').val();
        var IngOpt3 = $('#IngOpt3').val();
        var IngOpt4 = $('#IngOpt4').val();
        var IngOpt5 = $('#IngOpt5').val();
        var IngOpt6 = $('#IngOpt6').val();
        var NbOptMax = $('#NbOptMax').val();
        var DateArchiv = $('#DateArchiv').val();

        $.ajax({
            type: 'POST',
            url: '../../../Scripts/PHP/Noe/modif_recette.php',
            data: {
                NomProd: NomProd,
                Taille: Taille,
                Active: Active,
                NbIngBase: NbIngBase,
                NbIngOpt: NbIngOpt,
                Image: Image,
                IngBase1: IngBase1,
                IngBase2: IngBase2,
                IngBase3: IngBase3,
                IngBase4: IngBase4,
                IngBase5: IngBase5,
                IngOpt1: IngOpt1,
                IngOpt2: IngOpt2,
                IngOpt3: IngOpt3,
                IngOpt4: IngOpt4,
                IngOpt5: IngOpt5,
                IngOpt6: IngOpt6,
                NbOptMax: NbOptMax,
                DateArchiv: DateArchiv,
            },
            success: function(response){
                alert("Recette modifié avec succès"); //Popup au lieu d'alerte
                $("#resultat").append(response);
                var recette = data.find(r => r.NomProd === selectedRecette);

                if (recette) {
                    $('#nomProd').val("");
                    $('#Taille').val("");
                    $('#Active').val("");
                    $('#NbIngBase').val("");
                    $('#NbIngOpt').val("");
                    $('#Image').val("");
                    $('#IngBase1').val("");
                    $('#IngBase2').val("");
                    $('#IngBase3').val("");
                    $('#IngBase4').val("");
                    $('#IngBase5').val("");
                    $('#IngOpt1').val("");
                    $('#IngOpt2').val("");
                    $('#IngOpt3').val("");
                    $('#IngOpt4').val("");
                    $('#IngOpt5').val("");
                    $('#IngOpt6').val("");
                    $('#NbOptMax').val("");
                    $('#DateArchiv').val("");
                }
            },
            fail: function () {
                alert("Erreur");
            }
        });
    });
});