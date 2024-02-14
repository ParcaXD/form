<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/formulario_2/css_form_2.css">
    <link rel="stylesheet" href="http://localhost/formulario_2/css_responsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Document</title>
    <script>
        window.addEventListener('pageshow', function(event) {
            if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
                window.location.reload(true); // Recargar la página desde el servidor
            }
        });
    </script>
</head>
<body>
<div class="form-container">
    <form action="seleccion.php" method="post" enctype="multipart/form-data" id="miFormulario">
            <div class="form-title">
                <h1>FORMULARIO DE INSCRIPCIÓN<img src="imagenes/zyro-image.png" alt="Logo" class="logo-img"></h1> 
                <hr class="linea-divisora">            
<div class="options-container">
        <ul class="options-list-horizontal"> <!-- Cambiamos la clase de la lista -->
        <li>
            <input type="radio" id="diplomado" name="programa" value="Diplomado" required>
            <label for="diplomado">Diplomado</label>
        </li>
        <li>
            <input type="radio" id="tecnico" name="programa" value="Tecnico superior" required>
            <label for="tecnico">Técnico Superior</label>
        </li>
        <li>
            <input type="radio" id="especial" name="programa" value="Programa especial" required>
            <label for="especial">Programa Especial</label>
        </li>
        <li>
            <input type="radio" id="seminario" name="programa" value="Seminario-Taller" required>
            <label for="seminario">Seminario-Taller</label>
        </li>
    </ul>
</div>
<br>
<br>
<script>
$(document).ready(function () {
    $('input[name="programa"]').change(function () {
        var selectedPrograma = $(this).val();
        if (selectedPrograma === 'Diplomado') {
            $.ajax({
                type: 'GET',
                url: 'obtener_datos_diplomado.php', 
                dataType: 'json', 
                success: function (data) {
                    var selectActividad = $('#nombre_actividad');
                    selectActividad.empty(); 
                    selectActividad.append($('<option>', {
                        value: '',
                        text: 'Nombre de la actividad',
                        selected: true,
                        disabled: true
                    }));
                    $.each(data, function (index, item) {
                        selectActividad.append($('<option>', {
                            value: item.Datos_D,
                            text: item.Datos_D
                        }));
                    });
                },
                error: function () {
                    console.log('Error al obtener los datos de diplomado');
                }
            });
        } else {
            $('#nombre_actividad').empty();
        }
    });
});
</script>
<script>
$(document).ready(function () {
    $('input[name="programa"]').change(function () {
        var selectedPrograma = $(this).val();

        if (selectedPrograma === 'Tecnico superior') {
            $.ajax({
                type: 'GET',
                url: 'obtener_datos_tecnico_superior.php',
                dataType: 'json',
                success: function (data) {
                    var selectActividad = $('#nombre_actividad');
                    selectActividad.empty();

                    selectActividad.append($('<option>', {
                        value: '',
                        text: 'Nombre de la actividad',
                        selected: true,
                        disabled: true
                    }));

                    $.each(data, function (index, item) {
                        selectActividad.append($('<option>', {
                            value: item.Datos_TS,
                            text: item.Datos_TS
                        }));
                    });
                },
                error: function () {
                    console.log('Error al obtener los datos de técnico superior');
                }
            });
        } else {
            $('#nombre_actividad').empty();
        }
    });
});
</script>
<script>
$(document).ready(function () {
    $('input[name="programa"]').change(function () {
        var selectedPrograma = $(this).val();

        if (selectedPrograma === 'Programa especial') {
            $.ajax({
                type: 'GET',
                url: 'obtener_datos_programa_especial.php',
                dataType: 'json',
                success: function (data) {
                    var selectActividad = $('#nombre_actividad');
                    selectActividad.empty();

                    selectActividad.append($('<option>', {
                        value: '',
                        text: 'Nombre de la actividad',
                        selected: true,
                        disabled: true
                    }));

                    $.each(data, function (index, item) {
                        selectActividad.append($('<option>', {
                            value: item.Datos_PE,
                            text: item.Datos_PE
                        }));
                    });
                },
                error: function () {
                    console.log('Error al obtener los datos de programa especial');
                }
            });
        } else {
            $('#nombre_actividad').empty();
        }
    });
});
</script>
<script>
$(document).ready(function () {
    $('input[name="programa"]').change(function () {
        var selectedPrograma = $(this).val();

        if (selectedPrograma === 'Seminario-Taller') {
            $.ajax({
                type: 'GET',
                url: 'obtener_datos_seminario_taller.php',
                dataType: 'json',
                success: function (data) {
                    var selectActividad = $('#nombre_actividad');
                    selectActividad.empty();

                    selectActividad.append($('<option>', {
                        value: '',
                        text: 'Nombre de la actividad',
                        selected: true,
                        disabled: true
                    }));

                    $.each(data, function (index, item) {
                        selectActividad.append($('<option>', {
                            value: item.Datos_ST,
                            text: item.Datos_ST
                        }));
                    });
                },
                error: function () {
                    console.log('Error al obtener los datos de seminario-taller');
                }
            });
        } else {
            $('#nombre_actividad').empty();
        }
    });
});
</script>
    <div class="form-row">
        <select name="nombre_actividad" id="nombre_actividad" >
                    <option value="" selected disabled>Nombre de la actividad</option>
                    <option value="Word intermedio">Word intermedio</option>
                    <option value="Word avanzado">Word avanzado</option>
                    <option value="Redaccion de informes">Redaccion de informes</option>       
        </select>
    </div>
<div class="form-row">
    <h4>
        INFORMACIÓN PERSONAL
        <img src="http://localhost/formulario_2/imagenes/2170249.png" alt="Icono" class="icono-titulo">
    </h4>
</div>
            <div class="form-row">
                <input type="text" name="nombre" id="nombre" placeholder="Nombre completo" required>
                <input type="text" name="apellidoP" id="apellidoP" placeholder="Apellido Paterno" required>
            </div>
            <div class="form-row">
                <input type="text" name="apellidoM" id="apellidoM" placeholder="Apellido Materno" required>
                <select name="ciudadN" id="ciudadN" onchange="checkOtherOption('ciudadN', 'otraCiudad')">
                    <option value="" selected disabled>Ciudad de nacimiento:</option>
                    <option value="La Paz">La Paz</option>
                    <option value="Cochabamba">Cochabamba</option>
                    <option value="Santa Cruz">Santa Cruz</option>
                    <option value="Oruro">Oruro</option>
                    <option value="Potosí">Potosí</option>
                    <option value="Tarija">Tarija</option>
                    <option value="Chuquisaca">Chuquisaca</option>
                    <option value="Beni">Beni</option>
                    <option value="Pando">Pando</option>
                    <option value="otros">Otros</option>
                </select>
                <input type="text" id="otraCiudad" name="otraCiudad" style="display: none;" placeholder="Otro">
            </div>
            
            <div class="form-row">
                <label for="fecha" id="FN">Fecha de nacimiento:</label>
                <input type="date" name="fechaNa" id="fechaN">
                <input type="text" name="ci" id="ci" placeholder="Cédula de identidad" required>
                <select name="CIL" id="CIL" required onchange="checkOtherOption('CIL', 'otraCIL')">>
                    <option value="" selected disabled>Ext.</option>
                    <option value="LP">LP</option>
                    <option value="CBBA">CBBA</option>
                    <option value="SCZ">SCZ</option>
                    <option value="OR">OR</option>
                    <option value="PT">PT</option>
                    <option value="CH">CH</option>
                    <option value="TJA">TJA</option>
                    <option value="BN">BN</option>
                    <option value="PD">PD</option>
                    <option value="otros">Otros</option>
                </select>
                <input type="text" id="otraCIL" name="otraCIL" style="display: none;" placeholder="Otro">
            </div>
            <div class="form-row">
                <input type="text" name="direccion" id="direccion" placeholder="Dirección particular" >
                <input type="text" name="zona" id="zona" placeholder="Barrio-Zona" >
            </div>
            <div class="form-row">
                <select name="ciudadR" id="ciudadR" onchange="checkOtherOption('ciudadR', 'otraCiudadR')">
                    <option value="" selected disabled>Ciudad de residencia:</option>
                    <option value="La Paz">La Paz</option>
                    <option value="Cochabamba">Cochabamba</option>
                    <option value="Santa Cruz">Santa Cruz</option>
                    <option value="Oruro">Oruro</option>
                    <option value="Potosí">Potosí</option>
                    <option value="Tarija">Tarija</option>
                    <option value="Chuquisaca">Chuquisaca</option>
                    <option value="Beni">Beni</option>
                    <option value="Pando">Pando</option>
                    <option value="otros">Otros</option>
                </select>
                <input type="text" id="otraCiudadR" name="otraCiudadR" style="display: none;" placeholder="Otro">

                <input type="text" name="telefonoD" id="telefonoD" placeholder="Teléfono Domicilio" >
            </div>
            <div class="form-row">
                <input type="text" name="telefonoC" id="telefonoC" placeholder="Teléfono Celular" required>
                <input type="email" name="email" id="email" placeholder="Correo Electrónico" required>
            </div>
            <br>
            
       
      

            <div class="form-row">
                <h4>INFORMACION LABORAL<img src="http://localhost/formulario_2/imagenes/5226434.png" alt="Icono" class="icono-titulo">
</h4>
            </div>
            <div class="form-row">
                <select name="trabaja" id="trabaja" required>
                    <option value="" selected disabled>¿Usted trabaja?</option>
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div id="informacion-laboral">
                <div class="form-row">
                    <input type="text" name="institucion" id="institucion" placeholder="Institución donde trabaja" >
                    <input type="text" name="direccionT" id="direccionT" placeholder="Dirección del lugar de trabajo" >
                </div>
                <div class="form-row">
                    <input type="text" name="telefonoT" id="telefonoT" placeholder="Teléfono(s) del trabajo" >
                    <input type="text" name="ocupacion" id="ocupacion" placeholder="Ocupación-Cargo" >
                </div>
                <div class="form-row">
                    <input type="text" name="antiguedad" id="antiguedad" placeholder="Antigüedad de la institución" >
                    <input type="email" name="emailL" id="emailL" placeholder="Correo electrónico de la institución" >
                </div>
            </div>
            
    
            <div class="form-row">
                <h4>INFORMACION ACADEMICA<img src="http://localhost/formulario_2/imagenes/4645229.png" alt="Icono" class="icono-titulo"></h4>
            </div>
            <div class="form-row">
                <input type="text" name="grado" id="grado" placeholder="Grado académico actual" >
                <input type="text" name="profesion" id="profesion" placeholder="Profesión" >
            </div>
            <div class="form-row">
                <input type="text" name="universidad" id="universidad" placeholder="Universidad de estudio" >
            </div>
            

            <div class="form-row">
                <h4>FORMA DE PAGO Y FACTURACION<img src="http://localhost/formulario_2/imagenes/4567667.png" alt="Icono" class="icono-titulo"></h4>
            </div>
            <div class="form-row">
    <div class="form-column">
        <input type="radio" name="fuente" value="Directamente del interesado" id="interesado" >
        <label for="interesado">Directamente del interesado</label>
    </div>
    <div class="form-column">
        <input type="radio" name="fuente" value="Por parte de la empresa donde trabaja" id="parteE" >
        <label for="parteE">Por parte de la empresa donde trabaja</label>
    </div>
    <div class="form-column">
        <input type="radio" name="fuente" value="mixto" id="mixto" >
        <label for="mixto">Mixto</label>
    </div>
</div>
            <div class="form-row">
                <input type="text" name="nit" id="nit" placeholder="NIT" >
                <input type="text" name="razonS" id="razonS" placeholder="Razón Social" >
            </div>
            <div class="form-row">
                <input type="text" name="ejecutivo" id="ejecutivo" placeholder="Ejecutivo que realiza la ejecución" >
            </div>
            
        
<div class="form-row">
    <h4>¿CÓMO SE ENTERÓ DEL PROGRAMA?<img src="http://localhost/formulario_2/imagenes/639375.png" alt="Icono" class="icono-titulo"></h4>
</div>
<div class="form-row">
    <div class="form-column">
        <input type="hidden" name="prensa" value=" ">
        <input type="checkbox" name="prensa" value="prensa" id="Prensa">
        <label for="Prensa">Prensa</label>
    </div>
    <div class="form-column">
        <input type="hidden" name="web" value=" ">
        <input type="checkbox" name="web" value="pagina" id="web">
        <label for="web">Nuestra página web</label>
    </div>
    <div class="form-column">
        <input type="hidden" name="personal" value=" ">
        <input type="checkbox" name="personal" value="referencia" id="personal">
        <label for="personal">Referencia personal</label>
    </div>
</div>
<div class="form-row">
    <select name="redes" id="ciudadN">
        <option value="" selected disabled>Redes Sociales:</option>
        <option value="Facebook">Facebook</option>
        <option value="WhatsApp">WhatsApp</option>
        <option value="Tik Tok">Tik Tok</option>
        <option value="Instagram">Instagram</option>
    </select>
    <input type="text" name="otros" id="redes" placeholder="Otros">
</div>
<div class="form-row">
        <h4>ADJUNTOS<img src="http://localhost/formulario_2/imagenes/4481168.png" alt="Icono" class="icono-titulo"></h4>
</div>
    <div class="form-row">
        <div class="file-input-container">
            <input type="file" name="adjuntoBoleta" id="adjuntoBoleta" class="file-input" onchange="displayFileName('adjuntoBoleta', 'boleta-label')" >
            <label for="adjuntoBoleta" class="file-label">Adjuntar boleta de depósito</label>
            <span id="boleta-label" class="file-name-label"></span>
        </div>
    
        <div class="file-input-container">
            <input type="file" name="adjuntoCedula" id="adjuntoCedula" class="file-input" onchange="displayFileName('adjuntoCedula', 'cedula-label')" >
            <label for="adjuntoCedula" class="file-label">Adjuntar fotocopia de cédula de identidad</label>
            <span id="cedula-label" class="file-name-label"></span>
        </div>
    </div>
    
    
    <div class="form-row">
        <input type="text" name="banco" id="banco" placeholder="Banco">
        <input type="text" name="monto" id="monto" placeholder="Monto" >
    </div>
    <div class="form-row">
        <h4>ACUERDO COMPROMISO<img src="http://localhost/formulario_2/imagenes/7178931.png" alt="Icono" class="icono-titulo"></h4>
    </div>
    <div class="form-row">
        <p class="agreement-text">Expreso mi conformidad de cancelar el valor total del curso, ya sea de forma directa o por medio de la empresa, según sea la empresa. La presente inscripción es nominativa.</p>
    </div>
    <div class="form-row">
        <select name="ciudadC" id="ciudadC" onchange="checkOtherOption('ciudadC', 'otraCiudadC')">
            <option value="" selected disabled>Ciudad:</option>
            <option value="La Paz">La Paz</option>
            <option value="Cochabamba">Cochabamba</option>
            <option value="Santa Cruz">Santa Cruz</option>
            <option value="Oruro">Oruro</option>
            <option value="Potosí">Potosí</option>
            <option value="Tarija">Tarija</option>
            <option value="Chuquisaca">Chuquisaca</option>
            <option value="Beni">Beni</option>
            <option value="Pando">Pando</option>
            <option value="otros">Otros</option>
        </select>
        <input type="text" id="otraCiudadC" name="otraCiudadC" style="display: none;" placeholder="Otro">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" placeholder="Fecha" readonly>
    </div>
    <div class="button-container">
            <input type="hidden" name="submitted" value="true">
    <input type="submit" name="register" id="register-button" value="Enviar">
</div>
</form>

</div>


    
<script>
        // Obtenemos la referencia al campo de fecha
        const fechaInput = document.getElementById('fecha');
    
        // Obtenemos la fecha actual en formato yyyy-MM-dd
        const fechaActual = new Date().toISOString().split('T')[0];
    
        // Establecemos la fecha actual como valor en el campo de fecha
        fechaInput.value = fechaActual;
</script>

<script>
    function displayFileName(inputId, labelId) {
        const inputElement = document.getElementById(inputId);
        const labelElement = document.getElementById(labelId);

        if (inputElement.files.length > 0) {
            labelElement.textContent = inputElement.files[0].name;
        } else {
            labelElement.textContent = "";
        }
    }
</script>

<script>
   // Obtenemos el elemento select y el div de información laboral
const trabajaSelect = document.getElementById('trabaja');
const informacionLaboral = document.getElementById('informacion-laboral');

// Ocultamos los campos de información laboral desde un inicio
informacionLaboral.style.display = 'none';

// Escuchamos el evento de cambio en el select
trabajaSelect.addEventListener('change', function() {
    // Si el usuario selecciona "No"
    if (trabajaSelect.value === 'no') {
        // Ocultamos los campos de información laboral
        informacionLaboral.style.display = 'none';
    } else {
        // Si selecciona "Sí", mostramos los campos
        informacionLaboral.style.display = 'block';
    }
});

// Ocultamos los campos de información laboral al cargar la página si la opción es "No"
if (trabajaSelect.value === 'no') {
    informacionLaboral.style.display = 'none';
}


</script>

<script>
 function checkOtherOption(selectId, inputId) {
    var selectElement = document.getElementById(selectId);
    var selectedOption = selectElement.options[selectElement.selectedIndex].value;
    var inputElement = document.getElementById(inputId);
    
    if (selectedOption === 'otros') {
        selectElement.disabled = false;
        inputElement.style.display = 'inline-block';
        inputElement.setAttribute('name', selectId); // Cambiar el nombre del input para que se envíe con el nombre del select
        inputElement.value = ''; // Limpiar el valor del input cuando se selecciona "Otros"
    } else {
        selectElement.disabled = false;
        inputElement.style.display = 'none';
        inputElement.removeAttribute('name'); // Eliminar el nombre del input para que no se envíe como el nombre del select
    }
}
</script>





</body>
</html>
