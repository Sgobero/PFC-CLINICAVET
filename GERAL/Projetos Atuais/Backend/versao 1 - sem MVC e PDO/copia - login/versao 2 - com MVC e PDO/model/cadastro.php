<?php

include('../controller/conexao.php');

if(!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['rg']) && !empty($_POST['telefone']) && !empty($_POST['email']) && !empty($_POST['senha'])) {

    $nome = $conexao->real_escape_string($_POST['nome']);
    $cpf = $conexao->real_escape_string($_POST['cpf']);
    $rg = $conexao->real_escape_string($_POST['rg']);
    $telefone = $conexao->real_escape_string($_POST['telefone']);
    $email = $conexao->real_escape_string($_POST['email']);
    $senha = $conexao->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
    $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1) {
        
        echo "Usuário ja cadastrado, tente outro email";
        echo "<a href='../views/tela_cadastro.html'>voltar</a>";

    } else {
        
        $sql_code = "INSERT INTO usuarios (`email`, `senha`, `nome`, `cpf`, `rg`, `telefone`) values ('$email','$senha','$nome','$cpf','$rg','$telefone')";
        $conexao->query($sql_code);

        $sql_code = "SELECT id, nome FROM usuarios WHERE email = '$email'";
        $sql_query = $conexao->query($sql_code);
        $usuario = $sql_query->fetch_assoc();

        if(!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];

        header("Location: painel.php");

    }

}
else{
    header("Location: ../views/tela_cadastro.html");
}
?>