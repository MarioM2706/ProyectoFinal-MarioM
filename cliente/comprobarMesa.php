<?php 
    // Conectamos con la base de datos e iniciamos sesion
    include __DIR__ . '/../includes/conexion.php';
    session_start();

    // Variables
    $dni = $_SESSION['dni'];

    // Relizamos la consulta para ver si el usuario ya tiene una mesa ocupada en la base de datos
    $consulta="SELECT * FROM mesa WHERE dueño='$dni'";
    //echo $consulta;
    $result=mysqli_query($conn, $consulta);
    echo mysqli_error($conn);

    // Si tiene una mesa ocupada se redirige a la carta y si no, selecciona mesa
    if(mysqli_num_rows($result)>=1){
        header("LOCATION:carta.php");
    }else{
        header("LOCATION:index.php");
    }
?>