<?php

    include_once("conexao.php");

    echo "<h1> Selecionando registros usando FOR </h1>";
    $sqlRegistros = mysqli_query($conexao,"select * from tbFilmes");
    $num_linhas = mysqli_num_rows($sqlRegistros);

    echo "<table border = '1'>";

    echo    "<tr>
            <th> Código </th>
            <th> Título </th>
            <th> Duração </th>
            <th> Valor da locação </th> </tr>";

    for($i=0; $i < $num_linhas; $i++){

        $dados = mysqli_fetch_array($sqlRegistros);
        $idFilme = $dados["idFilme"];
        $tituloFilme = $dados["tituloFilme"];
        $duracaoFilme = $dados["duracaoFilme"];
        $valorLocacao = $dados["valorLocacao"];

        $valorLocacao = number_format($valorLocacao, 2);

        echo    "<tr>
                <td> $idFilme </td>
                <td> $tituloFilme </td>
                <td> $duracaoFilme </td>
                <td> $valorLocacao </td> </tr>";

        echo "</table";

    }

?>