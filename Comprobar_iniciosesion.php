<?php
    // Iniciamos sesion
    session_start();
    
    // Conectamos con la base de datos
    include("includes/conexion.php");


    // Variables locales
    $email = $_POST["email"];
    $pwd = $_POST["password"];

    // Variables de sesion
    $_SESSION['fallo'] = false;

    // Consulta
    $consulta="SELECT * FROM usuario WHERE email='$email' AND contra='$pwd'";
    //echo $consulta;
    $result=mysqli_query($conn, $consulta);
    echo mysqli_error($conn);

    // Comprobamos que el usuario existe
    if(mysqli_num_rows($result)==1){
        // Si existe comprobamos que no este bloqueado
        $consulta2 = "SELECT baneado FROM usuario WHERE email='$email' AND contra='$pwd'";
        //echo $consulta;
        $result2=mysqli_query($conn, $consulta);
        echo mysqli_error($conn);
        // Guardamos el estado de bloqueo en una variable php
        $fila = mysqli_fetch_array($result2);
        $estadob = $fila['baneado'];
        // Si el usuario esta bloquedo vuelve al inicio de sesion, si no lo esta, continua al panel de cartas
        if($estadob==1){
            $_SESSION['fallo'] = true;
            header("LOCATION:index.php");
        }else{
            // Obtenemos todos los datos del usuario
            $consultatotal = "SELECT * FROM usuario WHERE email='$email' AND contra='$pwd'";
            //echo $consulta;
            $result3=mysqli_query($conn, $consulta);
            echo mysqli_error($conn);

            // Guardamos todos los datos del usuario en una variable
             $datosUsuario=mysqli_fetch_assoc($result3);
             // Desglosamos cada campo en una variable diferente
             $_SESSION['dni'] = $datosUsuario['dni'];
             $_SESSION['nomu'] = $datosUsuario['nombre'];
             $_SESSION['rolu'] = $datosUsuario['rol'];
             $_SESSION['apes'] = $datosUsuario['apellidos'];
             $_SESSION['email'] = $datosUsuario['email'];
             $_SESSION['password'] = $datosUsuario['contra'];
             $_SESSION['ban'] = $datosUsuario['baneado'];

             // Segun su rol va a un panel diferente admin=panel de administracion user=listadocartas
             if($_SESSION['rolu']==0){
                header("LOCATION: cliente/index.php");
             }

             if($_SESSION['rolu']==1){
                header("LOCATION: camarero/index.php");
             }

             if($_SESSION['rolu']==2){
                header("LOCATION: encargado/index.php");
             }
        }
    }
    // Si no existe
    elseif(mysqli_num_rows($result)==0){
        $_SESSION['fallo'] = true;
        header("LOCATION:index.php");
    }

    // Cerramos la conexion con la base de datos
    mysqli_close($conn);

?>