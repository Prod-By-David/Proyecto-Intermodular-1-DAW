<?php
// Inicia o recupera la sesión del usuario para mantener el estado de autenticación
session_start();

// ===================== ELIMINAR REGISTRO ===================== //
// Comprueba si llegan por la URL (GET) las variables para borrar un alumno
if (isset($_GET['delete'], $_GET['id'], $_GET['tabla'])) {
    // Carga la conexión a la base de datos de forma única usando ruta absoluta
    require_once __DIR__ . '/../config/db.php';

    // Fuerza que el ID recibido sea un número entero por seguridad
    $id = (int) $_GET['id'];
    // Guarda el nombre de la tabla que viene por la URL
    $tabla = $_GET['tabla'];

    // Lista blanca con las tablas que se pueden tocar para evitar inyección SQL
    $tablas_permitidas = [
        'personas_funcional',
        'personas_hyrox',
        'personas_pack'
    ];

    // Valida que la tabla recibida coincide exactamente con las permitidas
    if (in_array($tabla, $tablas_permitidas)) {

        // Define la consulta SQL de borrado usando un marcador de posición para el ID
        $sql = "DELETE FROM $tabla WHERE id = ?";
        // Prepara la sentencia SQL en el servidor para evitar ataques
        $stmt = $conexion->prepare($sql);

        // Si la preparación de la consulta ha sido correcta
        if ($stmt) {
            // Vincula el ID como un parámetro de tipo entero ("i") a la consulta
            $stmt->bind_param("i", $id);
            // Ejecuta la consulta de borrado en la base de datos
            $stmt->execute();
            // Cierra la sentencia para liberar memoria en el servidor
            $stmt->close();
        }
    }

    // Redirige al usuario de vuelta al listado para refrescar la pantalla
    header("Location: lista_inscritos.php");
    // Corta la ejecución del script para asegurar que la redirección se procese
    exit;
}

// ===================== EDITAR REGISTRO ===================== //
// Comprueba si se ha enviado el formulario de actualización por método POST
if (isset($_POST['update_user'])) {
    // Incluye el archivo de conexión a la base de datos
    require_once __DIR__ . '/../config/db.php';

    // Castea el ID recibido por POST a entero para sanear el dato
    $id = (int) $_POST['id'];
    // Almacena el nombre de la tabla enviado desde el formulario oculto
    $tabla = $_POST['tabla'];

    // Limpia los espacios en blanco de los extremos y asigna un string vacío si es nulo
    $nombre = trim($_POST['nombre'] ?? '');
    // Limpia los espacios del apellido recibido o inicializa la variable vacía
    $apellidos = trim($_POST['apellidos'] ?? '');
    // Limpia los espacios del número de teléfono recibido
    $telefono = trim($_POST['telefono'] ?? '');

    // Array de seguridad con las tablas permitidas para la edición
    $tablas_permitidas = [
        'personas_funcional',
        'personas_hyrox',
        'personas_pack'
    ];

    // Comprueba que la tabla enviada por el formulario está permitida
    if (in_array($tabla, $tablas_permitidas)) {

        // Define la consulta de actualización con marcadores de posición para los datos
        $sql = "UPDATE $tabla 
                SET nombre = ?, apellidos = ?, telefono = ? 
                WHERE id = ?";

        // Prepara la consulta parametrizada para la base de datos
        $stmt = $conexion->prepare($sql);

        // Si la sentencia se preparó sin errores
        if ($stmt) {
            // Asocia las variables (3 strings y 1 entero) a los marcadores de la SQL
            $stmt->bind_param("sssi", $nombre, $apellidos, $telefono, $id);
            // Ejecuta los cambios en la fila correspondiente del alumno
            $stmt->execute();
            // Cierra el objeto de la sentencia preparada
            $stmt->close();
        }
    }

    // Redirecciona al panel principal para ver los datos modificados
    header("Location: lista_inscritos.php");
    // Finaliza el flujo del programa tras la redirección
    exit;
}

// ===================== LOGIN ===================== //
// Define la contraseña estática del administrador directamente en el código
$password_admin = "owovadmins";

// Verifica si se ha recibido un intento de login enviando una contraseña
if (isset($_POST['password'])) {
    // Comprueba si la contraseña introducida coincide estrictamente con la guardada
    if ($_POST['password'] === $password_admin) {
        // Si coincide, crea la variable de sesión indicando que está logueado como admin
        $_SESSION['admin'] = true;
    } else {
        // Si falla, define el mensaje de error que se pintará en el HTML
        $error_login = "Contraseña incorrecta";
    }
}

// ===================== LOGOUT ===================== //
// Comprueba si llega la variable 'logout' por la URL para cerrar la sesión
if (isset($_GET['logout'])) {
    // Destruye toda la información registrada en la sesión actual
    session_destroy();
    // Redirige al index del panel (que ahora pedirá login)
    header("Location: lista_inscritos.php");
    // Detiene la ejecución del script PHP
    exit;
}

// ===================== PROTECCIÓN LOGIN ===================== //
// Si el usuario no tiene la sesión de administrador activa, se ejecuta este bloque
if (!isset($_SESSION['admin'])) {
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Iniciar Sesión - OWOV</title>
<link rel="icon" href="../assets/img/favicon.png">
<style>
:root { 
    --green: #CCFD32; 
    --bg: #000; 
    --card: #1c1c1c; 
}

body {
    margin: 0;
    font-family: Arial;
    background: var(--bg);
    color: var(--green);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
}

.login-box {
    background: var(--card);
    padding: 35px;
    border: 1px solid var(--green);
    border-radius: 10px;
    width: 340px;
    display: flex;
    flex-direction: column;
    align-items: center; 
}

input, button {
    box-sizing: border-box; 
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border-radius: 10px;
}

input {
    background: #1c1c1c;
    border: 1px solid var(--green);
    color: var(--green);
}

input:focus {
    border-color: var(--green);
    outline: none;
}

button {
    background: var(--green);
    border: none;
    font-weight: bold;
    cursor: pointer;
}

.error { 
    color: red; 
    margin-top: 10px; 
}

.btn-web {
    margin-top: 30px;
    display: inline-block;
    width: 240px;
    padding: 12px;
    background: var(--green);
    color: black;
    text-decoration: none;
    border-radius: 10px;
    font-weight: bold;
    text-align: center;
    box-sizing: border-box;
}
</style>
</head>
<body>

<div class="login-box">
    <h2>Iniciar Sesión</h2>
    <form method="POST">
        <input type="password" name="password" placeholder="Contraseña">
        <button type="submit">Entrar</button>
    </form>

    <?php if (isset($error_login)) echo "<p class='error'>$error_login</p>"; ?>
</div>

<a class="btn-web" href="../public/index.php">Volver a la web</a>

</body>
</html>

<?php
// Detiene la ejecución aquí para que el resto del panel privado no se cargue ni sea visible
exit;
}

// ===================== CONEXIÓN BD ===================== //
// Incluye la conexión a la base de datos necesaria para pintar el listado inferior
require_once __DIR__ . '/../config/db.php';

// ===================== TABLAS ===================== //
// Mapa asociativo que relaciona el título de la actividad con su tabla física en MySQL
$tablas_actividades = [
    'Entrenamiento Funcional' => 'personas_funcional',
    'Preparación HYROX' => 'personas_hyrox',
    'Pack Completo' => 'personas_pack'
];

// ===================== EDITAR USUARIO ===================== //
// Inicializa las variables de edición en nulo para evitar avisos de variables indefinidas
$edit_data = null;
$edit_tabla = null;

// Comprueba si están configurados los parámetros de edición en la URL
if (isset($_GET['edit'], $_GET['id'], $_GET['tabla'])) {

    // Almacena y convierte a entero el ID del alumno que se quiere editar
    $edit_id = (int) $_GET['id'];
    // Almacena el nombre de la tabla de la que proviene el alumno
    $edit_tabla = $_GET['tabla'];

    // Filtro de seguridad (lista blanca) para evitar inyecciones en el FROM de la SQL
    $tablas_permitidas = [
        'personas_funcional',
        'personas_hyrox',
        'personas_pack'
    ];

    // Valida que la tabla sea una de las tres del sistema deportivo
    if (in_array($edit_tabla, $tablas_permitidas)) {

        // Prepara la consulta para seleccionar todos los campos del alumno seleccionado
        $sql = "SELECT * FROM $edit_tabla WHERE id = ?";
        // Compila la consulta en la conexión activa
        $stmt = $conexion->prepare($sql);

        // Si la base de datos dio el visto bueno a la consulta preparada
        if ($stmt) {
            // Vincula el ID del alumno como un número entero en el marcador de la SQL
            $stmt->bind_param("i", $edit_id);
            // Lanza la consulta contra la base de datos
            $stmt->execute();
            // Recupera el conjunto de resultados devuelto por la ejecución
            $result = $stmt->get_result();

            // Verifica si se ha encontrado al menos una fila con ese ID
            if ($result && $result->num_rows > 0) {
                // Extrae los datos del alumno en un array asociativo clave-valor
                $edit_data = $result->fetch_assoc();
            }

            // Cierra la sentencia para liberar los recursos asignados
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel Inscripciones - OWOV</title>
<link rel="icon" href="../assets/img/favicon.png">
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;500;700&display=swap" rel="stylesheet">
<style>
:root {
    --green:#CCFD32;
    --bg:#000;
    --card:#1c1c1c;
    --border:#3d3d3d;
}

body {
    margin:0;
    padding:40px;
    background:var(--bg);
    color:var(--green);
    font-family:'Oswald',sans-serif;
}

header {
    display:flex;
    justify-content:space-between;
    align-items:center;
    border-bottom:2px solid var(--green);
    margin-bottom:30px;
}

.btn {
    padding:8px 12px;
    border:1px solid var(--green);
    color:var(--green);
    text-decoration:none;
    border-radius:10px;
}

.btn:hover {
    background:var(--green);
    color:black;
}

table {
    width:100%;
    border-collapse:collapse;
    background:var(--card);
}

th, td {
    padding:12px;
    text-align:center;
    border-bottom:1px solid var(--border);
}

.actions a {
    margin:4px;
    padding:6px 10px;
    border:1px solid var(--green);
    border-radius:8px;
    text-decoration:none;
    color:var(--green);
}

.actions a:hover {
    background:var(--green);
    color:black;
}

.form-edit {
    background:#1c1c1c;
    padding:20px;
    margin-bottom:20px;
    border-radius:10px;
}

input {
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:8px;
    border:1px solid var(--green);
    background:#000;
    color:var(--green);
}
</style>
</head>
<body>
<header>
    <h1>PANEL DE INSCRIPCIONES</h1>
    <div>
        <a class="btn" href="../public/index.php">Web</a>
        <a class="btn" href="?logout=1">Cerrar sesión</a>
    </div>
</header>

<?php if ($edit_data): ?>
<div class="form-edit">
    <h2>Editar Usuario</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $edit_data['id'] ?>">
        <input type="hidden" name="tabla" value="<?= htmlspecialchars($edit_tabla) ?>">
        <input type="text" name="nombre" value="<?= htmlspecialchars($edit_data['nombre']) ?>">
        <input type="text" name="apellidos" value="<?= htmlspecialchars($edit_data['apellidos']) ?>">
        <input type="text" name="telefono" value="<?= htmlspecialchars($edit_data['telefono']) ?>">
        <button type="submit" name="update_user">Guardar cambios</button>
    </form>
</div>
<?php endif; ?>

<?php foreach ($tablas_actividades as $nombre => $tabla): ?>

<div style="background:#1c1c1c;padding:20px;margin-bottom:20px;border-radius:10px;">
    <h2><?= htmlspecialchars($nombre) ?></h2>

<?php
    // Define la consulta SQL dinámica apuntando a la tabla del bucle actual y ordenando por los últimos añadidos
    $sql = "SELECT id, nombre, apellidos, telefono FROM $tabla ORDER BY id DESC";
    // Lanza la consulta directa a MySQL usando la conexión activa de forma síncrona
    $resultado = $conexion->query($sql);
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
        <?php while ($row = $resultado->fetch_assoc()): ?>
            <tr>
                <td>#<?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['nombre'].' '.$row['apellidos']) ?></td>
                <td><?= htmlspecialchars($row['telefono']) ?></td>
                <td class="actions">
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= preg_replace('/[^0-9]/','',$row['telefono']) ?>">WhatsApp</a>
                    <a href="?edit=1&id=<?= $row['id'] ?>&tabla=<?= $tabla ?>">Editar</a>
                    <a href="?delete=1&id=<?= $row['id'] ?>&tabla=<?= $tabla ?>" onclick="return confirm('¿Eliminar usuario?');">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php endforeach; ?>

</body>
</html>

<?php 
// Cierra formalmente la conexión abierta con el servidor MySQL para liberar recursos de red
$conexion->close(); 
?>