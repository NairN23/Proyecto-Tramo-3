<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "Nazer_Nair";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("⚠️ Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"] ?? '';
    $clave = $_POST["pass"] ?? '';

    if (empty($usuario) || empty($clave)) {
        echo "⚠️ Completá usuario y contraseña.";
        exit;
    }

    $sql = "SELECT * FROM usuarios WHERE (usuario = '$usuario' OR email = '$usuario') AND pass = '$clave' AND baja = 'N'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $nombre = $fila["nombre"];
        header("Location: bienvenida.php?nombre=" . urlencode($nombre) . "&mensaje=Sesión iniciada correctamente");
        exit;
    } else {
        echo "❌ Usuario o contraseña incorrectos, o el usuario está dado de baja.";
    }
} else {
    echo "⚠️ No se enviaron datos desde el formulario.";
}

$conn->close();
?>
