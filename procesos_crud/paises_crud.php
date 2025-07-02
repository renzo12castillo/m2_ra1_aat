<?php
ob_start();
require_once("conexion.php");

$mensaje = null;
$codigo = null;

// === ELIMINAR PAÍS ===
if (isset($_POST['btn_eliminar_pais'])) {
    $id = intval($_POST['txt_eliminar_pais']);

    if ($id > 0) {
        $sql = "DELETE FROM paises WHERE pais_id = $id";

        try {
            $ejecutar = mysqli_query($conexion, $sql);
            if ($ejecutar) {
                header("Location: ../vistas/paises.php?eliminacion=exitosa");
                exit;
            } else {
                header("Location: ../vistas/paises.php?eliminacion=fallida");
                exit;
            }
        } catch (Exception $e) {
            header("Location: ../vistas/paises.php?eliminacion=fallida");
            exit;
        }
    } else {
        header("Location: ../vistas/paises.php?eliminacion=fallida");
        exit;
    }
}

// === EDITAR PAÍS ===
if (isset($_POST['guardar_cambios'])) {
    $idPais = intval($_POST['txt_id_pais_form']);
    $nombre = trim($_POST['txt_nombre_pais_form']);

    if ($idPais > 0 && $nombre !== '') {
        $sql = "UPDATE paises SET nombre = '$nombre' WHERE pais_id = $idPais";

        try {
            $ejecutar = mysqli_query($conexion, $sql);
            if ($ejecutar) {
                header("Location: ../vistas/paises.php?edicion=exitosa");
                exit;
            } else {
                header("Location: ../vistas/paises.php?edicion=fallida");
                exit;
            }
        } catch (Exception $e) {
            header("Location: ../vistas/paises.php?edicion=fallida");
            exit;
        }
    } else {
        header("Location: ../vistas/paises.php?edicion=fallida");
        exit;
    }
}

// === AGREGAR NUEVO PAÍS ===
if (isset($_POST['btn_agregar_pais'])) {
    $id = intval($_POST['txt_id_pais']);
    $nombre = trim($_POST['txt_nombre_pais']);

    if ($id > 0 && $nombre !== '') {
        $sql = "INSERT INTO paises (pais_id, nombre) VALUES ($id, '$nombre')";

        try {
            $ejecutar = mysqli_query($conexion, $sql);
            if ($ejecutar) {
                header("Location: ../vistas/paises.php?registro=exito");
                exit;
            } else {
                header("Location: ../vistas/paises.php?registro=error");
                exit;
            }
        } catch (Exception $e) {
            header("Location: ../vistas/paises.php?registro=error");
            exit;
        }
    } else {
        header("Location: ../vistas/paises.php?registro=error");
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
    text: "<?= $mensaje === 'exito' ? 'El pais fue guardado correctamente.' : 'No se pudo guardar el pais.' ?>",
    icon: "<?= $mensaje === 'exito' ? 'success' : 'error' ?>",
    confirmButtonText: "Aceptar"
}).then(() => {
    window.location.href = "../vistas/paises.php";
});
</script>
<?php endif; ?>
