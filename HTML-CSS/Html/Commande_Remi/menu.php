<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Remi Roullet" />
    <meta name="description" content="Équipe Crêpe" />
    <meta name="robots" content="all" />
    <meta name="copyright" content="Équipe Crêpe" />
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../Css/StyleMenu.css">

    <title>Équipe Crêpe</title>
    </head>
<body>
<div class="wrapper">
    <header>
        <input type="number" class="panier input" value="0" readonly >
        <img class="panier" src="../../Images/png/panier.png">

        <h1>La Crêperie</h1>
        <nav>
            <table>
                <th><a href="index.html">Accueil</a></th>
                <th><a href="#">Menu</a></th>
                <th><a href="#">Réservation</a></th>
                <th><a href="#">Contact</a></th>
            </table>
        </nav>
    </header>
    <main>
        <section id="about">
            <h2>Notre menu</h2>
            <p>Bienvenu a La Creperie ! Découvrez notre univers gourmand où chaque crêpe est une délicieuse création artisanale, alliant tradition et innovation pour ravir vos papilles.</p>
        </section>


        <form action="../../../Scripts/PhP/Remi/addToCart.php" method="post">

            <?php
        include '../../../Scripts/PhP/Remi/afficherMenu.php';
    ?>


        </form>
    </main>

    <footer>
        <p>&copy; 2024 La Crêperie. Tous droits réservés.</p>
    </footer>
</div>
<script src="../../../Scripts/JavaScript/remi/buttonCtrl.js"></script>
</body>
</html>
