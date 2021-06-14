<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db = "loja";

$conn = mysqli_connect($hostname, $username, $password, $db);
if(!$conn){
    echo "Não vai";
}

?>