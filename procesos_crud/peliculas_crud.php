<?php
ob_start(); 
require_once("conexion.php");


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

// === EDITAR PELÍCULA ===
if (isset($_POST['guardar_cambios_peliculas'])) {
    $id = $_POST['txt_id_pelicula_form'];
    $nombre = $_POST['txt_nombre_pelicula_form'];
    $fechaEstreno = $_POST['date_fecha_estreno_form'];
    $duracion = $_POST['number_duracion_min_form'];
    $idDirector = $_POST['txt_id_director_form'];

    $sql = "UPDATE peliculas SET 
                nombre = '$nombre', 
                fecha_estreno = '$fechaEstreno', 
                duracion_minutos = '$duracion', 
                director_id = '$idDirector' 
            WHERE pelicula_id = $id";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        if ($ejecutar) {
            // Redirigir con éxito de edición
            header('Location: ../vistas/peliculas.php?edicion=exitosa');
            exit;
        } else {
            header('Location: ../vistas/peliculas.php?edicion=fallida');
            exit;
        }
    } catch (Exception $e) {
        header('Location: ../vistas/peliculas.php?edicion=fallida');
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

ob_end_flush(); // Liberar el buffer
?>
