<?php
namespace Models;

class ModelConnect
{

    public function connectDB() {

        try {
            $con = new \PDO("mysql:host=".HOST.";dbname=".DB."",USER,PASS);
            return $con;
        } catch (\PDOException $erro) {
            return $erro->getMessage();
        }
    }
}
?>