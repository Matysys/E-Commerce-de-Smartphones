<?php
if(isset($_SESSION['usuario'])){
    echo "<script>document.location = 'index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Faça seu login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/project.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.9">
	<meta name="author" content="Mateus/Bruno">
	<meta name="description" content="Projeto para a faculdade na disciplina de Programação Web">
</head>
<body class="degrade">
	<div class="container" id="tamanhoContainer">
		<div style="padding: 10px;">
			<center>
				<img src="img/login.png" id="login">
			</center>
			<form class="form-container" style="margin-top: 40px;" action="validar.php" method="post">
				<div class="form-group">
					Usuário:<br><input class="form-control" type="text" name="usuario" placeholder="Digite seu usuário ou e-mail" autocomplete="off" value="<?php if(isset($_COOKIE['guardar'])){echo $_COOKIE['guardar'];} ?>" required><br>
				</div>
				<div class="form-group">
					Senha:<br><input class="form-control" type="password" name="senha" placeholder="Digite sua senha" autocomplete="off" required><br>
				</div>
				<div class="form-group">
					<input type="checkbox" name="guardar">Deseja guardar o seu nome de usuário?<br>
				</div>
				<div class="form-group">
					<input id="botao" class="btn" type="submit" value="Entrar" name="entrando"><br><br>
					<a href="esqueci.php">Esqueci minha senha</a> ou cadastre-se <a href="cadastro.php">aqui!</a>
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="removeBanner.js"></script>
</body>
</html>