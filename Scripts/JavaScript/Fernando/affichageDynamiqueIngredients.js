$("select.fournisseurs").change(function () {
  $("div").empty();
  $.ajax({
    url: "../../../Scripts/PhP/Fernando/selectIngredients.php",
    type: "POST",
    data: {
      fournisseurs: $('#fournisseurs').val(),
    },
    success: function (data) {
      $.getJSON(
        "../../../Scripts/JavaScript/Fernando/ingredientsId.json",
        function (data) {
          $.each(data, function (key, val) {
            
          });
        }
      );
    },
    error: function () {
      alert("Erreur lors de la récupération des fournisseurs.");
    },
  });
  $("div").append(
    "<input type='submit' value='Ajouter un ingrédient'>"
  );
});
