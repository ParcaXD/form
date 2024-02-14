<?php
include("con_db.php");

// Realizar la consulta para obtener los datos laborales relacionados con el ID de información personal
$sql = "SELECT * FROM informacion_laboral WHERE id_informacion personal = $id_informacion_personal";
$result = mysqli_query($conex, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Datos Laborales</title>
</head>
<body>
    <h2>Datos Laborales Registrados</h2>
    <table border="1">
        <tr>
            <th>Usted Trabaja</th>
            <th>Institución</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Ocupación</th>
            <th>Antigüedad</th>
            <th>Email Laboral</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['ustd_trabaja'] . "</td>";
            echo "<td>" . $row['inst_trabaja'] . "</td>";
            echo "<td>" . $row['direccion_t'] . "</td>";
            echo "<td>" . $row['telefono_t'] . "</td>";
            echo "<td>" . $row['ocupacion'] . "</td>";
            echo "<td>" . $row['antiguedad_inst'] . "</td>";
            echo "<td>" . $row['email_inst'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
mysqli_close($conex);
?>
