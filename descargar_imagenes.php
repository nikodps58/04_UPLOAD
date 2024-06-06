<?php
    require_once "./recursos/display_errors.php";
    /* ini_set('display_errors', 1); */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar imagenes</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <h1>Descargar Imagenes de la galeria</h1>

        <div class="matrix">
            <?php
            //Borramos archivos temporales
            $archivosTemporales = glob('./temp/*'); //obtenemos todos los nombres de los ficheros
            foreach($archivosTemporales as $item){
                if(is_file($item))
                unlink($item); //Eliminamos el archivo
            }


            //Conectar a la bbdd y consulta a tabla imágenes
            include "./recursos/conexion_bbdd.php";
            $sql="SELECT * FROM imagenes";
            $resultado=mysqli_query($con,$sql);
            if(mysqli_num_rows($resultado)>0){
                //recorro todos los registros 
                while($fila=mysqli_fetch_array($resultado)){      
                    file_put_contents('./temp/'.$fila['titulo'].'.jpg', $fila['archivo']); 
                    /* file_put_contents('./temp/'.$fila['id_imagen'].'.jpg', $fila['archivo']);  */
            ?>
            <div>                
                <!-- <img src="./temp/<?=$fila['d_imagen']?>.jpg" alt="">
                <a href="./temp/<?=$fila['id_imagen']?>.jpg" download="<?=$fila['id_imagen']?>.jpg">Descargar</a> -->
                <img src="./temp/<?=$fila['titulo']?>.jpg" alt="">
                <a href="./temp/<?=$fila['titulo']?>.jpg" download="<?=$fila['titulo']?>.jpg">Descargar</a>
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