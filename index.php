<?php
session_start();
?>
<!DOCTYPE html>
<!-- MATEUS MOREIRA LIMA -->
<html lang="pt-br">
<head>
	<title>Página principal</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/project.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.9">
	<meta name="author" content="Mateus/Bruno">
	<meta name="description" content="Projeto para a faculdade na disciplina de Programação Web">
	<style>
		<?php if(!isset($_SESSION['adm'])) { ?>
			@keyframes texto{
				0% {color: white;}
				50% {color:  #9900ff;}
				100% {color: purple;}
			}
			h1{
				animation-name: texto;
				animation-duration: 4s;
				animation-iteration-count: infinite;
				animation-direction: alternate;
				text-shadow: 2px 2px 8px black;
			}
		<?php } else { ?>
			@keyframes texto{
				from {color: red;}
				to {color:  black;}
			}
			h1{
				animation-name: texto;
				animation-duration: 2s;
				animation-iteration-count: infinite;
				animation-direction: alternate;
				text-shadow: 2px 2px 20px red;
			}
		<?php } ?>
	</style>
</head>
<body style="background-image: url('https://www.10wallpaper.com/wallpaper/1366x768/1908/2019_Purple_Abstract_4K_HD_Design_1366x768.jpg'); background-size: cover;">
	<?php if(isset($_SESSION['adm'])){ ?>
		<div class="jumbotron text-center" style="margin-bottom:0px;font-family: georgia;background:black;color:white;">
			<h1 style="font-family: Bodoni MT;">TECHNOLOGY M.B Mobile</h1>
			<p style="text-shadow: 2px px black;">»Loja de smartphones«</p>
			</div> <?php } else { ?>
				<div class="jumbotron text-center" style="margin-bottom:0px;font-family: georgia;background:purple;color:white;">
					<h1 style="font-family: Bodoni MT;">TECHNOLOGY M.B Mobile</h1>
					<p style="text-shadow: 2px px black;">»Loja de smartphones«</p>
					</div> <?php } ?>
					<?php if(isset($_SESSION['usuario'])){ ?>
						<div class="jumbotron text-left bg-dark" style="padding: 5px;margin-bottom:0px;font-family: georgia;color:white;">
							<img class="rounded-circle" src="<?php include 'fotodeperfil.php'; ?>" style="width: 75px; height: 75px; background: white; margin-right: 6px;">Bem-vindo(a), <?php echo $_SESSION['usuario']; }?>
						</div>
						<?php if(isset($_SESSION['adm'])){ ?>
							<div class="jumbotron text-left bg-dark" style="padding: 5px;margin-bottom:0px;font-family: georgia;color:white;">
								<img class="rounded-circle" src="perfil/adm.jpg" style="width: 75px; height: 75px; background: white; margin-right: 6px;"><span style="color:red; font-weight: bold;">ADMINISTRADOR</span> <?php } ?>
							</div>
							<nav class="navbar navbar-expand-md bg-dark navbar-dark">
								<a class="navbar-brand" href="index.php"><img src="img/logo.png" style="width: 75px; height: 75px;"></a>
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
									<span class="navbar-toggler-icon"></span>
								</button>
								<div class="collapse navbar-collapse" id="collapsibleNavbar">
									<ul class="navbar-nav">
										<?php
										if(isset($_SESSION['usuario'])){ ?>
											<li class="nav-item">
												<a class="nav-link" href="produtos.php">Produtos</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="meuspedidos.php">Meus pedidos</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="meuperfil.php">Meu perfil</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="faleconosco.php">Fale conosco</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="sair.php">Sair</a>
											</li>
											<?php
										} else if(isset($_SESSION['adm'])){ ?>
											<li class="nav-item">
												<a class="nav-link" href="clientes.php">CLIENTES</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="alterarprodutos.php">ALTERAR PRODUTOS</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="sair.php">SAIR</a>
											</li>
											<?php
										} else {
											?>
											<li class="nav-item">
												<a class="nav-link" href="login.php">Login</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="cadastro.php">Cadastro</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="produtos.php">Produtos</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="faleconosco.php">Fale conosco</a>
												</li> <?php } ?>
											</ul>
										</div>  
									</nav>
									<img style="width: 100%; height: 100%;" class="img-fluid" src="https://4gnews.pt/wp-content/uploads/2019/03/Wallpapers-smartphone-1.jpg">
									<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
									<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
									<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
									<script src="removeBanner.js"></script>
								</body>
								</html>