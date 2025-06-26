<?php
session_start();
$usuario = $_SESSION['usuario'] ?? 'Invitado';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenido/a</title>
</head>
<body>
  <h1 style="text-align: center; margin-top: 100px;">✅ Sesión iniciada correctamente</h1>
  <p style="text-align: center;">Bienvenido/a, <strong><?php echo htmlspecialchars($usuario); ?></strong> a Phone Store.</p>
</body>
</html>
