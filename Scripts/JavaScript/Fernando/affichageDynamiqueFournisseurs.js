$.getJSON("../../../Scripts/JavaScript/Fernando/fournisseurs.json", function(data) {
    $.each(data, function(key,val) {
        $(".fournisseurs").append("<option value='" + val + "'>" + val + "</option>");
    });
});