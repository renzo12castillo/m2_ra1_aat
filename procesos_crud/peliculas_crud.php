<?php

    require_once("conexion.php");

    if (isset($_POST['btn_eliminar_pelicula'])) {
    $id = $_POST['txt_eliminar_pelicula'];
    $sql = "delete from peliculas where pelicula_id=" . $id;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "Registro eliminado con exito";
        echo "<br><a href ='../vistas/peliculas.php'>Regresar</a>";
    } catch (Exception $th) {
        echo "Error al eliminar el registro" . $th;
    }
}

//EN ESTA PARTE SE AGREGA LA OPCION PARA EDITAR LA INFORMACION DE LOS CLIENTES//

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

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        if ($ejecutar) {
            echo "<br>Datos Modificados con Éxito!";
            echo "<br><a href ='../vistas/peliculas.php'>Regresar</a>";
        } else {
            echo "<br>Error en la consulta: " . mysqli_error($conexion);
        }
    } catch (Exception $e) {
        echo "No se puede modificar: " . $e;
    }
}


//ACA SE AGREGARA EL PROCESO DE INSERCION DE NUEVOS CLIENTES// 

if (isset($_POST['btn_agregar_pelicula'])) {
    $id = $_POST['txt_id_pelicula'];
    $nombre = $_POST['txt_nombre_pelicula'];
    $fechaEstreno = $_POST['date_fecha_estreno'];
    $duracion = $_POST['number_duracion_minutos'];
    $idDirector = $_POST['txt_director_id'];

    echo "<br>Datos de la pelicula: ";
    echo "<br>ID:" . $id;
    echo "<br>Nombre:" . $nombre;
    echo "<br>Fecha de Estreno:" . $fechaEstreno;
    echo "<br>Duracion en Minutos:" . $duracion;
    echo "<br>ID del Director:" . $idDirector;

    $sql = "insert into peliculas (pelicula_id, nombre, fecha_estreno, duracion_minutos, director_id) 
            values ('$id', '$nombre', '$fechaEstreno', '$duracion', '$idDirector'
);";


    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Los datos fueron almacenados con exito";
        header('Location: ../vistas/peliculas.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados, intente nuevamente<br>" . $th;
    }
}


?>