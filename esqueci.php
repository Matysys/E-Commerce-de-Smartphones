<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Recuperação</title>
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
				<img src="img/esquecisenha.png" id="login">
			</center>
			<form class="form-container" style="margin-top: 40px;" action="recover.php" method="post">
				<div class="form-group">
					E-mail:<br><input class="form-control" type="email" name="email" placeholder="Digite seu e-mail para recuperação" autocomplete="off" required><br>
				</div>
				<div class="form-group">
					<input id="botao" class="btn" type="submit" value="Enviar"><br><br>
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