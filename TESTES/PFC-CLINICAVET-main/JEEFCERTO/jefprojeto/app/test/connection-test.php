<?php

    // Vale ouro
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require __DIR__ . "/../connection/Connection.php";


    function findAllDataTest() {
        $conn = new Connection();

        $pdo = $conn->getConnection();
    
        $tabela = $pdo->query("SELECT * FROM users");
    
        $usuarios = $tabela->fetchAll(PDO::FETCH_BOTH);
    
        print "<pre>";
        print_r($usuarios);
        print "</pre>";
    }

    findAllDataTest();


