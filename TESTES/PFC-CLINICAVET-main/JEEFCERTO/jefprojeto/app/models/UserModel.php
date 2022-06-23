<?php 

    class UserModel {

        private $id;
        private string $username;
        private string $email;
        private string $password;
        private string $login;
        private string $cpf;
        private string $rg;
        private string $userType;


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


        public function setLogin(string $login) {
            $this->login = $login;
        }

        public function getLogin(): string {
            return $this->login;
        }

        public function setCpf(string $cpf){
            $this->cpf = $cpf;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function setRg(string $rg){
            $this->rg = $rg;
        }

        public function getRg(){
            return $this->rg;
        }

        public function setUserType(string $userType){
            $this->userType = $userType;
        }

        public function getUserType(){
            return $this->userType;
        }


    }
      