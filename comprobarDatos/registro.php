<?php
    // Iniciamos la conexion y la sesion
    include("includes/conexion.php");
    session_start();

    // Variables locales y de sesion
    $nombre = $_GET["nombre"];
    $email = $_GET["email"];
    $password = $_GET["password"];
    $cpassword = $_GET["cpassword"];

    $_SESSION['nombre'] = $nombre;
    $_SESSION['email'] = $email;

    // Consulta

    $consulta="SELECT * FROM usuario WHERE name='$nombre' AND email='$email'";
    //echo $consulta;
    $result=mysqli_query($conn, $consulta);

    echo mysqli_error($conn);

    if (mysqli_num_rows($result)==0){
        if ($password!=$cpassword) {
            header("LOCATION:registro.php");
        }else{
            $consultains = "INSERT INTO `usuario`(`id`, `name`, `email`, `password`, `rol`, `e.bloqueo`) VALUES ('0','$nombre','$email','$password','0','0')";
            //echo $consulta;
            mysqli_query($conn, $consultains);
            echo mysqli_error($conn);
            header("LOCATION:index.php");
        } 
    }
    elseif (mysqli_num_rows($result)==1) {
        header("LOCATION:registro.php");
    }

    // Cerramos la conexion con la base de datos
    mysqli_close($conn);
?>