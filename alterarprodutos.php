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
	<title>ALTERAÇÃO</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/project.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.9">
	<meta name="author" content="Mateus/Bruno">
	<meta name="description" content="Projeto para a faculdade na disciplina de Programação Web">
	<script>
	    function editar(nome, quantidade, preco){
	        quantidade = 1;
	        document.getElementById('nomeform').value = nome;
	        document.getElementById('precoform').value = preco;
	        document.getElementById('quantidadeform').value = quantidade;
	    }
	</script>
	<style>
	    #mouse{
	        transition: transform 0.5s;
	    }
	    #mouse:hover{
	        cursor: pointer;
	        transform: scale(2.0);
	    }
	</style>
</head>
<body>
	<div class="container" style="background: white;">
	    <?php if (isset($_SESSION['adm'])){ ?>
	    <div id="topo" style="width: 100%; padding: 5px; background: black; height: 100px;">
	        <img class="rounded-circle" src="perfil/adm.jpg" style="width: 75px; height: 75px; background: white; margin-right: 6px;"><span style="color: red; font-weight: bold;"><?php echo $_SESSION['adm']; ?></span>
	        <span style="color: red; float: right;"><a href="index.php">Página Inicial</a></span>
	    </div> <?php } else { ?>
	    <span style='color: purple; margin-top: 30px;'>Faça <a href='login.php'>login</a> para fazer um pedido ou cadastre-se <a href='cadastro.php'>aqui!</a></span> <?php } ?>
		<form action="alterarprodutos.php" method="POST" style="margin-bottom: 50px; margin-top: 50px;">
		    <div class="form-inline">
		        <span style="padding-right: 10px; padding-left: 10px;">Nome:</span><input type="text" class="form-control" name="produto" readonly id="nomeform">
		        <span style="padding-right: 10px; padding-left: 10px;">Quantidade:</span><input type="number" name="quantidade" class="form-control" id="quantidadeform" min="1" required>
		        <span style="padding-right: 10px; padding-left: 10px;">Preço:</span><input type="number" class="form-control" name="preco" id="precoform" step="0.01" required>
		        <input type="radio" style="margin-left: 10px;" name="qnt" value="+" checked>Adicionar
		        <input type="radio" style="margin-left: 10px;" name="qnt" value="-">Remover
		        <input type="submit" class="btn" id="botao" name="alterar" value="Alterar" style="margin-left: 10px; margin-top: 5px; width: auto;">
		    </div>
		    </form>
		    <form action="alterarprodutos.php" method="GET" style="margin-bottom: 50px; margin-top: 50px;">
			Escolha como quer ver os produtos:
			<div class="form-inline">
				<select class="form-control" name="alcance">
					<option value="0">Todos</option>
					<option value="1">Do mais barato ao mais caro</option>
					<option value="2">Do mais caro ao mais barato</option>
					<option value="3">Abaixo de R$ 1000,00</option>
					<option value="4">Acima de R$ 1000,00</option>
					<option value="5">Entre R$ 500,00 E R$ 1000,00</option>
					<option value="6">Do menor estoque ao maior</option>
					<option value="7">Do maior estoque ao menor</option>
				</select>
				<input type="submit" class="btn" id="botao" name="enviar" value="Mostrar" style="margin-left: 10px; margin-top: 5px; width: auto;">
			</div>
		</form>
		<div class="table-responsive">
			<table class="table table-hover table-bordered table-striped table-sm">
			    <thead class="thead-dark">
				<tr>
					<th>Nome do produto</th>
					<th>Tipo do produto</th>
					<th>Quantidade</th>
					<th>Preço em reais</th>
					<th>EDITAR</th>
				</tr>
				</thead>
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
						$sql = "SELECT * FROM produtos ORDER BY quantidade ASC";
						break;
						case "7":
						$sql = "SELECT * FROM produtos ORDER BY quantidade DESC";
						break;
					}
					$result = mysqli_query($conn, $sql) or die("Não foi possível fazer alterações.");
					while($row = mysqli_fetch_assoc($result)){ ?>
					<tr>
						<td id="<?php $row['nome'] ?>"><img style="width: 64px; height: 64px;" src="<?php echo $row['foto']; ?>"><?php echo $row['nome']; ?></td>
						<td><?php echo $row['tipo']; ?></td>
						<td id="<?php $row['quantidade'] ?>"><?php echo $row['quantidade']; ?></td>
						<td id="<?php $row['preco'] ?>">R$ <?php echo $row['preco']; ?></td>
						<td><center><a href="#topo"><img id="mouse" style="width: 32px; height: 32px;" onClick="editar('<?php echo $row['nome']; ?>','<?php echo $row['quantidade']; ?>','<?php  echo $row['preco']; ?>')" src="img/edit.png"></a></center></td>
					</tr>	<?php } } ?>
				</table>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="removeBanner.js"></script>
	</body>
	</html>
	<?php
	if(isset($_POST['alterar']))
    {
    include "conexao.php";
    $nome = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $alteracao = $_POST['qnt'];
    mysqli_query($conn, "SELECT * FROM produtos WHERE nome = '$nome'");
    if(!mysqli_affected_rows($conn)){
        echo "<script>alert('Nenhum produto selecionado');</script>";
        return;
    }
    $sqlalterar = "UPDATE produtos SET quantidade = quantidade $alteracao '$quantidade', preco = '$preco' WHERE nome = '$nome'";
    mysqli_query($conn, $sqlalterar) or die("Não foi possível ".mysqli_error());
    mysqli_close($conn);
    echo "<script>alert('Alteração concluída com sucesso! Você modificou a quantidade do produto $nome em $quantidade e o preço agora é de R$ $preco');</script>";
}
?>