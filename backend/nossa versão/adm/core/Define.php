<?php

namespace Core;

abstract class Define
{

    protected function configAdm(): void
    {

        define('URL', 'http://localhost/Clinica/');
        define('URLADM', 'http://localhost/Clinica/adm/');

        define('IMGADM', '..\app\sts\Helpers\imagens/');

        define('CONTROLLER', 'Login');
        define('METODO', 'index');
        define('CONTROLLERERRO', 'Login');

        define('EMAILADM', 'matheus.laurentino.ifpr@gmail.com');

        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DBNAME', 'clinica_veterinaria');
 
    }
}
