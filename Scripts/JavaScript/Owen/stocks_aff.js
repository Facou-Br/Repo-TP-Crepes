require("https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js");
$(".modif_stock").on("click", function(){
    $.ajax({
        url: "../../../Scripts/PhP/Owen/stock/modif_stock.php",
        type: "POST",
        data: 'action=' + $(this).attr('value'),
    })
        .done(function(data){
            $("#madiv").html(data);
        })
        .fail(function(err) {
            alert( "error fail :"+err );
        });
    });
});