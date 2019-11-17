<?php
if(!isset($_POST['entrando'])){
  header("location: index.php");
}
require_once "conexao.php";

$usuario = filter_var($_POST['usuario'],FILTER_SANITIZE_SPECIAL_CHARS);
$senha = filter_var($_POST['senha'],FILTER_SANITIZE_SPECIAL_CHARS);
if($usuario == "xxxx" && $senha == "xxxx"){
  session_start();
  $_SESSION['adm'] = "Administrador";
  mysqli_close($conn);
  echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
  echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
  echo "Área restrita!<br>Entrando em modo <span style='font-weight: bold; color: red;'>ADMINISTRADOR</span><br>Tenha precaução.";
  return;
}
$sqlcripto = "SELECT * FROM cliente WHERE email = '$usuario' OR usuario = '$usuario'";
$result = mysqli_query($conn, $sqlcripto);
$row = mysqli_fetch_array($result);
if (password_verify($senha, $row['senha'])){
  $sqlativo = "SELECT * FROM cliente WHERE email = '$usuario' OR usuario = '$usuario'";
  $res = mysqli_query($conn, $sqlativo);
  $row2 = mysqli_fetch_array($res);
  if ($row2['cadstate'] == "ativo"){
    if(isset($_POST['guardar'])){
      setcookie("guardar", $usuario, time() + 3600);
    }
    session_start();
    $_SESSION['usuario'] = $usuario;
    mysqli_close($conn);
    echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
    echo "<meta http-equiv='refresh' content='0.3;URL=index.php'>";
    echo "Entrando...";
  }
  else{
    echo "Ative seu cadastro primeiro, volte <a href='login.php'>aqui</a>";
    mysqli_close($conn);
  }

}
else{
  echo "Dados não conferem, tente novamente <a href='login.php'>aqui</a>";
  mysqli_close($conn);
}
?>