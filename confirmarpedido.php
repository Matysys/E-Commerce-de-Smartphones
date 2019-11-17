<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Confirmar pedido</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/project.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.9">
	<meta name="author" content="Mateus/Bruno">
	<meta name="description" content="Projeto para a faculdade na disciplina de Programação Web">
</head>
<body>
	<?php
	if(!isset($_POST['confirmar']))
	{
		header("location: index.php");
		return;
	}
	include "conexao.php";
	$usuario = $_SESSION['usuario'];
	$endereco = $_POST['endereco'];
	$complemento = $_POST['complemento'] ?? "Não há complemento";
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$pedido = $_POST['pedido'];
	$quantidade = $_POST['quantidade'];
	$total = $_POST['total'];
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('y/m/d', time());
	$sqlproduto = "SELECT * FROM produtos WHERE nome = '$pedido'";
	$result = mysqli_query($conn, $sqlproduto);
	$row = mysqli_fetch_assoc($result);
	$idproduto = $row['id_produto'];
	$sqlcliente = "SELECT * FROM cliente WHERE email = '$usuario' OR usuario = '$usuario'";
	$result2 = mysqli_query($conn, $sqlcliente);
	$row2 = mysqli_fetch_assoc($result2);
	$idcliente = $row2['id_cliente'];
	$sqlpedido = "INSERT INTO pedido (endereco, complemento, bairro, cidade, uf, nome, quantidade, total, data, id_produto, id_cliente) 
	VALUES ('$endereco', '$complemento', '$bairro', '$cidade', '$estado', '$pedido', '$quantidade', '$total', '$date', '$idproduto', '$idcliente')";
	mysqli_query($conn, $sqlpedido) or die('Não foi'.mysqli_error($conn));
	$sqlestoque = "UPDATE produtos SET quantidade = quantidade - '$quantidade' WHERE id_produto = '$idproduto'";
	mysqli_query($conn, $sqlestoque) or die("Não deu".mysqli_error($conn));
	echo "Pedido concluído com sucesso! Veja seus pedidos <a href='meuspedidos.php'>aqui</a>";
	?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="removeBanner.js"></script>
	<script src="removeBanner.js"></script>
</body>
</html>
