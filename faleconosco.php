<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Fale conosco</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/project.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.8">
	<meta name="author" content="Mateus/Bruno">
	<meta name="description" content="Projeto para a faculdade na disciplina de Programação Web">
</head>
<body class="degrade">
	<div class="container" id="tamanhoContainer">
		<div style="padding: 10px;">
			<center>
				<img src="img/faleconosco.jpg" id="login">
			</center>
			<form class="form-container" style="margin-top: 40px;" action="enviando.php" method="POST">
				<div class="form-group">
					Nome:<br><input class="form-control" type="text" name="nome" placeholder="Digite seu nome" autocomplete="off"  required>
				</div>
				<?php
				if (!isset($_SESSION['usuario']))
				{
					?>
					<div class="form-group">
						E-mail:<br><input class="form-control" type="email" name="email" placeholder="Digite seu e-mail" autocomplete="off" required>
					</div>
				<?php } else {
					$usuario = $_SESSION['usuario'];
					?>
					<div class="form-group">
						E-mail:<br><input class="form-control" type="email" name="email" value="<?php 
						include "conexao.php";
						$sql = "SELECT * FROM cliente WHERE usuario = '$usuario' OR email = '$usuario'";
						$result = mysqli_query($conn, $sql) or die(mysqli_error());
						$row = mysqli_fetch_assoc($result);
						echo $row['email'];
						?>" readonly autocomplete="off">
					</div>
					<?php 
				}
				?>
				<div class="form-group">
					Assunto:<br><input class="form-control" type="text" name="assunto" placeholder="Assunto" autocomplete="off" required>
				</div>
				<div class="form-group">
					Mensagem:<br><textarea class="form-control" cols="30" rows="7" name="mensagem" placeholder="Mensagem" autocomplete="off" required></textarea>
				</div>
				<div class="form-group">
					<input id="botao" class="btn" type="submit" name="enviar" value="Enviar">
				</div>
			</form>
		</div>
	</div>