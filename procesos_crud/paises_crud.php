<?php

    require_once("conexion.php");

    if (isset($_POST['btn_eliminar_pais'])) {
    $id = $_POST['txt_eliminar_pais'];
    $sql = "delete from paises where pais_id=" . $id;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "Registro eliminado con exito";
        echo "<br><a href ='../vistas/paises.php'>Regresar</a>";
    } catch (Exception $th) {
        echo "Error al eliminar el registro" . $th;
    }
}

//EN ESTA PARTE SE AGREGA LA OPCION PARA EDITAR LA INFORMACION DE LOS CLIENTES//

if (isset($_POST['guardar_cambios'])) {
    $idPais = $_POST['txt_id_pais_form'];
    $nombre = $_POST['txt_nombre_pais_form'];
    $sql = "UPDATE paises SET 
                pais_id = '$idPais', 
                nombre = '$nombre'
            WHERE pais_id = $idPais";

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        if ($ejecutar) {
            echo "<br>Datos Modificados con Éxito!";
            echo "<br><a href ='../vistas/paises.php'>Regresar</a>";
        } else {
            echo "<br>Error en la consulta: " . mysqli_error($conexion);
        }
    } catch (Exception $e) {
        echo "No se puede modificar: " . $e;
    }
}


//ACA SE AGREGARA EL PROCESO DE INSERCION DE NUEVOS CLIENTES// 

if (isset($_POST['btn_agregar_pais'])) {
    $id = $_POST['txt_id_pais'];
    $nombre = $_POST['txt_nombre_pais'];

    echo "Datos del Pais: ";
    echo "<br>ID:" . $id;
    echo "<br>Nombre:" . $nombre;

    $sql = "insert into paises (pais_id, nombre) 
            values ('$id', '$nombre'
);";


    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Los datos fueron almacenados con exito";
        header('Location: ../vistas/paises.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados, intente nuevamente<br>" . $th;
    }
}


?>