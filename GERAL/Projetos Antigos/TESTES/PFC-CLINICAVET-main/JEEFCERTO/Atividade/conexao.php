<?php

$servidor = "localhost";
$usuario = "root";
$senha = "bancodedados";
$banco = "bancoLocadora";


$conexao = mysqli_connect($servidor, $usuario, $senha, $banco) 
    or die ("Não foi possivel conectar-se ao servidor. Erro:" . mysqli_connect_error());


    if(isset($conexao)){
       //echo 'Banco de dados selecionado com sucesso:';
    }

?>