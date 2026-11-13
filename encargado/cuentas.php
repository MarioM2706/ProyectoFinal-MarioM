<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stark Bistro | Gestión y Corrección de Cuentas</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/estilo_cuentas.css">
</head>
<body>

  <!-- Barra de navegación principal del encargado -->
  <header class="topbar">
    <div class="topbar-inner">
      <div class="brand">
        <span class="brand-badge">S.H.I.E.L.D.</span>
        <h1>STARK BISTRO</h1>
      </div>

      <nav class="nav-links" aria-label="Menú principal de administración">
        <a href="encargado.html">Inicio</a>
        <a href="gestionar-usuarios.html">Gestionar Usuarios</a>
        <a href="gestionar-productos.html">Gestionar Productos</a>
        <a href="gestionar-cuentas.html" class="active">Gestionar Cuentas</a>
        <a href="index.html" class="btn-logout">Cerrar Sesión</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <!-- Encabezado -->
    <section class="hero-banner">
      <span class="badge">AUDITORÍA DE CAJA &bull; NIVEL DIRECTOR</span>
      <h2>CORRECCIÓN Y GESTIÓN DE CUENTAS</h2>
      <p>Selecciona una comanda para modificar cantidades erróneas, eliminar productos duplicados y registrar el motivo del ajuste en el sistema.</p>
    </section>

    <!-- Barra de búsqueda y filtro de cuentas -->
    <form class="filter-bar" action="#" method="GET">
      <div class="filter-group">
        <label for="buscar-cuenta">Buscar ticket o cliente</label>
        <input type="text" id="buscar-cuenta" name="q" placeholder="Ej. #105, Mesa 02, Jane Foster...">
      </div>

      <div class="filter-group">
        <label for="filtro-estado">Estado de la cuenta</label>
        <select id="filtro-estado" name="estado">
          <option value="todas">Todas las cuentas</option>
          <option value="abierta">Abiertas en sala</option>
          <option value="cobrada" selected>Cobradas (Revisar errores)</option>
          <option value="rectificada">Rectificadas</option>
        </select>
      </div>

      <button type="submit" class="btn-filter">FILTRAR CUENTAS</button>
    </form>

    <!-- Área principal: Lista de cuentas a la izquierda + Editor a la derecha -->
    <div class="workspace-grid">

      <!-- Columna izquierda: Listado de tickets -->
      <aside class="tickets-sidebar" aria-label="Listado de cuentas">
        <div class="sidebar-header">
          <h3>CUENTAS REGISTRADAS</h3>
          <span class="count-pill">3 tickets</span>
        </div>

        <div class="ticket-list">
          <!-- Ticket activo seleccionado -->
          <a href="#editor-cuenta" class="ticket-item is-selected">
            <div class="ticket-top">
              <span class="ticket-id">COMANDA #105</span>
              <span class="ticket-status status-paid">COBRADA</span>
            </div>
            <strong class="ticket-table">Mesa 02 &mdash; Asgard</strong>
            <span class="ticket-meta">Cliente: Jane Foster &bull; 21:42</span>
            <div class="ticket-bottom">
              <span>3 artículos</span>
              <strong class="ticket-amount">52,80 €</strong>
            </div>
          </a>

          <!-- Ticket 2 -->
          <a href="#editor-cuenta" class="ticket-item">
            <div class="ticket-top">
              <span class="ticket-id">COMANDA #104</span>
              <span class="ticket-status status-open">ABIERTA</span>
            </div>
            <strong class="ticket-table">Mesa 01 &mdash; Torre Stark</strong>
            <span class="ticket-meta">Cliente: Tony Stark &bull; 21:10</span>
            <div class="ticket-bottom">
              <span>6 artículos</span>
              <strong class="ticket-amount">60,50 €</strong>
            </div>
          </a>

          <!-- Ticket 3 -->
          <a href="#editor-cuenta" class="ticket-item">
            <div class="ticket-top">
              <span class="ticket-id">COMANDA #106</span>
              <span class="ticket-status status-open">ABIERTA</span>
            </div>
            <strong class="ticket-table">Mesa 04 &mdash; Sanctum</strong>
            <span class="ticket-meta">Cliente: Stephen Strange &bull; 21:55</span>
            <div class="ticket-bottom">
              <span>3 artículos</span>
              <strong class="ticket-amount">37,50 €</strong>
            </div>
          </a>
        </div>
      </aside>

      <!-- Columna derecha: Formulario de corrección de la cuenta -->
      <section id="editor-cuenta" class="editor-panel" aria-label="Editor de productos de la cuenta">
        <header class="editor-header">
          <div>
            <span class="editor-kicker">EDITANDO COMANDA #105 &bull; CAMARERO: P. PARKER</span>
            <h3>MESA 02 &mdash; ASGARD (JANE FOSTER)</h3>
          </div>
          <span class="status-badge badge-review">EN REVISIÓN</span>
        </header>

        <form class="audit-form" action="#" method="POST">
          <input type="hidden" name="comanda_id" value="105">

          <div class="table-responsive">
            <table class="items-table">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Precio Ud.</th>
                  <th>Cantidad</th>
                  <th>Subtotal</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <!-- Fila 1 -->
                <tr>
                  <td>
                    <div class="prod-cell">
                      <strong>Costillas Gamma XL</strong>
                      <span>Plato principal &bull; Error reportado: marcada doble</span>
                    </div>
                  </td>
                  <td class="price-cell">18,90 €</td>
                  <td>
                    <div class="quantity-stepper">
                      <button type="button" class="qty-btn" onclick="this.nextElementSibling.stepDown()" aria-label="Reducir cantidad de Costillas Gamma XL">&minus;</button>
                      <input type="number" name="cantidad[costillas_gamma]" min="1" max="20" value="2" aria-label="Cantidad de Costillas Gamma XL">
                      <button type="button" class="qty-btn" onclick="this.previousElementSibling.stepUp()" aria-label="Aumentar cantidad de Costillas Gamma XL">&plus;</button>
                    </div>
                  </td>
                  <td class="subtotal-cell">37,80 €</td>
                  <td>
                    <button type="submit" name="eliminar_producto" value="costillas_gamma" class="btn-remove" title="Eliminar producto de la cuenta">
                      Quitar
                    </button>
                  </td>
                </tr>

                <!-- Fila 2 -->
                <tr>
                  <td>
                    <div class="prod-cell">
                      <strong>Mousse de Vibranium</strong>
                      <span>Postre &bull; Wakanda</span>
                    </div>
                  </td>
                  <td class="price-cell">7,50 €</td>
                  <td>
                    <div class="quantity-stepper">
                      <button type="button" class="qty-btn" onclick="this.nextElementSibling.stepDown()" aria-label="Reducir cantidad de Mousse de Vibranium">&minus;</button>
                      <input type="number" name="cantidad[mousse_vibranium]" min="1" max="20" value="1" aria-label="Cantidad de Mousse de Vibranium">
                      <button type="button" class="qty-btn" onclick="this.previousElementSibling.stepUp()" aria-label="Aumentar cantidad de Mousse de Vibranium">&plus;</button>
                    </div>
                  </td>
                  <td class="subtotal-cell">7,50 €</td>
                  <td>
                    <button type="submit" name="eliminar_producto" value="mousse_vibranium" class="btn-remove" title="Eliminar producto de la cuenta">
                      Quitar
                    </button>
                  </td>
                </tr>

                <!-- Fila 3 -->
                <tr>
                  <td>
                    <div class="prod-cell">
                      <strong>Elixir del Trueno</strong>
                      <span>Bebida &bull; Error reportado: no pedido por la mesa</span>
                    </div>
                  </td>
                  <td class="price-cell">6,50 €</td>
                  <td>
                    <div class="quantity-stepper">
                      <button type="button" class="qty-btn" onclick="this.nextElementSibling.stepDown()" aria-label="Reducir cantidad de Elixir del Trueno">&minus;</button>
                      <input type="number" name="cantidad[elixir_trueno]" min="1" max="20" value="1" aria-label="Cantidad de Elixir del Trueno">
                      <button type="button" class="qty-btn" onclick="this.previousElementSibling.stepUp()" aria-label="Aumentar cantidad de Elixir del Trueno">&plus;</button>
                    </div>
                  </td>
                  <td class="subtotal-cell">6,50 €</td>
                  <td>
                    <button type="submit" name="eliminar_producto" value="elixir_trueno" class="btn-remove" title="Eliminar producto de la cuenta">
                      Quitar
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Justificación obligatoria del encargado -->
          <div class="audit-notes">
            <label for="motivo-correccion">Motivo de la corrección (Registro de auditoría)</label>
            <textarea id="motivo-correccion" name="motivo_correccion" rows="2" placeholder="Ej. Se elimina 1 unidad duplicada de Costillas Gamma y el Elixir cobrado por error en sala..." required></textarea>
          </div>

          <!-- Resumen económico y botones -->
          <div class="editor-footer">
            <div class="totals-box">
              <div class="total-line">
                <span>Importe original registrado:</span>
                <span class="old-price">51,80 €</span>
              </div>
              <div class="total-line highlight">
                <span>Nuevo total tras guardar cambios:</span>
                <strong>Se recalcula al guardar</strong>
              </div>
            </div>

            <div class="editor-actions">
              <button type="reset" class="btn-secondary">RESTAURAR VALORES</button>
              <button type="submit" name="accion" value="guardar_correccion" class="btn-primary">GUARDAR CORRECCIÓN</button>
            </div>
          </div>
        </form>
      </section>

    </div>
  </main>

  <footer class="main-footer">
    <p>&copy; 2026 Stark Bistro &bull; Módulo de Auditoría y Control de Caja</p>
  </footer>

</body>
</html>