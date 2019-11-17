<?php
session_start();
if(!isset($_SESSION['usuario']))
{
	header("location: index.php");
}
if(isset($_POST['deletar']))
{
	$idpedido = $_POST['meupedido'];
	require "conexao.php";
	$sqldelete = "DELETE from pedido WHERE id_pedido = '$idpedido'";
	mysqli_query($conn, $sqldelete) or die("Não foi possível ".mysqli_error());
	echo "<script>alert('Pedido deletado com sucesso!');</script>";
	echo "<meta http-equiv='refresh' content='0.1;meuspedidos.php'>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Meus pedidos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/project.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.9">
	<meta name="author" content="Mateus/Bruno">
	<meta name="description" content="Projeto para a faculdade na disciplina de Programação Web">
	<style>
		th{
			background: black;
		}
		td{
			background: gray;
		}
	</style>
</head>
<body class="degrade">
	<div class="container" style="background: white;">
		<center>
			<h3 style="color: red; margin-bottom: 30px; margin-top: 30px;">Meus pedidos</h3><br>
			<a href='index.php'><img src="img/logo.png" style="width: 75px; height: 75px;"></a>
		</center>
		<?php
		require "conexao.php";
		$usuario = $_SESSION['usuario'];
		$result = mysqli_query($conn, "SELECT * FROM cliente WHERE usuario = '$usuario' OR email = '$usuario'") or die(mysqli_error($conn));
		$row = mysqli_fetch_assoc($result);
		$idcliente = $row['id_cliente'];
		mysqli_query($conn, "SELECT * FROM pedido WHERE id_cliente = '$idcliente'");
		if(mysqli_affected_rows($conn) > 0)
		{
			$sqlpedido = "SELECT pedido.id_pedido, pedido.endereco, pedido.complemento, pedido.bairro, pedido.cidade, pedido.data, pedido.uf, pedido.nome, pedido.situacao, produtos.foto, produtos.tipo, pedido.quantidade AS quantidadet, pedido.total, produtos.id_produto FROM pedido INNER JOIN produtos ON id_cliente = '$idcliente' AND pedido.id_produto = produtos.id_produto;";
			$result2 = mysqli_query($conn, $sqlpedido) or die(mysqli_error($conn));
			while($row2 = mysqli_fetch_assoc($result2))
			{
				?>
				<div class="row">
					<div class="col-sm">
						<img style="float: left; height: 285px; width: 275px;" class="img-fluid" src="<?php echo $row2['foto']; ?>">
					</div>
					<div class="col-sm">
						<b>Número do pedido: </b><?php echo $row2['id_pedido']; ?><br>
						<b>Endereço: </b><?php echo $row2['endereco']; ?><br>
						<b>Complemento: </b><?php echo $row2['complemento']; ?><br>
						<b>Bairro: </b><?php echo $row2['bairro']; ?><br>
						<b>Cidade: </b><?php echo $row2['cidade']; ?><br>
						<b>Estado: </b><?php echo $row2['uf']; ?><br>
						<b>Nome do produto: </b><?php echo $row2['nome']; ?><br>
						<b>Tipo do produto: </b><?php echo $row2['tipo']; ?><br>
						<b>Quantidade: </b><?php echo $row2['quantidadet']; ?><br>
						<b>Total a pagar: </b><span style="color: red;">R$<?php echo $row2['total']; ?></span><br>
						<b>Data do pedido: </b><?php echo $row2['data']; ?><br>
						<b>Situação: </b><?php echo $row2['situacao']; ?><br>
						<form action="meuspedidos.php" method="POST">
							<input type="hidden" value="<?php echo $row2['id_pedido']; ?>" name="meupedido">
							<input type="submit" style="margin: auto;" class="btn btn-danger btn-sm" name="deletar" value="Deletar pedido">
						</form>
					</div>
				</div><br><br>
			<?php } } else
			{
				echo "<h1><center>Não há pedidos</center></h1>";
			}
			?>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="removeBanner.js"></script>
	</body>
	</html>