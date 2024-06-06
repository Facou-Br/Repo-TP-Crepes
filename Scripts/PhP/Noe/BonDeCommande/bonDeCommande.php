<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styleBonDeCommande.css">
        <title>Bon de commande</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="afficherIngredient.js" defer></script>
    </head>
    <body>
        <div class="wrapper">
            <header>
                <h1>Bon de commande</h1>
            </header>
            <form id="commandeForm" action="generationPDF.php" method="post">
                <div class="groupe-formulaire">
                    <label for="fournisseur">Fournisseur :</label>
                    <select id="fournisseur" name="fournisseur" required>
                        <?php
                            // Connexion à la BdD
                            require_once '../../../../BaseDeDonnees/codesConnexion.php';
                            $connex = BaseDeDonnees::connecterBDD('admin');

                            $rq = "SELECT NomFourn FROM FOURNISSEUR ORDER BY NomFourn ASC";
                            $resultat = $connex->query($rq);

                            while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='{$ligne['NomFourn']}'>{$ligne['NomFourn']}</option>";
                            }
                        ?>
                    </select>
                </div>  <!-- GROUPE-FOURMULAIRE -->

                <div class="groupe-formulaire">
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required>
                </div>  <!-- GROUPE-FOURMULAIRE -->

                <div class="groupe-formulaire">
                    <label for="date">Date de livraison :</label>
                    <input type="date" id="date" name="date" required>
                </div>  <!-- GROUPE-FOURMULAIRE -->

                <div id="ingredients">
                    <div class="groupe-formulaire ingredient">
                        <label for="ingredients">Ingrédient</label>
                        <select class="ingredients" name="ingredients[]" required>
                            <option value="" disabled selected>Choisir un ingrédient</option>
                            <!-- Affichage des ingrédients de façon dynamique -->
                        </select>

                        <label for="quantite">Quantité</label>
                        <input type="number" class="quantite" name="quantite[]" min="1" required>
                        <button type="button" class="btn-ajouter-ingredient">+</button>
                    </div>  <!-- GROUPE-FOURMULAIRE  INGREDIENT-->
                </div>  <!-- CONTENEUR-INGREDIENTS -->

                <input type="submit" value="Générer le bon de commande">
            </form>
        </div>  <!-- WRAPPER -->

        <script>
            document.getElementById('commandeForm').addEventListener('submit', function(event) {
                event.preventDefault();
                alert('Bon de commande créé avec succès!');
                this.submit();
            });
        </script>
    </body>
</html>
