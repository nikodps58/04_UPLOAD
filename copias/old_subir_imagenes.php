<?php
    require_once "./recursos/display_errors.php";
    /* ini_set('display_errors', 1); */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivos a BBDD y consultarlos o permitir descarga</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <h1>Subir imagenes</h1>

        <form action="./app.php" method="post" enctype="multipart/form-data"> <!-- envía datos codificados, necesario para enviar archivos por el form, sólo si es post -->
            <input type="text" name="titulo" placeholder="Título del archivo">
            <input type="text" name="alt" placeholder="Texto alternativo">
            <input type="file" name="archivo" placeholder="Selecciona el archivo">
            <input type="submit" class="boton">
        </form>

       
    </main>
</body>
</html>