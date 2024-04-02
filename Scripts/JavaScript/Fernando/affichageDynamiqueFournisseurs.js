$.ajax({
  url: "../../../Scripts/PhP/Fernando/selectFournisseurs.php",
  type: "POST",
  success: function (data) {
    $.getJSON(
      "../../../Scripts/JavaScript/Fernando/fournisseurs.json",
      function (data) {
        $.each(data, function (key, val) {
          $(".fournisseurs").append(
            "<option value='" + val + "'>" + val + "</option>"
          );
        });
      }
    );
  },
  error: function () {
    alert("Erreur lors de la récupération des fournisseurs.");
  },
});
