<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
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
                    <h1 class="color_h1">Peliculas</h1>
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
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Peliculas</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../procesos_crud/peliculas_crud.php" method="post">
                                        <label for="txt_id_pelicula" class="form-label">ID Pelicula</label>
                                        <input type="number" name="txt_id_pelicula" id="txt_id_pelicula" class="form-control">

                                        <label for="txt_nombre_pelicula" class="form-label">Nombre</label>
                                        <input type="text" name="txt_nombre_pelicula" id="txt_nombre_pelicula" class="form-control">

                                        <label for="date_fecha_estreno" class="form-label">Fecha de Estreno</label>
                                        <input type="date" name="date_fecha_estreno" id="date_fecha_estreno" class="form-control">

                                        <label for="number_duracion_minutos" class="form-label">Duracion en Minutos</label>
                                        <input type="number" name="number_duracion_minutos" id="number_duracion_minutos" class="form-control">

                                        <label for="txt_director_id" class="form-label">Director ID</label>
                                        <input type="number" name="txt_director_id" id="txt_director_id" class="form-control">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary" name="btn_agregar_pelicula" id="btn_agregar_pelicula">Agregar Pelicula</button>
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
                                    <th>ID Pelicula</th>
                                    <th>Nombre</th>
                                    <th>Fecha de Estreno</th>
                                    <th>Duracion en Minutos</th>
                                    <th>ID Director</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once("../procesos_crud/conexion.php");
                                $sql = "SELECT * FROM peliculas";
                                $ejecutar = mysqli_query($conexion, $sql);

                                while ($resultado = mysqli_fetch_assoc($ejecutar)) { ?>
                                    <tr>
                                        <th scope="row"><?= $resultado['pelicula_id']; ?></th>
                                        <td><?= $resultado['nombre']; ?></td>
                                        <td><?= $resultado['fecha_estreno']; ?></td>
                                        <td><?= $resultado['duracion_minutos']; ?></td>
                                        <td><?= $resultado['director_id']; ?></td>
                                        <td>
                                            <form action="../forms/form_peliculas.php" method="post" style="display:inline;">
                                                <input type="hidden" name="txt_editar_pelicula" id="txt_editar_pelicula" value="<?= $resultado['pelicula_id']; ?>">
                                                <button type="submit" name="btn_editar_pelicula" id="btn_editar_pelicula" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                                            </form>
                                            <form action="../procesos_crud/peliculas_crud.php" method="post" style="display:inline;">
                                                <input type="hidden" name="txt_eliminar_pelicula" id="txt_eliminar_pelicula" value="<?= $resultado['pelicula_id']; ?>">
                                                <button type="submit" class="btn btn-danger" name="btn_eliminar_pelicula" id="btn_eliminar_pelicula"><i class="bi bi-trash3-fill"></i></button>
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
    <script src="../js/alertas_peliculas.js"></script>
</body>

</html>