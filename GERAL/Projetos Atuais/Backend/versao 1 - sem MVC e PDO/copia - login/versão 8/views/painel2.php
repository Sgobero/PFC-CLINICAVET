<?php
include('../model/protect.php');
require_once('../model/class/Usuario.php');
require_once('../model/class/Cliente.php');
$idUsuario = $_SESSION['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cliníca Veterinária</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"
		integrity="sha512-NmLkDIU1C/C88wi324HBc+S2kLhi08PN5GDeUVVVC/BVt/9Izdsc9SVeVfA1UZbY3sHUlDSyRXhCzHfr6hmPPw=="
		crossorigin="anonymous" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>

	<header>
		<div class="menu-bg">
			<div class="menu">
				<div class="menu__logo">
					<a href="index.html"> <img src="img/PHOTO-2022-08-17-16-30-01.png" width="70px" alt="logo"></a>
				</div>
				<nav class="nav">
					<ul class="nav__list">
						<li><a href="#somos" class="nav__link">Quem Somos</a></li>
						<li><a href="#cursos" class="nav__link">Cursos</a></li>
						<li><a href="#planos" class="nav__link">Planos</a></li>
						<li><a href="#vantagens" class="nav__link">Vantagens</a></li>
						

					</ul>
					
				</nav>
				
			</div>

		</div>

		<?php
        $informacoes= Cliente::visualizar($idUsuario);
        extract($informacoes); 
        echo "<h1>Seja bem vindo ao painel, {$nome}</h1>";

        if (isset($_SESSION['mensagem']))
		{
            echo $_SESSION['mensagem'];
            unset($_SESSION['mensagem']);
        }

        echo "<br> <a href='../model/logout.php'>Sair</a> <br>";
        echo "<a href='./tela_visualizar.php?id=$idUsuario'>Visualizar Informações do Perfil</a> <br>";
        echo "<a href='./tela_alterar.php?id=$idUsuario'>Alterar Informações do Perfil</a> <br>";
        echo "<a href='./tela_excluir.php'>Excluir Perfil</a>";
    	?>

		<h1 class="intro"> Aprenda a programar, <br> um projeto por vez</h1>
	</header>

	<hr>

	<section class="somos" id="somos"> 
		<h2 class="section__titulo"> Quem Somos </h2>
		<div class="somos-c">
			<div class="somos-c__texto">
				<p>
					Mussum Ipsum, cacilds vidis litro abertis. Todo mundo vê os porris que eu tomo, mas ninguém vê os tombis que eu
					levo!
					Atirei o pau no gatis, per gatis num morreus. Mais vale um bebadis conhecidiss, que um alcoolatra anonimis. Cevadis
					im
					ampola pa arma uma pindureta.
				</p>
				<br>
				<p>
					Copo furadis é disculpa de bebadis, arcu quam euismod magna. Praesent vel viverra nisi. Mauris aliquet nunc non
					turpis
					scelerisque, eget. Interagi no mé, cursus quis, vehicula ac nisi. Suco de cevadiss, é um leite divinis, qui tem
					lupuliz,
					matis, aguis e fermentis.
				</p>
			</div>

			<div class="somos-c__img"> 
				<img src="img/somos.png" alt="Quem Somos">
			</div>

		</div>

	</section>
	<hr>

	<div class="slider"> 
		<div class="slides">
			<input type="radio" name="radio-btn" id="radio1">
			<input type="radio" name="radio-btn" id="radio2">
			<input type="radio" name="radio-btn" id="radio3">
			<input type="radio" name="radio-btn" id="radio4">

			<div class="slide first"> 
				<img src="img/vacinacao.jpg">
			</div>
			<div class="slide">
				<img src="img/banhoTosa.jpg">
			</div>
			<div class="slide">
				<img src="img/consulta.jpg">
			</div>
			<div class="slide">
				<img src="img/agendar.webp">
			</div>

			<div class="navigation-auto">
				<div class="auto-btn1"> </div>
				<div class="auto-btn2"> </div>
				<div class="auto-btn3"> </div>
				<div class="auto-btn4"> </div>

			</div>
		</div>

		<div class="manual-navigation">
			<label for="radio1" class="manual-btn"></label>		
			<label for="radio2" class="manual-btn"></label>
			<label for="radio3" class="manual-btn"></label>
			<label for="radio4" class="manual-btn"></label>

		</div>
	</div>

	<hr>

	<section class="cursos" id="cursos">
		<h2 class="section__titulo">Nossos Cursos </h2>
		<div class="curso">
			<img src="img/ai.png" alt="Inteligência Artificial" class="curso__img">
			<h3 class="curso__titulo">Inteligencia Artificial</h3>
			<p class="curso__descricao">
				Mussum Ipsum, cacilds vidis litro abertis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit.
				Aenean
				sit amet nisi.
			</p>
		</div>
		<div class="curso">
			<img src="img/front.png" alt="Frontend" class="curso__img">
			<h3 class="curso__titulo">Frontend</h3>
			<p class="curso__descricao">
				Mussum Ipsum, cacilds vidis litro abertis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit.
				Aenean
				sit amet nisi.
			</p>
		</div>
		<div class="curso">
			<img src="img/seguranca.png" alt="Segurança da Informação" class="curso__img">
			<h3 class="curso__titulo">Segurança da Informação</h3>
			<p class="curso__descricao">
				Mussum Ipsum, cacilds vidis litro abertis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit.
				Aenean
				sit amet nisi.
			</p>
		</div>

	</section>

	<hr>
	<script src="script.js"> </script>
</body>
</html>