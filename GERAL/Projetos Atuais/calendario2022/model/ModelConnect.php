<?php
namespace Models;

class ModelConnect
{

    public function connectDB() {

        try {
            $con = new \PDO("mysql:dbname=sistema;host=localhost;charset=utf8;","root","");
            return $con;
        } catch (\PDOException $erro) {
            return $erro->getMessage();
        }
    }
}
?>