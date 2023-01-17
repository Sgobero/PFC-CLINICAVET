<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Projeto de Conclusão de Curso - Site designado para uma clínica veterinária.">
    <script src="https://kit.fontawesome.com/7f492723e7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?= CSSADM ?>styleNavBar.css">
    <link rel="stylesheet" type="text/css" href="<?= CSSADM ?>style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Clínica Veterinária</title>
</head>

<body>

    <!--CABEÇALHO-->
    <header class="cabecalho-principal">
        <img class="img" src="../img/logo.png" alt="logo da clínica">
        <nav class="menu">
            <a class="item">SOBRE CLIENTES</a>
            <a class="item">SOBRE CLÍNICA</a>
            <a href="serviços.html"> <button class="botao">SOLICITAÇÕES</button> </a>

            <!--PARTE DE ICONE E LOGIN-->
            <a href="login.html" class="login-user"> <i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i></a>
        </nav>
    </header>



    <!--CONTEÚDO PRINCIPAL-->
    <main class="conteudo-principal1">

        <h1 class="título">Usuários Cadastrados</h1>

        <div class="usuariosAdm"> <h3> Clientes </h3> </div>
        <hr class="linha2"> <!-- LINHA PARA DIVIDIR CONTEÚDO -->

        <?php
            if (!empty($this->data['clientes'])) {
                for ($x = 0; $x < count($this->data['clientes']); $x++) {

                    $lista = $this->data['clientes'][$x];
                    extract($lista);
                    if(empty($foto_usuario)){ $foto_usuario = "Sem_Foto.png"; }
        ?>

            <div class="usuariosAdm">
                <img class="imgSCliente" src="<?= URL . IMGCLIENTEADM . $foto_usuario ?>">
                <div class="form-edição2">
                    <b> Nome: </b> <?= $nome_usuario ?> <br>
                    <b> E-mail: </b> <?= $email ?> <br>
                    <b> ID: </b> <?= $idusuario ?><br>
                    <b> Cargo: </b> <?= $tipo_usuario ?> <br><br>
                    
                </div>
            </div>

        <?php 
            if ($_SESSION['idusuario'] == 1) {
        ?>

            <div class="estilizaUsuariosAdm">
                <!-- <a href='<?= URLADM ?>Area-Clientes/Alterar-Tipo-Usuario?idUser=<?= $idusuario ?>&tipo=<?= $tipo_usuario ?>'> tornar mantenedor </a> -->
                <div class="alinhaPadding2"> 
                    <a href="<?= URLADM ?>Area-Clientes/Alterar-Tipo-Usuario?idUser=<?= $idusuario ?>&tipo=<?= $tipo_usuario ?>"> <button class="btn-usuariosAdm"> Alterar Cargo </button> </a>
                    <button class="btn-usuariosAdmBlock"> bloquear </button>
                </div>
            </div>
    
        <?php
            }
        ?>

            <hr class="linha2"> <!-- LINHA PARA DIVIDIR CONTEÚDO -->

        <?php
            }} else {
        ?>
        
            <h1 class="título">VAZIO</h1>
            
        <?php
            }
        ?>



        <div class="usuariosAdm"> <h3> Mantenedor </h3> </div>
        <hr class="linha2"> <!-- LINHA PARA DIVIDIR CONTEÚDO -->


        <?php
            if (!empty($this->data['mantenedores'])) {
                for ($x = 0; $x < count($this->data['mantenedores']); $x++) {

                    $lista = $this->data['mantenedores'][$x];
                    extract($lista);
                    if(empty($foto_usuario)){ $foto_usuario = "Sem_Foto.png"; }
        ?>

            <div class="usuariosAdm">
                <img class="imgSCliente" src="<?= URL . IMGCLIENTEADM . $foto_usuario ?>">
                <div class="form-edição2">
                    <b> Nome: </b> <?= $nome_usuario ?> <br>
                    <b> E-mail: </b> <?= $email ?> <br>
                    <b> ID: </b> <?= $idusuario ?><br>
                    <b> Cargo: </b> <?= $tipo_usuario ?> <br><br>
                    
                </div>
            </div>

        <?php 
            if ($_SESSION['idusuario'] == 1) {
        ?>

            <div class="estilizaUsuariosAdm">
                <!-- <a href='<?= URLADM ?>Area-Clientes/Alterar-Tipo-Usuario?idUser=<?= $idusuario ?>&tipo=<?= $tipo_usuario ?>'> tornar mantenedor </a> -->
                <div class="alinhaPadding2"> 
                    <a href="<?= URLADM ?>Area-Clientes/Alterar-Tipo-Usuario?idUser=<?= $idusuario ?>&tipo=<?= $tipo_usuario ?>"> <button class="btn-usuariosAdm"> Alterar Cargo </button> </a>
                    <button class="btn-usuariosAdmBlock"> bloquear </button>
                </div>
            </div>
    
        <?php
            }
        ?>

            <hr class="linha2"> <!-- LINHA PARA DIVIDIR CONTEÚDO -->

        <?php
            }} else {
        ?>
        
            <h1 class="título">VAZIO</h1>
            
        <?php
            }
        ?>

    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="<?= JSADM ?>areaCliente.js"> </script>
</body>

</html>