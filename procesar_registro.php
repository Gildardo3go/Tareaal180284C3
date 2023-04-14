<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establecer conexión a la base de datos
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "myDB";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Verificar la conexión
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Procesar la entrada de datos
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $edad = mysqli_real_escape_string($conn, $_POST['edad']);

    // Validar la entrada de datos
    $errors = array();
    if (empty($nombre)) {
        $errors[] = "El nombre es obligatorio";
    }
    if (empty($edad)) {
        $errors[] = "La edad es obligatoria";
    }
    if (!is_numeric($edad)) {
        $errors[] = "La edad debe ser un número";
    }

    // Si hay errores, mostrarlos
    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
    } else {
        // Crear sentencia preparada
        $stmt = mysqli_prepare($conn, "INSERT INTO usuarios (nombre, edad) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "si", $nombre, $edad);

        // Ejecutar la sentencia
        if (mysqli_stmt_execute($stmt)) {
            echo "Registro creado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Cerrar la conexión y liberar recursos
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}
?>