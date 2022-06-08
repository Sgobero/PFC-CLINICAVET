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
    $data['usuarios'] = $usuarios;

    Controller::loadView("users/list.php", $data);
}

function findUserById()
{
    print "chamou findUserById";
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