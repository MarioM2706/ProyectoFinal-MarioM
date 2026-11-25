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
        <div class="strip-item">
          <span>Mesa asignada</span>
          <strong>Mesa 01 &mdash; Torre Stark</strong>
        </div>
        <div class="strip-item">
          <span>Titular</span>
          <strong>Tony Stark (3 comensales)</strong>
        </div>
        <!--<div class="strip-item">
          <span>Estado de cuenta</span>
          <strong class="text-cyan">Abierta en sala</strong>
        </div>-->
      </div>
    </section>

    <!-- Distribución principal: Lista de artículos + Resumen económico -->
    <div class="order-layout">

      <!-- Columna izquierda: Artículos pedidos -->
      <section class="items-panel" aria-labelledby="titulo-articulos">
        <header class="panel-header">
          <div>
            <span class="kicker">DESGLOSE DE CONSUMICIONES</span>
            <h3 id="titulo-articulos">ARTÍCULOS PEDIDOS (6 UNIDADES)</h3>
          </div>
          <a href="carta.php" class="btn-add-more">+ PEDIR MÁS PLATOS</a>
        </header>

        <div class="ordered-list">

          <!-- Artículo 1 -->
          <article class="ordered-card">
            <img src="https://placehold.co/160x120/1c2230/f5b800?text=Reactor+Arc" alt="Hamburguesa Reactor Arc">
            <div class="ordered-info">
              <div class="ordered-top">
                <span class="hero-tag tag-gold">IRON MAN</span>
                <span class="prep-status status-served">✓ SERVIDO EN MESA</span>
              </div>
              <h4>Hamburguesa Reactor Arc</h4>
              <p class="item-note">Nota: Sin cebolla en una de las unidades &bull; 14,50 € / ud.</p>
              <div class="ordered-bottom">
                <span class="qty-pill">Cantidad: <strong>2 uds.</strong></span>
                <strong class="line-subtotal">29,00 €</strong>
              </div>
            </div>
          </article>

          <!-- Artículo 2 -->
          <article class="ordered-card">
            <img src="https://placehold.co/160x120/1c2230/e23636?text=Shawarma+NY" alt="Shawarma Batalla de NY">
            <div class="ordered-info">
              <div class="ordered-top">
                <span class="hero-tag tag-red">VENGADORES</span>
                <span class="prep-status status-served">✓ SERVIDO EN MESA</span>
              </div>
              <h4>Shawarma Batalla de NY</h4>
              <p class="item-note">Salsa de yogur con ajo y toque picante &bull; 12,00 € / ud.</p>
              <div class="ordered-bottom">
                <span class="qty-pill">Cantidad: <strong>1 ud.</strong></span>
                <strong class="line-subtotal">12,00 €</strong>
              </div>
            </div>
          </article>

          <!-- Artículo 3 -->
          <article class="ordered-card">
            <img src="https://placehold.co/160x120/1c2230/00e5ff?text=Elixir+Trueno" alt="Elixir del Trueno">
            <div class="ordered-info">
              <div class="ordered-top">
                <span class="hero-tag tag-cyan">THOR</span>
                <span class="prep-status status-preparing">EN PREPARACIÓN</span>
              </div>
              <h4>Elixir del Trueno</h4>
              <p class="item-note">Jarra helada de frutos azules, lima y menta &bull; 6,50 € / ud.</p>
              <div class="ordered-bottom">
                <span class="qty-pill">Cantidad: <strong>3 uds.</strong></span>
                <strong class="line-subtotal">19,50 €</strong>
              </div>
            </div>
          </article>

        </div>
      </section>

      <!-- Columna derecha: Ticket con total acumulado y solicitud de cuenta -->
      <aside class="summary-panel" aria-labelledby="titulo-resumen">
        <header class="summary-header">
          <span class="kicker">TICKET EN CURSO</span>
          <h3 id="titulo-resumen">TOTAL ACUMULADO</h3>
        </header>

        <div class="receipt-lines">
          <div class="receipt-row">
            <span>2x Hamburguesa Reactor Arc</span>
            <span>29,00 €</span>
          </div>
          <div class="receipt-row">
            <span>1x Shawarma Batalla de NY</span>
            <span>12,00 €</span>
          </div>
          <div class="receipt-row">
            <span>3x Elixir del Trueno</span>
            <span>19,50 €</span>
          </div>
        </div>

        <div class="receipt-breakdown">
          <div class="breakdown-row">
            <span>Base imponible</span>
            <span>55,00 €</span>
          </div>
          <div class="breakdown-row">
            <span>IVA incluido (10%)</span>
            <span>5,50 €</span>
          </div>
        </div>

        <div class="grand-total-box">
          <span>TOTAL A PAGAR</span>
          <strong>60,50 €</strong>
        </div>

        <!-- Formulario para solicitar la cuenta al camarero -->
        <form class="request-bill-form" action="#" method="POST">
          <input type="hidden" name="comanda_id" value="104">
          <input type="hidden" name="mesa_id" value="1">

          <div class="input-group">
            <label for="metodo-pago">Método de pago preferido</label>
            <select id="metodo-pago" name="metodo_pago" required>
              <option value="tarjeta">Tarjeta Bancaria / Stark Pay</option>
              <option value="efectivo">Efectivo en mesa</option>
              <option value="dividir">Dividir cuenta entre comensales</option>
            </select>
          </div>

          <button type="submit" class="btn-bill">PEDIR LA CUENTA AL CAMARERO</button>
          <a href="carta.php" class="btn-continue">SEGUIR PIDIENDO DE LA CARTA</a>
        </form>
      </aside>

    </div>
  </main>

  <footer class="main-footer">
    <p>&copy; 2026 Stark Bistro &bull; Todos los derechos reservados en la Tierra-616</p>
  </footer>

</body>
</html>