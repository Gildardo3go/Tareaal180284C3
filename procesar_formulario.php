// Conexión a la base de datos
$servername = "nombre_del_servidor";
$username = "nombre_de_usuario";
$password = "contraseña";
$dbname = "nombre_de_la_base_de_datos";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Procesar la entrada de datos
$nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
$edad = mysqli_real_escape_string($conn, $_POST['edad']);

// Ejecutar la consulta
$sql = "INSERT INTO usuarios (nombre, edad) VALUES ('$nombre', '$edad')";

if (mysqli_query($conn, $sql)) {
    echo "Registro creado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);
