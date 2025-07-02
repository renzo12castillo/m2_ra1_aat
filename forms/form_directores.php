<?php

$codigo = $_POST['txt_editar_director'];

require_once("../procesos_crud/conexion.php");
$sql = "select * from directores where director_id=" . $codigo;
$ejecutar = mysqli_query($conexion, $sql);
$resultado = mysqli_fetch_assoc($ejecutar);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/styles2.css">
</head>

<body class="background_page">

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <a href="../vistas/directores.php" class="btn btn-outline-light">
                    <i class="bi bi-arrow-return-left"></i>
                </a>
            </div>
        </div>
    </div>

    <header class="d-flex justify-content-center align-items-center pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto d-flex flex-wrap justify-content-center gap-3">
                    <h1 class="color_h1">Editar Directores</h1>
                </div>
            </div>
        </div>
    </header>


    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="../procesos_crud/directores_crud.php" method="post">
                        <label for="txt_id_director" class="form-label color_text_line m-2">ID Director</label>
                        <input type="number" name="txt_id_director" id="txt_id_director" class="form-control" readonly value="<?= $codigo; ?>">

                        <label for="txt_nombre_director" class="form-label color_text_line m-2">Nombre</label>
                        <input type="text" name="txt_nombre_director" id="txt_nombre_director" class="form-control" value="<?= $resultado['nombre']; ?>">

                        <label for="txt_apellido_director" class="form-label color_text_line m-2">Apellido</label>
                        <input type="text" name="txt_apellido_director" id="txt_apellido_director" class="form-control" value="<?= $resultado['apellido']; ?>">

                        <label for="txt_id_pais" class="form-label color_text_line m-2">Pais ID</label>
                        <input type="number" name="txt_id_pais" id="txt_id_pais" class="form-control" value="<?= $resultado['pais_id']; ?>">

                        <button class="btn btn-outline-light btn-lg mt-5" type="submit" name="guardar_cambios" id="guardar_cambios">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- MODIFICAR HASTA ACA -->

    <footer class="footer mt-auto py-3 footer_wave"></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>

    <?php if (isset($mensaje)): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../js/alertas_edicion_directores.js"></script>
        <script>
            mostrarAlerta("<?= $mensaje ?>");
        </script>
    <?php endif; ?>
</body>

</html>