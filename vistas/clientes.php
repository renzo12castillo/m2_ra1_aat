<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/styles2.css">
</head>

<body class="background_page">

    <header class="d-flex justify-content-center align-items-center pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto d-flex flex-wrap justify-content-center gap-3">
                    <h1 class="color_h1">Clientes</h1>
                </div>
            </div>
        </div>
    </header>


    <main class="d-flex justify-content-center align-items-center min-vh-100">
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
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Clientes</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../procesos_crud/clientes_crud.php" method="post">
                                        <label for="txt_id" class="form-label">ID</label>
                                        <input type="number" name="txt_id" id="txt_id" class="form-control">

                                        <label for="txt_nombre" class="form-label">Nombre</label>
                                        <input type="text" name="txt_nombre" id="txt_nombre" class="form-control">

                                        <label for="txt_apellido" class="form-label">Apellido</label>
                                        <input type="text" name="txt_apellido" id="txt_apellido" class="form-control">

                                        <label for="date_fecha_de_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                        <input type="date" name="date_fecha_de_nacimiento" id="date_fecha_de_nacimiento" class="form-control">

                                        <label for="date_fecha_suscripcion" class="form-label">Fecha de Suscripcion</label>
                                        <input type="date" name="date_fecha_suscripcion" id="date_fecha_suscripcion" class="form-control">

                                        <label for="email_correo_electronico" class="form-label">Correo Electronico</label>
                                        <input type="email" name="email_correo_electronico" id="email_correo_electronico" class="form-control">

                                        <label for="tel_movil" class="form-label">Telefono Movil</label>
                                        <input type="tel" name="tel_movil" id="tel_movil" class="form-control">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary" name="btn_agregar_cliente" id="btn_agregar_cliente">Agregar Cliente</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-12">
                        <table class="table table-dark table-striped table-responsive square xyz-in" xyz="small-100% origin-top">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Fecha de Suscripcion</th>
                                    <th>Correo Electronico</th>
                                    <th>Telefono Movil</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once("../procesos_crud/conexion.php");
                                require_once("../procesos_crud/clientes_crud.php");
                                $sql = "SELECT * FROM clientes";
                                $ejecutar = mysqli_query($conexion, $sql);

                                while ($resultado = mysqli_fetch_assoc($ejecutar)) { ?>
                                    <tr>
                                        <th scope="row"><?= $resultado['cliente_id']; ?></th>
                                        <td><?= $resultado['nombre']; ?></td>
                                        <td><?= $resultado['apellido']; ?></td>
                                        <td><?= $resultado['fecha_nacimiento']; ?></td>
                                        <td><?= $resultado['fecha_suscripcion']; ?></td>
                                        <td><?= $resultado['correo_electronico']; ?></td>
                                        <td><?= $resultado['telefono_movil']; ?></td>
                                        <td>
                                            <form action="../forms/form_clientes.php" method="post" style="display:inline;">
                                                <input type="hidden" name="txt_editar_cliente" value="<?= $resultado['cliente_id']; ?>">
                                                <button type="submit" name="btn_editar_cliente" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                                            </form>
                                            <form action="clientes.php" method="post" style="display:inline;">
                                                <input type="hidden" name="txt_eliminar_cliente" id="txt_eliminar_cliente" value="<?= $resultado['cliente_id']; ?>">
                                                <button type="submit" class="btn btn-danger" name="btn_eliminar" id="btn_eliminar"><i class="bi bi-trash3-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
    </main>

    <!-- MODIFICAR HASTA ACA -->

    </div>
    </div>
    </div>
    </main>
    <footer></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>