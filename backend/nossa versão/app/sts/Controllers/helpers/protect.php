<?php

//namespace Sts\Controllers\helpers;

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['idusuario'])) {
    die("Você não pode acessar esta página porque não está logado.");
    echo "id funcionando";
}