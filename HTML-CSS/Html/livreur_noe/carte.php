<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livreur</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>OpenStreetMap avec Leaflet</h1>
    <div id="map"></div>

    <script>
        var map = L.map('map', {
            center: [51.505, -0.09],
            zoom: 13
        });
    </script>
    <button onclick="window.location.href='page_commande.php'">Retour</button>
</body>
</html>
