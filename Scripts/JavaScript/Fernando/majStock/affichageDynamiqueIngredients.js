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
            $(".ingredients").append(
              "<label for=" + key + ">" + val + " : </label>"
            );
            $(".ingredients").append(
              "<input type='number' name=" +
                key +
                " required value=0 id=" +
                key +
                " class='produit'><br>"
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

$("#formulaireIngredients").on("submit", function (e) {
  e.preventDefault();

  let idIngredients = [];
  let ingredients = [];

  $(".ingredient").each(function () {
    idIngredients.push($(this).attr("id"));
    ingredients.push($(this).val());
  });

  let ingredientsObj = {};
  for (let i = 0; i < idIngredients.length; i++) {
    ingredientsObj[idIngredients[i]] = ingredients[i];
  }

  console.log(ingredientsObj);

  if (confirm("Are you sure you want to update the stock?")) {
    $.ajax({
      url: "../../../Scripts/PhP/Fernando/majStock_Fournisseur.php",
      type: "POST",
      data: {
        ingredientsObj: JSON.stringify(ingredientsObj),
      },
      success: function (data) {
        alert("Stock mis à jour.");
      },
      error: function () {
        alert("Erreur lors de la mise à jour du stock.");
      },
    });
  } else {
    alert("Mise à jour du stock annulée.");
  }
});
