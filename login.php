<?php
session_start(); // 👈 Esto activa el uso de sesiones

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "Nazer_Nair");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Capturar los datos del formulario
$usuario = $_POST['usuario'] ?? '';
$pass = $_POST['pass'] ?? '';

// Verificar si el usuario y la contraseña coinciden
$sql = "SELECT * FROM usuarios WHERE (usuario = '$usuario' OR email = '$usuario') AND pass = '$pass'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows === 1) {
    $_SESSION['usuario'] = $usuario; // 👈 Guardás el nombre en sesión
    header("Location: bienvenida.php");
    exit;
} else {
    echo "❌ Usuario o contraseña incorrectos.";
}

$conexion->close();
?>
