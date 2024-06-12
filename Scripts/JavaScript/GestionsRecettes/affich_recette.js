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
            let selectedRecette = $(this).val()
            let recette = data.find(r => r.NomProd === selectedRecette)
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
