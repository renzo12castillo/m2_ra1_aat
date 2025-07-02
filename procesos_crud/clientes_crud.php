<?php
ob_start();
require_once("conexion.php");

// === ELIMINAR CLIENTE ===
if (isset($_POST['btn_eliminar'])) {
    $id = intval($_POST['txt_eliminar_cliente']);

    if ($id > 0) {
        $sql = "DELETE FROM clientes WHERE cliente_id = $id";

        try {
            $ejecutar = mysqli_query($conexion, $sql);
            if ($ejecutar) {
                header("Location: ../vistas/clientes.php?eliminacion=exitosa");
                exit;
            } else {
                header("Location: ../vistas/clientes.php?eliminacion=fallida");
                exit;
            }
        } catch (Exception $e) {
            header("Location: ../vistas/clientes.php?eliminacion=fallida");
            exit;
        }
    } else {
        header("Location: ../vistas/clientes.php?eliminacion=fallida");
        exit;
    }
}

// === EDITAR CLIENTE ===
if (isset($_POST['guardar_cambios'])) {
    $id = intval($_POST['txt_id']);
    $nombre = trim($_POST['txt_nombre']);
    $apellido = trim($_POST['txt_apellido']);
    $fechaNacimiento = trim($_POST['date_fecha_de_nacimiento']);
    $fechaSuscripcion = trim($_POST['date_fecha_de_suscripcion']);
    $correoElectronico = trim($_POST['email_correo_electronico']);
    $telefonoMovil = trim($_POST['tel_telefono_movil']);

    $sql = "UPDATE clientes SET 
                nombre = '$nombre', 
                apellido = '$apellido', 
                fecha_nacimiento = '$fechaNacimiento', 
                fecha_suscripcion = '$fechaSuscripcion', 
                correo_electronico = '$correoElectronico',
                telefono_movil = '$telefonoMovil'
            WHERE cliente_id = $id";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        if ($ejecutar) {
            header("Location: ../vistas/clientes.php?edicion=exitosa");
            exit;
        } else {
            header("Location: ../vistas/clientes.php?edicion=fallida");
            exit;
        }
    } catch (Exception $e) {
        header("Location: ../vistas/clientes.php?edicion=fallida");
        exit;
    }
}

// === AGREGAR NUEVO CLIENTE ===
if (isset($_POST['btn_agregar_cliente'])) {
    $id = intval($_POST['txt_id']);
    $nombre = trim($_POST['txt_nombre']);
    $apellido = trim($_POST['txt_apellido']);
    $fechaNacimiento = trim($_POST['date_fecha_de_nacimiento']);
    $fechaSuscripcion = trim($_POST['date_fecha_suscripcion']);
    $correoElectronico = trim($_POST['email_correo_electronico']);
    $telefonoMovil = trim($_POST['tel_movil']);

    $sql = "INSERT INTO clientes (cliente_id, nombre, apellido, fecha_nacimiento, fecha_suscripcion, correo_electronico, telefono_movil) 
            VALUES ($id, '$nombre', '$apellido', '$fechaNacimiento', '$fechaSuscripcion', '$correoElectronico', '$telefonoMovil')";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        if ($ejecutar) {
            header("Location: ../vistas/clientes.php?registro=exito");
            exit;
        } else {
            header("Location: ../vistas/clientes.php?registro=error");
            exit;
        }
    } catch (Exception $e) {
        header("Location: ../vistas/clientes.php?registro=error");
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
    window.location.href = "../vistas/clientes.php";
});
</script>
<?php endif; ?>