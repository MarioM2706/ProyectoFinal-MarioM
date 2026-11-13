<?php
include("config.php");
//Establecimiento de la conexión al servidor localhost, 
//con el usuario root y sin clave
$conn= mysqli_connect($servidor,$user,$clave);
//Seleccionamos la base de datos empresa
mysqli_select_db($conn,$basededatos);
//Imprimimos si hay algún error

mysqli_query($conn, "SET NAMES 'utf8'");
echo mysqli_error($conn);
?>