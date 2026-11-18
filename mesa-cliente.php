<?php 
    // Iniciamos la sesion y establecemos la conexion con la base de datos
    session_start();
    include("includes/conexion.php");

    // Obtenemos los datos de la mesa
    $codmesa = $_POST['mesa_seleccionada'];

    // Primero comprobamos si la mesa ya esta seleccionada
    
?>