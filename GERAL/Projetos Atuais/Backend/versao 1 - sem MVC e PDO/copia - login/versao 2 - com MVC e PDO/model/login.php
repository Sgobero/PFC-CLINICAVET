<?php
include('../controller/conexao.php');

if(!empty($_POST['email']) && !empty($_POST['senha'])) {

    $email = $conexao->real_escape_string($_POST['email']);
    $senha = $conexao->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1) {
        
        $usuario = $sql_query->fetch_assoc();
        
        if(!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];

        header("Location: painel.php");

    } else {
        echo "Falha ao logar! E-mail ou senha incorretos <br>";
        echo "<a href='../views/tela_login.html'>voltar</a>";
    }

}

else{
    header("Location: ../views/tela_login.html");
}
?>