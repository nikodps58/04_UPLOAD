
<?php
    require_once "./recursos/display_errors.php";
    require_once './recursos/session_start.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Facturas</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- miro si existe sesion y sino la creo -->
    <?php
        if(isset($_SESSION["email"])){
            /* echo "Existe sesion";  */
            /* echo $_SESSION["email"]; */
            $email=$_SESSION["email"];
        }else{
             /* echo "No existe sesion";  */
                      
        }
    ?>
    
    <!-- nav -->
    <h1>Subir facturas </h1>
    
    <?php
    include "./nav.php"
    ?>
        
    <header>
    </header>

    
    <main>
        <section>
            <!-- <h1>Subir imagenes</h1> -->

            <form action="./app_facturas.php" method="post" enctype="multipart/form-data"> <!-- envía datos codificados, necesario para enviar archivos por el form, sólo si es post -->
                <input type="text" name="numfac" placeholder="Numero de Factura">    
                <input type="file" name="archivo" placeholder="Selecciona la facturas a subir">
                <input type="submit" class="boton">
            </form>
        <section>
       
    </main>
            
</body>
</html>