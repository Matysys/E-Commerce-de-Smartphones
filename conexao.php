<?php
$hostname = "localhost";
$username = "id11511094_projetinho";
$password = "123456";
$db = "id11511094_bancodoprojetinho";

$conn = mysqli_connect($hostname, $username, $password, $db);
if(!$conn){
    echo "Não vai";
}

?>