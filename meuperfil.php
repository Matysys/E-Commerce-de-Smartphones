<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("location: index.php");
}
?>
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
	<script>
		function atualizarFoto(arq){
			var f = document.getElementById("foto");
			f.src = URL.createObjectURL(arq.files[0]);		
		}		
	</script>
</head>
<body class="degrade">
	<div class="container" id="tamanhoContainer">
		<div style="padding: 10px;">
			<center>
				<img src="img/alterarfoto.png" style="width: 64px; height: 100px;" id="login">
			</center>
			<form class="form-container" style="margin-top: 40px;" action="meuperfil.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					Escolha uma foto de perfil:<br><input type="file" name="arquivo" onchange="atualizarFoto(this)" accept=".jpg,.png,.jpeg,.gif" required><br><br>
					<img id="foto" style="width:250px;height:250px;" src="perfil/fotopadrao.png">
				</div>
				<div class="form-group">
					<input id="botao" class="btn" type="submit" name="fotinha" value="Salvar"><br><br>
							<?php
		
		if(isset($_POST['fotinha']))
		{
			require "conexao.php";
			$usuario = $_SESSION['usuario'];
			if(isset($_FILES['arquivo']['name']) && $_FILES["arquivo"]["error"] == 0)
			{
				$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
				$nome = $_FILES['arquivo']['name'];
				
	// Pega a extensao
				$extensao = strrchr($nome, '.');
	// Converte a extensao para mimusculo
				$extensao = strtolower($extensao);
	// Somente imagens, .jpg;.jpeg;.gif;.png
	// Aqui eu enfilero as extesões permitidas e separo por ';'
	// Isso server apenas para eu poder pesquisar dentro desta String
				if(strstr('.jpg;.jpeg;.gif;.png', $extensao))
				{
					
					$novoNome = md5(microtime()) . '.' . $extensao;
					
					$destino = 'perfil/' . $novoNome; 
					
					if( @move_uploaded_file( $arquivo_tmp, $destino  ))
					{
						echo "Foto de perfil alterada com sucesso!";
						$sql = "UPDATE cliente SET foto = '$destino' WHERE usuario = '$usuario' OR email = '$usuario'";
						mysqli_query($conn, $sql) or die("Há um erro aqui ".mysqli_error());
						mysqli_close($conn);
						
					}
					else
						echo "Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />";
				}
			} 
		}
		?>
		<a href="index.php">Página inicial</a>
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