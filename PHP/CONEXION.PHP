<?php

$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$dbname = "darleny"; 


$conex = new mysqli($host, $user, $pass, $dbname);


if ($conex->connect_error) {
    die("Conexión fallida: " . $conex->connect_error);
}
?>
