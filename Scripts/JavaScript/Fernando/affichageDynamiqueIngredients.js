$("select.fournisseurs").change(function () {
  $("div").empty();
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
          $("div").append("<br>");
          $.each(data, function (key, val) {
            $("div").append("<label for='ingredient'>" + val + " : </label>");
            $("div").append(
              "<input type='text' name='ingredient' placeholder='Ingrédient'> <br>"
            );
          });
          $("div").append(
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

$(document).ready(function() {
  $('#formulaireIngredients').on('submit', function(e) {
      e.preventDefault();
      let mettreStockAJour = $('#majStock').click(function() {
        return confirm('Are you sure you want to update the stock?');
    });
  });
});