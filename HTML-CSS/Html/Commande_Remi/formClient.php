<form method="post" action="../../../Scripts/PhP/Remi/validation.php">
    <label for="nom">Nom:</label><br>
    <input type="text" id="nom" name="nom" required><br>
    <label for="tel">Téléphone:</label><br>
    <input type="tel" id="tel" name="tel" required><br>
    <label for="adresse">Adresse:</label><br>
    <input type="text" id="adresse" name="adresse" required><br>
    <label for="cp">Code Postal:</label><br>
    <input type="text" id="cp" name="cp" required><br>
    <label for="ville">Ville:</label><br>
    <input type="text" id="ville" name="ville" required><br>
    <input type="hidden" id="total" name="total" value=$total>
    <input type="hidden" id="date" name="date" value="<?php date_default_timezone_set('Europe/Paris'); echo date('Y-m-d'); ?>">
    <input type="hidden" id="heure" name="heure" value="<?php date_default_timezone_set('Europe/Paris'); echo date('H:i:s'); ?>">
    <button type="submit" name="valider">Valider</button>
</form>
<form method="post">
    <button type="submit" name="annulerCommande">Annuler la commande</button>
</form>
