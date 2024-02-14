<?php
include("con_db.php");

// Realizar una consulta para obtener los datos almacenados en la base de datos
$consulta = "SELECT sp.d_t_p_s, ip.* FROM seleccion sp INNER JOIN informacion_personal ip ON sp.id_informacion_personal = ip.id_IP";
$resultado = mysqli_query($conex, $consulta);

// Comprobar si la consulta se realizó con éxito
if ($resultado) {
    // Mostrar los datos en una tabla
    echo "<table border='1'>";
    echo "<tr><th>Programa</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Ciudad de Nacimiento</th><th>Fecha de Nacimiento</th><th>Cédula de Identidad</th><th>Extensión</th><th>Dirección</th><th>Barrio</th><th>Ciudad de Residencia</th><th>Teléfono de Domicilio</th><th>Teléfono Celular</th><th>Correo Electrónico</th></tr>";

    // Recorrer los resultados y mostrar cada fila de datos
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>".$fila['d_t_p_s']."</td>";
        echo "<td>".$fila['nombre']."</td>";
        echo "<td>".$fila['apellido_p']."</td>";
        echo "<td>".$fila['apellido_m']."</td>";
        echo "<td>".$fila['ciudad_n']."</td>";
        echo "<td>".$fila['fecha_N']."</td>";
        echo "<td>".$fila['cedula_identidad']."</td>";
        echo "<td>".$fila['ext']."</td>";
        echo "<td>".$fila['direccion']."</td>";
        echo "<td>".$fila['barrio']."</td>";
        echo "<td>".$fila['ciudad_residencia']."</td>";
        echo "<td>".$fila['telefono_d']."</td>";
        echo "<td>".$fila['telefono_c']."</td>";
        echo "<td>".$fila['correo_electronico']."</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    // Mostrar un mensaje de error si la consulta falló
    echo "Error al consultar la base de datos: " . mysqli_error($conex);
}

// Cerrar la conexión a la base de datos
mysqli_close($conex);
?>
