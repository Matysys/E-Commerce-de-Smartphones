<?php

include "conexao.php";
$usuario = $_SESSION['usuario'];
$sqlfoto = "SELECT * FROM cliente WHERE usuario = '$usuario'";
$result = mysqli_query($conn, $sqlfoto);
$row = mysqli_fetch_assoc($result);
echo $row['foto'];
?>