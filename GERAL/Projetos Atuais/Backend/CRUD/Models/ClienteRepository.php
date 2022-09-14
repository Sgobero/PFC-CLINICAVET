<?php

class ClienteRepository
{   
    private $connect;

    public function create(Usuario $usuario) //pronto
    {   
        $conn = new Conn();
        $this->connect = $conn->conectar();

        $query_usuario = $this->connect->prepare("INSERT INTO usuarios (tipo, email, senha, nome, cpf, rg, telefone) VALUES (:tipo, :email, :senha, :nome, :cpf, :rg, :telefone)");

        $query_usuario->bindValue(":tipo", 1);
        $query_usuario->bindValue(":email", $usuario->getEmail());
        $query_usuario->bindValue(":senha", $usuario->getSenha());
        $query_usuario->bindValue(":nome", $usuario->getNome());
        $query_usuario->bindValue(":cpf", $usuario->getCpf());
        $query_usuario->bindValue(":rg", $usuario->getRg());
        $query_usuario->bindValue(":telefone", $usuario->getTelefone());

        $query_usuario->execute();

        if($query_usuario->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function update(Usuario $usuario) //pronto
    {
        $conn = new Conn();
        $this->connect = $conn->conectar();

        $query_usuario = $this->connect->prepare("UPDATE usuarios SET email = :email, nome = :nome, cpf = :cpf, rg = :rg, telefone = :telefone WHERE id = :id");

        $query_usuario->bindValue(':email', $usuario->getEmail());
        $query_usuario->bindValue(':nome', $usuario->getNome());
        $query_usuario->bindValue(':cpf', $usuario->getCpf());
        $query_usuario->bindValue(':rg', $usuario->getRg());
        $query_usuario->bindValue(':telefone', $usuario->getTelefone());
        $query_usuario->bindValue(':id', $usuario->getId());
        $result = $query_usuario->execute();
        return $result;
    }

    public function delete(Usuario $usuario) //pronto
    {
        $conn = new Conn();
        $this->connect = $conn->conectar();

        $query_usuario = $this->connect->prepare("DELETE FROM usuarios WHERE id = :id");
        $query_usuario->bindValue(":id", $usuario->getId());
        $query_usuario->execute();
        $result = $query_usuario->rowCount();
        return $result;
    }

    public function findAll() //pronto
    {
        $conn = new Conn();
        $this->connect = $conn->conectar();

        $table = $this->connect->query("SELECT * FROM usuarios");
        $tableTratada = $table->fetchAll(PDO::FETCH_ASSOC); 

        return $tableTratada;
    }

    public function findById(Usuario $usuario) //pronto
    {
        $conn = new Conn();
        $this->connect = $conn->conectar();

        $id = $usuario->getId();
        $table = $this->connect->query("SELECT * FROM usuarios WHERE id = $id");
        $tableTratada = $table->fetchAll(PDO::FETCH_ASSOC); 

        return $tableTratada;
    }


}


?>

