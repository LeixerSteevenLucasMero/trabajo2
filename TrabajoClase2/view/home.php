<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Mi Aplicación</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <span class="nav-link">Bienvendo <?php echo $_SESSION["nombre"]; ?> <?php echo $_SESSION["apellido"]; ?></span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link"><?php echo $_SESSION["email"]; ?>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" width="30" height="30" alt="Imagen Predeterminada">
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">HOME</h1>

        <div class="div-derecho col">
            <form id="loginForm" action="/trabajoClase2/index.php?action=editarUsuario" method="post">
                <h2 class="text-center mt-5 mb-2 fw-bold">Modificar Usuario</h2>
                <div class="row">
                    <div class="form-group col">
                        <label for="nombre" class="col-form-label">Nombre:</label>
                        <input type="text" name="nombre" required class="form-control" id="nombre" placeholder="Nombre" value="<?php echo $_SESSION["nombre"]; ?>">
                    </div>

                    <div class="form-group col">
                        <label for="apellido" class="col-form-label">Apellido:</label>
                        <input type="text" name="apellido" required class="form-control" id="apellido" placeholder="Apellido" value="<?php echo $_SESSION["apellido"]; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label for="id_nivel" class="col-form-label">Nivel:</label>
                        <select name="id_nivel" class="form-control" id="id_nivel">
                            <?php
                            foreach ($niveles as $nivel) {
                                $selected = ($nivel['id_nivel'] == $_SESSION['id_nivel']) ? 'selected' : '';
                                echo '<option value="' . $nivel['id_nivel'] . '" ' . $selected . '>' . $nivel['nom_nivel'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="id_distrito" class="col-form-label">Distrito:</label>
                        <select name="id_distrito" class="form-control" id="id_distrito">
                            <?php
                            foreach ($distritos as $distrito) {
                                $selected = ($distrito['id_distrito'] == $_SESSION['id_distrito']) ? 'selected' : '';
                                echo '<option value="' . $distrito['id_distrito'] . '" ' . $selected . '>' . $distrito['nom_distrito'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="password" class="col-form-label">Contraseña:</label>
                        <div class="col">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" value="<?php echo $_SESSION["password"]; ?>">
                        </div>
                    </div>

                    <div class="form-group col">
                        <label for="confirmPassword" class="col-form-label">Ingrese nuevamente su contraseña:</label>
                        <div class="col">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" value="<?php echo $_SESSION["password"]; ?>">
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary fw-bold mt-4">Modificar</button>
                </div>
            </form>
        </div>
        <a class="btn btn-success mt-2" href="/trabajoClase2/index.php?action=cerrar">Cerrar Sesión</a>
    </div>

</body>

</html>