<!DOCTYPE html>
<html>
<head>
    <title>Filtrar Programas</title>
    <style>
        
h2 {
    font-size: 32px; /* Tamaño de fuente más grande */
    text-align: center; /* Centrar el texto */
    color: #007bff; /* Color del texto */
    margin-bottom: 20px; /* Espacio inferior */
    text-transform: uppercase; /* Convertir el texto a mayúsculas */
    letter-spacing: 2px; /* Espaciado entre letras */
    font-weight: bold; /* Negrita */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Sombra de texto */
}


        /* Estilos para los botones */
input[type="submit"] {
    margin-top: 5%;
    background-color: #007bff; /* Color de fondo */
    color: #fff; /* Color del texto */
    padding: 30px 55px; /* Espaciado interno */
    border: none; /* Sin borde */
    border-radius: 30px; /* Borde redondeado */
    font-size: 18px; /* Tamaño de fuente */
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
}

/* Estilo al pasar el ratón sobre los botones */
input[type="submit"]:hover {
    background-color: #0056b3; /* Cambia el color al pasar el ratón */
    transform: scale(1.05); /* Efecto de escala al pasar el ratón */
}

    </style>
</head>
<body>
    <center><h2>SELECCION DE PROGRAMAS</h2></center>
    <center>
    <form action="mostrar_1.php" method="post">
        <input type="submit" name="programa" value="Diplomado">
        <input type="submit" name="programa" value="Seminario-Taller">
        <input type="submit" name="programa" value="Técnico Superior">
        <input type="submit" name="programa" value="Programa Especial">
        <input type="submit" value="Todo">
    </form>
    </center>
    <center><h2>LISTA DE INSCRITOS</h2></center>
</body>
</html>
