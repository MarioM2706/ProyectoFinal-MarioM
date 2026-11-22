<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stark Bistro | Selección de Mesa y Comensales</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/seleccion-mesa.css">
</head>
<body>
  <!-- Incluimos la seguridad -->
   <?php include("seguridad_user.php"); ?>
   
  <!-- Barra superior -->
  <header class="topbar">
    <div class="topbar-inner">
      <div class="brand">
        <span class="brand-badge">S.H.I.E.L.D.</span>
        <h1>STARK BISTRO</h1>
      </div>
      <nav class="nav-links">
        <a href="../includes/cerrarsesion.php" class="btn-nav">Cerrar Sesion</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <!-- Encabezado principal -->
    <section class="hero-banner">
      <span class="badge">ASIGNACIÓN DE SECTOR &bull; TORRE DE LOS VENGADORES</span>
      <h2>ELIGE TU MESA Y NÚMERO DE COMENSALES</h2>
      <p>Selecciona una de las mesas disponibles en nuestra sala temática e indica cuántas personas formaréis parte de la misión.</p>

      <div class="legend-bar" aria-label="Leyenda de disponibilidad">
        <span class="legend-item"><i class="dot dot-free"></i> Disponible</span>
        <!-- <span class="legend-item"><i class="dot dot-selected"></i> Seleccionada</span> -->
        <span class="legend-item"><i class="dot dot-occupied"></i> Ocupada</span>
      </div>
    </section>

    <!-- Formulario completo de selección de mesa y comensales -->
    <form class="reservation-form" action="../mesa-cliente.php" method="POST">

      <!-- Paso 1: Cuadrícula interactiva de mesas -->
      <fieldset class="tables-fieldset">
        <legend class="step-title">
          <span class="step-number">01</span>
          SELECCIONA UNA MESA DISPONIBLE
        </legend>

        <div class="tables-grid">

          <?php 
            include __DIR__ . '/../includes/conexion.php';

            //Lógica del fichero
            $consulta="Select * from mesa";

            $result=mysqli_query($conn,$consulta);

            while ($row=mysqli_fetch_array($result)){
              // Si la mesa esta ocupada $ocu=disabled si esta libre $ocu=required
              $ocu = "required";
              $estado = $row['ocupada'];

              // Variables para deshabilitar el enlace si la mesa esta ocupada
              $botondesac = "";

              if($estado==1){
                $ocu = "disabled";
                $botondesac = "enlace-deshabilitado";
              }else{
                $ocu = "required";
              }

              // Mostramos las mesas que hay en la base de datos
              $cod=$row['codMesa'];
              echo "<label class='table-option'>";
              echo "<input type='radio' name='mesa_seleccionada' value=".$row['codMesa']." ".$ocu.">";
              echo "<div class='table-card-ui'>";
             echo "<div class='card-top'>";
              echo "<span class='availability-pill'></span>";
              echo "</div>";
                     echo "<h3>MESA ".$row['codMesa']." &mdash; ".$row['nombre']."</h3>";
                      echo "<p class='table-desc'>".$row['descripcion']."</p>";
                      echo "<div class='table-meta'>";
                      echo "<span class='capacity'>Capacidad: <strong>Hasta ".$row['comensales']." comensales</strong></span>";
                      echo "<span class='zone'>".$row['zona']."</span>";
              echo "</div>";
              echo "<a class='btn-submit $botondesac' href='../mesa-cliente.php?mesaocupar=$cod' ".$ocu.">Asignar Mesa</a>";
              echo "</div>";
              echo "</label>";
            }


          //Cerramos la conexión
          mysqli_close($conn);
          ?>
        </div>
      </fieldset>
      <!--<button type="submit" class="btn-submit">Asignar Mesa</button>-->
    </form>
  </main>

  <footer class="main-footer">
    <p>&copy; 2026 Stark Bistro &bull; Todos los derechos reservados en la Tierra-616</p>
  </footer>

</body>
</html>