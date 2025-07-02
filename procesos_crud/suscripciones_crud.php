<?php
ob_start();
require_once("conexion.php");

$mensaje = null;
$codigo = null;

// === ELIMINAR SUSCRIPCIÓN ===
if (isset($_POST['btn_eliminar_suscripcion'])) {
    $id = intval($_POST['txt_eliminar_suscripcion']);

    if ($id > 0) {
        $sql = "DELETE FROM suscripciones WHERE suscripcion_id = $id";

        try {
            $ejecutar = mysqli_query($conexion, $sql);
            if ($ejecutar) {
                header("Location: ../vistas/suscripciones.php?eliminacion=exitosa");
                exit;
            } else {
                header("Location: ../vistas/suscripciones.php?eliminacion=fallida");
                exit;
            }
        } catch (Exception $e) {
            header("Location: ../vistas/suscripciones.php?eliminacion=fallida");
            exit;
        }
    } else {
        header("Location: ../vistas/suscripciones.php?eliminacion=fallida");
        exit;
    }
}

// === EDITAR SUSCRIPCIÓN ===
if (isset($_POST['guardar_cambios'])) {
    $idSuscripcion = intval($_POST['txt_id_suscripcion_form']);
    $idCliente = intval($_POST['txt_id_cliente_form']);
    $idPelicula = intval($_POST['txt_id_pelicula_form']);
    $fechaSuscripcion = trim($_POST['date_fecha_de_suscripcion_form']);
    $fechaFinalizacion = trim($_POST['date_fecha_de_finalizacion_form']);
    $precio = floatval($_POST['number_precio_form']);

    if ($idSuscripcion > 0 && $idCliente > 0 && $idPelicula > 0 && $fechaSuscripcion !== '' && $fechaFinalizacion !== '' && $precio >= 0) {
        $sql = "UPDATE suscripciones SET 
                    cliente_id = $idCliente, 
                    pelicula_id = $idPelicula, 
                    fecha_suscripcion = '$fechaSuscripcion', 
                    fecha_finalizacion = '$fechaFinalizacion', 
                    precio = $precio
                WHERE suscripcion_id = $idSuscripcion";

        try {
            $ejecutar = mysqli_query($conexion, $sql);
            if ($ejecutar) {
                header("Location: ../vistas/suscripciones.php?edicion=exitosa");
                exit;
            } else {
                header("Location: ../vistas/suscripciones.php?edicion=fallida");
                exit;
            }
        } catch (Exception $e) {
            header("Location: ../vistas/suscripciones.php?edicion=fallida");
            exit;
        }
    } else {
        header("Location: ../vistas/suscripciones.php?edicion=fallida");
        exit;
    }
}

// === AGREGAR NUEVA SUSCRIPCIÓN ===
if (isset($_POST['btn_agregar_suscripcion'])) {
    $idSuscripcion = intval($_POST['txt_id_suscripcion_add']);
    $idCliente = intval($_POST['txt_id_cliente_add']);
    $idPelicula = intval($_POST['txt_id_pelicula_add']);
    $fechaSuscripcion = trim($_POST['date_fecha_de_suscripcion']);
    $fechaFinalizacion = trim($_POST['date_fecha_finalizacion_add']);
    $precio = floatval($_POST['number_precio_add']);

    if ($idSuscripcion > 0 && $idCliente > 0 && $idPelicula > 0 && $fechaSuscripcion !== '' && $fechaFinalizacion !== '' && $precio >= 0) {
        $sql = "INSERT INTO suscripciones (suscripcion_id, cliente_id, pelicula_id, fecha_suscripcion, fecha_finalizacion, precio) 
                VALUES ($idSuscripcion, $idCliente, $idPelicula, '$fechaSuscripcion', '$fechaFinalizacion', $precio)";

        try {
            $ejecutar = mysqli_query($conexion, $sql);
            if ($ejecutar) {
                header("Location: ../vistas/suscripciones.php?registro=exito");
                exit;
            } else {
                header("Location: ../vistas/suscripciones.php?registro=error");
                exit;
            }
        } catch (Exception $e) {
            header("Location: ../vistas/suscripciones.php?registro=error");
            exit;
        }
    } else {
        header("Location: ../vistas/suscripciones.php?registro=error");
        exit;
    }
}
ob_end_flush();
?>

<?php if ($mensaje): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
    title: "<?= $mensaje === 'exito' ? '¡Éxito!' : 'Error' ?>",
    text: "<?= $mensaje === 'exito' ? 'La suscripcion fue guardada correctamente.' : 'No se pudo guardar la suscripcion.' ?>",
    icon: "<?= $mensaje === 'exito' ? 'success' : 'error' ?>",
    confirmButtonText: "Aceptar"
}).then(() => {
    window.location.href = "../vistas/suscripciones.php";
});
</script>
<?php endif; ?>
