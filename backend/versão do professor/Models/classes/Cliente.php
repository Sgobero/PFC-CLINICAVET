<?php

    class Cliente extends Usuario{

        public function create(Cliente $cliente)
        {   
            $conn = new Conn();
            $this->connect = $conn->conectar();

            $query_cliente = $this->connect->prepare("INSERT INTO usuarios (tipo, email, senha, nome, cpf, rg, telefone) VALUES (:tipo, :email, :senha, :nome, :cpf, :rg, :telefone)");

            $query_cliente->bindValue(":tipo", 1);
            $query_cliente->bindValue(":email", $cliente->getEmail());
            $query_cliente->bindValue(":senha", $cliente->getSenha());
            $query_cliente->bindValue(":nome", $cliente->getNome());
            $query_cliente->bindValue(":cpf", $cliente->getCpf());
            $query_cliente->bindValue(":rg", $cliente->getRg());
            $query_cliente->bindValue(":telefone", $cliente->getTelefone());

            $query_cliente->execute();

            if($query_cliente->rowCount()){
                return true;
            }else{
                return false;
            }
        }

        public function edit()
        {
            $conn = new Conn();
            $this->connect = $conn->conectar();

            $query_cliente = $this->connect->prepare("UPDATE usuarios SET email = :email, nome = :nome, cpf = :cpf, rg = :rg, telefone = :telefone");

            $query_cliente->bindValue(':email', $this->getEmail());
            $query_cliente->bindValue(':nome', $this->getNome());
            $query_cliente->bindValue(':cpf', $this->getCpf());
            $query_cliente->bindValue(':rg', $this->getRg());
            $query_cliente->bindValue(':telefone', $this->getTelefone());
            $result = $query_cliente->execute();
            return $result;
        }

        public function findAll()
        {
            $conn = new Conn();
            $this->connect = $conn->conectar();

            $table = $this->connect->query("SELECT * FROM usuarios");
            $tableTratada = $table->fetchAll(PDO::FETCH_ASSOC); 

            return $tableTratada;
        }

        public function findById()
        {
            $conn = new Conn();
            $this->connect = $conn->conectar();

            $id = $this->getId();
            $table = $this->connect->query("SELECT * FROM usuarios WHERE id = $id");
            $tableTratada = $table->fetchAll(PDO::FETCH_ASSOC); 

            return $tableTratada;
        }


        public function dropClienteById(int $id)
        {
            return "quantidade de linhas afetadas"; // rowCount()
        }

    }

?>