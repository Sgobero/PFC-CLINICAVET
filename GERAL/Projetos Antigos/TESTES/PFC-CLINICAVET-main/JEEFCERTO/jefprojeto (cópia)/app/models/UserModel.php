<?php 

    class UserModel {

        private $id;
        private string $username;
        private string $email;
        private string $password;

        public function setId(int $id) {
            $this->id = $id;
        }

        public function getId(): int {
            return $this->id;
        }

        public function setUsername(string $username){
            $this->username = $username;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setEmail(string $email){
            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setPassword(string $password){
            $this->password = $password;
        }

        public function getPassword(){
            return $this->password;
        }

    }