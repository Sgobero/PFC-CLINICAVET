

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">

        <h2> DADOS PESSOAIS </h2>

        <label>NOME: </label>
        <input name="nome_usuario" type="text" id="nome_usuario" placeholder="Nome Completo"> <br> <br>
        
        <label>CPF: </label>
        <input name="cpf" type="text" id="cpf" placeholder="CPF"> <br> <br>
        
        <label>RG: </label>
        <input name="rg" type="text" id="rg" placeholder="RG"> <br> <br>
        
        <label>DATA DE NASCIMENTO: </label>
        <input name="data_nascimento" type="date" id="data_nascimento" placeholder="data"> <br> <br>
        
        <label>EMAIL: </label>
        <input name="email" type="text" id="email" placeholder="email"> <br> <br>

        <input type="hidden" name="tipo_usuario" id="tipo_usuario" value="cliente">
        
        <label>SENHA: </label>
        <input name="senha_usuario" type="text" id="senha_usuario" placeholder="senha"> <br> <br>
        
        <h2> ENDERECO </h2>

        <label>CEP: </label>
        <input name="cep" type="text" id="cep" placeholder="cep"> <br> <br>

        <label>NOME RUA: </label>
        <input name="rua" type="text" id="rua" placeholder="nome da rua"> <br> <br>

        <label>NUMERO DA RESIDENCIA: </label>
        <input name="numero_residencial" type="text" id="numero_residencial" placeholder="numero"> <br> <br>

        <label>CIDADE: </label>
        <input name="cidade" type="text" id="cidade" placeholder="cidade"> <br> <br>

        <label>ESTADO: </label>
        <input name="estado" type="text" id="estado" placeholder="estado"> <br> <br>

        <input name="AddContMsg" type="submit" value="Enviar" >

    </form>
</body>
</html>