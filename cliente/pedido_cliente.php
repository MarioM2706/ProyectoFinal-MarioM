<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stark Bistro | Resumen de Pedido y Cuenta</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/pedido_cliente.css">
</head>
<body>

  <!-- Barra superior -->
  <header class="topbar">
    <div class="topbar-inner">
      <div class="brand">
        <span class="brand-badge">S.H.I.E.L.D.</span>
        <h1>STARK BISTRO</h1>
      </div>
      <nav class="nav-links">
        <a href="carta.php">Carta</a>
        <!--<a href="#datos-pedido">Finalizar Pedido</a>-->
        <a href="pedido_cliente.php" class="active">Mi pedido</a>
        <!--<a href="index.html" class="btn-nav">Acceso Agente</a>-->
        <a href="../includes/cerrarsesion.php" class="btn-nav">Cerrar Sesion</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <!-- Encabezado y datos de la mesa actual -->
    <section class="hero-banner">
      <span class="badge">COMANDA ACTIVA #104 &bull; TORRE DE LOS VENGADORES</span>
      <h2>TU PEDIDO Y TOTAL ACUMULADO</h2>
      <p>Consulta en tiempo real los platos solicitados por tu mesa, su estado de preparación y el importe total acumulado hasta el momento.</p>

      <div class="session-strip">
        <?php 
            // Iniciamos sesion y conectamos con la base de datos
            session_start();
            include __DIR__ . '/../includes/conexion.php';

            // Obtenemos los datos de la mesa que tiene asignada el cliente

            // Primero necesitamos el dni del cliente que ha iniciado la sesion
            $cliente = $_SESSION['dni'];

            // Luego el nombre del usuario
            $nombre = $_SESSION['nomu'];
    
            // Obtenemos todos los datos de la mesa
            $consulta = "SELECT * FROM mesa WHERE dueño='$cliente'";
            //echo $consulta;
            $result=mysqli_query($conn, $consulta);
            echo mysqli_error($conn);
    
            // Guardamos los datos de la mesa en una variable
            $datosmesa=mysqli_fetch_assoc($result);

            // Desglosamos cada campo en una variable diferente
            $codmesa = $datosmesa['codMesa'];
            $nommesa = $datosmesa['nombre'];
            $zonamesa = $datosmesa['zona'];
            $comensales = $datosmesa['comensales'];

            // Mostramos los datos en la pagina
            echo "<div class='strip-item'>";
                echo "<span>Mesa asignada</span>";
                echo "<strong>Mesa ".$codmesa." &mdash; ".$nommesa."</strong>";
            echo "</div>";
            echo "<div class='strip-item'>";
                echo "<span>Titular</span>";
                echo "<strong>".$nombre." (".$comensales." comensales)</strong>";
            echo "</div>";

        ?>
        <!--<div class="strip-item">
          <span>Mesa asignada</span>
          <strong>Mesa 01 &mdash; Torre Stark</strong>
        </div>
        <div class="strip-item">
          <span>Titular</span>
          <strong>Tony Stark (3 comensales)</strong>
        </div>
      </div>-->
    </section>

    <!-- Distribución principal: Lista de artículos + Resumen económico -->
    < class="order-layout">
        <?php
            // Conectamos con la base de datos e iniciamos sesion
            include __DIR__ . '/../includes/conexion.php';

            // Obtenemos el dni del usuario que tiene la sesion abierta y la fecha de hoy
            $cliente = $_SESSION['dni'];
            $hoy = date('Y-m-d');

            $consulta = "SELECT SUM(cantidad) AS total FROM prodronda WHERE ronda IN (SELECT codigoRonda FROM ronda WHERE cliente='$cliente' AND fecha='$hoy')";
            $resultado = mysqli_query($conn, $consulta);
            $fila = mysqli_fetch_assoc($resultado);

            // Si no hay pedidos todavía, SUM devuelve NULL; con ?? 0 te aseguras de que valga 0
            $totalProductos = $fila['total'];

             // Mostramos los datos en la web
                // Columna izquierda: Artículos pedidos
                echo "<section class='items-panel' aria-labelledby='titulo-articulos'>";
                echo "<header class='panel-header'>";
                    echo "<div>";
                        echo "<span class='kicker'>DESGLOSE DE CONSUMICIONES</span>";
                        echo "<h3 id='titulo-articulos'>ARTÍCULOS PEDIDOS (".$totalProductos." UNIDADES)</h3>";
                    echo "</div>";
                    echo "<a href='carta.php' class='btn-add-more'>+ PEDIR MÁS PLATOS</a>";
                echo "</header>";
      
                echo "<div class='ordered-list'>";
        ?>

        <?php
            // Conectamos con la base de datos e iniciamos sesion
            include __DIR__ . '/../includes/conexion.php';

            // Obtenemos el dni del usuario que tiene la sesion abierta y la fecha de hoy
            $cliente = $_SESSION['dni'];
            $hoy = date('Y-m-d');

            // Consulta que obtiene los datos de cada producto y la suma de cantidades pedidas hoy
            $consulta = "SELECT p.nombre, p.precio, p.tag, SUM(pr.cantidad) AS cantidad_pedida
                        FROM producto p
                        INNER JOIN prodronda pr ON p.codProducto = pr.producto
                        INNER JOIN ronda r ON pr.ronda = r.codigoRonda
                        WHERE r.cliente = '$cliente' AND r.fecha = '$hoy'
                        GROUP BY p.codProducto, p.nombre, p.precio, p.tag";
            $resultado = mysqli_query($conn, $consulta);

            // Mostramos en la web
            while ($row = mysqli_fetch_array($resultado)) {
                $subtotal = $row['precio'] * $row['cantidad_pedida'];

                // Artículos
                echo "<article class='ordered-card'>";
                    echo "<img src='' alt='".$row['nombre']."'>";
                    echo "<div class='ordered-info'>";
                        echo "<div class='ordered-top'>";
                            echo "<span class='hero-tag tag-".$row['tag']."'>IRON MAN</span>";
                        echo "</div>";
                        echo "<h4>".$row['nombre']."</h4>";
                        echo "<p class='item-note'>".$row['precio']." € / ud.</p>";
                        echo "<div class='ordered-bottom'>";
                            echo "<span class='qty-pill'>Cantidad: <strong>".$row['cantidad_pedida']." uds.</strong></span>";
                            echo "<strong class='line-subtotal'>".number_format($subtotal, 2, ',', '.')." €</strong>";
                        echo "</div>";
                    echo "</div>";
                echo "</article>";
            }
            ?>
      </section>


      <!-- Formulario para solicitar la cuenta al camarero -->
      <form class="request-bill-form" action="#" method="POST">
        <input type="hidden" name="comanda_id" value="104">
        <input type="hidden" name="mesa_id" value="1">

        <br>

      <?php
    // Conectamos con la base de datos e iniciamos sesion
    include __DIR__ . '/../includes/conexion.php';

    // Obtenemos el dni del usuario que tiene la sesion abierta y la fecha de hoy
    $cliente = $_SESSION['dni'];
    $hoy = date('Y-m-d');

    // Consulta que obtiene los datos de cada producto y la suma de cantidades pedidas hoy
    $consulta = "SELECT p.nombre, p.precio, p.tag, SUM(pr.cantidad) AS cantidad_pedida
                 FROM producto p
                 INNER JOIN prodronda pr ON p.codProducto = pr.producto
                 INNER JOIN ronda r ON pr.ronda = r.codigoRonda
                 WHERE r.cliente = '$cliente' AND r.fecha = '$hoy'
                 GROUP BY p.codProducto, p.nombre, p.precio, p.tag";
    $resultado = mysqli_query($conn, $consulta);

    // Variables
    $base = 0;  // Precio base
    $iva = 10;  // Porcentaje de iva

    echo "<div class='receipt-lines'>";

    // Recorremos solo las líneas de productos
    while ($row = mysqli_fetch_array($resultado)) {
        $precioprod = (float)$row['precio'] * (int)$row['cantidad_pedida'];     // Precio del total de la cantidad de cada productos
        $base = $base + $precioprod;                                            // Precio base sin iva

        // Mostramos
        echo "<div class='receipt-row'>";
            echo "<span>".$row['cantidad_pedida']."x ".$row['nombre']."</span>";
            echo "<span>".$precioprod." €</span>";
        echo "</div>";
    }

    echo "</div>";

    $precioiva = ($base * $iva) / 100;  // Cantidad del precio total en iva
    $total = $base + $precioiva;        // Precio final, con todo

    echo "<div class='receipt-breakdown'>";
        echo "<div class='breakdown-row'>";
            echo "<span>Base imponible</span>";
            echo "<span>".$base." €</span>";
        echo "</div>";
        echo "<div class='breakdown-row'>";
            echo "<span>IVA (10%)</span>";
            echo "<span>".$precioiva." €</span>";
        echo "</div>";
    echo "</div>";

    echo "<div class='grand-total-box'>";
        echo "<span>TOTAL A PAGAR</span>";
        echo "<strong>".$total." €</strong>";
    echo "</div>";
?>

  <button type="submit" class="btn-bill">PEDIR LA CUENTA AL CAMARERO</button>
  <a href="carta.php" class="btn-continue">SEGUIR PIDIENDO DE LA CARTA</a>
</form>
</aside>

  </main>

  <footer class="main-footer">
    <p>&copy; 2026 Stark Bistro &bull; Todos los derechos reservados en la Tierra-616</p>
  </footer>

</body>
</html>