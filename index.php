<?php
        require_once "./recursos/display_errors.php";
        require_once './recursos/session_start.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios de Uploadas y Dowloadss</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>    
    <main>
        <h1>Ejercicios </h1>
        <section>
            <!-- ejercicio 1: botón que activa un texto -->
            <div class="div_botones">

            <?php
                if(isset($_SESSION["email"])){
            ?>
                    <div class="boton">
                        <!-- <p>Subir Imagenes Imagenes</p>  -->
                        <a href="./subir_imagenes.php">Subir Imagenes</a> 
                    </div>
                    <div class="boton">
                        <!-- <p>Descargar Imagenes</p> -->
                        <a href="./descargar_imagenes.php">Descargar Imagenes</a>
                    </div>
                    <div class="boton">
                         <a href="./subir_facturas.php">Subir Facturas</a> 
                    </div>
                    <div class="boton">
                         <a href="./descargar_facturas.php">Descargar Facturas</a>
                    </div>
                    <div class="boton">
                        <a href="./logout.php">logout</a>
                    </div>
            <?php
                }else{
            ?>   
                    <div class="boton">
                        <a href="./login.php">Login a Zona Privada</a>
                    </div>
            
            <?php
                }
            ?>  
            </div>
        </section>
    </main>
</body>
</html>

