<?php

    require_once("conexion.php");

    if (isset($_POST['btn_eliminar_suscripcion'])) {
    $id = $_POST['txt_eliminar_suscripcion'];
    $sql = "delete from suscripciones where suscripcion_id=" . $id;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "Registro eliminado con exito";
        echo "<br><a href ='../vistas/suscripciones.php'>Regresar</a>";
    } catch (Exception $th) {
        echo "Error al eliminar el registro" . $th;
    }
}

//EN ESTA PARTE SE AGREGA LA OPCION PARA EDITAR LA INFORMACION DE LOS CLIENTES//

if (isset($_POST['guardar_cambios'])) {
    $idSuscripcion = $_POST['txt_id_suscripcion_form'];
    $idCliente = $_POST['txt_id_cliente_form'];
    $idPelicula = $_POST['txt_id_pelicula_form'];
    $fechaSuscripcion = $_POST['date_fecha_de_suscripcion_form'];
    $fechaFinalizacion = $_POST['date_fecha_de_finalizacion_form'];
    $precio = $_POST['number_precio_form'];

    $sql = "UPDATE suscripciones SET 
                cliente_id = '$idCliente', 
                pelicula_id = '$idPelicula', 
                fecha_suscripcion = '$fechaSuscripcion', 
                fecha_finalizacion = '$fechaFinalizacion', 
                precio = '$precio'
            WHERE suscripcion_id = $idSuscripcion";

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        if ($ejecutar) {
            echo "<br>Datos Modificados con Éxito!";
            echo "<br><a href ='../vistas/suscripciones.php'>Regresar</a>";
        } else {
            echo "<br>Error en la consulta: " . mysqli_error($conexion);
        }
    } catch (Exception $e) {
        echo "No se puede modificar: " . $e;
    }
}


//ACA SE AGREGARA EL PROCESO DE INSERCION DE NUEVOS CLIENTES// 

if (isset($_POST['btn_agregar_suscripcion'])) {
    $idSuscripcion = $_POST['txt_id_suscripcion_add'];
    $idCliente = $_POST['txt_id_cliente_add'];
    $idPelicula = $_POST['txt_id_pelicula_add'];
    $fechaSuscripcion = $_POST['date_fecha_de_suscripcion'];
    $fechaFinalizacion = $_POST['date_fecha_finalizacion_add'];
    $precio = $_POST['number_precio_add'];

    echo "Datos de la suscripcion: ";
    echo "<br>ID Suscripcion:" . $idSuscripcion;
    echo "<br>ID Cliente:" . $idCliente;
    echo "<br>ID Pelicula:" . $idPelicula;
    echo "<br>Fecha de Suscripcion:" . $fechaSuscripcion;
    echo "<br>Fecha de Finalizacion:" . $fechaFinalizacion;
    echo "<br>Precio:" . $precio;

    $sql = "insert into suscripciones (suscripcion_id, cliente_id, pelicula_id, fecha_suscripcion, fecha_finalizacion, precio) 
            values ('$idSuscripcion', '$idCliente', '$idPelicula', '$fechaSuscripcion', '$fechaFinalizacion', '$precio'
);";


    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Los datos fueron almacenados con exito";
        header('Location: ../vistas/suscripciones.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados, intente nuevamente<br>" . $th;
    }
}


?>