<?php

class BaseDeDonnees
{
    //Informations de connexion à la base de données
    private const HOST = "localhost";
    private const DATABASE = "crepesco_test";
    private const PORT = "3306";

    //Identifiants de connexion à la base de données en admin
    private const ADMIN_USER = "root";
    private const ADMIN_PASSWORD = "";

    //Identifiants de connexion à la base de données en viewOnly
    private const VIEW_ONLY_USER = "crepesco_connec";
    private const VIEW_ONLY_PASSWORD = "qsdfg";

    public static function connecterBDD($user)
    {
        if ($user == "admin") {
            return new PDO('mysql:host=' . self::HOST . ';charset=utf8;dbname=' . self::DATABASE . ';port=' . self::PORT, self::ADMIN_USER, self::ADMIN_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } elseif ($user == "viewOnly") {
            return new PDO('mysql:host=' . self::HOST . ';charset=utf8;dbname=' . self::DATABASE . ';port=' . self::PORT, self::VIEW_ONLY_USER, self::VIEW_ONLY_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
    }
}

/*
DirectAdmin Login : https://panel.freehosting.com:2222/ ou https://panel.freehosting.com/phpMyAdmin/ pour accès à la BDB en tant que dev
Username: crepesco
Password: 4s2P7R2nmm

Php MYADMIN : https://panel.freehosting.com/phpMyAdmin/
Username: crepesco_admin
Password: Cnam2024_crepes

PDO PhP user :
$host = "localhost";
$user = "crepesco_connec";
$pwd = "qsdfg";
$bdd = "crepesco_test";

PDO admin :
$host = "localhost";
$user = "crepesco_admin";
$pwd = "Cnam2024_crepes";
$bdd = "crepesco_test";
*/
