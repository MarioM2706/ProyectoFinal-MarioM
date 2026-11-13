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

      <div class="status-summary">
        <div class="summary-pill occupied">
          <span class="dot"></span>
          <span>Mesas Ocupadas: <strong>3</strong></span>
        </div>
        <div class="summary-pill free">
          <span class="dot"></span>
          <span>Mesas Libres: <strong>2</strong></span>
        </div>
      </div>
    </section>

    <!-- Cuadrícula de mesas -->
    <section class="tables-grid" aria-label="Listado de mesas del restaurante">

      <!-- MESA 01: OCUPADA -->
      <article class="table-card is-occupied">
        <header class="table-header">
          <div>
            <span class="table-sector">SECTOR IRON MAN &bull; 3 COMENSALES</span>
            <h3>MESA 01 &mdash; TORRE STARK</h3>
          </div>
          <span class="status-badge badge-occupied">OCUPADA</span>
        </header>

        <div class="table-body">
          <p class="client-info">Titular: <strong>Tony Stark</strong> &bull; Comanda #104</p>

          <!-- Formulario 1: Marcar productos como servidos -->
          <form class="service-form" action="#" method="POST">
            <input type="hidden" name="mesa_id" value="1">
            <input type="hidden" name="accion" value="actualizar_servidos">

            <div class="orders-list">
              <label class="order-item">
                <input type="checkbox" name="servido[]" value="hamburguesa_arc">
                <span class="custom-check" aria-hidden="true"></span>
                <span class="item-details">
                  <span class="item-name">2x Hamburguesa Reactor Arc</span>
                  <span class="item-note">Sin cebolla en una unidad</span>
                </span>
                <span class="item-status"></span>
              </label>

              <label class="order-item">
                <input type="checkbox" name="servido[]" value="shawarma_ny" checked>
                <span class="custom-check" aria-hidden="true"></span>
                <span class="item-details">
                  <span class="item-name">1x Shawarma Batalla de NY</span>
                </span>
                <span class="item-status"></span>
              </label>

              <label class="order-item">
                <input type="checkbox" name="servido[]" value="elixir_trueno">
                <span class="custom-check" aria-hidden="true"></span>
                <span class="item-details">
                  <span class="item-name">3x Elixir del Trueno</span>
                </span>
                <span class="item-status"></span>
              </label>
            </div>

            <button type="submit" class="btn-action btn-serve">GUARDAR PLATOS SERVIDOS</button>
          </form>

          <!-- Formulario 2: Marcar como pagada y liberar mesa -->
          <form class="payment-form" action="#" method="POST">
            <input type="hidden" name="mesa_id" value="1">
            <input type="hidden" name="accion" value="pagar_y_liberar">

            <div class="payment-row">
              <div class="bill-total">
                <span>Total cuenta</span>
                <strong>60,50 €</strong>
              </div>
              <select name="metodo_pago" aria-label="Método de pago Mesa 01" required>
                <option value="tarjeta">Tarjeta Stark</option>
                <option value="efectivo">Efectivo</option>
                <option value="shield">Créditos S.H.I.E.L.D.</option>
              </select>
            </div>

            <button type="submit" class="btn-action btn-pay">MARCAR PAGADA Y LIBERAR MESA</button>
          </form>
        </div>
      </article>

      <!-- MESA 02: OCUPADA (TODOS SERVIDOS, LISTA PARA COBRAR) -->
      <article class="table-card is-occupied">
        <header class="table-header">
          <div>
            <span class="table-sector">SECTOR THOR &bull; 2 COMENSALES</span>
            <h3>MESA 02 &mdash; ASGARD</h3>
          </div>
          <span class="status-badge badge-occupied">OCUPADA</span>
        </header>

        <div class="table-body">
          <p class="client-info">Titular: <strong>Jane Foster</strong> &bull; Comanda #105</p>

          <!-- Formulario 1: Marcar productos como servidos -->
          <form class="service-form" action="#" method="POST">
            <input type="hidden" name="mesa_id" value="2">
            <input type="hidden" name="accion" value="actualizar_servidos">

            <div class="orders-list">
              <label class="order-item">
                <input type="checkbox" name="servido[]" value="costillas_gamma" checked>
                <span class="custom-check" aria-hidden="true"></span>
                <span class="item-details">
                  <span class="item-name">1x Costillas Gamma XL</span>
                </span>
                <span class="item-status"></span>
              </label>

              <label class="order-item">
                <input type="checkbox" name="servido[]" value="mousse_vibranium" checked>
                <span class="custom-check" aria-hidden="true"></span>
                <span class="item-details">
                  <span class="item-name">2x Mousse de Vibranium</span>
                </span>
                <span class="item-status"></span>
              </label>
            </div>

            <button type="submit" class="btn-action btn-serve">GUARDAR PLATOS SERVIDOS</button>
          </form>

          <!-- Formulario 2: Marcar como pagada y liberar mesa -->
          <form class="payment-form" action="#" method="POST">
            <input type="hidden" name="mesa_id" value="2">
            <input type="hidden" name="accion" value="pagar_y_liberar">

            <div class="payment-row">
              <div class="bill-total">
                <span>Total cuenta</span>
                <strong>33,90 €</strong>
              </div>
              <select name="metodo_pago" aria-label="Método de pago Mesa 02" required>
                <option value="tarjeta">Tarjeta Stark</option>
                <option value="efectivo">Efectivo</option>
                <option value="shield">Créditos S.H.I.E.L.D.</option>
              </select>
            </div>

            <button type="submit" class="btn-action btn-pay">MARCAR PAGADA Y LIBERAR MESA</button>
          </form>
        </div>
      </article>

      <!-- MESA 03: LIBRE (FORMULARIO PARA MARCAR COMO OCUPADA) -->
      <article class="table-card is-free">
        <header class="table-header">
          <div>
            <span class="table-sector">SECTOR BLACK PANTHER &bull; 4 PLAZAS</span>
            <h3>MESA 03 &mdash; WAKANDA</h3>
          </div>
          <span class="status-badge badge-free">LIBRE</span>
        </header>

        <div class="table-body">
          <p class="free-message">Mesa limpia y desinfectada. Lista para asignar a nuevos clientes.</p>

          <!-- Formulario para marcar mesa como ocupada -->
          <form class="occupy-form" action="#" method="POST">
            <input type="hidden" name="mesa_id" value="3">
            <input type="hidden" name="accion" value="marcar_ocupada">

            <div class="input-group">
              <label for="cliente-m3">Nombre del Cliente / Agente</label>
              <input type="text" id="cliente-m3" name="cliente_nombre" placeholder="Ej. Natasha Romanoff" required>
            </div>

            <div class="input-group">
              <label for="comensales-m3">Número de Comensales</label>
              <input type="number" id="comensales-m3" name="comensales" min="1" max="4" value="2" required>
            </div>

            <button type="submit" class="btn-action btn-occupy">MARCAR MESA COMO OCUPADA</button>
          </form>
        </div>
      </article>

      <!-- MESA 04: OCUPADA -->
      <article class="table-card is-occupied">
        <header class="table-header">
          <div>
            <span class="table-sector">SECTOR DOCTOR STRANGE &bull; 4 COMENSALES</span>
            <h3>MESA 04 &mdash; SANCTUM</h3>
          </div>
          <span class="status-badge badge-occupied">OCUPADA</span>
        </header>

        <div class="table-body">
          <p class="client-info">Titular: <strong>Stephen Strange</strong> &bull; Comanda #106</p>

          <!-- Formulario 1: Marcar productos como servidos -->
          <form class="service-form" action="#" method="POST">
            <input type="hidden" name="mesa_id" value="4">
            <input type="hidden" name="accion" value="actualizar_servidos">

            <div class="orders-list">
              <label class="order-item">
                <input type="checkbox" name="servido[]" value="chimichangas">
                <span class="custom-check" aria-hidden="true"></span>
                <span class="item-details">
                  <span class="item-name">2x Chimichangas del Mercenario</span>
                  <span class="item-note">Guacamole extra aparte</span>
                </span>
                <span class="item-status"></span>
              </label>

              <label class="order-item">
                <input type="checkbox" name="servido[]" value="hamburguesa_arc_m4">
                <span class="custom-check" aria-hidden="true"></span>
                <span class="item-details">
                  <span class="item-name">1x Hamburguesa Reactor Arc</span>
                </span>
                <span class="item-status"></span>
              </label>
            </div>

            <button type="submit" class="btn-action btn-serve">GUARDAR PLATOS SERVIDOS</button>
          </form>

          <!-- Formulario 2: Marcar como pagada y liberar mesa -->
          <form class="payment-form" action="#" method="POST">
            <input type="hidden" name="mesa_id" value="4">
            <input type="hidden" name="accion" value="pagar_y_liberar">

            <div class="payment-row">
              <div class="bill-total">
                <span>Total cuenta</span>
                <strong>37,50 €</strong>
              </div>
              <select name="metodo_pago" aria-label="Método de pago Mesa 04" required>
                <option value="tarjeta">Tarjeta Stark</option>
                <option value="efectivo">Efectivo</option>
                <option value="shield">Créditos S.H.I.E.L.D.</option>
              </select>
            </div>

            <button type="submit" class="btn-action btn-pay">MARCAR PAGADA Y LIBERAR MESA</button>
          </form>
        </div>
      </article>

      <!-- MESA 05: LIBRE (FORMULARIO PARA MARCAR COMO OCUPADA) -->
      <article class="table-card is-free">
        <header class="table-header">
          <div>
            <span class="table-sector">SECTOR S.H.I.E.L.D. &bull; 6 PLAZAS</span>
            <h3>MESA 05 &mdash; HELICARRIER</h3>
          </div>
          <span class="status-badge badge-free">LIBRE</span>
        </header>

        <div class="table-body">
          <p class="free-message">Mesa limpia y desinfectada. Lista para asignar a nuevos clientes.</p>

          <!-- Formulario para marcar mesa como ocupada -->
          <form class="occupy-form" action="#" method="POST">
            <input type="hidden" name="mesa_id" value="5">
            <input type="hidden" name="accion" value="marcar_ocupada">

            <div class="input-group">
              <label for="cliente-m5">Nombre del Cliente / Agente</label>
              <input type="text" id="cliente-m5" name="cliente_nombre" placeholder="Ej. Nick Fury" required>
            </div>

            <div class="input-group">
              <label for="comensales-m5">Número de Comensales</label>
              <input type="number" id="comensales-m5" name="comensales" min="1" max="6" value="4" required>
            </div>

            <button type="submit" class="btn-action btn-occupy">MARCAR MESA COMO OCUPADA</button>
          </form>
        </div>
      </article>

    </section>
  </main>

  <footer class="main-footer">
    <p>&copy; 2026 Stark Bistro &bull; Sistema Interno de Operaciones de Sala</p>
  </footer>

</body>
</html>