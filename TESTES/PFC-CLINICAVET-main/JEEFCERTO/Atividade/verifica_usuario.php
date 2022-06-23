<?php

session_start();

if(isset($_SESSION["login_user"]));
$login_user = $_SESSION["login_user"];
if(isset($_SESSION["senha_user"]));
$senha = $_SESSION["senha_user"];

if(!(empty($login_user) or empty($senha_user))){
    include("conexao.php");
    $res = mysqli_query($conexao,"select * from tb_usuarios where login_user = '$login_user' and senha_user='$senha_user'");
    $linha = mysqli_num_rows($res);
    
    if($linha==0){
        session_destroy();
        echo "Você não efetuou o login!";
        exit;
    }

}
else{
    header("Location: login.php");
    exit;
}
?>