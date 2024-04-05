$(".aff_stock").change(function(){
    var actionValue = $(this).val();
    $("div").empty();
    $.ajax({
        url: "../../PhP/Owen/stock/afficher_stock.php",
        type: "POST",
        data: {action: actionValue},
        success: function (data) {
            $.getJSON("stocks.json", function(data) {
                $.each(data, function(index, row) {
                    $("div").append(
                        "<tr>" +
                        "<td value='" + row['NomIngred'] + "'>" + row['NomIngred'] + "</td>" +
                        "<td value='" + row['NomFourn'] + "'>" + row['NomFourn'] + "</td>" +
                        "<td value='" + row['SeuilStock'] + "'>" + row['SeuilStock'] + "</td>" +
                        "<td value='" + row['StockMin'] + "'>" + row['StockMin'] + "</td>" +
                        "<td value='" + row['StockReel'] + "'>" + row['StockReel'] + "</td>" +
                        "<td value='" + row['PrixUHT_Moyen'] + "'>" + row['PrixUHT_Moyen'] + "</td>" +
                        "<td><button type='button' class='modif_stock'>Modifier</button></td>" +
                        "</tr>"
                    );
                });
            });

        }, // closing brace and parenthesis for success function
        error: function () {
            alert("Erreur lors de la récupération des stocks.");
        },
    });
});