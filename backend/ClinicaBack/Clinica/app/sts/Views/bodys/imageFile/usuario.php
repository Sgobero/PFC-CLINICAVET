<<<<<<< Updated upstream

<?php
    if (isset($_SESSION['errFile'])) {
        echo $_SESSION['errFile'];
        unset($_SESSION['errFile']);
    }
?>


<form method="post" enctype="multipart/form-data" action="">

    <h2> ADICIONAR FOTO DE PERFIL </h2>

    <label>Foto de Perfil: </label>
    <input name="arquivo" type="file"> <br> <br> 

    <input name="AddFile" type="submit" value="Enviar">

=======

<?php
    if (isset($_SESSION['errFile'])) {
        echo $_SESSION['errFile'];
        unset($_SESSION['errFile']);
    }
?>


<form method="post" enctype="multipart/form-data" action="">

    <h2> ADICIONAR FOTO DE PERFIL </h2>

    <label>Foto de Perfil: </label>
    <input name="arquivo" type="file"> <br> <br> 

    <input name="AddFile" type="submit" value="Enviar">

>>>>>>> Stashed changes
</form>