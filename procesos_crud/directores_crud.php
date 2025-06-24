<?php

    require_once("conexion.php");

    if (isset($_POST['btn_eliminar_director'])) {
    $id = $_POST['txt_eliminar_director'];
    $sql = "delete from directores where director_id=" . $id;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "Registro eliminado con exito";
        echo "<br><a href ='../vistas/directores.php'>Regresar</a>";
    } catch (Exception $th) {
        echo "Error al eliminar el registro" . $th;
    }
}

//EN ESTA PARTE SE AGREGA LA OPCION PARA EDITAR LA INFORMACION DE LOS CLIENTES//

if (isset($_POST['guardar_cambios'])) {
    $idDirector = $_POST['txt_id_director'];
    $nombre = $_POST['txt_nombre_director'];
    $apellido = $_POST['txt_apellido_director'];
    $idPais = $_POST['txt_id_pais'];

    $sql = "UPDATE directores SET 
                nombre = '$nombre', 
                apellido = '$apellido', 
                pais_id = '$idPais', 
            WHERE director_id = $id";

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        if ($ejecutar) {
            echo "<br>Datos Modificados con Éxito!";
            echo "<br><a href ='../vistas/directores.php'>Regresar</a>";
        } else {
            echo "<br>Error en la consulta: " . mysqli_error($conexion);
        }
    } catch (Exception $e) {
        echo "No se puede modificar: " . $e;
    }
}


//ACA SE AGREGARA EL PROCESO DE INSERCION DE NUEVOS CLIENTES// 

if (isset($_POST['btn_agregar_director'])) {
    $idDirector = $_POST['txt_id_director_add'];
    $nombre = $_POST['txt_nombre_add'];
    $apellido = $_POST['txt_apellido_add'];
    $idPais = $_POST['number_pais_id_add'];

    echo "Datos del cliente: ";
    echo "<br>ID Director:" . $idDirector;
    echo "<br>Nombre:" . $nombre;
    echo "<br>Aplellido:" . $apellido;
    echo "<br>ID Pais:" . $idPais;

    $sql = "insert into directores (director_id, nombre, apellido, pais_id) 
            values ('$idDirector', '$nombre', '$apellido', '$idPais'
);";


    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Los datos fueron almacenados con exito";
        header('Location: ../vistas/directores.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados, intente nuevamente<br>" . $th;
    }
}


?>