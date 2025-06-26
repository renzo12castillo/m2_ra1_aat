<?php 

    $servidor = "localhost";
    $usuario = "root";
    $contrasena = "";
    $basededatos = "fs2025_peliculas";

    $conexion =  mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
    if ($conexion) {
        echo "Conexión exitosa";
    }


/*
if (session_status() === PHP_SESSION_NONE) session_start();

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basededatos = "fs2025_peliculas";

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);

if ($conexion) {
    $_SESSION['toast'] = [
        'mensaje' => '✅ Conexión exitosa a la base de datos.',
        'tipo' => 'success'
    ];
} else {
    $_SESSION['toast'] = [
        'mensaje' => '❌ Error de conexión: ' . mysqli_connect_error(),
        'tipo' => 'danger'
    ];
} */



?>