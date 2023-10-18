<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="../public/css/estilosRegistro.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body style="height:90vh;" class="d-flex align-items-center justify-content-center">
  <div class="contenedor row w-50 border">
    <div class="div-izquierdo col d-flex me-3 flex-column justify-content-center align-items-center text-center bg-primary" style="--bs-bg-opacity: .5;">
      <h3 class="fw-bold">Bienvenido</h3>
      <h5 class="fw-light">¿Ya tienes una cuenta?</h5><br>
      <a href="./" class="btn btn-outline-light fw-bold mx-3 ">Iniciar Sesión</a>
    </div>

    <div class="div-derecho col">
      <form id="registroForm" action="/trabajoClase2/index.php?action=registrarUsuario" method="post">
        <h2 class="text-center mt-5 mb-2 fw-bold">Registrar</h2>

        <div class="row">
          <div class="form-group col">
            <label for="nombre" class="col-form-label">Nombre:</label>
            <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Nombre">
          </div>

          <div class="form-group col">
            <label for="apellido" class="col-form-label">Apellido:</label>
            <input type="text" name="apellido" required class="form-control" id="apellido" placeholder="Apellido">
          </div>
        </div>

        <div class="row">
          <div class="form-group col">
            <label for="id_nivel" class="col-form-label">Nivel:</label>
            <select name="id_nivel" class="form-control" id="id_nivel">
              <?php
              foreach ($niveles as $nivel) {
                echo '<option value="' . $nivel['id_nivel'] . '">' . $nivel['nom_nivel'] . '</option>';
              }
              ?>
            </select>
          </div>

          <div class="form-group col">
            <label for="id_distrito" class="col-form-label">Distrito:</label>
            <select name="id_distrito" class="form-control" id="id_distrito">
              <?php
              foreach ($distritos as $distrito) {
                echo '<option value="' . $distrito['id_distrito'] . '">' . $distrito['nom_distrito'] . '</option>';
              }
              ?>
            </select>
          </div>
        </div>


        <div class="form-group">
          <label for="foto" class="col-form-label">Foto de Perfil:</label>
          <input type="file" name="foto" class="form-control" id="foto">
        </div>

        <div class="form-group">
          <label for="staticEmail" class="col-form-label">Email:</label>
          <div class="col">
            <input type="text" name="email" required class="form-control" id="staticEmail" placeholder="email@example.com">
          </div>
        </div>



        <div class="form-group">
          <label for="inputPassword" class="col-form-label">Contraseña:</label>
          <div class="col">
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
          </div>
        </div>

        <div class="form-group">
          <label for="confirmPassword" class="col-form-label">Ingrese nuevamente su contraseña:</label>
          <div class="col">
            <input type="password" name="confirmPassword" required class="form-control" id="confirmPassword" placeholder="Password">
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary fw-bold mt-4 mb-4">Registrar</button>
        </div>
      </form>
    </div>

  </div>

  <!-- <script>
        document.getElementById("registroForm").addEventListener("submit", function (e) {
            e.preventDefault();
            
            var password = document.getElementById("inputPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            
            if (password !== confirmPassword) {
                alert("Las contraseñas no coinciden. Por favor, inténtelo de nuevo.");
                return;
            }
            
            alert("Registro exitoso. ¡Bienvenido!");
        });
    </script> -->
</body>

</html>