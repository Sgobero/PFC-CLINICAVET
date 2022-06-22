<?php 

    include("conexao.php")

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title> Cadastro de Filmes</title>

</head>

<body>

<h1> </h1>

<?php
include("menu.php")
?>

<h3> Cadastro de Filmes </h3>
<form name="cadFilmes" action="gravar-filme.php" method="post">

<p> <label> Título </label>

<input type="text" name="tituloFilme"></p>

<p> <label> Duração </label>

<input type="text" name="duracaoFilme"></p>

<p> <label> Valor </label>

<input type="text" name="valorLocacao"></p>

<p> <label> Categoria </label>

<select name="idCategoria">

<?php
//Carrega a lista de Categorias --------------------------------
$rsCategoria = mysqli_query($conexao,"select * from tbCategorias");
$linhas = mysqli_num_rows($rsCategoria);
for($i=0;$i<$linhas;$i++){
$dados = mysqli_fetch_array($rsCategoria);
$idCategoria = $dados["idCategoria"];
$nomeCategoria = $dados["nomeCategoria"];
echo "<option value='$idCategoria'>$nomeCategoria</option>";
}
//Fim da lista de categorias ------------------------------------
?>

</select>
</p>
<p> <input type ="submit" value="Gravar"></p>
</form>
</body>
<html>