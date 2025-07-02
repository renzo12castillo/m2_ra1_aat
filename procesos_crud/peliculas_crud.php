<?php
ob_start();
require_once("conexion.php");

$mensaje = null;
$codigo = null;

// === ELIMINAR PELÍCULA ===
if (isset($_POST['btn_eliminar_pelicula'])) {
    $id = intval($_POST['txt_eliminar_pelicula']);
    $sql = "DELETE FROM peliculas WHERE pelicula_id = $id";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        if ($ejecutar) {
            header('Location: ../vistas/peliculas.php?eliminacion=exitosa');
            exit;
        } else {
            header('Location: ../vistas/peliculas.php?eliminacion=fallida');
            exit;
        }
    } catch (Exception $e) {
        header('Location: ../vistas/peliculas.php?eliminacion=fallida');
        exit;
    }
}

// === AGREGAR PELÍCULA ===
if (isset($_POST['btn_agregar_pelicula'])) {
    $id = $_POST['txt_id_pelicula'];
    $nombre = $_POST['txt_nombre_pelicula'];
    $fechaEstreno = $_POST['date_fecha_estreno'];
    $duracion = $_POST['number_duracion_minutos'];
    $idDirector = $_POST['txt_director_id'];

    $sql = "INSERT INTO peliculas (pelicula_id, nombre, fecha_estreno, duracion_minutos, director_id) 
            VALUES ('$id', '$nombre', '$fechaEstreno', '$duracion', '$idDirector')";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        if ($ejecutar) {
            header('Location: ../vistas/peliculas.php?registro=exito');
            exit;
        } else {
            header('Location: ../vistas/peliculas.php?registro=error');
            exit;
        }
    } catch (Exception $e) {
        header('Location: ../vistas/peliculas.php?registro=error');
        exit;
    }
}

// === EDITAR PELÍCULA ===
if (isset($_POST['guardar_cambios_peliculas'])) {
    $codigo = intval($_POST['txt_id_pelicula_form']); // Guardamos el ID
    $nombre = $_POST['txt_nombre_pelicula_form'];
    $fechaEstreno = $_POST['date_fecha_estreno_form'];
    $duracion = $_POST['number_duracion_min_form'];
    $idDirector = $_POST['txt_id_director_form'];

    $sql = "UPDATE peliculas SET 
                nombre = '$nombre', 
                fecha_estreno = '$fechaEstreno', 
                duracion_minutos = '$duracion', 
                director_id = '$idDirector' 
            WHERE pelicula_id = $codigo";

    $ejecutar = mysqli_query($conexion, $sql);
    $mensaje = $ejecutar ? "exito" : "error";
}

// === FORMULARIO DE EDICIÓN ===
if (isset($_POST['txt_editar_pelicula'])) {
    $codigo = intval($_POST['txt_editar_pelicula']);

    $sql = "SELECT * FROM peliculas WHERE pelicula_id = $codigo";
    $ejecutar = mysqli_query($conexion, $sql);
    $resultado = mysqli_fetch_assoc($ejecutar);

    if (!$resultado) {
        die("No se encontró la película con ID $codigo.");
    }
}

ob_end_flush();
?>

<?php if ($mensaje): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
    title: "<?= $mensaje === 'exito' ? '¡Éxito!' : 'Error' ?>",
    text: "<?= $mensaje === 'exito' ? 'Los cambios fueron guardados correctamente.' : 'No se pudo actualizar la película.' ?>",
    icon: "<?= $mensaje === 'exito' ? 'success' : 'error' ?>",
    confirmButtonText: "Aceptar"
}).then(() => {
    window.location.href = "../vistas/peliculas.php";
});
</script>
<?php endif; ?>


