<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$correo = $_POST["correo"];
	$contrasena = $_POST["contrasena"];
	
	// Aquí es donde se puede agregar código para guardar los datos del usuario en una base de datos o realizar otras acciones de registro
}
?>
