<?php

    class Cliente extends Usuario{

        public function create(Cliente $cliente)
        {
            return "quantidade de linhas afetadas"; // rowCount()
        }

        public function alter(Cliente $cliente)
        {
            return "quantidade de linhas afetadas"; // rowCount()
        }

        public function findClienteById(int $id)
        {
            return $cliente; // as informações do cliente //fetch();
        }

        public function dropClienteById(int $id)
        {
            return "quantidade de linhas afetadas"; // rowCount()
        }

    }

?>