let actionValue = $(".stocks").val();
//$(".stocks").empty();

$.ajax({
  url: "../../../Scripts/PhP/Owen/stock/afficher_stock.php",
  type: "POST",
  success: function (data) {
    data = JSON.parse(data);
      $.each(data, function (index, row) {
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