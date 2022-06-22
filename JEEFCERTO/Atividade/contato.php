<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title> Login - Controle de acesso.</title>
    </head>

    <body bgcolor="#D3D3D3">
        <h1> Cadastro de contatos:</h1>
        <form id="cadastroContatos" name="form1" method="post" action="login.php">
        <label for="nomeContato"> Nome:</label>
        <input type="text" name="nomeContato" id="nomeContato">
        <br>
        <label for="telefoneContato"> Telefone:</label>
        <input type="text" name="telefoneContato" id="telefoneContato">
        <br>
        <label for="emailContato"> E-mail:</label>
        <input type="text" name="emailContato" id="emailContato">
        <br>
        <label for="cpfContato"> CPF:</label>
        <input type="text" name="cpfContato" id="cpfContato">
        <br>
        <label for="idadeContato"> Idade:</label>
        <input type="text" name="idadeContato" id="idadeContato">
        <br>
        <label for="niverContato"> Data de nascimento:</label>
        <input type="text" name="niverContato" id="niverContato">




        <input type="submit" name="gravar-contato" id="gravar-contato" value="Entrar">
        
        </form>
    </body>
</html>