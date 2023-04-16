<?php
// Obtén la información del formulario y asegúrate de que no contenga caracteres peligrosos
$nombre = htmlspecialchars($_POST["nombre"]);
$apellido = htmlspecialchars($_POST["apellido"]);
$email = htmlspecialchars($_POST["email"]);
$contrasena = htmlspecialchars($_POST["contrasena"]);

// Valida que los campos no estén vacíos
if (empty($nombre) || empty($apellido) || empty($email) || empty($contrasena)) {
    die("Error: Todos los campos son requeridos.");
}

// Conecta con la base de datos
require_once "config.php";

// Prepara la consulta SQL para insertar un nuevo usuario en la tabla "usuarios"
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email, contrasena) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $apellido, $email, $contrasena);

// Ejecuta la consulta y maneja los errores
if ($stmt->execute()) {
    echo "Usuario registrado exitosamente.";
} else {
    echo "Error al registrar el usuario: " . $stmt->error;
}

// Cierra la conexión a la base de datos
$stmt->close();
$conn->close();
?>
