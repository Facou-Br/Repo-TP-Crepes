require("https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js");
$(document).ready(function(){
    $("button").click(function(){

        $.ajax({
            type:'POST',
            url:'ajouter_stock.php',
            data: $("#Form1").serialize(),

        })
            .done(function(data){
                $("#madiv").html(data);
            })
            .fail(function() {
                alert( "Erreur lors de l'envoi du formulaire." );
            });


    });
});