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

          <!-- Mesa 01: Disponible -->
          <label class="table-option">
            <input type="radio" name="mesa_seleccionada" value="mesa_01" required>
            <div class="table-card-ui">
              <div class="card-top">
                <span class="availability-pill"></span>
              </div>
              <h3>MESA 01 &mdash; TORRE STARK</h3>
              <p class="table-desc">Mesa panorámica junto a la vitrina de armaduras Mark I–VII con iluminación reactor.</p>
              <div class="table-meta">
                <span class="capacity">Capacidad: <strong>Hasta 4 comensales</strong></span>
                <span class="zone">Sector Central</span>
              </div>
            </div>
          </label>

          <!-- Mesa 02: Ocupada -->
          <label class="table-option">
            <input type="radio" name="mesa_seleccionada" value="mesa_02" disabled>
            <div class="table-card-ui">
              <div class="card-top">
                <span class="availability-pill"></span>
              </div>
              <h3>MESA 02 &mdash; ASGARD</h3>
              <p class="table-desc">Mesa rústica de madera tallada presidida por una réplica del Mjölnir iluminada.</p>
              <div class="table-meta">
                <span class="capacity">Capacidad: <strong>Hasta 2 comensales</strong></span>
                <span class="zone">Ala Norte</span>
              </div>
            </div>
          </label>

          <!-- Mesa 03: Disponible -->
          <label class="table-option">
            <input type="radio" name="mesa_seleccionada" value="mesa_03" required>
            <div class="table-card-ui">
              <div class="card-top">
                <span class="availability-pill"></span>
              </div>
              <h3>MESA 03 &mdash; WAKANDA</h3>
              <p class="table-desc">Reservado semi-privado con acabados en negro mate y destellos púrpura de Vibranium.</p>
              <div class="table-meta">
                <span class="capacity">Capacidad: <strong>Hasta 4 comensales</strong></span>
                <span class="zone">Zona VIP</span>
              </div>
            </div>
          </label>

          <!-- Mesa 04: Ocupada -->
          <label class="table-option">
            <input type="radio" name="mesa_seleccionada" value="mesa_04" required>
            <div class="table-card-ui">
              <div class="card-top">
                <span class="availability-pill"></span>
              </div>
              <h3>MESA 04 &mdash; SANCTUM</h3>
              <p class="table-desc">Rincón místico bajo la vidriera del Sanctum Sanctorum, ideal para grupos tranquilos.</p>
              <div class="table-meta">
                <span class="capacity">Capacidad: <strong>Hasta 4 comensales</strong></span>
                <span class="zone">Ala Oeste</span>
              </div>
            </div>
          </label>

          <!-- Mesa 05: Disponible (Mesa grande) -->
          <label class="table-option">
            <input type="radio" name="mesa_seleccionada" value="mesa_05" required>
            <div class="table-card-ui">
              <div class="card-top">
                <span class="availability-pill"></span>
              </div>
              <h3>MESA 05 &mdash; HELICARRIER</h3>
              <p class="table-desc">Mesa imperial de mando diseñada para escuadrones completos y celebraciones de equipo.</p>
              <div class="table-meta">
                <span class="capacity">Capacidad: <strong>Hasta 6 comensales</strong></span>
                <span class="zone">Puente de Mando</span>
              </div>
            </div>
          </label>

          <!-- Mesa 06: Disponible (2 plazas) -->
          <label class="table-option">
            <input type="radio" name="mesa_seleccionada" value="mesa_06" required>
            <div class="table-card-ui">
              <div class="card-top">
                <span class="availability-pill"></span>
              </div>
              <h3>MESA 06 &mdash; QUINJET</h3>
              <p class="table-desc">Cabina acogedora para dos personas decorada con el escudo clásico de vibranium.</p>
              <div class="table-meta">
                <span class="capacity">Capacidad: <strong>Hasta 2 comensales</strong></span>
                <span class="zone">Hangar Este</span>
              </div>
            </div>
          </label>

        </div>
      </fieldset>
      <button type="submit" class="btn-submit">Asignar Mesa</button>
    </form>
  </main>

  <footer class="main-footer">
    <p>&copy; 2026 Stark Bistro &bull; Todos los derechos reservados en la Tierra-616</p>
  </footer>

</body>
</html>