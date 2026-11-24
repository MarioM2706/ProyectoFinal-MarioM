<?php
    // Conectamos con la base de datos e iniciamos sesion
    include("includes/conexion.php");
    session_start();



    // Para cada fila ejecutamos la consulta para actualizar el stock
    foreach ($_POST as $clave => $cantidad) {
        $codProducto = (int) $clave;
        $cantidad = (int) $cantidad;

        $consulta = "UPDATE producto SET stock = stock - $cantidad WHERE codProducto = $codProducto";
        mysqli_query($conn, $consulta);
        echo mysqli_error($conn);
    }

    header("LOCATION:cliente/carta.php");

    mysqli_close($conn);
?>