<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            align-items: center;
            justify-content: center;
            display: flex;
            flex-direction: column;
        }

        canvas {
            width: 800px;
            max-width: 600px
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<body>
    <div>
        <canvas id="pieChart"></canvas>
    </div>
    <div>
        <canvas id="lineChart"></canvas>
    </div>
    <div>
        <canvas id="stackedBarChar"></canvas>
    </div>
</body>

<footer>
    <script src=../../../../Scripts/JavaScript/Fernando/statsAnalyse/pie.js></script>
    <script src=../../../../Scripts/JavaScript/Fernando/statsAnalyse/line.js></script>
    <script src=../../../../Scripts/JavaScript/Fernando/statsAnalyse/stackedBar.js></script>
</footer>

</html>
