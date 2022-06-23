<?php

include_once("conexao.php");
$pesquisa = $_GET["pesquisa"];

?>

<!doctype html>

<html> 
    
<head>

<meta charset="utf-8">
<title>Lista de Filmes-Locadora IFPR</title>

</head>

<body>

<h1>Pesquisa de Filmes</h1>

<form name="pesquisa" action="pesquisa_filmes.php" method="get"> 
<label>Pesquisa de Filmes: </label>
<input type="text" name="pesquisa">
<input type="submit" value="Pesquisar">

</form>

<h2> Resultados </h2>

<?php

$sqlRegistros = mysqli_query($conexao, "select tituloFilme, nomeCategoria from tbFilmes inner join tbCategorias 
                                        on tbFilmes.idCategoria = tbCategorias.idCategoria 
                                        where tituloFilme like '%Spesquisa%'");

$num_linhas = mysql_num_rows($sqlRegistros);

echo "<table border='1'>";

echo "<tr> <th>Titulo do Fime</th>
     <th>Categoria</th> </tr>";

for($i; $i<$num_linhas; $i++){

    $dados = mysqli_fetch_array($sqlRegistros);
    $tituloFilme = $dados["tituloFilme"];
    $nomeCategoria= $dados["nomeCategoria"];

    echo "<tr> <td>$tituloFilme</td> <td> $nomeCategoria </td></tr>";
}

echo "</table>";

?>

</body>
</html>
