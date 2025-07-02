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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="d-flex flex-column min-vh-100 background_page">


    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <a href="../index.html" class="btn btn-outline-light">
                    <i class="bi bi-arrow-return-left"></i>
                </a>
            </div>
        </div>
    </div>

    <header class="d-flex justify-content-center align-items-center pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto d-flex flex-wrap justify-content-center gap-3">
                    <h1 class="color_h1">Suscripciones</h1>
                </div>
            </div>
        </div>
    </header>


    <main class="d-flex justify-content-center align-items-center flex-fill">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto d-flex flex-wrap justify-content-center gap-3">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-bookmark-plus"></i></button>


                    <!-- Modal MODIFICAR LOS ELEMENTOS DADOS-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Suscripcion</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../procesos_crud/suscripciones_crud.php" method="post">
                                        <label for="txt_id_suscripcion_add" class="form-label">ID Suscripcion</label>
                                        <input type="number" name="txt_id_suscripcion_add" id="txt_id_suscripcion_add" class="form-control">

                                        <label for="txt_id_cliente_add" class="form-label">Cliente ID</label>
                                        <input type="number" name="txt_id_cliente_add" id="txt_id_cliente_add" class="form-control">

                                        <label for="txt_id_pelicula_add" class="form-label">Pelicula ID</label>
                                        <input type="number" name="txt_id_pelicula_add" id="txt_id_pelicula_add" class="form-control">

                                        <label for="date_fecha_de_suscripcion" class="form-label">Fecha de Suscripcion</label>
                                        <input type="date" name="date_fecha_de_suscripcion" id="date_fecha_de_suscripcion" class="form-control">

                                        <label for="date_fecha_finalizacion_add" class="form-label">Fecha de Finalizacion</label>
                                        <input type="date" name="date_fecha_finalizacion_add" id="date_fecha_finalizacion_add" class="form-control">

                                        <label for="number_precio_add" class="form-label">Precio</label>
                                        <input type="number" name="number_precio_add" id="number_precio_add" class="form-control">

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary" name="btn_agregar_suscripcion" id="btn_agregar_cliente">Agregar Suscripcion</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-12">
                        <table class="table table-dark table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>ID Suscripcion</th>
                                    <th>ID Cliente</th>
                                    <th>Pelicula ID</th>
                                    <th>Fecha de Suscripcion</th>
                                    <th>Fecha de Finalizacion</th>
                                    <th>Precio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once("../procesos_crud/conexion.php");
                                $sql = "SELECT * FROM suscripciones";
                                $ejecutar = mysqli_query($conexion, $sql);

                                while ($resultado = mysqli_fetch_assoc($ejecutar)) { ?>
                                    <tr>
                                        <th scope="row"><?= $resultado['suscripcion_id']; ?></th>
                                        <td><?= $resultado['cliente_id']; ?></td>
                                        <td><?= $resultado['pelicula_id']; ?></td>
                                        <td><?= $resultado['fecha_suscripcion']; ?></td>
                                        <td><?= $resultado['fecha_finalizacion']; ?></td>
                                        <td><?= $resultado['precio']; ?></td>
                                        <td>
                                            <form action="../forms/form_suscripciones.php" method="post" style="display:inline;">
                                                <input type="hidden" name="txt_editar_suscripcion" value="<?= $resultado['suscripcion_id']; ?>">
                                                <button type="submit" name="btn_editar_suscripcion" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                                            </form>
                                            <form action="../procesos_crud/suscripciones_crud.php" method="post" style="display:inline;">
                                                <input type="hidden" name="txt_eliminar_suscripcion" id="txt_eliminar_suscripcion" value="<?= $resultado['suscripcion_id']; ?>">
                                                <button type="submit" class="btn btn-danger" name="btn_eliminar_suscripcion" id="btn_eliminar_suscripcion"><i class="bi bi-trash3-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer mt-auto py-3 footer_wave"></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
    <script src="../js/alerta_suscripciones.js"></script>

    <?php if (isset($_GET['edicion'])): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: '<?= $_GET['edicion'] === "exitosa" ? "success" : "error" ?>',
            title: '<?= $_GET['edicion'] === "exitosa" ? "Edición exitosa" : "Error al editar" ?>',
            text: '<?= $_GET['edicion'] === "exitosa" ? "La suscripción fue modificada correctamente." : "Ocurrió un problema al modificar la suscripción." ?>',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar'
        });
    </script>
<?php endif; ?>

</body>

</html>