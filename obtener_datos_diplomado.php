<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "ideafundacioni_form24digf";
$password = "Id3a2024$$124";
$dbname = "ideafundacioni_form24f";


// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener datos de la tabla "diplomado"
$sql = "SELECT Datos_D FROM diplomado";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Crear un array para almacenar los datos
    $data = array();

    // Obtener y almacenar los datos en el array
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Devolver los datos en formato JSON
    echo json_encode($data);
} else {
    // Si no hay resultados, devolver un array vacío
    echo json_encode(array());
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
