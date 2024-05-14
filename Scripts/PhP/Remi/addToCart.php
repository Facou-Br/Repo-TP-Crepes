<?php
session_start();

if (isset($_POST['value'])) {
    $_SESSION['value'] = $_POST['value'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Session Value</title>
</head>
<body>
    <h1>Session Value</h1>
    <?php
    if (isset($_SESSION['value'])) {
        echo "<p>Value: " . $_SESSION['value'] . "</p>";
    } else {
        echo "<p>No value in session.</p>";
    }
    ?>
</body>
</html>