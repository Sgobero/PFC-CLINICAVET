<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Login</title>
</head>
<body>

    <br> <h3>TELA DE LOGIN</h1>

    <form action="../Controllers/UserController.php?action=login" method="POST">

        <h2>Acesse Sua Conta</h2>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" required>
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" required>
        
        <input type="submit" value="Logar">
        
        <br> <a href="tela_cadastro.html">cadastro</a>

    </form>
</body>
</html>