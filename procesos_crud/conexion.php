<?php

    $servidor = "localhost";
    $usuario = "root";
    $contrasena = "";
    $basededatos = "fs2025_peliculas";

    $conexion =  mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
    if ($conexion) {
        echo "Conexión exitosa";
    }


?>