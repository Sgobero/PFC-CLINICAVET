<?php

require './Conn.php';

class Cliente extends Usuario{

    public $connect;

    public function listar(){
        $conn = new Conn();
        $this->connect = $conn->conectar();  
        $query_usuarios = "SELECT id, nome, email FROM usuarios";
        $result_usuarios = $this->connect->prepare($query_usuarios);
        $result_usuarios->execute();
        return $result_usuarios->fetchAll();
    }

    public function inserir($email, $senha, $nome, $cpf, $rg, $telefone){ 
        $conn = new Conn();
        $this->connect = $conn->conectar();
        
        $query_usuarios = $this->connect->prepare("INSERT INTO usuarios (email, senha, nome, cpf, rg, telefone) 
        VALUES (:a, :b, :c, :d, :e, :f)");

        //$query_usuarios->bindValue(":z",$tipo);
        $query_usuarios->bindValue(":a",$email);
        $query_usuarios->bindValue(":b",$senha);
        $query_usuarios->bindValue(":c",$nome);
        $query_usuarios->bindValue(":d",$cpf);
        $query_usuarios->bindValue(":e",$rg);
        $query_usuarios->bindValue(":f",$telefone);

        $query_usuarios->execute();
    }

}