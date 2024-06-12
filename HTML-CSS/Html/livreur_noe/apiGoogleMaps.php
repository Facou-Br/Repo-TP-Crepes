<!DOCTYPE html>
<!--
 @license
 Copyright 2019 Google LLC. All Rights Reserved.
 SPDX-License-Identifier: Apache-2.0
-->
<html lang="fr">
  <head>
    <meta
      charset="UTF-8"
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>Displaying Text Directions With setPanel()</title>
    <style>
      /**
       * @license
       * Copyright 2019 Google LLC. All Rights Reserved.
       * SPDX-License-Identifier: Apache-2.0
       */
      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #container {
        height: 100%;
        display: flex;
      }

      #sidebar {
        flex-basis: 15rem;
        flex-grow: 1;
        padding: 1rem;
        max-width: 30rem;
        height: 100%;
        box-sizing: border-box;
        overflow: auto;
      }

      #map {
        flex-basis: 0;
        flex-grow: 4;
        height: 100%;
      }

      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: "Roboto", "sans-serif";
        line-height: 30px;
        padding-left: 10px;
      }

      #floating-panel {
        background-color: #fff;
        border: 0;
        border-radius: 2px;
        box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
        margin: 10px;
        padding: 0 0.5em;
        font: 400 18px Roboto, Arial, sans-serif;
        overflow: hidden;
        padding: 5px;
        font-size: 14px;
        text-align: center;
        line-height: 30px;
        height: auto;
      }

      #map {
        flex: auto;
      }

      #sidebar {
        flex: 0 1 auto;
        padding: 0;
      }
      #sidebar > div {
        padding: 0.5rem;
      }
    </style>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  </head>
  <body>
    <div id="floating-panel">
      <strong>Start:</strong>
      <select id="start" title="start">
        <option
          value="l'Usinerie, 11 Rue Georges Maugey, 71100 Chalon-sur-Saône"
        >
          Cnam Usinerie, France
        </option>
      </select>
      <br />
      <strong>End:</strong>
      <select id="end" title="end">
        <option value="">La Sucrerie, France</option>
      </select>
      <br />
      <b>Mode of Travel: </b>
      <select id="mode" title="Mode of Travel">
        <option value="DRIVING">Driving</option>
        <option value="WALKING">Walking</option>
        <option value="BICYCLING">Bicycling</option>
        <option value="TRANSIT">Transit</option>
      </select>
    </div>
    <div id="container">
      <div id="map"></div>
      <div id="sidebar"></div>
    </div>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAR9AWpK5CIh7MVP5o-pPhxkeOXbmrnPaE&callback=initMap&v=weekly&solution_channel=GMP_CCS_textdirections_v1"
      defer
    ></script>
    <script>
      /**
       * @license
       * Copyright 2019 Google LLC. All Rights Reserved.
       * SPDX-License-Identifier: Apache-2.0
       */

      function initMap() {
        const directionsRenderer = new google.maps.DirectionsRenderer();
        const directionsService = new google.maps.DirectionsService();
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 7,
          center: { lat: 41.85, lng: -87.65 },
          disableDefaultUI: true,
        });

        directionsRenderer.setMap(map);
        directionsRenderer.setPanel(document.getElementById("sidebar"));

        const control = document.getElementById("floating-panel");

        map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);
        calculateAndDisplayRoute(directionsService, directionsRenderer);

        const onChangeHandler = function () {
          calculateAndDisplayRoute(directionsService, directionsRenderer);
        };

        document
          .getElementById("end")
          .addEventListener("change", onChangeHandler);
        document
          .getElementById("mode")
          .addEventListener("change", onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        const start =
          "l'Usinerie, 11 Rue Georges Maugey, 71100 Chalon-sur-Saône";
        const end = "30 Quai Saint-Cosme, 71100 Chalon-sur-Saône";
        const selectedMode = document.getElementById("mode").value;

        directionsService
          .route({
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode[selectedMode],
          })
          .then((response) => {
            directionsRenderer.setDirections(response);
          })
          .catch((e) =>
            window.alert("Directions request failed due to " + status)
          );
      }

      window.initMap = initMap;
    </script>
  </body>
</html>
