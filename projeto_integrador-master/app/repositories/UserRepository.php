<?php 

    require_once __DIR__ . "/../connection/Connection.php";

    class UserRepository {

        private PDO $conn;

        function __construct()
        {
            $this->conn = Connection::getConnection();
        }

        /**
         * Undocumented function
         *
         * @return void
         */
        public function create() {
        }

        public function findAll() : array {

            $query = "SELECT * FROM users";
            $table = $this->conn->query($query);
            $usuarios = $table->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        }

        public function update(){

        }

        public function delete(){

        }
        
    }