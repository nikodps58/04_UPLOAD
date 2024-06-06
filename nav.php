<?php
           
    /* require_once "./recursos/display_errors.php";
    require_once './recursos/session_start.php'; */
    

    if(isset($_SESSION["nombre"])){
                   $nombre=trim($_SESSION["nombre"]);
                   if($_SESSION["id_rol"]=="1"){
                        /* $variable="Hola, ".$nombre." , bienvenido"; */
                        $variable="Usuario:  ".$nombre;

                   }else{
                        $variable=$nombre." ( ".$_SESSION["nombre_rol"]." )";
                   }
    }
?>

<nav>
    <div id="nav">
        <ul>
            <?php
            
            if(isset($_SESSION["nombre"])){
                echo '<li> <a href="./subir_imagenes.php">Subir imagenes</a> </li>';
                echo '<li> <a href="./descargar_imagenes.php">Descargar imagenes</a> </li>';
                echo '<li> <a href="./subir_facturas.php">Subir facturas</a> </li>';
                echo '<li> <a href="./descargar_facturas.php">Descargar facturas</a> </li>';
                echo '<li> <a href="./logout.php">Logout</a> </li>';
                echo '<li>'.$variable.'</li>';
            }else{
                echo '<li> <a href="./login.php">Login a zona privada</a> </li>';
            }
            ?>
            
        </ul>
    </div>
</nav>