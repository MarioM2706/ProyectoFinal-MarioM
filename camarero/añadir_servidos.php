<?php 
    // Conectamos con la base de datos
    include __DIR__ . '/../includes/conexion.php';

    // Obtenemos los platos marcados en el input
    $platos = array($_POST['servido']);

    // Por cada elemento en el array cambiamos su estado de servido en la base de datos
    foreach($platos as $nombre){
        // Realizamos la consulta en cada producto del array
        $consulta =  "UPDATE `prodronda` SET `servido`=1 WHERE producto = (SELECT codProducto FROM producto WHERE nombre = '$nombre')";

    }
    
?>
