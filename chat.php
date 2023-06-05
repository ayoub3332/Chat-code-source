<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// Obtener el nombre de usuario actual
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2, h3 {
            color: #333;
        }

        #chatbox {
            height: 300px;
            overflow-y: scroll;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .message {
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
            background-color: #f2f2f2;
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <h2>Bienvenido, <?php echo $username; ?>!</h2>
    <h3>Chat</h3>
    <div id="chatbox"></div>
    <br>
    <input type="text" id="message" placeholder="Mensaje" required>
    <button onclick="sendMessage()">Enviar</button>

    <script>
        function sendMessage() {
            var message = document.getElementById("message").value;
            var chatbox = document.getElementById("chatbox");

            var paragraph = document.createElement("p");
            paragraph.className = "message";
            paragraph.innerHTML = "<strong><?php echo $username ?>:</strong> " + message;

            chatbox.appendChild(paragraph);

            document.getElementById("message").value = "";

            // Desplazar el cuadro de chat al final para mostrar el nuevo mensaje
            chatbox.scrollTop = chatbox.scrollHeight;
        }
    </script>
</body>
</html>
