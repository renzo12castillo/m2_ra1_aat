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

//EN ESTA PARTE SE AGREGA LA OPCION PARA EDITAR LA INFORMACION DE LOS CLIENTES - AUN NO SE COMPLETA, CHEQUEAR LUEGO//

if (isset($_POST['guardar_cambios'])) {
    $id = $_POST['txt_id'];
    $nombre = $_POST['txt_nombre'];
    $apellido = $_POST['txt_apellido'];
    $fechaNacimiento = $_POST['date_fecha_de_nacimiento'];
    $fechaSuscripcion = $_POST['date_fecha_suscripcion'];
    $correoElectronico = $_POST['email_correo_electronico'];
    $telefonoMovil = $_POST['tel_movil'];

    $sql = "UPDATE ciudadanos SET 
                apellido = '$apellido', 
                nombre = '$nombre', 
                direccion = '$direccion', 
                tel_casa = '$telCasa', 
                tel_movil = '$telMovil',
                email = '$email',
                fechanac = '$fechaNacimiento', 
                cod_nivel_acad = '$nivelAcademico',
                cod_muni = '$municipalidad'
            WHERE dpi = $dpi";

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        if ($ejecutar) {
            echo "<br>Datos Modificados con Éxito!";
            echo "<br><a href ='../vistas/ciudadanos.php'>Regresar</a>";
        } else {
            echo "<br>Error en la consulta: " . mysqli_error($conexion);
        }
    } catch (Exception $e) {
        echo "No se puede modificar: " . $e;
    }
}


//ACA SE AGREGARA EL PROCESO DE INSERCION DE NUEVOS CLIENTES// 

if (isset($_POST['btn_agregar_cliente'])) {
    $id = $_POST['txt_id'];
    $nombre = $_POST['txt_nombre'];
    $apellido = $_POST['txt_apellido'];
    $fechaNacimiento = $_POST['date_fecha_de_nacimiento'];
    $fechaSuscripcion = $_POST['date_fecha_suscripcion'];
    $correoElectronico = $_POST['email_correo_electronico'];
    $telefonoMovil = $_POST['tel_movil'];

    echo "Datos del cliente: ";
    echo "<br>ID:" . $id;
    echo "<br>Nombre:" . $nombre;
    echo "<br>Aplellido:" . $apellido;
    echo "<br>Fecha de Nacimiento:" . $fechaNacimiento;
    echo "<br>Fecha de Suscripcion:" . $fechaSuscripcion;
    echo "<br>Correo Electronico:" . $correoElectronico;
    echo "<br>Telefono Movil:" . $telefonoMovil;

    $sql = "insert into clientes (cliente_id, nombre, apellido, fecha_nacimiento, fecha_suscripcion, correo_electronico, telefono_movil) 
            values ('$id', '$nombre', '$apellido', '$fechaNacimiento', '$fechaSuscripcion', '$correoElectronico', '$telefonoMovil'
);";


    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Los datos fueron almacenados con exito";
        header('Location: ../vistas/clientes.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados, intente nuevamente<br>" . $th;
    }
}


?>