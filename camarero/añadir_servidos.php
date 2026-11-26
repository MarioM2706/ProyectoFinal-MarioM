<?php 
    // Conectamos con la base de datos
    include __DIR__ . '/../includes/conexion.php';

    // Obtenemos los platos marcados en el input
    $platos = $_POST['servido'];

    // Obtenemos el codigo de la ronda de esa mesa
    $ronda = (int)$_POST['ronda_id'];

    // Por cada elemento en el array cambiamos su estado de servido en la base de datos
    foreach($platos as $nombre){
        // Realizamos la consulta en cada producto del array
        $consulta =  "UPDATE `prodronda` SET `servido`=1 WHERE ronda = '$ronda' AND producto = (SELECT codProducto FROM producto WHERE nombre = '$nombre')";
        $result = mysqli_query($conn, $consulta);
        echo mysqli_error($conn);

    }

    // Una vez hecho volvemos al control de mesa
    header("LOCATION:index.php");
    
?>
