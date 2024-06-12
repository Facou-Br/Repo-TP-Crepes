<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta
      charset="UTF-8"
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>Gestion des fournisseurs</title>
    <link rel="stylesheet" href="../../style.css" />
    <link rel="stylesheet" href="../../Css/Style_gestionStocks.css" />
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="../../../Scripts/JavaScript/Owen/fournisseur/fourn_aff.js"></script>
  </head>
  <body class="gestionFourn">
    <div class="wrapper">
      <header>
        <h1>Gestion des Fournisseurs</h1>
        <nav>
          <a href="../../../HTML-CSS/Html/Gerant/index.php">Accueil</a>
          <a
            href="../../../HTML-CSS/Html/GestionInventaire_Owen/gestions_stocks.php"
            >Gestion des stocks</a
          >
          <a
            href="../../../HTML-CSS/Html/GestionInventaire_Owen/ajouter_fourn.php"
            >Ajouter</a
          >
          <a
            href="../../../HTML-CSS/Html/GestionInventaire_Owen/modifier_fourn.php"
            >Modifier</a
          >
        </nav>
      </header>

      <div id="resultat">
        <table id="fournisseur" class="fournisseur">
          <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Code Postal</th>
            <th>Téléphone</th>
          </tr>
        </table>
      </div>
      <footer id="footer">
        <p>Interface de stockage</p>
      </footer>
    </div>
  </body>
</html>
