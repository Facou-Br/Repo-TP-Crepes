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