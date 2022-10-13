<?php

namespace Core;

    abstract class Define
    {

        protected function config(): void 
        {
            define('URL', 'http://localhost/Clinica/');

            define('CONTROLLER', 'Home');
            define('ERROCONTROLLER', 'Erro');

            define('EMAILADM', 'matheus.laurentino.ifpr@gmail.com');

            define('HOST', 'localhost');
            define('USER', 'root');
            define('PASS', '');
            define('DBNAME', 'clinica_veterinaria');
        }

    }