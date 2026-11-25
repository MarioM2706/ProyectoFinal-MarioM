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

    // Obtenemos la fecha de hoy
    

    // Insertamos una nueva ronda a la mesa del cliente
    $consulta2 = "INSERT INTO `ronda`(`codigoRonda`, `codigoCuenta`, `fecha`, `cliente`, `mesa`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')";

    header("LOCATION:cliente/carta.php");

    mysqli_close($conn);
?>