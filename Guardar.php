<?php
// establecer la conexión con la base de datos
$servername = "localhost";
$username = "nombre_de_usuario";
$password = "contraseña";
$dbname = "nombre_de_la_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
} 

// recoger los datos del formulario y almacenarlos en variables
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$contrasena = $_POST["contrasena"];

// preparar la consulta SQL para insertar los datos del usuario en la tabla correspondiente
$sql = "INSERT INTO usuarios (nombre, apellido, correo, contrasena) VALUES ('$nombre', '$apellido', '$correo', '$contrasena')";

if ($conn->query($sql) === TRUE) {
    echo "El registro se ha creado correctamente.";
} else {
    echo "Error al crear el registro: " . $conn->error;
}

$conn->close();
?>
