/**
 * Fait appel à un script PHP pour récupérer les produits et les afficher dans une liste déroulante
 *
 * @Facou-Br
 * @returns {void}
 */
$.ajax({
    url: "/Scripts/PhP/Fernando/statsAnalyse/getProduits.php",
    type: "GET",
    datatype: "json",
    success: function (data) {
      let arrayProduits = JSON.parse(data);
      console.log(arrayProduits);
      $.each(arrayProduits, function (key, val) {
        $(".produits").append(
          "<option value='" + key + "'>" + val + "</option>"
        );
      });
    },
    error: function () {
      alert("Erreur lors de la récupération des produits.");
    },
  });