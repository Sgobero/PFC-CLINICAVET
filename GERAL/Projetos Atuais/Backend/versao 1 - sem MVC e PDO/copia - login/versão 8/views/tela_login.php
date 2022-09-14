<?php

	$value = filter_input(INPUT_GET, 'value', FILTER_SANITIZE_NUMBER_INT);

	if(isset($value)){
		$mensagem = "<p class='description description-second' style='color: green;'> Usuario cadastrado com sucesso </p>";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style-login.css">
	<script src="https://kit.fontawesome.com/23875acec5.js" crossorigin="anonymous"></script>

</head>
<body>


	<div class="container">
		<div class="content first-content">
			<div class="first-column">
					<h2 class="title title-primary"> Já Tem Uma Conta?</h2>
					<!-- <p class="description description-primary"> Para continuar conectado conosco</p> --> 
					<!-- <p class="description description-primary"> conecte-se com suas informações pessoais</p> --> 
					<button id="signin" class="btn btn-primary">Logue-se </button>
			</div>

			<div class="second-column">
				<h2 class="title title-second"> Crie uma conta</h2>
				<div class="social-media">
					<ul class="list-social-media">
						<a href="#" class="link-social-media"> 
							<li class="item-social-media">
								<i class="fa-brands fa-facebook-f"></i>
							</li>
						</a>
						<a href="#" class="link-social-media"> 
							<li class="item-social-media">
								<i class="fa-brands fa-google"></i>
							</li>
						</a>
						<a href="#" class="link-social-media"> 
							<li class="item-social-media">
								<i class="fa-brands fa-linkedin-in"></i>
							</li>
						</a>
					</ul>
				</div><!-- midias -->
				<!-- <p class="description description-second"> Ou utilize seu email para se registrar!</p> --> 
				
				<?php
					if(isset($mensagem)){
						echo $mensagem;
					}
				?>

<!-- cadastro -->	<form class="form-login" action="../model/cadastra.php" method="POST"> 

					<label class="label-input" for="">
						<i class="fa-solid fa-user icon-modify"></i>
						<input type="text" placeholder="Nome" name="nome" id="nome" required>
					</label>

					<label class="label-input" for="">
						<i class="fa-solid fa-envelope icon-modify"></i>
						<input type="email" placeholder="E-mail" name="email" id="email" required>
					</label>

					<label class="label-input" for="">
						<i class="fa-solid fa-lock icon-modify"></i>
						<input type="password" placeholder="Senha" name="senha" id="senha" required>
					</label>

                    <label class="label-input" for="">
						<i class="fa-solid fa-image-portrait icon-modify"></i>
						<input type="text" name="cpf" placeholder="CPF" id="cpf" required >
					</label>

                    <label class="label-input" for="">
						<i class="fa-solid fa-image-portrait icon-modify"></i>
						<input type="text" name="rg" placeholder="RG"  id="rg" required>
					</label>

                    <label class="label-input" for="">
                        <i class="fa-solid fa-phone icon-modify"></i>
						<input type="text" name="telefone" placeholder="Telefone"  id="telefone" required>
					</label>

					<button class="btn btn-second" type="submit" value="Cadastrar"> Criar sua conta</button>
				</form>

			</div><!-- second colum -->
		</div><!-- first content -->

		<div class="content second-content">
			<div class="first-column">
				<h2 class="title title-primary"> Não Tem Uma Conta? </h2>
				<!-- <p class="description description-primary"> Insira seus dados pessoais</p> --> 
				<!-- <p class="description description-primary"> e comece sua jornada conosco!</p> -->
				<button id="signup" class="btn btn-primary"> Criar Conta </button>
			</div>

			<div class="second-column">
				<h2 class="title title-second"> Entre em sua conta</h2>
				<div class="social-media">
					<ul class="list-social-media">
						<a href="#" class="link-social-media"> 
							<li class="item-social-media">
								<i class="fa-brands fa-facebook-f"></i>
							</li>
						</a>
						<a href="#" class="link-social-media"> 
							<li class="item-social-media">
								<i class="fa-brands fa-google"></i>
							</li>
						</a>
						<a href="#" class="link-social-media"> 
							<li class="item-social-media">
								<i class="fa-brands fa-linkedin-in"></i>
							</li>
						</a>
					</ul>
				</div><!-- midias -->
				<p class="description description-second"> Ou utilize seu email para entrar em sua conta</p>

<!-- login -->		<form class="form-login" action="../model/login.php" method="POST">

					<label class="label-input" for="">
						<i class="fa-solid fa-envelope icon-modify"></i>
						<input type="text" placeholder="E-mail" name="email" id="email" required>
					</label>

					<label class="label-input" for="">
						<i class="fa-solid fa-lock icon-modify"></i>
						<input type="password" placeholder="Senha" name="senha" id="senha" required>
					</label>

					<a class="password" href="#"> esqueceu sua senha?</a> 
					<button class="btn btn-second" type="submit" value="Logar"> Entre em sua conta</button>
				</form>
			</div><!-- second colum -->
		</div><!-- second content -->
	</div><!-- first content -->
	<script src="login.js"> </script>
</body>
</html>