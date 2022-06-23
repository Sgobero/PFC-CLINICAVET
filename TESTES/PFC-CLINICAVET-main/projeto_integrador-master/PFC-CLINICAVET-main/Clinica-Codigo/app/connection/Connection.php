<?php 

class Connection {

    private static $host     = "localhost";
    private static $dbname   = "clinicavet";
    private static $user     = "root";
    private static $password = "bancodedados";

    private static ?PDO $conn = null;

    public static function getConnection(): PDO {

        if(self::$conn == null){

            try {
                self::$conn = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname, 
                self::$user, 
                self::$password);

                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(Exception $e) {
                print("Erro ao conectar com o banco de dados");
            }
        }

        return self::$conn;
    }

}