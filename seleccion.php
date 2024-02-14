<?php
include("con_db.php");

if (isset($_POST['register'])) {
    $programa = isset($_POST['programa']) ? trim($_POST['programa']) : '';
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $apellidoP = isset($_POST['apellidoP']) ? trim($_POST['apellidoP']) : '';
    $apellidoM = isset($_POST['apellidoM']) ? trim($_POST['apellidoM']) : '';
    $ciudadN = isset($_POST['ciudadN']) ? trim($_POST['ciudadN']) : '';
    $fechaNa = isset($_POST['fechaNa']) ? trim($_POST['fechaNa']) : '';
    $ci = isset($_POST['ci']) ? trim($_POST['ci']) : '';
    $CIL = isset($_POST['CIL']) ? trim($_POST['CIL']) : '';
    $direccion = isset($_POST['direccion']) ? trim($_POST['direccion']) : '';
    $zona = isset($_POST['zona']) ? trim($_POST['zona']) : '';
    $ciudadR = isset($_POST['ciudadR']) ? trim($_POST['ciudadR']) : '';
    $telefonoD = isset($_POST['telefonoD']) ? trim($_POST['telefonoD']) : '';
    $telefonoC = isset($_POST['telefonoC']) ? trim($_POST['telefonoC']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $nombre_a = isset($_POST['nombre_actividad']) ? trim($_POST['nombre_actividad']) : '';
    $trabaja = isset($_POST['trabaja']) ? trim($_POST['trabaja']) : '';
    $grado = isset($_POST['grado']) ? trim($_POST['grado']) : '';
    $profesion = isset($_POST['profesion']) ? trim($_POST['profesion']) : '';
    $universidad = isset($_POST['universidad']) ? trim($_POST['universidad']) : '';
    $fuente = isset($_POST['fuente']) ? trim($_POST['fuente']) : '';
    $nit = isset($_POST['nit']) ? trim($_POST['nit']) : '';
    $razonS = isset($_POST['razonS']) ? trim($_POST['razonS']) : '';
    $ejecutivo = isset($_POST['ejecutivo']) ? trim($_POST['ejecutivo']) : '';
    $prensa = isset($_POST['prensa']) ? trim($_POST['prensa']) : '';
    $web = isset($_POST['web']) ? trim($_POST['web']) : '';
    $personal = isset($_POST['personal']) ? trim($_POST['personal']) : '';
    $redes = isset($_POST['redes']) ? trim($_POST['redes']) : '';
    $otros = isset($_POST['otros']) ? trim($_POST['otros']) : null;

    mysqli_autocommit($conex, false);
    $error = false;

    $consultaIP = "INSERT INTO informacion_personal (nombre, apellido_p, apellido_m, ciudad_n, fecha_N, cedula_identidad, ext, direccion, barrio, ciudad_residencia, telefono_d, telefono_c, correo_electronico) 
    VALUES ('$nombre', '$apellidoP', '$apellidoM', '$ciudadN', '$fechaNa', '$ci', '$CIL', '$direccion', '$zona', '$ciudadR', '$telefonoD', '$telefonoC', '$email')";

    $resultadoIP = mysqli_query($conex, $consultaIP);

    if (!$resultadoIP) {
        $error = true;
    } else {
        $id_informacion_personal = mysqli_insert_id($conex);

        $consultaM = "INSERT INTO seleccion (d_t_p_s, id_informacion_personal) VALUES ('$programa', '$id_informacion_personal')";
        $resultadoM = mysqli_query($conex, $consultaM);

        if (!$resultadoM) {
            $error = true;
        } else {
            $consultaA = "INSERT INTO nombre_actividad (actividad_a, id_informacion_personal) VALUES ('$nombre_a','$id_informacion_personal')";
            $resultadoA = mysqli_query($conex, $consultaA);

            if (!$resultadoA) {
                $error = true;
            } else {
                if (strlen($trabaja) >= 1) {
                    $institucion = isset($_POST['institucion']) ? trim($_POST['institucion']) : '';
                    $direccionT = isset($_POST['direccionT']) ? trim($_POST['direccionT']) : '';
                    $telefonoT = isset($_POST['telefonoT']) ? trim($_POST['telefonoT']) : '';
                    $ocupacion = isset($_POST['ocupacion']) ? trim($_POST['ocupacion']) : '';
                    $antiguedad = isset($_POST['antiguedad']) ? trim($_POST['antiguedad']) : '';
                    $emailL = isset($_POST['emailL']) ? trim($_POST['emailL']) : '';

                    $consultaL = "INSERT INTO informacion_laboral(ustd_trabaja, inst_trabaja, direccion_t, telefono_t, ocupacion, antiguedad_inst, email_inst, id_informacion_personal) 
                    VALUES ('$trabaja','$institucion','$direccionT','$telefonoT','$ocupacion','$antiguedad','$emailL', '$id_informacion_personal')";
                    $resultadoL = mysqli_query($conex, $consultaL);

                    if (!$resultadoL) {
                        $error = true;
                    } else {
                        $consultaAcad = "INSERT INTO informacion_academica(grado_academico, profesion, universidad_est, id_informacion_personal) 
                        VALUES ('$grado','$profesion','$universidad', '$id_informacion_personal')";
                        $resultadoAcad = mysqli_query($conex, $consultaAcad);

                        if (!$resultadoAcad) {
                            $error = true;
                        } else {
                            $consultaF = "INSERT INTO forma_de_pago_y_facturacion(opciones_p, nit, razon_social, ejecutivo, id_informacion_personal) 
                            VALUES ('$fuente','$nit','$razonS','$ejecutivo', '$id_informacion_personal')";
                            $resultadoF = mysqli_query($conex, $consultaF);

                            if (!$resultadoF) {
                                $error = true;
                            } else {
                                $consultaE = "INSERT INTO como_se_entero(prensa, pagina_w, referencia_p, redes_s, otros, id_informacion_personal) 
                                VALUES ('$prensa','$web','$personal','$redes','$otros', '$id_informacion_personal')";
                                $resultadoE = mysqli_query($conex, $consultaE);

                                if (!$resultadoE) {
                                    $error = true;
                                } else {
                                    $adj_boleta = '';
                                    $adj_cedula = '';

                                    if ($_FILES['adjuntoBoleta']['error'] === UPLOAD_ERR_OK) {
                                        $adj_boleta = addslashes(file_get_contents($_FILES['adjuntoBoleta']['tmp_name']));
                                    }

                                    if ($_FILES['adjuntoCedula']['error'] === UPLOAD_ERR_OK) {
                                        $adj_cedula = addslashes(file_get_contents($_FILES['adjuntoCedula']['tmp_name']));
                                    }

                                    $banco = isset($_POST['banco']) ? $_POST['banco'] : '';
                                    $monto = $_POST['monto'];

                                    $query = "INSERT INTO adjuntos(adj_b, adj_f, banco, monto, id_informacion_personal) 
                                    VALUES ('$adj_boleta','$adj_cedula','$banco','$monto', '$id_informacion_personal')";
                                    $resultadoAd = mysqli_query($conex, $query);

                                    if (!$resultadoAd) {
                                        $error = true;
                                    } else {
                                        $ciudadC = isset($_POST['ciudadC']) ? trim($_POST['ciudadC']) : '';
                                        $fecha = isset($_POST['fecha']) ? trim($_POST['fecha']) : '';

                                        $consultaCom = "INSERT INTO compromiso_a(ciudad_c, fecha_c, id_informacion_personal) VALUES ('$ciudadC','$fecha', '$id_informacion_personal')";
                                        $resultadoCom = mysqli_query($conex, $consultaCom);

                                        if (!$resultadoCom) {
                                            $error = true;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    if ($error) {
        mysqli_rollback($conex);
        ?>
        <h3 class="bad">¡Ocurrió un error al registrar los datos!</h3>
        <?php
    } else {
        mysqli_commit($conex);
    header('Location: inscrito.html'); // Redirige al usuario a inscrito.html
    exit;
    }

    mysqli_autocommit($conex, true);
}
?>
