<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stark Bistro | Registro de Héroes</title>
  <!-- Fuentes estilo cómic y tecnología futurista -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/estilo_index.css">
</head>
<body>
  <!-- Iniciamos sesion -->
   <?php session_start() ?>
  <main class="login-container">
    <section class="login-card">
      <!-- Reactor Arc decorativo -->
      <div class="arc-reactor" aria-hidden="true">
        <div class="arc-core"></div>
      </div>

      <header class="login-header">
        <span class="badge">S.H.I.E.L.D. &bull; NIVEL DE ACCESO 7</span>
        <h4 style="color: red;">
            <?php 
                if (isset($_SESSION['registrado']) && $_SESSION['registrado'] === true) { 
                      echo "Usuario ya registrado";
                      unset($_SESSION['registrado']); // Borra el aviso para que no siga saliendo si recargan la página
                  } 
              ?>
          </h4><br>
        <h1>STARK BISTRO</h1>
        <p>Registrate para gestionar tus reservas y recompensas del Multiverso</p>
      </header>

      <form class="login-form" action="Comprobaregistro.php" method="POST">
        <!-- Nombre de usuario-->
        <div class="input-group">
          <label for="nombre">Nombre del agente</label>
          <input 
            type="text" 
            id="nombre" 
            name="nombre" 
            placeholder="Black panther" 
            required
          >
        </div>

        <!-- Apellidos de usuario-->
        <div class="input-group">
          <label for="apellidos">Apellidos del agente</label>
          <input 
            type="text" 
            id="apellidos" 
            name="apellidos" 
            placeholder="Stark Maximoff" 
            required
          >
        </div>

        <!-- Nombre de usuario-->
        <div class="input-group">
          <label for="dni">Dni del agente</label>
          <input 
            type="text" 
            id="dni" 
            name="dni" 
            placeholder="112233445A" 
            required
            maxlength="10"
          >
        </div>

        <div class="input-group">
          <label for="email">Correo electrónico o ID de Agente</label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            placeholder="tony@starkindustries.com" 
            required
          >
        </div>

        <div class="input-group">
          <label for="password">Clave de autorización</label>
          <input 
            type="password" 
            id="password" 
            name="password" 
            placeholder="••••••••••••" 
            required
          >
        </div>

        <div class="form-options">
          <label class="remember-me">
           <!-- <input type="checkbox" name="remember">
            <span>Recordar dispositivo</span>-->
          </label>
          <!--<a href="#" class="forgot-link">¿Olvidaste tu clave?</a>-->
        </div>

        <button type="submit" class="btn-submit">REGISTRARSE</button>
      </form>
    </section>
  </main>

</body>
</html>