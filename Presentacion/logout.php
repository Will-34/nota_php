<?php
session_start(); // Inicia la sesión si no está iniciada
session_unset();  // Desvincula todas las variables de sesión
session_destroy(); // Destruye la sesión

header("Location: PLogin.php"); // Redirige a la página de inicio de sesión o a donde desees.
exit();
?>
