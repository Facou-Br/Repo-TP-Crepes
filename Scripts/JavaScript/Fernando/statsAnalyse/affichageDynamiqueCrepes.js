$.ajax({
    url: "../../../Scripts/PhP/Fernando/selectCrepes.php",
    success: function (data) {
      $.getJSON(
        "../../../Scripts/JavaScript/Fernando/crepes.json",
        function (data) {
          $.each(data, function (key, val) {
            $(".crepes").append(
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