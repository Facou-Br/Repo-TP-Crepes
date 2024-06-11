// Récupère la valeur de l'élément avec la classe 'stocks'
let actionValue = $(".stocks").val();

// Requête AJAX pour récupérer les stocks
$.ajax({
  url: "../../../Scripts/PhP/Owen/stock/afficher_stock.php",
  type: "POST",
  success: function (data) {
    // Analyse les données JSON reçues
    data = JSON.parse(data);
    // Parcourt chaque élément des données
    $.each(data, function (index, row) {
      // Ajoute une ligne dans le tableau avec les informations du stock
      $(".stocks").append(
          "<tr>" +
          "<td value='" + row["NomIngred"] + "'>" + row["NomIngred"] + "</td>" +
          "<td value='" + row["NomFourn"] + "'>" + row["NomFourn"] + "</td>" +
          "<td value='" + row["StockReel"] + "'>" + row["StockReel"] + "</td>" +
          "<td value='" + row["PrixUHT"] + "'>" + row["PrixUHT"] + "€</td>" +
          "</tr>"
      );
    });
  },
  error: function () {
    alert("Erreur lors de la récupération des stocks.");
  },
});
