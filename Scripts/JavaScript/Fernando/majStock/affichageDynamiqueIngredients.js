$("select.fournisseurs").change(function () {
  $(".ingredients").empty();
  $.ajax({
    url: "../../../Scripts/PhP/Fernando/selectIngredients.php",
    type: "POST",
    data: {
      fournisseurs: $("#fournisseurs").val(),
    },
    success: function (data) {
      $.getJSON(
        "../../../Scripts/JavaScript/Fernando/ingredientsId.json",
        function (data) {
          $(".ingredients").append("<br>");
          $.each(data, function (key, val) {
            $(".ingredients").append("<label for=" + key + ">" + val + " : </label>");
            $(".ingredients").append(
              "<input type='number' name=" +
                key +
                " required value=0 id=" +
                key +
                " class='ingredient'> <br>"
            );
          });
          $(".ingredients").append(
            "<br> <input id='majStock' class='majStock' type='submit' value='Mettre à jour le stock'>"
          );
        }
      );
    },
    error: function () {
      alert("Erreur lors de la récupération des fournisseurs.");
    },
  });
});