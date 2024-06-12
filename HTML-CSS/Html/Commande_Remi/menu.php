<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>La Creperie 🥞</title>
    <link rel="stylesheet" href="../../../HTML-CSS/style.css" />
    <link rel="stylesheet" href="../../../HTML-CSS/Css/StyleMenu.css" />
</head>

<body>
    <div class="wrapper">
        <header>
            <input type="number" class="panier input" value="0" readonly>
            <?php echo "<a href='#' onclick='document.forms[0].submit();'><img class='panier' src='../../Images/png/panier.png'></a>"; ?>
            <h1>La Crêperie</h1>
            <nav>
                <table>
                    <th><a href="../../../HTML-CSS/Html/Commande_Remi/index.php">Accueil</a></th>
                    <th><a href="#">Menu</a></th>
                    <th><a href="../../../HTML-CSS/Html/Commande_Remi/contactUs.php">Contact</a></th>
                </table>
            </nav>
        </header>
        <main>
            <section id="about">
                <h2>Notre menu</h2>
                <p>Bienvenu a La Creperie ! Découvrez notre univers gourmand où chaque crêpe est une déli
                    cieuse création artisanale, alliant tradition et innovation pour ravir vos papilles.</p>
            </section>


            <form action="../../../Scripts/PhP/Remi/addToCart.php" method="post">

                <?php
                include_once '../../../Scripts/PhP/Remi/afficherMenu.php';
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
