<?php
include('conexao.php');

if(isset($_POST['nome']) || isset($_POST['cpf']) || isset($_POST['rg']) || isset($_POST['telefone']) || isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['nome']) == 0) {
        echo "Preencha seu nome";
    } else if(strlen($_POST['cpf']) == 0) {
        echo "Preencha sua cpf";
    } else if(strlen($_POST['rg']) == 0) {
        echo "Preencha sua rg";
    } else if(strlen($_POST['telefone']) == 0) {
        echo "Preencha sua telefone";
    } else if(strlen($_POST['email']) == 0) {
        echo "Preencha sua email";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    }

    else {

        $nome = $mysqli->real_escape_string($_POST['nome']);
        $cpf = $mysqli->real_escape_string($_POST['cpf']);
        $rg = $mysqli->real_escape_string($_POST['rg']);
        $telefone = $mysqli->real_escape_string($_POST['telefone']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            echo "Usuário ja cadastrado, tente outro email";

        } else {
            
            $sql_code = "INSERT INTO usuarios (`email`, `senha`, `nome`, `cpf`, `rg`, `telefone`) values ('$email','$senha','$nome','$cpf','$rg','$telefone')";
            $mysqli->query($sql_code);

            $sql_code = "SELECT id, nome FROM usuarios WHERE email = '$email'";
            $sql_query = $mysqli->query($sql_code);
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        }

    }

}
?>