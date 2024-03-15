    <?php
    require_once 'codesConnexion.php';
    try {
        $conn = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE.';port='.PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die();
        //NOTE : !!! Ne pas afficher les erreurs BDD détaillées en production !!! -->
        //echo 'Error'
    }
    
    try {
        $conn_view_only = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE.';port='.PORT, VIEW_ONLY_USER, VIEW_ONLY_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die();
        //NOTE : !!! Ne pas afficher les erreurs BDD détaillées en production !!! -->
        //echo 'Error'
    }
