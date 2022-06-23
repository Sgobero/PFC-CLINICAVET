<?php

    include_once("conexao.php");

    echo "<h1> Selecionando registros usando FOR </h1>";
    $sqlRegistros = mysqli_query($conexao,"select * from tbCategorias");
    $num_linhas = mysqli_num_rows($sqlRegistros);

    echo "<table border = '1'>";

    echo    "<tr>
            <th> Cod.Categoria </th>
            <th> Categoria </th> </tr>";

    for($i=0; $i < $num_linhas; $i++){

        $dados = mysqli_fetch_array($sqlRegistros);
        $idCategoria = $dados["idCategoria"];
        $nomeCategoria = $dados["nomeCategoria"];
        

        echo    "<tr>
                <td> $idCategoria </td>
                <td> $nomeCategoria </td> </tr>";
    }

    echo "</table";

?>