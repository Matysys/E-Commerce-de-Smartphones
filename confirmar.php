<?php
echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
echo "<script src='removeBanner.js'></script>";
echo "<meta charset='utf-8'>";
require_once "conexao.php";
$email = $_GET['email'];
$email = base64_decode($email);
$sql = "UPDATE cliente SET cadstate = 'ativo' WHERE email = '$email'";
mysqli_query($conn, $sql);
if(mysqli_affected_rows($conn)){
echo "Seu cadastro foi ativado com sucesso!<br> Clique <a href='login.php'>aqui</a> e faça seu login.";
}
else{
    echo "LINK EXPIRADO!";
}
mysqli_close($conn);
?>