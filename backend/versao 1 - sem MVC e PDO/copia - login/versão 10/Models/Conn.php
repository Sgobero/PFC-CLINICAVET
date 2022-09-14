<?php

    class Conn{
        public $host = "localhost";
        public $user = "root";
        public $pass = "";
        public $dbname = "brabo";

        public $connect = null;

        public function conectar(){
            try
            {
                $this->connect = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);
                return $this->connect;
            } 
            catch (Exception $e)
            {
                echo "Erro: Conexão não realizada com sucesso! Erro gerado: " . $e;
                //echo "Tente mais tarde ou entre em contado ...";
                return false;
            }
        }
    }

?>