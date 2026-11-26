<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stark Bistro | Control de Mesas y Servicio</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/estilo_camarero.css">
</head>
<body>
  <!-- Incluimos la seguridad -->
   <?php include("seguridad_camarero.php"); ?>

  <!-- Barra superior -->
  <header class="topbar">
    <div class="topbar-inner">
      <div class="brand">
        <span class="brand-badge">S.H.I.E.L.D.</span>
        <h1>STARK BISTRO</h1>
      </div>
      <nav class="nav-links">
        <a href="index.php" class="active">Control de Sala</a>
        <a href="carta.php">Carta</a>
        <a href="../includes/cerrarsesion.php" class="btn-nav">Cerrar Sesion</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <!-- Encabezado y resumen de estado -->
    <section class="hero-banner">
      <span class="badge">TERMINAL DE CAMAREROS &bull; TORRE DE LOS VENGADORES</span>
      <h2>GESTIÓN DE MESAS Y COMANDAS</h2>
      <p>Marca los platos servidos en cada mesa, libera las mesas tras el cobro o asigna mesas libres a nuevos clientes.</p>

      <!-- Mesas ocupadas -->
      <?php
      // Conectamos con la base de datos
       include __DIR__ . '/../includes/conexion.php';

       // Consulta para obtener las mesas que estan ocupadas
       $consulta = "SELECT COUNT(*) AS cuentaocupada FROM mesa WHERE ocupada = 1";

       $resultado = mysqli_query($conn, $consulta);
        $fila = mysqli_fetch_assoc($resultado);

        // Guardamos la cuenta del total de productos
        $totalOcupadas = $fila['cuentaocupada'];

        echo "<div class='status-summary'>";
          echo "<div class='summary-pill occupied'>";
            echo "<span class='dot'></span>";
            echo "<span>Mesas Ocupadas: <strong>".$totalOcupadas."</strong></span>";
            echo "</div>";
       ?>

      <!-- Mesas libres -->
       <?php
      // Conectamos con la base de datos
       include __DIR__ . '/../includes/conexion.php';

       // Consulta para obtener las mesas que estan ocupadas
       $consulta = "SELECT COUNT(*) AS cuentaocupada FROM mesa WHERE ocupada = 0";

       $resultado = mysqli_query($conn, $consulta);
        $fila = mysqli_fetch_assoc($resultado);

        // Guardamos la cuenta del total de productos
        $totalLibres = $fila['cuentaocupada'];

        echo "<div class='status-summary'>";
          echo "<div class='summary-pill free'>";
            echo "<span class='dot'></span>";
            echo "<span>Mesas Libres: <strong>".$totalLibres."</strong></span>";
            echo "</div>";
       ?>
      </div>
    </section>

    <!-- Cuadrícula de mesas -->
    <section class="tables-grid" aria-label="Listado de mesas del restaurante">
      
    <!-- Mesas -->
     <?php
      // Conectamos con la base de datos
      include __DIR__ . '/../includes/conexion.php';

      // 1. Datos de todas las mesas
      $consulta = "SELECT * FROM mesa";
      $result = mysqli_query($conn, $consulta);
      echo mysqli_error($conn);

      $hoy = date('Y-m-d');

      // Recorremos todas las mesas
      while ($datosmesa = mysqli_fetch_array($result)) {
          $codmesa = $datosmesa['codMesa'];
          $ocupada = $datosmesa['ocupada'];
          $zona = $datosmesa['zona'];
          $nombre = $datosmesa['nombre'];
          $descripcion = $datosmesa['descripcion'];
          $dueño = $datosmesa['dueño'];
          $comensales = $datosmesa['comensales'];

          // Estado según si está libre u ocupada
          if ($ocupada == 0) {
              $estado = "free";
              $cadestado = "LIBRE";
          } else {
              $estado = "occupied";
              $cadestado = "OCUPADA";
          }

      echo "<article class='table-card is-".$estado."'>";
      echo "<header class='table-header'>";
        echo "<div>";
          echo "<span class='table-sector'>SECTOR ".$zona." &bull; ".$comensales." COMENSALES</span>";
          echo "<h3>MESA ".$codmesa." &mdash; ".$nombre."</h3>";
        echo "</div>";
        echo "<span class='status-badge badge-".$estado."'>".$cadestado."</span>";
      echo "</header>";

      echo "<div class='table-body'>";
        echo "<p class='client-info'>Titular: <strong>".$dueño."</strong></p>";

        // Formulario 1: Marcar productos como servidos
        echo "<form class='service-form' action='añadir_servidos.php' method='POST'>";
          echo "<input type='hidden' name='mesa_id' value='".$codmesa."'>";
          echo "<input type='hidden' name='accion' value='actualizar_servidos'>";

          echo "<div class='orders-list'>";

          // 2. Pedidos de ESTA mesa en el día de hoy (usando $consulta2)
          $consulta2 = "SELECT p.nombre, p.precio, p.tag, pr.ronda, SUM(pr.cantidad) AS cantidad_pedida
                        FROM producto p
                        INNER JOIN prodronda pr ON p.codProducto = pr.producto
                        INNER JOIN ronda r ON pr.ronda = r.codigoRonda
                        WHERE r.mesa = $codmesa AND r.fecha = '$hoy'
                        GROUP BY p.codProducto, p.nombre, p.precio, p.tag";
          $resultado2 = mysqli_query($conn, $consulta2);

          // Variable del precio total de la mesa
          $totalMesa = 0;

          // Mostramos los productos pedidos (todos sin servir)
          while ($row = mysqli_fetch_array($resultado2)) {
              $subtotal = (float)$row['precio'] * (int)$row['cantidad_pedida'];
              $totalMesa += $subtotal;

              echo "<label class='order-item'>";
              echo "<input type='hidden' name='ronda_id' value='".$row['ronda']."'>";
                echo "<input type='checkbox' name='servido[]' value='".$row['nombre']."'>";
                echo "<span class='custom-check' aria-hidden='true'></span>";
                echo "<span class='item-details'>";
                  echo "<span class='item-name'>".$row['cantidad_pedida']."x ".$row['nombre']."</span>";
                echo "</span>";
                echo "<span class='item-status'></span>";
              echo "</label>";
          }

          echo "</div>";
          echo "<button type='submit' class='btn-action btn-serve'>GUARDAR PLATOS SERVIDOS</button>";
        echo "</form>";

        // Formulario 2: Marcar como pagada y liberar mesa
        echo "<form class='payment-form' action='#' method='POST'>";
          echo "<input type='hidden' name='mesa_id' value='".$codmesa."'>";
          echo "<input type='hidden' name='accion' value='pagar_y_liberar'>";

          echo "<div class='payment-row'>";
            echo "<div class='bill-total'>";
              echo "<span>Total cuenta</span>";
              echo "<strong>".$totalMesa." €</strong>";
            echo "</div>";
            echo "<select name='metodo_pago' aria-label='Método de pago Mesa ".$codmesa."' required>";
              echo "<option value='tarjeta'>Tarjeta Stark</option>";
              echo "<option value='efectivo'>Efectivo</option>";
              echo "<option value='shield'>Créditos S.H.I.E.L.D.</option>";
            echo "</select>";
          echo "</div>";

          echo "<button type='submit' class='btn-action btn-pay'>MARCAR PAGADA Y LIBERAR MESA</button>";
        echo "</form>";
      echo "</div>";
    echo "</article>";
}
?>

    </section>
  </main>

  <footer class="main-footer">
    <p>&copy; 2026 Stark Bistro &bull; Sistema Interno de Operaciones de Sala</p>
  </footer>

</body>
</html>