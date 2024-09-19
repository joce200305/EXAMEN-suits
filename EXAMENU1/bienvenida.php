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

    // Validar que no estén vacíos y que el precio sea positivo
    if (!empty($nombreProducto) && $precioProducto > 0) {
        // Añadir producto a la sesión
        $_SESSION['productos'][] = ['nombre' => $nombreProducto, 'precio' => $precioProducto];
    } else {
        // Mostrar mensaje de error si el formulario no es válido
        $error = 'Nombre del producto o precio no válidos.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Bienvenido</title>
    <style>
        body {
            background-image: linear-gradient(to top, #f7a8b8 0%, #f5c1e2 100%);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .card {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }
        .btn-primary {
            background-color: #f77f7f; /* Rosa */
            color: white;
            border-radius: 10px;
            padding: 8px 12px;
        }
        .btn-primary:hover {
            background-color: #e63946; /* Rosa más oscuro */
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
            border-radius: 10px;
            padding: 8px 12px;
        }
        .btn-danger:hover {
            background-color: #c82333; /* Rojo más oscuro */
        }
        .badge {
            font-size: 1rem;
        }
        .alert-danger {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="card">
        <h3 class="text-center mb-4">Bienvenido, <?php echo htmlspecialchars($_SESSION['usuarios'][$_SESSION['user']]['nombre']); ?></h3>

        <!-- Mostrar mensaje de error si existe -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <!-- Formulario para ingresar producto -->
        <form action="bienvenida.php" method="POST" class="mb-4">
            <div class="mb-3">
                <label for="nombre_producto" class="form-label">Nombre producto</label>
                <input type="text" id="nombre_producto" name="nombre_producto" class="form-control" placeholder="Nombre del producto" required>
            </div>
            <div class="mb-3">
                <label for="precio_producto" class="form-label">Precio producto</label>
                <input type="number" id="precio_producto" name="precio_producto" step="0.01" class="form-control" placeholder="Precio del producto" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 btn-lg">Agregar producto</button>
        </form>

        <!-- Mostrar listado de productos -->
        <?php if (!empty($_SESSION['productos'])): ?>
            <h4 class="mb-3">Productos añadidos:</h4>
            <ul class="list-group">
                <?php foreach ($_SESSION['productos'] as $producto): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo htmlspecialchars($producto['nombre']); ?>
                        <span class="badge bg-primary rounded-pill">$<?php echo number_format($producto['precio'], 2); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-center mt-3">No se han añadido productos aún.</p>
        <?php endif; ?>

        <!-- Botón para cerrar sesión -->
        <div class="text-center mt-4">
            <a class="btn btn-danger w-100 btn-lg" href="app/controller/logout.php">Cerrar Sesión</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
