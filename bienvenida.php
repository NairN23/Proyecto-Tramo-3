<?php
$nombre = $_GET['nombre'] ?? 'Usuario';
$mensaje = $_GET['mensaje'] ?? 'Bienvenido/a a Phone Store';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenida</title>
</head>
<body>
  <h1>👋 ¡Hola, <?php echo htmlspecialchars($nombre); ?>!</h1>
  <p><?php echo htmlspecialchars($mensaje); ?></p>
</body>
</html>
