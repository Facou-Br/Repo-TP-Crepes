<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livreur</title>
    <link rel="stylesheet" href="../../style.css">
    <style>
        .card {
            width: 400px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        
        #map {
            width: 100%;
            height: 300px;
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

    <card style="display:flex; margin-left:auto; margin-right:auto; ">
<<<<<<< HEAD
        
        <button onclick="window.location.href='page_livreur.php'">Retour</button>
=======
        <div class="card">
            <div id="map"></div>
        </div>

        <script>
            let map;
            async function initMap(): Promise<void> {
            const position = { lat: -25.344, lng: 131.031 };

            const { Map } = await google.maps.importLibrary("maps") as google.maps.MapsLibrary;
            const { AdvancedMarkerView } = await google.maps.importLibrary("marker") as google.maps.MarkerLibrary;

            map = new Map(
                document.getElementById('map') as HTMLElement,
                {
                zoom: 4,
                center: position,
                mapId: 'DEMO_MAP_ID',
                }
            );

            const marker = new AdvancedMarkerView({
                map: map,
                position: position,
                title: 'Uluru'
            });
            }

            initMap();
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=VOTRE_CLE_API&callback=initMap" async defer></script>
>>>>>>> parent of a1041b3 (API maps livreurs à faire en dernier)
    </card>
    
    <footer>
        <p>&copy; 2022 La Crêperie. Tous droits réservés.</p>
    </footer>


</body>
</html>