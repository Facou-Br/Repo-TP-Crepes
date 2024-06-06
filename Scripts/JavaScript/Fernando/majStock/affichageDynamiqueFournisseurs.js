/**
 * Fait appel à un script PHP pour récupérer les fournisseurs et les afficher dans une liste déroulante
 *
 * @Facou-Br
 * @returns {void}
 */
$.ajax({
  url: "../../../Scripts/PhP/Fernando/majStock/selectFournisseurs.php",
  type: "GET",
  datatype: "json",
  success: function (data) {
    let arrayFournisseurs = JSON.parse(data);
    $.each(arrayFournisseurs, function (key, val) {
      $(".fournisseurs").append(
        "<option value='" + val + "'>" + val + "</option>"
      );
    });
  },
  error: function () {
    alert("Erreur lors de la récupération des fournisseurs.");
  },
});