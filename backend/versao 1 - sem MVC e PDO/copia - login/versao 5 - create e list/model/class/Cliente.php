<?php

//include '../../controller/Conn.php';

class Cliente extends Usuario{

    public $connect;
    public array $formData;
    public $id;

    public function listar()
    {
        $conn = new Conn();
        $this->connect = $conn->conectar();  

        $query_usuarios = "SELECT id, nome, email FROM usuarios";

        $result_usuarios = $this->connect->prepare($query_usuarios);
        $result_usuarios->execute();

        return $result_usuarios->fetchAll();
    }

    public function inserir(){
        $conn = new Conn();
        $this->connect = $conn->conectar();
        
        $query_usuarios = $this->connect->prepare("INSERT INTO usuarios (email, senha, nome, cpf, rg, telefone) 
        VALUES (:email, :senha, :nome, :cpf, :rg, :telefone)");

        $query_usuarios->bindParam(":email",$this->formData['email']);
        $query_usuarios->bindParam(":senha",$this->formData['senha']);
        $query_usuarios->bindParam(":nome",$this->formData['nome']);
        $query_usuarios->bindParam(":cpf",$this->formData['cpf']);
        $query_usuarios->bindParam(":rg",$this->formData['rg']);
        $query_usuarios->bindParam(":telefone",$this->formData['telefone']);
        $query_usuarios->execute();

        if ($query_usuarios->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function visualizar(){
        require "../controller/Conn.php";
        $conn = new Conn();
        $this->connect = $conn->conectar();

        $query_usuario = $this->connect->prepare("SELECT email, nome, cpf, rg, telefone FROM usuarios WHERE id=:id LIMIT 1");
        $query_usuario->bindParam(":id",$this->id);
        $query_usuario->execute();
        $informacoes = $query_usuario->fetch();
        return $informacoes;
    }

}