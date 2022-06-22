<?php

    include_once("conexao.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Lista de Filmes - Locadora IFPR </title>
</head>
<body>
    
    <h1> Selecionando registros por categoria </h1>

    <?php

        $sqlRegistros = mysqli_query($conexao, "select tituloFilme, nomeCategoria from tbFilmes inner join tbCategorias on tbFilmes.idCategoria =
                                                tbCategorias.idCategoria");

        $num_linhas = mysqli_num_rows($sqlRegistros);

        echo "<table border='1'>";
        echo    "<tr><th> Título do Filme </th>
                <th> Categoria </th> </tr>";


        for($i; $i<$num_linhas; $i++){
            $dados = mysqli_fetch_array($sqlRegistros);
            $tituloFilme = $dados["tituloFilme"];
            $nomeCategoria = $dados["nomeCategoria"];

            echo "<tr> <td> $tituloFilme </td>
                    <td> $nomeCategoria </td> </tr>";
        }

        echo "</table>";

    ?>


</body>
</html>