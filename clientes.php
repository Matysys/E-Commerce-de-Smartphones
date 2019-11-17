<?php
session_start();
if(!isset($_SESSION['adm'])){
	echo "<meta name='viewport' content='width=device-width, initial-scale=0.9'>";
	echo "<span style='color: red; font-weight; bold;'>ÁREA RESTRITA, RESERVADA PARA ADMINISTRADOR</span>";
	echo "<meta http-equiv='refresh' content='1;index.php'>";
	return;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>CLIENTES</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/project.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.9">
	<meta name="author" content="Mateus/Bruno">
	<meta name="description" content="Projeto para a faculdade na disciplina de Programação Web">
</head>
<style>
    #zoom{
        transition: transform 1s;
    }
    #zoom:hover{
        transform: scale(1.2);
    }
</style>
<body>
	<div class="container" style="background: white;">
		<div id="topo" style="width: 100%; padding: 5px; background: black; height: 100px;">
			<img class="rounded-circle" src="perfil/adm.jpg" style="width: 75px; height: 75px; background: white; margin-right: 6px;"><span style="color: red; font-weight: bold;"/>Administrador</span>
			<span style="color: red; float: right;"><a href="index.php">Página Inicial</a></span>
		</div>
		<div class="table-responsive">
			<table class="table table-dark table-hover table-borderless table-sm">
				<thead style="background: black;">
					<tr>
						<th>ID</th>
						<th>Foto</th>
						<th>Usuário</th>
						<th>Email</th>
						<th>Status</th>
						<th>Pedidos</th>
					</tr>
				</thead>
				<?php
				include "conexao.php";
				$sql = "select * from cliente";
				$result = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td id="<?php $row['id_cliente'] ?>"><?php echo $row['id_cliente']; ?></td>
						<td id="zoom"><img class="rounded-circle" src=<?php echo $row['foto'];?> style="width: 75px; height: 75px; background: white; margin-right: 6px;"></td>
						<td id="<?php $row['usuario'] ?>"><?php echo $row['usuario']; ?></td>
						<td id="<?php $row['email'] ?>"><?php echo $row['email']; ?></td>
						<td id="<?php $row['cadstate'] ?>"><?php echo $row['cadstate']; ?></td>
						<form action="pedidosgerais.php" method="POST">
						    <input type="hidden" name="iddopedido" value="<?php echo $row['id_cliente']; ?>">
						    <input type="hidden" name="usuario" value="<?php echo $row['usuario']; ?>">
						<td><input type="image" src="img/verpedidos.png" style="height: 32px; width: 32px;"></td>
						</form>
					</tr><?php } ?>
				</table>
		</div>
	</div>
	<?php
	mysqli_close($conn);
	?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="removeBanner.js"></script>
</body>
</html>