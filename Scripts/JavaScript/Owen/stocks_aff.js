$(".aff_stock").change(function(){
    $("div").empty();
    $.ajax({
        url: "../../PhP/Owen/stock/afficher_stock.php",
        type: "POST",
        data: 'action=' + $(this).attr('value'),
        success: function (data) {
            $.getJSON(
                "stocks.json",
                function (data) {
                    $.each(data, function (key, val) {
                        $("div").append("<td value="+val+">" + val + "</td>");
                    });
                }
            );
        },
        error: function () {
            alert("Erreur lors de la récupération des stocks.");
        },
    });
});