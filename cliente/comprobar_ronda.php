<?php
    // Conectamos con la base de datos e iniciamos sesion
    session_start();
    include __DIR__ . '/../includes/conexion.php';

    // Obtenemos el dni del cliente que ha iniciado la sesion
    $cliente = $_SESSION['dni'];
    
    // Obtenemos todos los datos de la mesa
    $consulta3 = "SELECT * FROM mesa WHERE dueño='$cliente'";
    //echo $consulta;
    $result4=mysqli_query($conn, $consulta3);
    echo mysqli_error($conn);
    
    // Guardamos todos el codigo de la mesa en una variable
    $datosmesa=mysqli_fetch_assoc($result4);
    // Desglosamos cada campo en una variable diferente
    $_SESSION['codMesa'] = $datosmesa['codMesa'];


    // Obtenemos las variables necesarias para la insercion en la tabla ronda
    $hoy = date('Y-m-d');
    $mesa = $_SESSION['codMesa'];
    $codCuenta = "C".$cliente;
    
    // Insertamos una nueva ronda a la mesa del cliente
    $consulta2 = "INSERT INTO `ronda`(`codigoRonda`, `codigoCuenta`, `fecha`, `cliente`, `mesa`) VALUES (NULL,'$codCuenta','$hoy','$cliente','$mesa')";
    mysqli_query($conn, $consulta2);
    echo mysqli_error($conn);

    // Obtenemos directamente el codigoRonda autogenerado por el INSERT anterior
    $codronda = mysqli_insert_id($conn);

    // Para cada fila ejecutamos la consulta para actualizar el stock
    foreach ($_POST as $clave => $cantidad) {
        $codProducto = (int) $clave;
        $cantidad = (int) $cantidad;

        // Actualizamos el stock de cada articulo, se haya pedido o no
        $consulta = "UPDATE producto SET stock = stock - $cantidad WHERE codProducto = $codProducto";
        mysqli_query($conn, $consulta);
        echo mysqli_error($conn);

        // Añadimos a la tabla prodronda solo los productos que se han pedido
        if($cantidad>0){
            // Insertamos los productos pedidos en prodronda
            $consulta4 = "INSERT INTO `prodronda`(`ronda`, `producto`, `cantidad`) VALUES ('$codronda','$codProducto','$cantidad')";
            mysqli_query($conn, $consulta4);
            echo mysqli_error($conn);
        }

    }

    header("LOCATION:pedido_cliente.php");

    mysqli_close($conn);
?>