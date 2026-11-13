<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stark Bistro | Gestión de Categorías, Carta y Stock</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/estilo_gestionproductos.css">
</head>
<body>
  <!-- Incluimos la seguridad -->
   <?php include("seguridad_encargado.php"); ?>

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
        <a href="../includes/cerrarsesion.php" class="btn-nav">Cerrar Sesion</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <!-- Encabezado de sección -->
    <section class="hero-banner">
      <span class="badge">ARSENAL CULINARIO &bull; NIVEL DIRECTOR</span>
      <h2>GESTIÓN DE CATEGORÍAS, CARTA Y STOCK</h2>
      <p>Organiza las familias de platos, añade nuevas creaciones del Multiverso y controla las existencias disponibles en cocina en tiempo real.</p>
    </section>

    <!-- BLOQUE 1: GESTIÓN DE CATEGORÍAS -->
    <section class="admin-section" aria-labelledby="titulo-categorias">
      <div class="section-heading">
        <div>
          <span class="section-kicker">ESTRUCTURA DEL MENÚ</span>
          <h3 id="titulo-categorias">1. GESTIONAR CATEGORÍAS</h3>
        </div>
      </div>

      <div class="categories-grid">
        <!-- Formulario para crear o editar categoría -->
        <form class="panel-card form-card border-gold" action="#" method="POST">
          <input type="hidden" name="accion" value="guardar_categoria">
          <h4>NUEVA CATEGORÍA</h4>

          <div class="input-group">
            <label for="cat-nombre">Nombre de la categoría</label>
            <input type="text" id="cat-nombre" name="categoria_nombre" placeholder="Ej. Principales de los Vengadores" required>
          </div>

          <div class="input-group">
            <label for="cat-distintivo">Temática / Color identificativo</label>
            <select id="cat-distintivo" name="categoria_color">
              <option value="gold">Dorado Stark (Principales)</option>
              <option value="red">Rojo Marvel (Especialidades)</option>
              <option value="cyan">Azul Reactor (Bebidas y Elixires)</option>
              <option value="purple">Púrpura Wakanda (Postres)</option>
              <option value="green">Verde Gamma (Entrantes XL)</option>
            </select>
          </div>

          <div class="input-group">
            <label for="cat-desc">Descripción breve</label>
            <input type="text" id="cat-desc" name="categoria_descripcion" placeholder="Ej. Hamburguesas, carnes y platos fuertes">
          </div>

          <button type="submit" class="btn-action btn-gold">AÑADIR CATEGORÍA</button>
        </form>

        <!-- Listado de categorías existentes -->
        <div class="panel-card">
          <div class="card-top-row">
            <h4>CATEGORÍAS ACTIVAS EN CARTA</h4>
            <span class="pill-count">4 categorías</span>
          </div>

          <div class="category-list">
            <div class="category-item">
              <div class="cat-info">
                <span class="cat-dot dot-gold"></span>
                <div>
                  <strong>Principales de los Vengadores</strong>
                  <span>Hamburguesas, shawarmas y costillares &bull; 4 productos</span>
                </div>
              </div>
              <form class="inline-actions" action="#" method="POST">
                <input type="hidden" name="categoria_id" value="1">
                <button type="submit" name="accion" value="editar_cat" class="btn-mini btn-edit">Editar</button>
                <button type="submit" name="accion" value="eliminar_cat" class="btn-mini btn-delete">Eliminar</button>
              </form>
            </div>

            <div class="category-item">
              <div class="cat-info">
                <span class="cat-dot dot-red"></span>
                <div>
                  <strong>Especialidades del Multiverso</strong>
                  <span>Platos inspirados en antihéroes &bull; 3 productos</span>
                </div>
              </div>
              <form class="inline-actions" action="#" method="POST">
                <input type="hidden" name="categoria_id" value="2">
                <button type="submit" name="accion" value="editar_cat" class="btn-mini btn-edit">Editar</button>
                <button type="submit" name="accion" value="eliminar_cat" class="btn-mini btn-delete">Eliminar</button>
              </form>
            </div>

            <div class="category-item">
              <div class="cat-info">
                <span class="cat-dot dot-cyan"></span>
                <div>
                  <strong>Elixires y Bebidas de Asgard</strong>
                  <span>Cócteles sin alcohol y refrescos &bull; 6 productos</span>
                </div>
              </div>
              <form class="inline-actions" action="#" method="POST">
                <input type="hidden" name="categoria_id" value="3">
                <button type="submit" name="accion" value="editar_cat" class="btn-mini btn-edit">Editar</button>
                <button type="submit" name="accion" value="eliminar_cat" class="btn-mini btn-delete">Eliminar</button>
              </form>
            </div>

            <div class="category-item">
              <div class="cat-info">
                <span class="cat-dot dot-purple"></span>
                <div>
                  <strong>Postres de Wakanda</strong>
                  <span>Repostería artesanal y dulces &bull; 5 productos</span>
                </div>
              </div>
              <form class="inline-actions" action="#" method="POST">
                <input type="hidden" name="categoria_id" value="4">
                <button type="submit" name="accion" value="editar_cat" class="btn-mini btn-edit">Editar</button>
                <button type="submit" name="accion" value="eliminar_cat" class="btn-mini btn-delete">Eliminar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- BLOQUE 2: ALTA DE NUEVO PRODUCTO -->
    <section class="admin-section" aria-labelledby="titulo-nuevo-producto">
      <div class="section-heading">
        <div>
          <span class="section-kicker">ALTA EN CATÁLOGO</span>
          <h3 id="titulo-nuevo-producto">2. AÑADIR PRODUCTO A LA CARTA</h3>
        </div>
      </div>

      <form class="panel-card border-cyan" action="#" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="accion" value="crear_producto">

        <div class="product-form-grid">
          <div class="input-group">
            <label for="prod-nombre">Nombre del plato o bebida</label>
            <input type="text" id="prod-nombre" name="producto_nombre" placeholder="Ej. Escudo del Capitán (Tarta de Arándanos)" required>
          </div>

          <div class="input-group">
            <label for="prod-categoria">Categoría asignada</label>
            <select id="prod-categoria" name="producto_categoria" required>
              <option value="1">Principales de los Vengadores</option>
              <option value="2">Especialidades del Multiverso</option>
              <option value="3">Elixires y Bebidas de Asgard</option>
              <option value="4">Postres de Wakanda</option>
            </select>
          </div>

          <div class="input-group">
            <label for="prod-heroe">Etiqueta de Héroe / Personaje</label>
            <input type="text" id="prod-heroe" name="producto_heroe" placeholder="Ej. CAPITÁN AMÉRICA" required>
          </div>

          <div class="input-group">
            <label for="prod-precio">Precio (€)</label>
            <input type="number" id="prod-precio" name="producto_precio" step="0.10" min="0.50" placeholder="12.50" required>
          </div>

          <div class="input-group">
            <label for="prod-stock">Stock inicial (unidades)</label>
            <input type="number" id="prod-stock" name="producto_stock" min="0" max="500" value="25" required>
          </div>

          <div class="input-group">
            <label for="prod-imagen">Imagen del producto</label>
            <input type="file" id="prod-imagen" name="producto_imagen" accept="image/*">
          </div>

          <div class="input-group full-width">
            <label for="prod-descripcion">Descripción e ingredientes principales</label>
            <textarea id="prod-descripcion" name="producto_descripcion" rows="2" placeholder="Describe los ingredientes, presentación y alérgenos que verá el cliente en la carta..." required></textarea>
          </div>
        </div>

        <div class="form-footer-actions">
          <label class="checkbox-inline">
            <input type="checkbox" name="visible_carta" checked>
            <span>Publicar inmediatamente en la carta digital</span>
          </label>

          <div class="btn-group">
            <button type="reset" class="btn-secondary">LIMPIAR CAMPOS</button>
            <button type="submit" class="btn-action btn-cyan">GUARDAR PRODUCTO EN CARTA</button>
          </div>
        </div>
      </form>
    </section>

    <!-- BLOQUE 3: GESTIÓN DE PRODUCTOS Y CONTROL DE STOCK -->
    <section class="admin-section" aria-labelledby="titulo-inventario">
      <div class="section-heading">
        <div>
          <span class="section-kicker">CONTROL DE EXISTENCIAS Y PRECIOS</span>
          <h3 id="titulo-inventario">3. PRODUCTOS DE LA CARTA Y STOCK</h3>
        </div>
      </div>

      <!-- Barra de filtros rápidos -->
      <form class="filter-bar" action="#" method="GET">
        <div class="filter-group">
          <label for="buscar-prod">Buscar producto</label>
          <input type="text" id="buscar-prod" name="q" placeholder="Nombre del plato o héroe...">
        </div>

        <div class="filter-group">
          <label for="filtrar-cat">Filtrar por categoría</label>
          <select id="filtrar-cat" name="cat">
            <option value="todas">Todas las categorías</option>
            <option value="1">Principales de los Vengadores</option>
            <option value="2">Especialidades del Multiverso</option>
            <option value="3">Elixires y Bebidas de Asgard</option>
            <option value="4">Postres de Wakanda</option>
          </select>
        </div>

        <div class="filter-group">
          <label for="filtrar-stock">Estado de stock</label>
          <select id="filtrar-stock" name="stock">
            <option value="todos">Todos los estados</option>
            <option value="optimo">Stock óptimo</option>
            <option value="bajo">Stock bajo (&le; 5 uds)</option>
            <option value="agotado">Agotado (0 uds)</option>
          </select>
        </div>

        <button type="submit" class="btn-filter">FILTRAR</button>
      </form>

      <!-- Formulario general para actualizar stock y precios masivamente -->
      <form class="panel-card border-red" action="#" method="POST">
        <input type="hidden" name="accion" value="actualizar_inventario">

        <div class="table-responsive">
          <table class="inventory-table">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Precio (€)</th>
                <th>Stock Disponible</th>
                <th>Estado</th>
                <th>En Carta</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <!-- Producto 1 -->
              <tr>
                <td>
                  <div class="prod-overview">
                    <img src="https://placehold.co/120x80/1c2230/f5b800?text=Arc" alt="Hamburguesa Reactor Arc">
                    <div>
                      <strong>Hamburguesa Reactor Arc</strong>
                      <span class="hero-mini">IRON MAN</span>
                    </div>
                  </div>
                </td>
                <td>Principales de los Vengadores</td>
                <td>
                  <input type="number" class="price-input" name="precio[hamburguesa_arc]" step="0.10" min="0" value="14.50" aria-label="Precio Hamburguesa Reactor Arc">
                </td>
                <td>
                  <div class="quantity-stepper">
                    <button type="button" class="qty-btn" onclick="this.nextElementSibling.stepDown()" aria-label="Reducir stock">&minus;</button>
                    <input type="number" name="stock[hamburguesa_arc]" min="0" max="500" value="24" aria-label="Stock Hamburguesa Reactor Arc">
                    <button type="button" class="qty-btn" onclick="this.previousElementSibling.stepUp()" aria-label="Aumentar stock">&plus;</button>
                  </div>
                </td>
                <td><span class="stock-badge stock-ok">ÓPTIMO</span></td>
                <td>
                  <label class="switch" aria-label="Mostrar Hamburguesa Reactor Arc en carta">
                    <input type="checkbox" name="activo[hamburguesa_arc]" checked>
                    <span class="slider"></span>
                  </label>
                </td>
                <td>
                  <div class="table-actions">
                    <button type="submit" name="editar_producto" value="hamburguesa_arc" class="btn-mini btn-edit">Editar</button>
                    <button type="submit" name="eliminar_producto" value="hamburguesa_arc" class="btn-mini btn-delete">Borrar</button>
                  </div>
                </td>
              </tr>

              <!-- Producto 2 -->
              <tr>
                <td>
                  <div class="prod-overview">
                    <img src="https://placehold.co/120x80/1c2230/e23636?text=NY" alt="Shawarma Batalla de NY">
                    <div>
                      <strong>Shawarma Batalla de NY</strong>
                      <span class="hero-mini">VENGADORES</span>
                    </div>
                  </div>
                </td>
                <td>Principales de los Vengadores</td>
                <td>
                  <input type="number" class="price-input" name="precio[shawarma_ny]" step="0.10" min="0" value="12.00" aria-label="Precio Shawarma Batalla de NY">
                </td>
                <td>
                  <div class="quantity-stepper">
                    <button type="button" class="qty-btn" onclick="this.nextElementSibling.stepDown()" aria-label="Reducir stock">&minus;</button>
                    <input type="number" name="stock[shawarma_ny]" min="0" max="500" value="4" aria-label="Stock Shawarma Batalla de NY">
                    <button type="button" class="qty-btn" onclick="this.previousElementSibling.stepUp()" aria-label="Aumentar stock">&plus;</button>
                  </div>
                </td>
                <td><span class="stock-badge stock-low">STOCK BAJO</span></td>
                <td>
                  <label class="switch" aria-label="Mostrar Shawarma Batalla de NY en carta">
                    <input type="checkbox" name="activo[shawarma_ny]" checked>
                    <span class="slider"></span>
                  </label>
                </td>
                <td>
                  <div class="table-actions">
                    <button type="submit" name="editar_producto" value="shawarma_ny" class="btn-mini btn-edit">Editar</button>
                    <button type="submit" name="eliminar_producto" value="shawarma_ny" class="btn-mini btn-delete">Borrar</button>
                  </div>
                </td>
              </tr>

              <!-- Producto 3 -->
              <tr>
                <td>
                  <div class="prod-overview">
                    <img src="https://placehold.co/120x80/1c2230/4ade80?text=Hulk" alt="Costillas Gamma XL">
                    <div>
                      <strong>Costillas Gamma XL</strong>
                      <span class="hero-mini">HULK</span>
                    </div>
                  </div>
                </td>
                <td>Principales de los Vengadores</td>
                <td>
                  <input type="number" class="price-input" name="precio[costillas_gamma]" step="0.10" min="0" value="18.90" aria-label="Precio Costillas Gamma XL">
                </td>
                <td>
                  <div class="quantity-stepper">
                    <button type="button" class="qty-btn" onclick="this.nextElementSibling.stepDown()" aria-label="Reducir stock">&minus;</button>
                    <input type="number" name="stock[costillas_gamma]" min="0" max="500" value="0" aria-label="Stock Costillas Gamma XL">
                    <button type="button" class="qty-btn" onclick="this.previousElementSibling.stepUp()" aria-label="Aumentar stock">&plus;</button>
                  </div>
                </td>
                <td><span class="stock-badge stock-out">AGOTADO</span></td>
                <td>
                  <label class="switch" aria-label="Mostrar Costillas Gamma XL en carta">
                    <input type="checkbox" name="activo[costillas_gamma]">
                    <span class="slider"></span>
                  </label>
                </td>
                <td>
                  <div class="table-actions">
                    <button type="submit" name="editar_producto" value="costillas_gamma" class="btn-mini btn-edit">Editar</button>
                    <button type="submit" name="eliminar_producto" value="costillas_gamma" class="btn-mini btn-delete">Borrar</button>
                  </div>
                </td>
              </tr>

              <!-- Producto 4 -->
              <tr>
                <td>
                  <div class="prod-overview">
                    <img src="https://placehold.co/120x80/1c2230/00e5ff?text=Thor" alt="Elixir del Trueno">
                    <div>
                      <strong>Elixir del Trueno</strong>
                      <span class="hero-mini">THOR</span>
                    </div>
                  </div>
                </td>
                <td>Elixires y Bebidas de Asgard</td>
                <td>
                  <input type="number" class="price-input" name="precio[elixir_trueno]" step="0.10" min="0" value="6.50" aria-label="Precio Elixir del Trueno">
                </td>
                <td>
                  <div class="quantity-stepper">
                    <button type="button" class="qty-btn" onclick="this.nextElementSibling.stepDown()" aria-label="Reducir stock">&minus;</button>
                    <input type="number" name="stock[elixir_trueno]" min="0" max="500" value="42" aria-label="Stock Elixir del Trueno">
                    <button type="button" class="qty-btn" onclick="this.previousElementSibling.stepUp()" aria-label="Aumentar stock">&plus;</button>
                  </div>
                </td>
                <td><span class="stock-badge stock-ok">ÓPTIMO</span></td>
                <td>
                  <label class="switch" aria-label="Mostrar Elixir del Trueno en carta">
                    <input type="checkbox" name="activo[elixir_trueno]" checked>
                    <span class="slider"></span>
                  </label>
                </td>
                <td>
                  <div class="table-actions">
                    <button type="submit" name="editar_producto" value="elixir_trueno" class="btn-mini btn-edit">Editar</button>
                    <button type="submit" name="eliminar_producto" value="elixir_trueno" class="btn-mini btn-delete">Borrar</button>
                  </div>
                </td>
              </tr>

              <!-- Producto 5 -->
              <tr>
                <td>
                  <div class="prod-overview">
                    <img src="https://placehold.co/120x80/1c2230/c084fc?text=Wakanda" alt="Mousse de Vibranium">
                    <div>
                      <strong>Mousse de Vibranium</strong>
                      <span class="hero-mini">BLACK PANTHER</span>
                    </div>
                  </div>
                </td>
                <td>Postres de Wakanda</td>
                <td>
                  <input type="number" class="price-input" name="precio[mousse_vibranium]" step="0.10" min="0" value="7.50" aria-label="Precio Mousse de Vibranium">
                </td>
                <td>
                  <div class="quantity-stepper">
                    <button type="button" class="qty-btn" onclick="this.nextElementSibling.stepDown()" aria-label="Reducir stock">&minus;</button>
                    <input type="number" name="stock[mousse_vibranium]" min="0" max="500" value="15" aria-label="Stock Mousse de Vibranium">
                    <button type="button" class="qty-btn" onclick="this.previousElementSibling.stepUp()" aria-label="Aumentar stock">&plus;</button>
                  </div>
                </td>
                <td><span class="stock-badge stock-ok">ÓPTIMO</span></td>
                <td>
                  <label class="switch" aria-label="Mostrar Mousse de Vibranium en carta">
                    <input type="checkbox" name="activo[mousse_vibranium]" checked>
                    <span class="slider"></span>
                  </label>
                </td>
                <td>
                  <div class="table-actions">
                    <button type="submit" name="editar_producto" value="mousse_vibranium" class="btn-mini btn-edit">Editar</button>
                    <button type="submit" name="eliminar_producto" value="mousse_vibranium" class="btn-mini btn-delete">Borrar</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="inventory-footer">
          <p>Los cambios realizados en precios, unidades de stock o visibilidad se aplicarán directamente en la carta de clientes y camareros.</p>
          <button type="submit" class="btn-action btn-red">GUARDAR CAMBIOS DE INVENTARIO Y PRECIOS</button>
        </div>
      </form>
    </section>
  </main>

  <footer class="main-footer">
    <p>&copy; 2026 Stark Bistro &bull; Gestión de Carta, Categorías e Inventario Tierra-616</p>
  </footer>

</body>
</html>