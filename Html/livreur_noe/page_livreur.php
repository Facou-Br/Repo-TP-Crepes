<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livreur</title>
    <link rel="stylesheet" href="../../style.css">
    <style>
        #listeCommande {
            grid-template-columns: repeat(4, 1fr);
        }
        #card{
            
        }
    </style>
</head>
<?php 
// require_once '/connexion.php';
?>
<body>
    <header>
        <h1>La Crêperie</h1>
        <nav>
            <table>
                <th><a href="..\..\index.html">Accueil</a></th>
                <th><a href="#">Réservation</a></th>
                <th><a href="#">Contact</a></th>
            </table>
        </nav>
    </header>

    <!-- Note à moi même : check sur Oukoikan pour la disposition des cards -->
    <div id="listeCommande">
        <card id="card">
            <table id="tableLivreur">
                <tr id="trLivreur">
                    Client 1
                </tr>
                <tr id="trLivreur">
                    <td id="tdLivreur">
                        <button onclick="window.location.href='tel:+123456789'">Appeler</button>
                    </td>
                    <td id="tdLivreur">
                    <button onclick="window.location.href='page_commande.php'">Récupérer</button>
                    </td>
                </tr>
            </table>
        </card>

        
        <card>
            <table id='tableLivreur'>
                <tr id="trLivreur">
                    Client 2
                </tr>
                <tr id="trLivreur">
                    <td id="tdLivreur">
                        <button onclick="window.location.href='tel:+987654321'">Appeler</button>
                    </td>
                    <td id="tdLivreur">
                        <button onclick="window.location.href='page_commande.php'">Récupérer</button>
                    </td>
                </tr>
            </table>
        </card>
    </div>
    
    <footer>
        <p>&copy; 2022 La Crêperie. Tous droits réservés.</p>
    </footer>
    
    
</body>
</html>