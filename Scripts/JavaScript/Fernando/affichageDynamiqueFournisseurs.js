$.ajax({
    url: "../../../Scripts/PhP/Fernando/selectFournisseurs.php",
    type: "POST",
    success: function(data) {
        $.each(data, function(key,val) {
            $(".fournisseurs").append("<option value='" + val + "'>" + val + "</option>");
        });
    },
});