<?php
$servername = "localhost";
$username = "ideafundacioni_form24digf";
$password = "Id3a2024$$124";
$dbname = "ideafundacioni_form24f";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT Datos_ST FROM seminario_taller";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();

    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);
} else {
    echo json_encode(array());
}

$conn->close();
?>
