
<!DOCTYPE html>

<html lang = "pt-br">

    <head>

        <meta charset = "utf-8">
        <title>Cadastrar</title>

    </head>

    <body>

        <h1>Cadastrar Usuário</h1>

        <form method = "post" action = "userController.php?action=create">
            <label>Nome: </label>
            <input type = "text" name = "username"
            placeholder = "Digite o seu nome">
            <br><br>

            <label>Login </label>
            <input type = "text" name = "login"
            placeholder = "Digite o seu login">
            <br><br>

            <label>Senha: </label>
            <input type = "text" name = "senha"
            placeholder = "Digite a sua senha">
            <br><br>

            <label>E-mail: </label>
            <input type = "text" name = "email"
            placeholder = "Digite o seu e-mail">
            <br><br>

            <label>Cpf: </label>
            <input type = "text" name = "cpf"
            placeholder = "Digite o seu CPF">
            <br><br>

            <label>Rg: </label>
            <input type = "text" name = "rg"
            placeholder = "Digite o seu RG">
            <br><br>

            <input type ="hidden" name = "userType"> 
            <br><br>

            <input type = "submit" value = "Cadastrar">
        </form>
    
    </body>

</html>