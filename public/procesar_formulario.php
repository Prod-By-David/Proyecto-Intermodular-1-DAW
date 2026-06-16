<?php

// Importo la conexión a la base de datos desde la carpeta de configuración
require_once __DIR__ . '/../config/db.php';

// Función para centralizar la redirección al formulario con un código de error
function redirigirError() {
    // Redirige al index pasando el error por GET y moviendo el foco al ancla de contacto
    header("Location: index.php?error=1#contacto");
    // Corto la ejecución del script para que no siga procesando código
    exit();
}

// Compruebo si los datos están llegando a través del método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recojo los datos del formulario limpiando los espacios en blanco de los extremos
    $nombre    = trim($_POST["nombre"]);
    $apellidos = trim($_POST["apellidos"]);
    $telefono  = trim($_POST["telefono"]);
    // Recojo la actividad seleccionada (en este caso no hace falta trim)
    $actividad = $_POST["actividad"];

    // Validación: si alguno de los campos obligatorios está vacío, lanzo el error
    if ($nombre == "" || $apellidos == "" || $telefono == "" || $actividad == "") {
        redirigirError();
    }

    // Compruebo con una expresión regular que el teléfono solo tenga números (entre 9 y 15 dígitos)
    if (!preg_match("/^[0-9]{9,15}$/", $telefono)) {
        redirigirError();
    }

    // Estructura condicional para decidir en qué tabla de la base de datos se inserta según la actividad
    if ($actividad == "funcional") {
        $tabla = "personas_funcional";

    } elseif ($actividad == "hyrox") {
        $tabla = "personas_hyrox";

    } elseif ($actividad == "pack") {
        $tabla = "personas_pack";

    // Si nos meten una actividad que no existe, mandamos a error por seguridad
    } else {
        redirigirError();
    }

    // Preparo la consulta SQL usando placeholders (?) para evitar inyección SQL
    $sql = "INSERT INTO $tabla (nombre, apellidos, telefono) VALUES (?, ?, ?)";

    // Preparamos la sentencia con el objeto de conexión ($conexion viene del db.php)
    $stmt = $conexion->prepare($sql);

    // Si la preparación de la consulta ha sido correcta, procedemos
    if ($stmt) {

        // Vinculamos las variables a los placeholders indicando que los tres parámetros son strings ("sss")
        $stmt->bind_param("sss", $nombre, $apellidos, $telefono);

        // Ejecutamos la consulta en la base de datos y comprobamos si va bien
        if ($stmt->execute()) {
            // Si se inserta correctamente, redirigimos al index con un mensaje de éxito
            header("Location: index.php?ok=1#contacto");
        } else {
            // Si falla la ejecución, mandamos al error
            redirigirError();
        }

        // Cerramos la sentencia preparada para liberar memoria
        $stmt->close();

    } else {
        // Si la preparación de la consulta falla (error de sintaxis, tabla mal, etc.), redirigimos
        redirigirError();
    }

    // Cerramos la conexión general con la base de datos
    $conexion->close();
    // Finalizamos el script tras el flujo del POST
    exit();

} else {
    // Si intentan entrar al archivo directamente sin hacer POST, los devuelvo al index
    header("Location: index.php");
    exit();
}