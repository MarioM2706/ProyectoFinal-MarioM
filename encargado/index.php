<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stark Bistro | Panel de Encargado</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/encargado.css">
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
        <a href="index.php" class="active">Inicio</a>
        <a href="gestionUsuarios.php">Gestionar Usuarios</a>
        <a href="gestionProductos.php">Gestionar Productos</a>
        <a href="cuentas.php">Gestionar Cuentas</a>
        <a href="#" class="btn-logout">Cerrar Sesión</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <!-- Encabezado de bienvenida -->
    <section class="hero-banner">
      <span class="badge">COMANDO CENTRAL &bull; NIVEL DE AUTORIZACIÓN DIRECTOR</span>
      <h2>PANEL DE CONTROL DEL ENCARGADO</h2>
      <p>Bienvenido, Director Fury. Desde esta consola puedes administrar el personal de sala, actualizar la carta del Multiverso y auditar las cuentas del restaurante.</p>
    </section>

    <!-- Indicadores rápidos del turno -->
    <section class="kpi-grid" aria-label="Resumen operativo del día">
      <article class="kpi-card">
        <span class="kpi-label">Recaudación Hoy</span>
        <strong class="kpi-value gold">1.480,50 €</strong>
        <span class="kpi-sub">24 cuentas cerradas</span>
      </article>

      <article class="kpi-card">
        <span class="kpi-label">Personal Activo</span>
        <strong class="kpi-value cyan">8 Agentes</strong>
        <span class="kpi-sub">5 en sala &bull; 3 en cocina</span>
      </article>

      <article class="kpi-card">
        <span class="kpi-label">Productos en Carta</span>
        <strong class="kpi-value">18 Platos</strong>
        <span class="kpi-sub">Todos disponibles</span>
      </article>

      <article class="kpi-card">
        <span class="kpi-label">Ocupación Actual</span>
        <strong class="kpi-value red">75%</strong>
        <span class="kpi-sub">6 de 8 mesas ocupadas</span>
      </article>
    </section>

    <!-- Accesos directos a las 3 áreas de gestión -->
    <section class="modules-grid" aria-label="Módulos de gestión">
      
      <!-- Módulo 1: Gestionar Usuarios -->
      <article class="module-card card-users">
        <div class="module-top">
          <div class="module-icon icon-cyan" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
              <circle cx="9" cy="7" r="4"></circle>
              <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
          </div>
          <span class="module-tag">PERSONAL Y CLIENTES</span>
        </div>

        <h3>GESTIONAR USUARIOS</h3>
        <p>Da de alta nuevos camareros, asigna roles de encargado o cliente, edita credenciales de acceso y gestiona los permisos del equipo.</p>

        <ul class="module-features">
          <li>Alta y baja de empleados y clientes</li>
          <li>Asignación de roles y niveles S.H.I.E.L.D.</li>
          <li>Control de turnos y estado de cuentas</li>
        </ul>

        <a href="gestionar-usuarios.html" class="btn-module btn-cyan">ACCEDER A USUARIOS</a>
      </article>

      <!-- Módulo 2: Gestionar Productos -->
      <article class="module-card card-products">
        <div class="module-top">
          <div class="module-icon icon-gold" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
              <line x1="3" y1="6" x2="21" y2="6"></line>
              <path d="M16 10a4 4 0 0 1-8 0"></path>
            </svg>
          </div>
          <span class="module-tag">CARTA Y MENÚ</span>
        </div>

        <h3>GESTIONAR PRODUCTOS</h3>
        <p>Crea nuevos platos inspirados en los Vengadores, modifica precios, actualiza fotografías, descripciones o marca artículos agotados.</p>

        <ul class="module-features">
          <li>Añadir y editar platos o bebidas</li>
          <li>Actualización de tarifas y promociones</li>
          <li>Control de disponibilidad en tiempo real</li>
        </ul>

        <a href="gestionar-productos.html" class="btn-module btn-gold">ACCEDER A PRODUCTOS</a>
      </article>

      <!-- Módulo 3: Gestionar Cuentas -->
      <article class="module-card card-accounts">
        <div class="module-top">
          <div class="module-icon icon-red" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="2" y="5" width="20" height="14" rx="2"></rect>
              <line x1="2" y1="10" x2="22" y2="10"></line>
            </svg>
          </div>
          <span class="module-tag">FACTURACIÓN Y CAJA</span>
        </div>

        <h3>GESTIONAR CUENTAS</h3>
        <p>Consulta el historial de tickets cobrados por mesa, revisa desgloses de pedidos, métodos de pago utilizados y realiza el cierre de caja.</p>

        <ul class="module-features">
          <li>Historial completo de cuentas y comandas</li>
          <li>Filtro por fecha, mesa y método de pago</li>
          <li>Arqueo diario y exportación de informes</li>
        </ul>

        <a href="cuentas.php" class="btn-module btn-red">ACCEDER A CUENTAS</a>
      </article>

    </section>
  </main>

  <footer class="main-footer">
    <p>&copy; 2026 Stark Bistro &bull; Consola Administrativa Tierra-616</p>
  </footer>

</body>
</html>