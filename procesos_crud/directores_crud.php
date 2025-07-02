<?php
ob_start();
require_once("conexion.php");

$mensaje = null;
$codigo = null;

//=== ELIMINAR DIRECTOR ===

    if (isset($_POST['btn_eliminar_director'])) {
    $id = intval($_POST['txt_eliminar_director']); // asegura que sea un número

    if ($id > 0) {
        $sql = "DELETE FROM directores WHERE director_id = $id";

        try {
            $ejecutar = mysqli_query($conexion, $sql);
            if ($ejecutar) {
                header('Location: ../vistas/directores.php?eliminacion=exitosa');
                exit;
            } else {
                header('Location: ../vistas/directores.php?eliminacion=fallida');
                exit;
            }
        } catch (Exception $e) {
            header('Location: ../vistas/directores.php?eliminacion=fallida');
            exit;
        }
    } else {
        // ID no válido
        header('Location: ../vistas/directores.php?eliminacion=fallida');
        exit;
    }
}


//EN ESTA PARTE SE AGREGA LA OPCION PARA EDITAR LA INFORMACION DE LOS CLIENTES//

if (isset($_POST['guardar_cambios'])) {
    $idDirector = $_POST['txt_id_director'];
    $nombre = $_POST['txt_nombre_director'];
    $apellido = $_POST['txt_apellido_director'];
    $idPais = $_POST['txt_id_pais'];

    $sql = "UPDATE directores SET 
                director_id = '$idDirector',
                nombre = '$nombre', 
                apellido = '$apellido', 
                pais_id = '$idPais' 
            WHERE director_id = $idDirector";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        if ($ejecutar) {
            header('Location: ../vistas/directores.php?registro=exito');
            exit;
        } else {
            header('Location: ../vistas/directores.php?registro=error');
            exit;
        }
    } catch (Exception $e) {
        header('Location: ../vistas/directores.php?registro=error');
        exit;
    }
}


// === AGREGAR NUEVO DIRECTOR ===
if (isset($_POST['btn_agregar_director'])) {
    $idDirector = intval($_POST['txt_id_director_add']);
    $nombre = $_POST['txt_nombre_add'];
    $apellido = $_POST['txt_apellido_add'];
    $idPais = intval($_POST['number_pais_id_add']);

    $sql = "INSERT INTO directores (director_id, nombre, apellido, pais_id) 
            VALUES ($idDirector, '$nombre', '$apellido', $idPais)";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        if ($ejecutar) {
            header("Location: ../vistas/directores.php?registro=exito");
            exit;
        } else {
            header("Location: ../vistas/directores.php?registro=error");
            exit;
        }
    } catch (Exception $e) {
        header("Location: ../vistas/directores.php?registro=error");
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
    text: "<?= $mensaje === 'exito' ? 'El director fue guardado correctamente.' : 'No se pudo guardar el director.' ?>",
    icon: "<?= $mensaje === 'exito' ? 'success' : 'error' ?>",
    confirmButtonText: "Aceptar"
}).then(() => {
    window.location.href = "../vistas/directores.php";
});
</script>
<?php endif; ?>