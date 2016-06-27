<?php

//Paramètres de connexion et initialisation des variables
$host='localhost';
$username='root';
$password='';
$database='aero_bd';
//Définition de la connexion PDO
class connexion_db extends PDO
{
    private static $_instance;

    /* Constructeur hérité de PDO */

    public function __construct ()
    {}

    /* Singleton */

    public static function getInstance ()
    {
        if (!isset (self::$_instance))
        {
            try
            {
                self::$_instance = new PDO ('mysql:host=localhost;dbname=aero_bd', 'root', '');
            }

            catch (PDOException $e)
            {
                echo "Erreur à la connexion avec la BDD :".$e ;
            }
        }
        return (self::$_instance) ;
    }

}
?>