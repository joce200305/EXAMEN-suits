<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}


if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Listado de Productos</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card p-4 shadow-sm">
                    <h3 class="text-center mb-4">Productos Añadidos</h3>

                    
                    <?php if (!empty($_SESSION['productos'])): ?>
                        <ul class="list-group mb-4">
                            <?php foreach ($_SESSION['productos'] as $producto): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo htmlspecialchars($producto['nombre']); ?>
                                    <span class="badge bg-primary rounded-pill">$<?php echo number_format($producto['precio'], 2); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-center">No se han añadido productos aún.</p>
                    <?php endif; ?>

                    
                    <div class="text-center mb-3">
                        <a href="bienvenida.php" class="btn btn-secondary">Regresar a la Página de Bienvenida</a>
                    </div>

                    
                    <div class="text-center">
                        <a class="btn btn-danger" href="app/controller/logout.php">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
