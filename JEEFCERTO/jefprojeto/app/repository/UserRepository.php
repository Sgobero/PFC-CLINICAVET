<?php 

    require_once __DIR__ . "/../connection/Connection.php";
    require_once __DIR__ . "/../models/UserModel.php";

    class UserRepository {

        public PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }

        public function create(UserModel $user) {

            try {

                $query = "INSERT INTO users (username, email, password,login,cpf,rg,userType) VALUES (:username, :email, :password,:login,:cpf,:rg,'Cliente')";
                $prepare = $this->conn->prepare($query);
                $prepare->bindValue(":username", $user->getUsername());
                $prepare->bindValue(":email", $user->getEmail());
                $prepare->bindValue(":password", $user->getPassword());
                $prepare->bindValue(":login", $user->getLogin());
                $prepare->bindValue(":cpf", $user->getCpf());
                $prepare->bindValue(":rg", $user->getRg());
                
                $prepare->execute();

                return $this->conn->lastInsertId();
                
            } catch(Exception $e) {
                    print("Erro ao inserir usuário no banco de dados");
            }
        }

        public function findAll(): array {

            $table = $this->conn->query("SELECT * FROM users");
            $usuarios  = $table->fetchAll(PDO::FETCH_ASSOC);

            return $usuarios;
        }

        public function findUserById(int $userId) {

            $query = "SELECT * FROM users WHERE users.id = ?";
            
            $prepare = $this->conn->prepare($query);
            $prepare->bindParam(1, $userId, PDO::PARAM_INT);

            if($prepare->execute()){
            
                $usuario  = $prepare->fetchObject("UserModel");
            
            } else {
                $usuario = null;
            }

            return $usuario;
        }

        public function update(UserModel $user) {

            $query = "UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id";
            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":username", $user->getUsername());
            $prepare->bindValue(":email", $user->getEmail());
            $prepare->bindValue(":password", $user->getPassword());
            $prepare->bindValue(":id", $user->getId());
            $prepare->execute();
        }

        public function deleteById(int $id) {

            $query = "DELETE FROM users WHERE id = :id";

            $prepare = $this->conn->prepare($query);
            $prepare->bindValue(":id", $id);
            $prepare->execute();
            
        }
    }
