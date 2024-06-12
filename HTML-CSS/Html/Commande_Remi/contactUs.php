<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>La Creperie 🥞</title>
    <link rel="stylesheet" href="../../../HTML-CSS/style.css" />
</head>

<body>
    <div class="wrapper">
        <header>
            <h1>La Crêperie</h1>
            <nav>
                <table>
                    <th><a href="../../../HTML-CSS/Html/Commande_Remi/index.php">Accueil</a></th>
                    <th><a href="../../../HTML-CSS/Html/Commande_Remi/menu.php">Menu</a></th>
                    <th><a href="#">Contact</a></th>
                </table>
            </nav>
        </header>

        <body>
            <section>
                <h2>Contactez-nous</h2>
                <form>
                    <label for="name">Nom:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>

                    <button type="submit">Envoyer</button>
                </form>
            </section>
        </body>
        <footer>
            <p>&copy; 2024 La Crêperie. Tous droits réservés.</p>
        </footer>
    </div>
    <!-- wrapper -->
</body>

</html>
