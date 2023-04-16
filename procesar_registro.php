<?php
// Obtén la información del formulario
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$contrasena = $_POST["contrasena"];

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
    echo "<h1>Registro Exitoso</h1>";
    echo "<p>¡Tu registro ha sido exitoso!</p>";
    echo "<p>Gracias por unirte a nuestra comunidad.</p>";
} else {
    echo "Error al registrar el usuario: " . $stmt->error;
}

// Cierra la conexión a la base de datos
$stmt->close();
$conn->close();
?>
