<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Gestion des stocks</title>
  <link rel="stylesheet" href="../../Css/styleFormulaire.css">
  <script src="https://code.jquery.com/jquery-latest.js"></script>
</head>

<body>
  <header>
    <h1>Modifier un élément</h1>
    <nav>
      <a href="gestions_stocks.php">Retour</a>
    </nav>
  </header>
  <div class="wrapper">
    <div class="select">
      <select id="stocks-select" class="select-centre">
        <option value=#>Choisir un élément</option>
      </select>
      <select id="fournisseur-select" class="select-centre">
        <option value=#>Choisir un fournisseur</option>
      </select>
    </div>

    <form id="stocks-form">
      <input type="number" id="stockReel" name="stockReel" placeholder="Quantité" required>
      <input type="text" id="prix" name="prix" placeholder="Prix UHT" required>
      <div class="bouton">
        <button id="modifier" type="submit">Envoyer</button>
        <button id="supprimer" type="submit">Supprimer</button>
      </div>
    </form>
    <a id="resultat"></a>

  </div>
  <footer>
    <p>&copy; 2022 La Crêperie. Tous droits réservés.</p>
    <script src="../../../Scripts/JavaScript/Owen/stock/modifs_stocks.js"></script>
    <script src="../../../Scripts/JavaScript/Owen/stock/suppr_stock.js"></script>
  </footer>
</body>

</html>
