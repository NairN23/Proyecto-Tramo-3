<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "Nazer_Nair"; // Asegurate que sea el nombre correcto

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("⚠️ Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $email = $_POST['email'] ?? '';
    $pass = $_POST['pass'] ?? '';
    $perfil_id = $_POST['perfil_id'] ?? null;
    $baja = $_POST['baja'] ?? 'N';

    if (empty($usuario) || empty($nombre) || empty($apellido) || empty($email) || empty($pass)) {
        echo "⚠️ Faltan completar campos obligatorios.";
        exit;
    }

    $verificar = "SELECT * FROM usuarios WHERE usuario = '$usuario' OR email = '$email'";
    $resultado = $conn->query($verificar);

    if ($resultado->num_rows > 0) {
        echo "⚠️ El nombre de usuario o el email ya están registrados.";
    } else {
        $sql = "INSERT INTO usuarios (usuario, nombre, apellido, email, pass, perfil_id, baja) 
                VALUES ('$usuario', '$nombre', '$apellido', '$email', '$pass', '$perfil_id', '$baja')";

        if ($conn->query($sql) === TRUE) {
            header("Location: bienvenida.php?nombre=" . urlencode($nombre) . "&mensaje=Registro exitoso");
            exit;
        } else {
            echo "❌ Error al registrar: " . $conn->error;
        }
    }
} else {
    echo "⚠️ No se enviaron datos desde el formulario.";
}

$conn->close();
?>
