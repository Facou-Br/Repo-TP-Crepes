$.ajax({
    url: "../../../Scripts/PhP/Noe/affich_recette.php",
    type: "POST",
    success: function (data) {
        data = JSON.parse(data)
        $.each(data, function (index, recette) {
            $("#recette-select").append(
                $("<option></option>").val(recette["NomProd"]).text(recette["NomProd"])
            )
        })
        $("#recette-select").change(function() {
            var selectedRecette = $(this).val()
            var recette = data.find(r => r.NomProd === selectedRecette)
            if (recette) {
                $("#NomProd").val(recette.NomProd)
                $("#Taille").val(recette.Taille)
                $("#Active").val(recette.Active)
                $("#NbIngBase").val(recette.NbIngBase)
                $("#NbIngOpt").val(recette.NbIngOpt)
                $("#Image").val(recette.Image)
                $("#PrixUHT").val(recette.PrixUHT)
                $("#IngBase1").val(recette.IngBase1)
                $("#IngBase2").val(recette.IngBase2)
                $("#IngBase3").val(recette.IngBase3)
                $("#IngBase4").val(recette.IngBase4)
                $("#IngBase5").val(recette.IngBase5)
                $("#IngOpt1").val(recette.IngOpt1)
                $("#IngOpt2").val(recette.IngOpt2)
                $("#IngOpt3").val(recette.IngOpt3)
                $("#IngOpt4").val(recette.IngOpt4)
                $("#IngOpt5").val(recette.IngOpt5)
                $("#IngOpt6").val(recette.IngOpt6)
                $("#NbOptMax").val(recette.NbOptMax)
                $("#DateArchiv").val(recette.DateArchiv)
            }
        })
    },

    error: function () {
        alert("Erreur lors de la récupération des recettes.")
    }
})


$(document).ready(function(){
    $('#modifier').click(function(e){
        e.preventDefault()
        var NomProd = $('#recette-select').val()
        var Taille = $('#Taille').val()
        var Active = $('#Active').val()
        var NbIngBase = $('#NbIngBase').val()
        var NbIngOpt = $('#NbIngOpt').val()
        var Image = $('#Image').val()
        var IngBase1 = $('#IngBase1').val()
        var IngBase2 = $('#IngBase2').val()
        var IngBase3 = $('#IngBase3').val()
        var IngBase4 = $('#IngBase4').val()
        var IngBase5 = $('#IngBase5').val()
        var IngOpt1 = $('#IngOpt1').val()
        var IngOpt2 = $('#IngOpt2').val()
        var IngOpt3 = $('#IngOpt3').val()
        var IngOpt4 = $('#IngOpt4').val()
        var IngOpt5 = $('#IngOpt5').val()
        var IngOpt6 = $('#IngOpt6').val()
        var NbOptMax = $('#NbOptMax').val()
        var DateArchiv = $('#DateArchiv').val()

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
                alert("Recette modifié avec succès")
                $("#resultat").append(response)
                var recette = data.find(r => r.NomProd === selectedRecette)

                if (recette) {
                    $('#nomProd').val("")
                    $('#Taille').val("")
                    $('#Active').val("")
                    $('#NbIngBase').val("")
                    $('#NbIngOpt').val("")
                    $('#Image').val("")
                    $('#IngBase1').val("")
                    $('#IngBase2').val("")
                    $('#IngBase3').val("")
                    $('#IngBase4').val("")
                    $('#IngBase5').val("")
                    $('#IngOpt1').val("")
                    $('#IngOpt2').val("")
                    $('#IngOpt3').val("")
                    $('#IngOpt4').val("")
                    $('#IngOpt5').val("")
                    $('#IngOpt6').val("")
                    $('#NbOptMax').val("")
                    $('#DateArchiv').val("")
                }
            },
            fail: function () {
                alert("Erreur")
            }
        })
    })
})