<?php
if(!isset($_POST['fazerpedido']))
{
	header("location: index.php");
}
else
{
	session_start();
	$endereco = $_POST['endereco'];
	$complemento = $_POST['complemento'] ?? "Não há complemento";
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$pedido = $_POST['pedido'];
	$quantidade = $_POST['quantidade'];
	$usuario = $_SESSION['usuario'];
	include "conexao.php";
	$max = mysqli_query($conn, "SELECT ($quantidade * preco) AS total FROM produtos WHERE nome = '$pedido'");
	$maxquery = mysqli_fetch_assoc($max);
	$total = $maxquery['total'];
	mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Pedido</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/project.css">
	<meta charset="utf-8">
	<style>
		#pedido{
			height: 300px;
			width: 250px;
		}
	</style>
</head>
<body>
	<div class="container" style="color: purple;">
		<?php
		echo "Olá, <span style='color: blue; font-weight: bold;'>$usuario!</span> Eis os seus dados abaixo:<br><br>
		Endereço: $endereco<br>
		Complemento: $complemento<br>
		Bairro: $bairro<br>
		Cidade: $cidade<br>
		Estado: $estado<br><br>
		O seu pedido foi um $pedido na quantidade de $quantidade produto(s). O valor total da sua compra foi de <span style='color: red; font-weight: bold;'>R$ $total</span><br> Se deseja confirmar o seu pedido, clique no botão abaixo! Ou se desejar voltar e refazer, clique <a href='pedido.php'>aqui</a>!<br><br>
		";
		echo "<center>";
		switch($pedido)
		{
			case "Samsung Galaxy S10":
			echo "<img src='pedido/galaxys10.png' id='pedido' class='img-fluid'/>";
			break;
			case "Samsung Galaxy Note 9":
			echo "<img src='pedido/galaxynote9.png' id='pedido' class='img-fluid'/>";
			break;
			case "Apple Ipad Mini 5":
			echo "<img src='pedido/ipadmini.png' id='pedido' class='img-fluid'/>";
			break;
			case "LG K12":
			echo "<img src='pedido/lgk12.png' id='pedido' class='img-fluid'/>";
			break;
			case "Xiaomi Redmi 7":
			echo "<img src='pedido/xiaomiredmi7.png' id='pedido' class='img-fluid'/>";
			break;
			case "Xiamo Redmi 7A":
			echo "<img src='pedido/xiaomiredmi7a.png' id='pedido' class='img-fluid'/>";
			break;
			case "Samsung Galaxy J5 Prime":
			echo "<img src='pedido/j5prime.png' id='pedido' class='img-fluid'/>";
			break;
			case "Moto G7 Play":
			echo "<img src='pedido/motog7play.png' id='pedido' class='img-fluid'/>";
			break;
			case "Positivo Selfie":
			echo "<img src='pedido/positivoselfie.png' id='pedido' class='img-fluid'/>";
			break;
			case "Zenfone Live Go":
			echo "<img src='pedido/zenfonelivego.png' id='pedido' class='img-fluid'/>";
			break;
			case "Apple IPhone 11":
			echo "<img src='pedido/iphone11.png' id='pedido' class='img-fluid'/>";
			break;
			case "Apple IPhone 11":
			echo "<img src='pedido/iphone11.png' id='pedido' class='img-fluid'/>";
			break;
			case "Galaxy Tab A":
			echo "<img src='pedido/galaxytab.png' id='pedido' class='img-fluid'/>";
			break;
			default:
			echo "Nada";
			break;
		}
		echo "</center>";
		?>
		<form action="confirmarpedido.php" method="post">
			<input type="hidden" name="endereco" value="<?php echo $endereco; ?>">
			<input type="hidden" name="complemento" value="<?php echo $complemento; ?>">
			<input type="hidden" name="cidade" value="<?php echo $cidade; ?>">
			<input type="hidden" name="bairro" value="<?php echo $bairro; ?>">
			<input type="hidden" name="estado" value="<?php echo $estado; ?>">
			<input type="hidden" name="pedido" value="<?php echo $pedido; ?>">
			<input type="hidden" name="quantidade" value="<?php echo $quantidade; ?>">
			<input type="hidden" name="total" value="<?php echo $total; ?>">
			<input type="submit" class="btn btn-primary" style="float: right;" value="Confirmar pedido" name="confirmar">
		</form>
	</div>
	<script src="removeBanner.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="removeBanner.js"></script>
</body>
</html>	