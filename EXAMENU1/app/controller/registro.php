<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $errors = [];

    // Validar que ningún campo esté vacío
    if (empty($nombre) || empty($apellido) || empty($email) || empty($password)) {
        $errors[] = "Todos los campos son obligatorios.";
    }

    // Validar que el nombre y el apellido solo contengan letras y espacios
    if (!preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
        $errors[] = "El nombre solo debe contener letras y espacios.";
    }
    if (!preg_match("/^[a-zA-Z\s]+$/", $apellido)) {
        $errors[] = "El apellido solo debe contener letras y espacios.";
    }

    // Validar formato del correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El correo electrónico no tiene un formato válido.";
    }

    if (count($errors) > 0) {
        echo '<div class="alert alert-danger">';
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        echo '</div>';
    } else {
        // Guardar los datos del usuario en la sesión
        $_SESSION['usuarios'][$email] = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'password' => $password // En un entorno real, deberías almacenar un hash de la contraseña
        ];

        // Redirigir al login después del registro
        header('Location: ../../login.php');
        exit();
    }
}
?>