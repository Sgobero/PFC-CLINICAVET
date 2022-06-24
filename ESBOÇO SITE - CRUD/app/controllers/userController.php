<?php

// Exibe os erros em uma página web (DEVERIA ESTAR AQUI?).
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../repository/UserRepository.php";
require_once __DIR__ . "/Controller.php";




function create(){
    
    $username = $_POST['username'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $userType = $_POST['userType'];

    $user = new UserModel();
    $user->setUsername($username);
    $user->setLogin($login);
    $user->setPassword($senha);
    $user->setCpf($cpf);
    $user->setEmail($email);
    $user->setRg($rg);

    $userRepository = new UserRepository();
    $id = $userRepository->create($user);
    
    findAll();


}

function update(){
    
    $username = $_POST['username'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $userType = $_POST['userType'];

    $user = new UserModel();
    $user->setUsername($username);
    $user->setLogin($login);
    $user->setPassword($senha);
    $user->setCpf($cpf);
    $user->setEmail($email);
    $user->setRg($rg);

    $userRepository = new UserRepository();
    $id = $userRepository->create($user);
    
    findAll();
}

function findAll()
{
    $userRepository = new UserRepository();

    $usuarios = $userRepository->findAll();
    $data['usuarios'] = $usuarios;
    //$data['titulo'] = "listar usuarios";
 

    Controller::loadView("users/list.php", $data);
}

function findUserById(int $numId)
{
    $idParam = $numId;
    $userRepository = new UserRepository();
    $usuarios = $userRepository->findUserById($idParam);
    $data['usuarios'] = $usuarios;

    $usuario = $userRepository->findUserById($idParam);
    Controller::loadView("users/list.php", $data);
}

function deleteUserById(int $idPassado)
{
    $idParam = $idPassado;
    $userRepository = new UserRepository();    

    $userRepository->deleteById($idParam);

    //Controller::loadView("users/list.php", $data);
}

function padrao() {
}

?>

