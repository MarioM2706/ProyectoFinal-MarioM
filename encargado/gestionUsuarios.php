<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stark Bistro | Gestión de Usuarios y Personal</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/estilo_gestionusuario.css">
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
        <a href="index.php">Inicio</a>
        <a href="gestionUsuarios.php" class="active">Gestionar Usuarios</a>
        <a href="gestionProductos.php">Gestionar Productos</a>
        <a href="cuentas.php">Gestionar Cuentas</a>
        <a href="#" class="btn-logout">Cerrar Sesión</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <!-- Encabezado de sección -->
    <section class="hero-banner">
      <span class="badge">CONTROL DE ACCESO S.H.I.E.L.D. &bull; NIVEL DIRECTOR</span>
      <h2>GESTIÓN DE USUARIOS Y PERSONAL</h2>
      <p>Registra nuevos camareros y encargados en el sistema o bloquea el acceso a cuentas de clientes, camareros y encargados cuando sea necesario.</p>
    </section>

    <!-- BLOQUE 1: ALTA DE NUEVOS CAMAREROS Y ENCARGADOS -->
    <section class="admin-section" aria-labelledby="titulo-alta-personal">
      <div class="section-heading">
        <div>
          <span class="section-kicker">RECLUTAMIENTO DE EQUIPO</span>
          <h3 id="titulo-alta-personal">1. DAR DE ALTA CAMARERO O ENCARGADO</h3>
        </div>
      </div>

      <form class="panel-card border-cyan" action="#" method="POST">
        <input type="hidden" name="accion" value="alta_personal">

        <div class="staff-form-grid">
          <div class="input-group">
            <label for="staff-nombre">Nombre completo</label>
            <input type="text" id="staff-nombre" name="nombre" placeholder="Ej. Natasha Romanoff" required>
          </div>

          <div class="input-group">
            <label for="staff-alias">ID / Alias de Agente</label>
            <input type="text" id="staff-alias" name="alias_agente" placeholder="Ej. Agente Romanoff" required>
          </div>

          <div class="input-group">
            <label for="staff-email">Correo electrónico corporativo</label>
            <input type="email" id="staff-email" name="email" placeholder="natasha@starkbistro.com" required>
          </div>

          <div class="input-group">
            <label for="staff-telefono">Teléfono de contacto</label>
            <input type="tel" id="staff-telefono" name="telefono" placeholder="+34 600 111 222" required>
          </div>

          <div class="input-group">
            <label for="staff-rol">Rol asignado</label>
            <select id="staff-rol" name="rol" required>
              <option value="camarero">Camarero (Control de mesas y servicio)</option>
              <option value="encargado">Encargado (Administración total y caja)</option>
            </select>
          </div>

          <div class="input-group">
            <label for="staff-turno">Turno habitual</label>
            <select id="staff-turno" name="turno" required>
              <option value="manana">Turno Mañana (09:00 - 17:00)</option>
              <option value="noche">Turno Noche (17:00 - 01:00)</option>
              <option value="completo">Jornada Partida / Guardia</option>
            </select>
          </div>

          <div class="input-group">
            <label for="staff-password">Clave de autorización inicial</label>
            <input type="password" id="staff-password" name="password" placeholder="Mínimo 8 caracteres" minlength="8" required>
          </div>

          <div class="input-group">
            <label for="staff-password-confirm">Confirmar clave</label>
            <input type="password" id="staff-password-confirm" name="password_confirm" placeholder="Repite la contraseña" minlength="8" required>
          </div>
        </div>

        <div class="form-footer-actions">
          <p class="helper-note">El nuevo miembro podrá iniciar sesión inmediatamente desde el portal principal con su correo y clave asignada.</p>

          <div class="btn-group">
            <button type="reset" class="btn-secondary">LIMPIAR CAMPOS</button>
            <button type="submit" class="btn-action btn-cyan">DAR DE ALTA EN EL SISTEMA</button>
          </div>
        </div>
      </form>
    </section>

    <!-- BLOQUE 2: DIRECTORIO Y BLOQUEO DE USUARIOS -->
    <section class="admin-section" aria-labelledby="titulo-directorio">
      <div class="section-heading">
        <div>
          <span class="section-kicker">SEGURIDAD Y PERMISOS</span>
          <h3 id="titulo-directorio">2. DIRECTORIO Y BLOQUEO DE CUENTAS</h3>
        </div>
      </div>

      <!-- Barra de búsqueda y filtros -->
      <form class="filter-bar" action="#" method="GET">
        <div class="filter-group">
          <label for="buscar-usuario">Buscar usuario</label>
          <input type="text" id="buscar-usuario" name="q" placeholder="Nombre, alias o correo electrónico...">
        </div>

        <div class="filter-group">
          <label for="filtrar-rol">Filtrar por rol</label>
          <select id="filtrar-rol" name="rol">
            <option value="todos">Todos los roles</option>
            <option value="encargado">Encargados</option>
            <option value="camarero">Camareros</option>
            <option value="cliente">Clientes</option>
          </select>
        </div>

        <div class="filter-group">
          <label for="filtrar-estado">Estado de la cuenta</label>
          <select id="filtrar-estado" name="estado">
            <option value="todos">Todos los estados</option>
            <option value="activo">Activos</option>
            <option value="bloqueado">Bloqueados</option>
          </select>
        </div>

        <button type="submit" class="btn-filter">FILTRAR USUARIOS</button>
      </form>

      <!-- Tabla de usuarios -->
      <div class="panel-card border-red">
        <div class="table-responsive">
          <table class="users-table">
            <thead>
              <tr>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Correo / Información</th>
                <th>Estado</th>
                <th>Gestión de Acceso</th>
              </tr>
            </thead>
            <tbody>
              <!-- Usuario 1: Encargado activo -->
              <tr>
                <td>
                  <div class="user-cell">
                    <strong>Maria Hill</strong>
                    <span>ID #EMP-002 &bull; Subdirectora</span>
                  </div>
                </td>
                <td><span class="role-pill role-manager">ENCARGADO</span></td>
                <td>
                  <div class="contact-cell">
                    <span>m.hill@starkbistro.com</span>
                    <small>Turno Completo</small>
                  </div>
                </td>
                <td><span class="status-badge status-active">ACTIVO</span></td>
                <td>
                  <form class="block-form" action="#" method="POST">
                    <input type="hidden" name="usuario_id" value="2">
                    <input type="hidden" name="accion" value="bloquear">
                    <select name="motivo_bloqueo" aria-label="Motivo de bloqueo para Maria Hill" required>
                      <option value="baja_personal">Baja / Fin de turno</option>
                      <option value="seguridad">Brecha de seguridad</option>
                      <option value="normas">Incumplimiento interno</option>
                    </select>
                    <button type="submit" class="btn-table btn-block">Bloquear</button>
                  </form>
                </td>
              </tr>

              <!-- Usuario 2: Camarero activo -->
              <tr>
                <td>
                  <div class="user-cell">
                    <strong>Peter Parker</strong>
                    <span>ID #EMP-014 &bull; Agente de Sala</span>
                  </div>
                </td>
                <td><span class="role-pill role-waiter">CAMARERO</span></td>
                <td>
                  <div class="contact-cell">
                    <span>p.parker@starkbistro.com</span>
                    <small>Turno Noche</small>
                  </div>
                </td>
                <td><span class="status-badge status-active">ACTIVO</span></td>
                <td>
                  <form class="block-form" action="#" method="POST">
                    <input type="hidden" name="usuario_id" value="14">
                    <input type="hidden" name="accion" value="bloquear">
                    <select name="motivo_bloqueo" aria-label="Motivo de bloqueo para Peter Parker" required>
                      <option value="baja_personal">Baja / Fin de turno</option>
                      <option value="seguridad">Brecha de seguridad</option>
                      <option value="normas">Incumplimiento interno</option>
                    </select>
                    <button type="submit" class="btn-table btn-block">Bloquear</button>
                  </form>
                </td>
              </tr>

              <!-- Usuario 3: Camarero activo -->
              <tr>
                <td>
                  <div class="user-cell">
                    <strong>Wanda Maximoff</strong>
                    <span>ID #EMP-019 &bull; Agente de Sala</span>
                  </div>
                </td>
                <td><span class="role-pill role-waiter">CAMARERO</span></td>
                <td>
                  <div class="contact-cell">
                    <span>w.maximoff@starkbistro.com</span>
                    <small>Turno Mañana</small>
                  </div>
                </td>
                <td><span class="status-badge status-active">ACTIVO</span></td>
                <td>
                  <form class="block-form" action="#" method="POST">
                    <input type="hidden" name="usuario_id" value="19">
                    <input type="hidden" name="accion" value="bloquear">
                    <select name="motivo_bloqueo" aria-label="Motivo de bloqueo para Wanda Maximoff" required>
                      <option value="baja_personal">Baja / Fin de turno</option>
                      <option value="seguridad">Brecha de seguridad</option>
                      <option value="normas">Incumplimiento interno</option>
                    </select>
                    <button type="submit" class="btn-table btn-block">Bloquear</button>
                  </form>
                </td>
              </tr>

              <!-- Usuario 4: Cliente activo -->
              <tr>
                <td>
                  <div class="user-cell">
                    <strong>Wade Wilson</strong>
                    <span>ID #CLI-408 &bull; Miembro Multiverso</span>
                  </div>
                </td>
                <td><span class="role-pill role-client">CLIENTE</span></td>
                <td>
                  <div class="contact-cell">
                    <span>deadpool@mercenario.com</span>
                    <small>12 pedidos realizados</small>
                  </div>
                </td>
                <td><span class="status-badge status-active">ACTIVO</span></td>
                <td>
                  <form class="block-form" action="#" method="POST">
                    <input type="hidden" name="usuario_id" value="408">
                    <input type="hidden" name="accion" value="bloquear">
                    <select name="motivo_bloqueo" aria-label="Motivo de bloqueo para Wade Wilson" required>
                      <option value="normas">Altercado en sala</option>
                      <option value="impago">Impago o fraude</option>
                      <option value="reservas_falsas">Reservas falsas</option>
                    </select>
                    <button type="submit" class="btn-table btn-block">Bloquear</button>
                  </form>
                </td>
              </tr>

              <!-- Usuario 5: Cliente bloqueado -->
              <tr class="row-blocked">
                <td>
                  <div class="user-cell">
                    <strong>Loki Laufeyson</strong>
                    <span>ID #CLI-112 &bull; Motivo: Impago en Mesa Asgard</span>
                  </div>
                </td>
                <td><span class="role-pill role-client">CLIENTE</span></td>
                <td>
                  <div class="contact-cell">
                    <span>loki@asgard-mail.com</span>
                    <small>Bloqueado el 10/11/2026</small>
                  </div>
                </td>
                <td><span class="status-badge status-blocked">BLOQUEADO</span></td>
                <td>
                  <form class="block-form" action="#" method="POST">
                    <input type="hidden" name="usuario_id" value="112">
                    <input type="hidden" name="accion" value="desbloquear">
                    <button type="submit" class="btn-table btn-unblock">Desbloquear Acceso</button>
                  </form>
                </td>
              </tr>

              <!-- Usuario 6: Camarero bloqueado -->
              <tr class="row-blocked">
                <td>
                  <div class="user-cell">
                    <strong>Brock Rumlow</strong>
                    <span>ID #EMP-008 &bull; Motivo: Brecha de seguridad</span>
                  </div>
                </td>
                <td><span class="role-pill role-waiter">CAMARERO</span></td>
                <td>
                  <div class="contact-cell">
                    <span>b.rumlow@starkbistro.com</span>
                    <small>Bloqueado el 04/11/2026</small>
                  </div>
                </td>
                <td><span class="status-badge status-blocked">BLOQUEADO</span></td>
                <td>
                  <form class="block-form" action="#" method="POST">
                    <input type="hidden" name="usuario_id" value="8">
                    <input type="hidden" name="accion" value="desbloquear">
                    <button type="submit" class="btn-table btn-unblock">Desbloquear Acceso</button>
                  </form>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>

  <footer class="main-footer">
    <p>&copy; 2026 Stark Bistro &bull; Control de Personal y Seguridad S.H.I.E.L.D.</p>
  </footer>

</body>
</html>