<?php

//include '../../controller/Conn.php';

class Cliente extends Usuario{

    public $connect;

    public function listar()
    {
        $conn = new Conn();
        $this->connect = $conn->conectar();  

        $query_usuarios = "SELECT id, nome, email FROM usuarios";

        $result_usuarios = $this->connect->prepare($query_usuarios);
        $result_usuarios->execute();

        return $result_usuarios->fetchAll();
    }

    public function inserir($cliente) : bool
    { 
        $conn = new Conn();
        $this->connect = $conn->conectar();
        
        $query_usuarios = $this->connect->prepare("INSERT INTO usuarios (email, senha, nome, cpf, rg, telefone) 
        VALUES (:a, :b, :c, :d, :e, :f)");

        //$query_usuarios->bindValue(":z",$tipo);
        $query_usuarios->bindParam(":a",$cliente->email);
        $query_usuarios->bindParam(":b",$cliente->senha);
        $query_usuarios->bindParam(":c",$cliente->nome);
        $query_usuarios->bindParam(":d",$cliente->cpf);
        $query_usuarios->bindParam(":e",$cliente->rg);
        $query_usuarios->bindParam(":f",$cliente->telefone);
        $query_usuarios->execute();

        if ($query_usuarios->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

}