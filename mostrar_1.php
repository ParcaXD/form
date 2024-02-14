<?php
include("con_db.php");

// Verificar si se ha enviado la selección desde filtro.php
if (isset($_POST['programa'])) {
    $programaSeleccionado = $_POST['programa'];
    
    // Modificar la consulta SQL para filtrar por el programa seleccionado
    $sql = "SELECT ip.*, s.d_t_p_s, il.*, ia.*, f.*, ce.*, a.*, ca.* FROM informacion_personal ip 
            INNER JOIN seleccion s ON ip.id_IP = s.id_informacion_personal
            INNER JOIN informacion_laboral il ON ip.id_IP = il.id_informacion_personal
            INNER JOIN informacion_academica ia ON ip.id_IP = ia.id_informacion_personal
            INNER JOIN forma_de_pago_y_facturacion f ON ip.id_IP = f.id_informacion_personal
            INNER JOIN como_se_entero ce ON ip.id_IP = ce.id_informacion_personal
            INNER JOIN adjuntos a ON ip.id_IP = a.id_informacion_personal
            INNER JOIN compromiso_a ca ON ip.id_IP = ca.id_informacion_personal
            WHERE s.d_t_p_s = '$programaSeleccionado'";
} else {
    // Si no se ha seleccionado ningún programa, mostrar todos los formularios
    $sql = "SELECT ip.*, s.d_t_p_s, il.*, ia.*, f.*, ce.*, a.*, ca.* FROM informacion_personal ip 
            INNER JOIN seleccion s ON ip.id_IP = s.id_informacion_personal
            INNER JOIN informacion_laboral il ON ip.id_IP = il.id_informacion_personal
            INNER JOIN informacion_academica ia ON ip.id_IP = ia.id_informacion_personal
            INNER JOIN forma_de_pago_y_facturacion f ON ip.id_IP = f.id_informacion_personal
            INNER JOIN como_se_entero ce ON ip.id_IP = ce.id_informacion_personal
            INNER JOIN adjuntos a ON ip.id_IP = a.id_informacion_personal
            INNER JOIN compromiso_a ca ON ip.id_IP = ca.id_informacion_personal";
}

$result = mysqli_query($conex, $sql);
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="http://localhost/formulario_2/m_style.css">

<head>
    <title>Datos Registrados</title>
</head>

<body>

    <?php
    $currentUserId = null; // Inicializar una variable para el seguimiento del usuario actual

    while ($row = mysqli_fetch_assoc($result)) {
        // Comprobar si el usuario actual es diferente al anterior
        if ($currentUserId !== $row['id_IP']) {
            // Si es un usuario nuevo, muestra un nuevo contenedor
            if ($currentUserId !== null) {
                echo '</div>';
            }
            echo '<div class="page">'; // Inicio de la sección

            $currentUserId = $row['id_IP'];
        }
    ?>
    <small>
        <small>
        <div class="contenedor">
        
    <center><h2>FORMULARIO DE INSCRIPCION</h2></center>
    
    <br>
    <br>
    <br>
    <div class="page">

    <div class="user-data print-form">
        <table border="0">
        <th>PROGRAMA:</th>
            <tr>
                
                <td><?php echo strtoupper($row['d_t_p_s']); ?></td>
            </tr>
        </table>
    </div>



    <div class="user-data print-form">
   
        <h4>INFORMACION PERSONAL</h4>
        <table border="0">
            <tr>
                <th>NOMBRE:</th>
                <td><?php echo strtoupper($row['nombre']); ?></td>
                <th>APELLIDO PATERNO:</th>
                <td><?php echo strtoupper($row['apellido_p']); ?></td>
                <th>APELLIDO MATERNO:</th>
                <td><?php echo strtoupper($row['apellido_m']); ?></td>
            </tr>
            <tr>
                
                <th>CIUDAD DE NACIMIENTO:</th>
                <td><?php echo strtoupper($row['ciudad_n']); ?></td>
                <th>FECHA DE NACIMIENTO</th>
                <td><?php echo $row['fecha_N']; ?></td>
                <th>CEDULA DE IDENTIDAD:</th>
                <td><?php echo $row['cedula_identidad']; ?></td>
            </tr>
            <tr>
                <th>EXTENCION CI:</th>
                <td><?php echo strtoupper($row['ext']); ?></td>
                <th>DIRECCION:</th>
                <td><?php echo strtoupper($row['direccion']); ?></td>
                <th>BARRIO/ZONA:</th>
                <td><?php echo strtoupper($row['barrio']); ?></td>
            </tr>
            <tr>
                
                <th>CIUDAD DE RECIDENCIA:</th>
                <td><?php echo strtoupper($row['ciudad_residencia']); ?></td>
                <th>TELEFONO DOMICILIO:</th>
                <td><?php echo $row['telefono_d']; ?></td>
                <th>TELEFONO CELULAR:</th>
                <td><?php echo $row['telefono_c']; ?></td>
            </tr>
            <tr>
                <th>CORREO ELECTRONICO:</th>
                <td><?php echo $row['correo_electronico']; ?></td>
            </tr>
        </table>
    </div>
    <div class="user-data print-form">
        <h4>INFORMACION LABORAL</h4>
        <table border="0">
            <tr>
                <th>USTED TRABAJA?</th>
                <td><?php echo strtoupper($row['ustd_trabaja']); ?></td>
                
            </tr>
            <tr>
                <th>INSTITUCION:</th>
                <td><?php echo strtoupper($row['inst_trabaja']); ?></td>
                <th>DIRECCION TRABAJO:</th>
                <td><?php echo strtoupper($row['direccion_t']); ?></td>
                <th>TELEFONO TRABAJO:</th>
                <td><?php echo $row['telefono_t']; ?></td>
            </tr>
            <tr>
                <th>OCUPACION:</th>
                <td><?php echo strtoupper($row['ocupacion']); ?></td>
                <th>ANTIGUEDAD INSTITUCION:</th>
                <td><?php echo strtoupper($row['antiguedad_inst']); ?></td>
                <th>EMAIL LABORAL:</th>
                <td><?php echo $row['email_inst']; ?></td>
            </tr>
            
        </table>
    </div>
    <div class="user-data print-form">
        <h4>INFORMACION ACADEMICA</h4>
        <table border="0">
            <tr>
                <th>GRADO ACADEMICO:</th>
                <td><?php echo strtoupper($row['grado_academico']); ?></td>
                <th>PROFESION:</th>
                <td><?php echo strtoupper($row['profesion']); ?></td>
                <th>UNIVERSIDAD:</th>
                <td><?php echo strtoupper($row['universidad_est']); ?></td>
            </tr>
        </table>
    </div>
    <div class="user-data print-form">
        <h4>FORMA Y PAGO DE FACTURACION</h4>
        <table border="0">
            <tr>
                <th>FUENTE:</th>
                <td><?php echo strtoupper($row['opciones_p']); ?></td>
                <th>NIT:</th>
                <td><?php echo strtoupper($row['nit']); ?></td>
            </tr>
            <tr>
                <th>RAZON SOCIAL:</th>
                <td><?php echo strtoupper($row['razon_social']); ?></td>
                <th>EJECUTIVO:</th>
                <td><?php echo strtoupper($row['ejecutivo']); ?></td>
            </tr>
        </table>
    </div>
    <div class="user-data print-form">
        <h4>COMO SE ENTERO</h4>
        <table border="0">
            <tr>
                <th>PRENSA:</th>
                <td><?php echo strtoupper($row['prensa']); ?></td>
                <th>PAGINA WEB:</th>
                <td><?php echo strtoupper($row['pagina_w']); ?></td>
                <th>REFERENCIA PERSONAL:</th>
                <td><?php echo strtoupper($row['referencia_p']); ?></td>
            </tr>
            <tr>
                <th>REDES SOCIALES:</th>
                <td><?php echo strtoupper($row['redes_s']); ?></td>
                <th>OTROS:</th>
                <td><?php echo strtoupper($row['otros']); ?></td>
            </tr>
        </table>
    </div>
    <div class="user-data print-form">
        <h4>ADJUNTOS</h4>
        <table border="0">
            <tr>
                <th>ADJUNTO BOLETA:</th>
                <td><?php if (!empty($row['adj_b'])) echo "Imagen Adjunta"; ?></td>
                <th>Adjunto Cédula:</th>
                <td><?php if (!empty($row['adj_f'])) echo "Imagen Adjunta"; ?></td>
            </tr>
            <tr>
                <th>BANCO:</th>
                <td><?php echo strtoupper($row['banco']); ?></td>
                <th>MONTO:</th>
                <td><?php echo strtoupper($row['monto']); ?></td>
            </tr>
        </table>
    </div>
    <div class="user-data print-form">
        <h4>COMPROMISO</h4>
        <table border="0">
            <tr>
                <th>CIUDAD COMPROMISO:</th>
                <td><?php echo strtoupper($row['ciudad_c']); ?></td>
                <th>Fecha Compromiso:</th>
                <td><?php echo $row['fecha_c']; ?></td>
            </tr>
        </table>
    </div>
    </div>
    </div>
    </small>
    </small>



   
    <?php
    }
    // Cerrar el último contenedor
    echo '</div>';
    ?>
</body>

</html>

<?php
mysqli_close($conex);
?>
