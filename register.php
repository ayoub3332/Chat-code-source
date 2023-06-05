<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['username'])) {
    header("Location: chat.php");
    exit;
}

// Procesar el formulario de registro
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Validar y sanitizar los datos recibidos del formulario
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Guardar los datos en algún lugar (base de datos, archivo, etc.)
    // Aquí, simplemente mostramos el usuario y la contraseña en pantalla
    echo "Usuario registrado: $username<br>";
    echo "Contraseña: $password<br>";

    // Iniciar sesión automáticamente después del registro
    $_SESSION['username'] = $username;
    header("Location: chat.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat - Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h2 {
            color: #333;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 10px;
            text-align: center;
        }

        a {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrarse</h2>
        <form action="register.php" method="POST">
            <label>Usuario:</label>
            <input type="text" name="username" required><br><br>
            <label>Contraseña:</label>
            <input type="password" name="password" required><br><br>
            <input type="submit" value="Registrarse">
        </form>
        <p>¿Ya tienes una cuenta? <a href="index.php">Inicia sesión aquí</a></p>
    </div>
</body>
</html>
