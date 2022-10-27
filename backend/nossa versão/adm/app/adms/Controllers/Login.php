<?php

namespace App\Adms\Controllers;

class Login
{
    public function index()
    {        
        if(!isset($_SESSION)) {
            session_start();
        }
    }
    public function vidro()
    {
        echo "Método vidro do login";
    }
}
?>