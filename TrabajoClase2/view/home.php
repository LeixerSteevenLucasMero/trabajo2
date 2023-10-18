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
                        <span class="nav-link">ID: <?php echo $_SESSION["id_usuario"]; ?></span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link">Nombre: <?php echo $_SESSION["nombre"]; ?></span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link">Apellido: <?php echo $_SESSION["apellido"]; ?></span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link">Foto: <?php if ($_SESSION["foto"]) { ?>
                                <img src="<?php echo $_SESSION["foto"]; ?>" alt="Foto">
                            <?php } else { ?>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png" width="30" height="30" alt="Imagen Predeterminada">
                            <?php } ?></span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link">Nivel: <?php echo $nombreNivel; ?></span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link">Distrito: <?php echo $infoDistritoProvincia["nom_distrito"]; ?></span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link">Provincia: <?php echo $nombreProvincia; ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">HOME</h1>
        <a class="btn btn-success mt-2" href="/trabajoClase2/index.php?action=cerrar">Cerrar Sesión</a>
    </div>
</body>

</html>