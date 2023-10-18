  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>
      <link href="./public/css/estilosLogin.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>

  <body style="height:90vh;" class="d-flex align-items-center justify-content-center">
      <div class="contenedor row w-50 border">
        <div class="div-izquierdo flex-column me-3 col d-flex align-items-center justify-content-center text-center bg-primary" style="--bs-bg-opacity: .5;">
          <h3 class="fw-bold">Bienvenido</h3>
          <h5 class="fw-light">¿No tienes una cuenta?</h5><br>
          <a href="?action=mostrarRegistro" class="btn btn-outline-light fw-bold mx-3">Registrarse</a>
        </div>

        <div class="div-derecho col">
          <form id="loginForm"  action="/trabajoClase2/index.php?action=iniciar" method="post">
            <h2 class="text-center mt-5 mb-2 fw-bold">Iniciar Sesión</h2>

            <div class="form-group mb-2">
              <label for="staticEmail" class="col-form-label">Email</label>
              <div class="col">
                  <input type="text" name="email" require class="form-control" id="staticEmail" placeholder="email@example.com">
              </div>
            </div>
                  
            <div class="form-group mb-4">
              <label for="inputPassword" class="col-form-label">Contraseña</label>
              <div class="col">
                <input type="password" name="password" require class="form-control" id="inputPassword" placeholder="Password">
              </div>
          </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary fw-bold mt-4">Iniciar Sesión</button>
            </div>
            
          </form>
        </div>
      </div>
  </body>
  </html>