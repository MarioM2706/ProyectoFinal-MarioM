<?php
    // Iniciamos la conexion y la sesion
    include("includes/conexion.php");
    session_start();

    // Variables locales y de sesion
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellidos'] = $apellidos;
    $_SESSION['email'] = $email;

    // Consulta
    $consulta="SELECT * FROM usuario WHERE nombre='$nombre' AND dni='$dni'";
    //echo $consulta;
    $result=mysqli_query($conn, $consulta);

    echo mysqli_error($conn);

    if (mysqli_num_rows($result)==0){
            $consultains = "INSERT INTO `usuario` (`dni`, `contra`, `baneado`, `rol`, `email`, `nombre`, `apellidos`) VALUES ('$dni', '$password', '0', '0', '$email', '$nombre', '$apellidos')";
            //echo $consulta;
            mysqli_query($conn, $consultains);
            echo mysqli_error($conn);
            header("LOCATION:index.php");
    }
    elseif (mysqli_num_rows($result)==1) {
        header("LOCATION:registro.php");
       
    }

    // Cerramos la conexion con la base de datos
    mysqli_close($conn);
?>