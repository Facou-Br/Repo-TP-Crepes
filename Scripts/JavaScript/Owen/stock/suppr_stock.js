$(document).ready(function(){
    $('#supprimer').click(function(e){
        e.preventDefault();
        var nomIngred = $('#stocks-select').val();

        $.ajax({
            type: 'POST',
            url: '../../../Scripts/PHP/Owen/stock/supprimer_stock.php',
            data: {
                nomIngred: nomIngred
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