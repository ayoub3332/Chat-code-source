<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['username'])) {
    header("Location: chat.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat - Inicio de sesión</title>
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
        <h2>Iniciar sesión</h2>
        <form action="login.php" method="POST">
            <label>Usuario:</label>
            <input type="text" name="username" required><br><br>
            <label>Contraseña:</label>
            <input type="password" name="password" required><br><br>
            <input type="submit" value="Iniciar sesión">
        </form>
        <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
    </div>
</body>
</html>
