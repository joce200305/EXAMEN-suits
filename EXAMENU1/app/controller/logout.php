<?php
session_start();

// Eliminar todos los datos de la sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al formulario de in 4icio de sesión
header('Location: ../../login.php');
exit();
?>
