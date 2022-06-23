<?php

// Vale ouro
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../repositories/UserRepository.php";
require_once __DIR__ . "/Controller.php";

function findAll()
{
    $repository = new UserRepository();
    $usuarios = $repository->findAll();

    $data['titulo'] = "listar usuarios";
    $data['usuario'] = $usuarios;

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

function deleteUser()
{
    print "chamou deleteUser";
}

function preventDefault(){

}

function acordaPedrinho(){
    print "A cor da Pedrinho.";
}