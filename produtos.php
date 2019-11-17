<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Produtos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/project.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.9">
	<meta name="author" content="Mateus/Bruno">
	<meta name="description" content="Projeto para a faculdade na disciplina de Programação Web">
</head>
<body>
	<div class="container" style="background: white;">
		<?php if (isset($_SESSION['usuario'])){ ?>
			<div style="width: 100%; padding: 5px; background: black; height: 100px;">
				<img class="rounded-circle" src="<?php include 'fotodeperfil.php'; ?>" style="width: 75px; height: 75px; background: white; margin-right: 6px;"><span style="color: red; font-weight: bold;"><?php echo $_SESSION['usuario']; ?></span>
				<span style="color: red; float: right;"><a href="index.php">Página Inicial</a></span>
				</div> <?php } else { ?>
					<span style='color: purple; margin-top: 30px;'>Faça <a href='login.php'>login</a> para fazer um pedido ou cadastre-se <a href='cadastro.php'>aqui!</a></span> <?php } ?>
					<form action="produtos.php" method="GET" style="margin-bottom: 50px; margin-top: 50px;">
						Escolha como quer ver os produtos:
						<div class="form-inline">
							<select class="form-control" name="alcance">
								<option value="0">Todos</option>
								<option value="1">Do mais barato ao mais caro</option>
								<option value="2">Do mais caro ao mais barato</option>
								<option value="3">Abaixo de R$ 1000,00</option>
								<option value="4">Acima de R$ 1000,00</option>
								<option value="5">Entre R$ 500,00 E R$ 1000,00</option>
								<option value="6">Apenas na categoria Smartphone</option>
								<option value="7">Apenas na categoria Phablet</option>
								<option value="8">Apenas na categoria Tablet</option>
							</select>
							<input type="submit" class="btn" id="botao" name="enviar" value="Mostrar" style="margin-left: 10px; margin-top: 5px; width: auto;">
						</div>
					</form>
					<?php
					if (isset($_GET['enviar']))
					{
						include "conexao.php";
						$alcance = $_GET['alcance'];
						switch($alcance)
						{
							case "0":
							$sql = "SELECT * FROM produtos ORDER BY nome ASC";
							break;
							case "1":
							$sql = "SELECT * FROM produtos ORDER BY preco ASC";
							break;
							case "2":
							$sql = "SELECT * FROM produtos ORDER BY preco DESC";
							break;
							case "3":
							$sql = "SELECT * FROM produtos WHERE preco < 1000.00";
							break;
							case "4":
							$sql = "SELECT * FROM produtos WHERE preco > 1000.00";
							break;
							case "5":
							$sql = "SELECT * FROM produtos WHERE preco >= 500.00 AND preco <= 1000.00";
							break;
							case "6":
							$sql = "SELECT * FROM produtos WHERE tipo = 'Smartphone'";
							break;
							case "7":
							$sql = "SELECT * FROM produtos WHERE tipo = 'Phablet'";
							break;
							case "8":
							$sql = "SELECT * FROM produtos WHERE tipo = 'Tablet'";
							break;
						}
						$result = mysqli_query($conn, $sql) or die ("Há algo de errado ".mysqli_error($conn));
						while($row = mysqli_fetch_assoc($result)){ ?>
							<div class="row">
								<div class="col" style="padding: 50px;">
									<form action="pedido.php" method="POST">
										<img src="<?php echo $row['foto']; ?>" style="width: 200px; height: 200px; margin-right: 20px; float: left;"/>
										<span style='color: red; font-weight: bold; font-size: 25px;'><?php echo $row['nome']; ?></span><br>
										<span style='color: black; font-weight: bold; font-size: 20px;'>R$ <?php echo $row['preco']; ?></span><br><br>
										<input type="hidden" name="pedido" value="<?php echo $row['nome']; ?>">
										<input type="submit" class="btn btn-primary" value="Compre já!">
									</form>
								</div>
							</div>
						<?php } } ?>
					</div>
					<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
					<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
					<script src="removeBanner.js"></script>
				</body>
				</html>