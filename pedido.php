<?php
session_start();
if(!isset($_SESSION['usuario'])){
	echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
	echo "<b>SESSÃO EXPIRADA!</b><br>Faça <a style='text-decoration: none;' href='login.php'>login</a> primeiro antes de fazer um pedido!";
	return;
}
if(!isset($_POST['pedido'])){
	echo "<script>document.location = 'index.php';</script>";  
	return;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Faça um pedido</title>
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
			<h2 style='text-align: center;'>Faça seu pedido</h2>
			<h6 style="text-align: center; color: red;">Você selecionou um <?php echo $_POST['pedido']; ?></h6></h6>
			<form class="form-container" style="margin-top: 40px;" action="fazerpedido.php" method="post">
				<div class="form-group">
					Endereço:<br>
					<input type="text" class="form-control" name="endereco" autocomplete="off" placeholder="Coloque seu endereço aqui e número da residência" required>
				</div>
				<div class="form-group">
					Complemento:
					<input type="text" class="form-control" name="complemento" autocomplete="off" placeholder="Referência para achar sua casa (opcional)">
				</div>
				<div class="form-group">
					Bairro:<br>
					<input type="text" class="form-control" name="bairro" autocomplete="off" placeholder="Coloque seu bairro aqui" required>
				</div>
				<div class="form-group">
					Cidade:<br>
					<input type="text" class="form-control" name="cidade" autocomplete="off" placeholder="Digite sua cidade" required>
					Estado:<br>
					<input type="text" class="form-control" name="estado" autocomplete="off" placeholder="UF do seu estado" maxlength="2" required>
				</div>
				<div class="form-group">
					Quantidade:<br><input class="form-control" type="number" name="quantidade" min="1" max="10" placeholder="Quantidade" autocomplete="off" required><br>
				</div>
				<div class="form-group">
					<input type="hidden" name="pedido" value="<?php echo $_POST['pedido']; ?>">
					<input id="botao" class="btn" type="submit" value="Conferir pedido" name="fazerpedido"><br><br>
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