<?php

$codigo = $_POST['txt_editar_suscripcion'];

require_once("../procesos_crud/conexion.php");
$sql = "select * from suscripciones where suscripcion_id=" . $codigo;
$ejecutar = mysqli_query($conexion, $sql);
$resultado = mysqli_fetch_assoc($ejecutar);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suscripciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/styles2.css">
</head>

<body class="background_page">

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <a href="../vistas/suscripciones.php" class="btn btn-outline-light">
                    <i class="bi bi-arrow-return-left"></i>
                </a>
            </div>
        </div>
    </div>

    <header class="d-flex justify-content-center align-items-center pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto d-flex flex-wrap justify-content-center gap-3">
                    <h1 class="color_h1">Editar Suscripcion</h1>
                </div>
            </div>
        </div>
    </header>


    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="../procesos_crud/suscripciones_crud.php" method="post">
                        <label for="txt_id_suscripcion_form" class="form-label color_text_line m-2">ID Suscripcion</label>
                        <input type="number" name="txt_id_suscripcion_form" id="txt_id_suscripcion_form" class="form-control" readonly value="<?= $codigo; ?>">

                        <label for="txt_id_cliente_form" class="form-label color_text_line m-2">ID Cliente</label>
                        <input type="number" name="txt_id_cliente_form" id="txt_id_cliente_form" class="form-control" readonly value="<?= $resultado['cliente_id']; ?>">

                        <label for="txt_id_pelicula_form" class="form-label color_text_line m-2">ID Pelicula</label>
                        <input type="number" name="txt_id_pelicula_form" id="txt_id_pelicula_form" class="form-control" readonly value="<?= $resultado['pelicula_id']; ?>">

                        <label for="date_fecha_de_suscripcion_Form" class="form-label color_text_line m-2">Fecha de Suscripcion</label>
                        <input type="date" name="date_fecha_de_suscripcion_form" id="date_fecha_de_suscripcion_Form" class="form-control" value="<?= $resultado['fecha_suscripcion']; ?>">

                        <label for="date_fecha_de_finalizacion_form" class="form-label color_text_line m-2">Fecha de Finalizacion</label>
                        <input type="date" name="date_fecha_de_finalizacion_form" id="date_fecha_de_finalizacion_form" class="form-control" value="<?= $resultado['fecha_finalizacion']; ?>">

                        <label for="number_precio_form" class="form-label color_text_line m-2">Precio</label>
                        <input type="number" name="number_precio_form" id="number_precio_form" class="form-control" value="<?= $resultado['precio']; ?>">

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
        <script src="../js/alerta_edicion_suscripciones.js"></script>
        <script>
            mostrarAlerta("<?= $mensaje ?>");
        </script>
    <?php endif; ?>
</body>

</html>