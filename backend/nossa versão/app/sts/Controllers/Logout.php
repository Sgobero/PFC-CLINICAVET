<?php

namespace Sts\Controllers;

if (!defined('D7E4T2K6F4')) {
    $header = "http://localhost/Clinica/Erro?case=404"; // Erro 404
    header("Location: {$header}");
}

class Logout{

    public function index()
    {   
        $this->logout();
    }

    public function logout()
    {
        include_once 'app/sts/Controllers/helpers/logout.php';

        $header = URL . "Home"; 
        header("Location: {$header}");

    }


    /**     function pages()
     * Function que todas as controller tem
     * Retorna as functions que são publicas nessa controller
     */
    public function pages(): array
    {  
        return $array = ['index','logout'];
    }
}