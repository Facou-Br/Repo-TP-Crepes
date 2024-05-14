<?php
session_start();

if (isset($_POST['id']) && isset($_POST['value'])) {
    $_SESSION[$_POST['id']] = $_POST['value'];
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
    foreach ($_SESSION as $id => $value) {
        echo "<p>ID: " . $id . ", Value: " . $value . "</p>";
    }
    ?>
</body>
</html>