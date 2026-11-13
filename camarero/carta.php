<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stark Bistro | Carta y Pedidos del Multiverso</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/estilo_vercartayPedir.css">
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
        <a href="index.php">Control de Sala</a>
        <a href="carta.php" class="active">Carta</a>
        <a href="#" class="btn-nav">Cerrar sesion</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <section class="hero-banner">
      <span class="badge">MENÚ OFICIAL &bull; TORRE DE LOS VENGADORES</span>
      <h2>ELIGE TUS PROVISIONES DE COMBATE</h2>
      <p>En esta pagina solo podras ver los productos</p>
    </section>

    <!-- Formulario completo que engloba la carta y los datos de entrega -->
    <form class="order-form" action="#" method="POST">
      
      <!-- Cuadrícula de productos -->
      <section id="carta" class="menu-grid" aria-label="Carta del restaurante">
        
        <!-- Producto 1 -->
        <article class="product-card">
          <div class="product-image">
            <img src="https://placehold.co/600x380/1c2230/f5b800?text=Hamburguesa+Reactor+Arc" alt="Hamburguesa Reactor Arc">
            <span class="hero-tag tag-gold">IRON MAN</span>
          </div>
          <div class="product-content">
            <div class="product-header">
              <h3>Hamburguesa Reactor Arc</h3>
              <span class="price">14,50 €</span>
            </div>
            <p class="product-desc">Doble carne de ternera madurada, queso cheddar fundido, bacon crujiente, cebolla caramelizada y salsa secreta Stark en pan brioche negro.</p>
          </div>
        </article>

        <!-- Producto 2 -->
        <article class="product-card">
          <div class="product-image">
            <img src="https://placehold.co/600x380/1c2230/e23636?text=Shawarma+Batalla+NY" alt="Shawarma Batalla de Nueva York">
            <span class="hero-tag tag-red">VENGADORES</span>
          </div>
          <div class="product-content">
            <div class="product-header">
              <h3>Shawarma Batalla de NY</h3>
              <span class="price">12,00 €</span>
            </div>
            <p class="product-desc">Pan pita artesanal relleno de pollo especiado al estilo tradicional, vegetales frescos, salsa de yogur con ajo y toque picante.</p>
          </div>
        </article>

        <!-- Producto 3 -->
        <article class="product-card">
          <div class="product-image">
            <img src="https://placehold.co/600x380/1c2230/4ade80?text=Costillas+Gamma+Hulk" alt="Costillas Gamma de Hulk">
            <span class="hero-tag tag-green">HULK</span>
          </div>
          <div class="product-content">
            <div class="product-header">
              <h3>Costillas Gamma XL</h3>
              <span class="price">18,90 €</span>
            </div>
            <p class="product-desc">Costillar de cerdo asado a baja temperatura durante 8 horas, glaseado con barbacoa ahumada y acompañado de patatas rústicas.</p>
          </div>
        </article>

        <!-- Producto 4 -->
        <article class="product-card">
          <div class="product-image">
            <img src="https://placehold.co/600x380/1c2230/ff4d4d?text=Chimichangas+Deadpool" alt="Chimichangas de Deadpool">
            <span class="hero-tag tag-red">DEADPOOL</span>
          </div>
          <div class="product-content">
            <div class="product-header">
              <h3>Chimichangas del Mercenario</h3>
              <span class="price">11,50 €</span>
            </div>
            <p class="product-desc">Dos tortillas de trigo crujientes rellenas de ternera desmechada, frijoles negros, queso fundido, guacamole y pico de gallo.</p>
          </div>
        </article>

        <!-- Producto 5 -->
        <article class="product-card">
          <div class="product-image">
            <img src="https://placehold.co/600x380/1c2230/00e5ff?text=Elixir+de+Asgard" alt="Elixir de Asgard">
            <span class="hero-tag tag-cyan">THOR</span>
          </div>
          <div class="product-content">
            <div class="product-header">
              <h3>Elixir del Trueno</h3>
              <span class="price">6,50 €</span>
            </div>
            <p class="product-desc">Bebida refrescante sin alcohol de frutos azules, lima, menta fresca y tónica con destellos cítricos servida en jarra helada.</p>
          </div>
        </article>

        <!-- Producto 6 -->
        <article class="product-card">
          <div class="product-image">
            <img src="https://placehold.co/600x380/1c2230/c084fc?text=Tarta+Vibranium" alt="Tarta Vibranium">
            <span class="hero-tag tag-purple">BLACK PANTHER</span>
          </div>
          <div class="product-content">
            <div class="product-header">
              <h3>Mousse de Vibranium</h3>
              <span class="price">7,50 €</span>
            </div>
            <p class="product-desc">Mousse intenso de chocolate negro 70% con corazón de arándanos silvestres de Wakanda y crujiente de galleta de cacao.</p>
          </div>
        </article>
      </section>
    </form>
  </main>

  <footer class="main-footer">
    <p>&copy; 2026 Stark Bistro &bull; Todos los derechos reservados en la Tierra-616</p>
  </footer>

</body>
</html>