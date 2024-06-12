<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Interface de stockage</title>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../style.css">
  <link rel="stylesheet" href="../../Css/Style_gestionStocks.css" />
</head>

<body class="gestionStocks">
  <div id="page" class="wrapper">
    <header>
      <h1>Interface de stockage</h1>
      <nav>
        <a href="../../../HTML-CSS/Html/Gerant/index.php">Accueil</a>
        <a href="gestion_fournisseurs.php">Fournisseurs</a>
        <a href="ajouter_stock.php">Ajouter</a>
        <a href="modifier_stocks.php">Modifier</a>

      </nav>
    </header>
    <br />
    <div id="resultat">
      <table id="stocks" class="stocks">
        <tr>
          <th>Nom Ingrédient</th>
          <th>Fournisseur</th>
          <th>Quantité</th>
          <th>Prix UHT</th>
        </tr>
      </table>
    </div>
    <br>

    <br /><br />
    <footer id="footerStocks">
      <p>Interface de stockage</p>
      <script src="https://code.jquery.com/jquery-latest.js"></script>
      <script src="../../../Scripts/JavaScript/Owen/stock/stocks_aff.js"></script>
    </footer>
  </div>
</body>

</html>
