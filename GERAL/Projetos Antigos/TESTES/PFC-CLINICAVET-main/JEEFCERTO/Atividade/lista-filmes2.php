<?php
include_once("conexao.php");
// --- Verifica se dados da pesquisa existe, e se existir, atribui o mesmo na variável
$pesquisa;
if(isset($_GET["pesquisa"])){
$pesquisa = $_GET["pesquisa"];
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de gerenciamento de filmes</title>
</head>
<body bgcolor="#c0c0c0">

<?php
include("menu.php");// Inclui o arquivo do menu
?>
<form name="pesquisa" action="lista-filmes2.php" method="get">
<p align="center">
<label>Pesquisa de Filmes:</label> <input type="text" name="pesquisa">
<input type="submit" value="Pesquisar">
</p>

</form>
<h3 align="center">Lista de filmes</h3>
<table border="1" align="center" bgcolor="#DCDCDC">
<tr>
<th>Código</th><th>Título</th><th>Duração do
filme</th><th>Valor</th><th>Categoria</th><th> Excluir | Editar</th>
</tr>
<?php
//------------- Consulta pesquisa por títulos --------------------------------------
$sqlRegistros = mysqli_query($conexao,"select idFilme,tituloFilme, duracaoFilme,
valorLocacao, nomeCategoria from tbFilmes inner join tbCategorias on
tbFilmes.idCategoria = tbCategorias.idCategoria where tituloFilme like '%$pesquisa%' order by idFilme");
$num_linhas = mysqli_num_rows($sqlRegistros);

for($i;$i<$num_linhas;$i++){
$dados = mysqli_fetch_array($sqlRegistros);
$idFilme = $dados["idFilme"];
$tituloFilme = $dados["tituloFilme"];
$duracaoFilme = $dados["duracaoFilme"];
$valorLocacao = $dados["valorLocacao"];
$nomeCategoria = $dados["nomeCategoria"];

?>

<tr>
<td><?php echo $idFilme;?> </td><td><?php echo $tituloFilme;?> </td><td>
<?php echo
$duracaoFilme;?> </td><td>
<?php echo $valorLocacao;?> </td><td>
<?php echo
$nomeCategoria;?> </td>
<td>
<a href="excluir-filme.php?idFilme=<?php echo $idFilme;?>">Excluir</a> -
<a href="editar-filme.php?idFilme=<?php echo $idFilme;?>">Editar</a>
</td>
</tr>
<?php
}
?>
</body>
</html>