<?php

    require_once("conexion.php");

    if (isset($_POST['btn_eliminar'])) {
    $id = $_POST['txt_eliminar_cliente'];
    $sql = "delete from clientes where cliente_id=" . $id;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "Registro eliminado con exito";
        echo "<br><a href ='../vistas/clientes.php'>Regresar</a>";
    } catch (Exception $th) {
        echo "Error al eliminar el registro" . $th;
    }
}

//EN ESTA PARTE SE AGREGA LA OPCION PARA EDITAR LA INFORMACION DE LOS CLIENTES//

if (isset($_POST['guardar_cambios'])) {
    $id = $_POST['txt_id'];
    $nombre = $_POST['txt_nombre'];
    $apellido = $_POST['txt_apellido'];
    $fechaNacimiento = $_POST['date_fecha_de_nacimiento'];
    $fechaSuscripcion = $_POST['date_fecha_de_suscripcion'];
    $correoElectronico = $_POST['email_correo_electronico'];
    $telefonoMovil = $_POST['tel_telefono_movil'];

    $sql = "UPDATE clientes SET 
                nombre = '$nombre', 
                apellido = '$apellido', 
                fecha_nacimiento = '$fechaNacimiento', 
                fecha_suscripcion = '$fechaSuscripcion', 
                correo_electronico = '$correoElectronico',
                telefono_movil = '$telefonoMovil'
            WHERE cliente_id = $id";

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        if ($ejecutar) {
            echo "<br>Datos Modificados con Éxito!";
            echo "<br><a href ='../vistas/clientes.php'>Regresar</a>";
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