<?php
session_start();


$host="localhost";
$user="root";
$pass="";
$db_name="tester";
$conexion = mysqli_connect($host,$user,$pass,$db_name) or die (mysqli_erro($mysqli));

?>
