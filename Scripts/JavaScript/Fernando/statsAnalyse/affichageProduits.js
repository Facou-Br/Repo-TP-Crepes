$.ajax({
    url: "../../../Scripts/PhP/Fernando/statsAnalyse/getQuantitesVendues.php",
    type: "GET",
    datatype: "json",
    success: function (data) {
        console.log(data);
        let arrayProduits = JSON.parse(data);
        $.each(arrayProduits, function (key, val) {
            $(".produits").append(
                "<option value='" + key + "'>" + val + "</option>"
            );
        }
        );
    },
    error: function () {
        alert("Erreur lors de la récupération des fournisseurs.");
    },
});
