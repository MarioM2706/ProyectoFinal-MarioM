<?php 
    // Obtenemos el codigo de la mesa seleccionada por el cliente
    $mesaocupar=$_GET['mesaocupar'];

    // Conectamos con la base de datos e iniciamos sesion
    include __DIR__ . '/../includes/conexion.php';
    session_start();

    // Variable dni del usuario
    $dni = $_SESSION['dni'];

    // Consulta para actualizar mesa seleccionada por el usuario
    $consulta="UPDATE mesa
                SET dueño = '$dni', ocupada = 1
                WHERE codMesa = $mesaocupar;
            ";
    //echo $consulta;
    $result=mysqli_query($conn, $consulta);
    echo mysqli_error($conn);

    // Redirigmos a la carta al seleccionar mesa
    // header("LOCATION:cliente/carta.php");
?>