<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Inicializar el array de productos si no existe
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreProducto = trim($_POST['nombre_producto']);
    $precioProducto = floatval($_POST['precio_producto']);

    // Validar que no estén vacíos
    if (!empty($nombreProducto) && $precioProducto > 0) {
        // Añadir producto a la sesión
        $_SESSION['productos'][] = ['nombre' => $nombreProducto, 'precio' => $precioProducto];
    }
}

// Redirigir de nuevo a la página de bienvenida
header('Location: bienvenida.php');
exit();
