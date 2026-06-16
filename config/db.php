<?php

// ===================== DATOS DE CONEXIÓN A MYSQL ===================== 
$servidor  = "localhost";
$usuario   = "root";
$password  = "";
$basedatos = "gimnasio";

// ===================== CREACIÓN DE LA CONEXIÓN ===================== 
$conexion = new mysqli($servidor, $usuario, $password, $basedatos);

// ===================== COMPROBACIÓN DE ERRORES ===================== 
if ($conexion->connect_error) {
    die("Error al conectar con la base de datos: " . $conexion->connect_error);
}

// ===================== CONFIGURACIÓN DE CODIFICACIÓN ===================== 
$conexion->set_charset("utf8mb4");