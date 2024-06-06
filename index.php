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
    <h1>Ejercicios para subir y bajar ficheros </h1>
    
    <?php
    include "./nav.php"
    ?>
        
    <header>
    </header>

            
</body>
</html>