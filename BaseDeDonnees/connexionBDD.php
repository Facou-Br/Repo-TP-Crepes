    <?php
    //!!! Il faut wrapper l'import de ce script dans un try catch !!!
    
    /* 
        try {
            include 'connexionBDD.php';
        } catch (Exception $ex) {
            echo json_encode(['error' => 'DB connection failed']);
            die();
        }
    */
    
    require_once 'codesConnexion.php';
        $conn = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE.';port='.PORT, ADMIN_USER, ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
       
        try { //TODO : On supprime ce try catch sur la version prod car l'accès read only est sensé être valide.
        $conn_view_only = new PDO('mysql:host=' . HOST . ';charset=utf8;dbname=' . DATABASE.';port='.PORT, VIEW_ONLY_USER, VIEW_ONLY_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e){}