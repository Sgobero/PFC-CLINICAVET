
<!DOCTYPE html>

<html lang = "pt-br">

    <head>

        <meta charset = "utf-8">
        <title>Cadastrar</title>

    </head>

    <body>

        <h1> Bem vindo a clinica veterinária, acesso aos usuários</h1>

        <h3> O que você deseja fazer? </h3>

        <a href="login.php"> Realizar Login</a> <br>
        <a href="./app/controllers/cadastro.php"> Realizar Cadastro</a><br>
        <a href="edita.php"> Realizar Edição de dados da conta</a><br>
        <a href="./app/controllers/deleta.php"> Deletar conta</a><br>
        <a href="./app/controllers/userController.php?action=findAll"> Realizar consulta de contas registradas</a>



    </body>

</html>

header("location: ./app/controllers/userController.php");