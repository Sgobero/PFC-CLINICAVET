<?php

// Exibe os erros em uma página web (DEVERIA ESTAR AQUI?).
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../repository/UserRepository.php";
require_once __DIR__ . "/Controller.php";

function create(){

    $user = new UserModel();
    $user->setUsername("teste");
    $user->setEmail("jefferson.chaves@ifpr.edu.br");
    $user->setPassword("123456");

    $userRepository = new UserRepository();
    $id = $userRepository->create($user);
    
    findAll();
}

function findAll()
{
    $userRepository = new UserRepository();

    $usuarios = $userRepository->findAll();

    $data['titulo'] = "listar usuarios";
    $data['usuarios'] = $usuarios;

    Controller::loadView("users/list.php", $data);
}


function findUserById()
{
    $idParam = $_GET['posicao'];

    $userRepository = new UserRepository();
    $usuario = $userRepository->findUserById($idParam);

    print "<pre>";
    print_r($usuario->getEmail());
    print "</pre>";

    //Controller::loadView("users/list.php");
}

function deleteUserById()
{
    $idParam = $_GET['id'];
    $userRepository = new UserRepository();    

    $userRepository->deleteById($idParam);

    //Controller::loadView("users/list.php", $data);
}

function padrao() {
   print "call padrao()";
   //Controller::loadView("users/list.php", $data);
}

