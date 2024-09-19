<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Iniciar Sesión</title>
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
            max-width: 400px;
        }
        .card-header {
            background-color: #f8f9fa;
            color: #343a40;
            font-size: 1.5rem;
            border-bottom: none;
            text-align: center;
            padding-bottom: 10px;
        }
        .card-body {
            padding-top: 10px;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn {
            border-radius: 10px;
            padding: 8px 12px;
            font-size: 0.875rem;
            border: none; /* Elimina el borde */
        }
        .btn-primary {
            background-color: #f77f7f; /* Rosa */
            color: white;
        }
        .btn-primary:hover {
            background-color: #e63946; /* Rosa más oscuro */
        }
        .btn-secondary {
            background-color: #6a1b9a; /* Morado */
            color: white;
        }
        .btn-secondary:hover {
            background-color: #4a0072; /* Morado más oscuro */
        }
        .text-danger {
            font-size: 0.875rem;
        }
        .icon {
            margin-right: 10px;
        }
        .btn-container {
            display: flex;
            gap: 10px;
        }
        .btn-container > * {
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <i class="fas fa-user icon"></i> Iniciar Sesión
        </div>
        <div class="card-body">
            <form action="app/controller/login.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                </div>
                <div class="btn-container">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</button>
                    <a class="btn btn-secondary" href="registro.php"><i class="fas fa-user-plus"></i> Registrar</a>
                </div>
            </form>
            <?php if (isset($_GET['error']) && $_GET['error'] == '1') echo '<p class="text-danger mt-2">Credenciales inválidas</p>'; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
