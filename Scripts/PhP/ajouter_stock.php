<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un stock</title>
    <link rel="stylesheet" type="text/css" href="../../HTML-CSS/style.css">
    <meta charset="utf-8">
</head>
<body>
    <form action="ajouter_stock.php" method="POST">
        <label for="id">ID:</label>
        <input type="text" name="id" id="id" required><br><br>
        <label for="nombre">Nombre à commander:</label>
        <input type="number" name="nombre" id="nombre" required><br><br>
        <input type="submit" value="Ajouter">
    </form>

    <?php
        // Code to retrieve remaining units and calculate the cost
    ?>
    
</body>
</html>
