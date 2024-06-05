
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Facturas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Subir imagenes</h1>

        <form action="./app_facturas.php" method="post" enctype="multipart/form-data"> <!-- envía datos codificados, necesario para enviar archivos por el form, sólo si es post -->
            <input type="text" name="numfac" placeholder="Numero de Factura">    
            <input type="file" name="archivo" placeholder="Selecciona la facturas a subir">
            <input type="submit" class="boton">
        </form>

       
    </main>
</body>
</html>