<?php
require_once "./display_errors.php";
require_once './session_start.php';

ini_set('allow_url_fopen', 1); //para permitir abrir los archivos subidos

$usuario = $_SESSION["id_usuario"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar imagenes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Descargar facturas</h1>

        <div class="matrix">
            <?php
            //Borramos archivos temporales
            $archivosTemporales = glob('./temp/*'); //obtenemos todos los nombres de los ficheros
            foreach($archivosTemporales as $item){
                if(is_file($item))
                unlink($item); //Eliminamos el archivo
            }


            //Conectar a la bbdd y consulta a tabla imágenes
            include "./conexion_bbdd.php";
            $sql="SELECT * FROM facturas where `id_usuario`=$usuario";
            $resultado=mysqli_query($con,$sql);
            if(mysqli_num_rows($resultado)>0){
                //recorro todos los registros 
                while($fila=mysqli_fetch_array($resultado)){      
                    file_put_contents('./temp/'.$fila['num_factura'].'.jpg', $fila['archivo']); 
            ?>

            <!-- ahora monto la tabla con las facturas -->

            <div>                
                <img src="./temp/<?=$fila['num_factura']?>.jpg" alt="">
                <a href="./temp/<?=$fila['num_factura']?>.jpg" download="<?=$fila['num_factura']?>.jpg"><?=$fila['num_factura']?></a>
            </div>
            <?php
                }
            }
            unset($sql,$resultado);
            mysqli_close($con);
            ?>
        </div>

    </main>
</body>
</html>