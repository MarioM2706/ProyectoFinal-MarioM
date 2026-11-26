<?php
// Iniciamos sesion y conectamos con la base de dqatos
session_start();
include __DIR__ . '/../includes/conexion.php';

// Variables
$codronda = $_SESSION['codronda'];
$mesa = $_SESSION['mes'];

// Mostrar todos los errores (quitar en producción)
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\EscposImage;

try {

    // Configurar impresora - Usar conexión de red
    $ipImpresora = "192.168.36.170";  // Cambiar a la IP de tu impresora
    $puertoImpresora = 9100;         // Puerto por defecto para impresoras ESC/POS
    $connector = new NetworkPrintConnector($ipImpresora, $puertoImpresora);
    $printer = new Printer($connector);

    // Configuración inicial de la impresora
    $printer->setPrintLeftMargin(0);
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->setTextSize(1, 1);

    // Generar número de factura (año + mes + día + hora + minutos)
    $num_factura = date('YmdHi');

    // Cabecera del ticket
    $printer->setJustification(Printer::JUSTIFY_CENTER);
    $printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
    $printer->text("Stark Bistro\n");
    $printer->selectPrintMode();
    $printer->text("C/ Multiverso, 334 - Ultron\n");
    $printer->text("Tel: 019283756\n");
    $printer->text("CIF: S12345678\n");
    $printer->text(str_repeat("-", 32) . "\n");

    // Información de la factura
    $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Factura Nº: " . $num_factura . "\n");
    $printer->text("Mesa: ".$mesa." \n");
    $printer->text("Fecha: " . date('d/m/Y H:i') . "\n");
    $printer->text(str_repeat("-", 32) . "\n\n");

    // ------------- Datos de prodronda -----------------

    // Obtenemos todos los datos de los productos en esa ronda
    $consulta5 = "SELECT * FROM prodronda WHERE ronda = '$codronda'";


    $result6=mysqli_query($conn, $consulta5);
    echo mysqli_error($conn);

    // Mientras que siga devolviendo filas obtenemos los datos necesarios de cada fila
    while($row = mysqli_fetch_array($result6)){
        // Cantidad del producto
        $cantidad = $row['cantidad'];

        //------- Datos del producto ----------------

        // Obtenemos todos los datos de los productos en esa ronda
        $consulta7 = "SELECT * FROM producto WHERE codProducto = '".$row['producto']."'";


        $result8=mysqli_query($conn, $consulta7);
        echo mysqli_error($conn);


        // Guardamos todos los datos de los productos de la ronda en una variable
        $datosProducto=mysqli_fetch_assoc($result8);
        // Desglosamos cada campo en una variable diferente
        $producto = $datosProducto['nombre'];
        
        // Cabecera de la tabla
        $printer->text(str_repeat("=", 32) . "\n");
        $printer->text(sprintf("%-16s %3s \n", "PRODUCTO", "UDS"));
        $printer->text(sprintf("%-16s %3s \n", $producto, $cantidad));
        $printer->text(str_repeat("=", 32) . "\n");
    }


    // Cortar ticket
    $printer->cut();
    $printer->close();

    echo "Ticket enviado a la impresora";
    header("LOCATION:pedido_cliente.php");

} catch (Throwable $e) {
    echo "Error al imprimir ticket: " . get_class($e) . " - " . $e->getMessage()
       . " en " . $e->getFile() . ":" . $e->getLine();
}
?>