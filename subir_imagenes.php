<?php
    require_once "./display_errors.php";
    /* ini_set('display_errors', 1); */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivos a BBDD y consultarlos o permitir descarga</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Subir, consultar y descargar archivos</h1>

        <form action="./app.php" method="post" enctype="multipart/form-data"> <!-- envía datos codificados, necesario para enviar archivos por el form, sólo si es post -->
            <input type="text" name="titulo" placeholder="Título del archivo">
            <input type="text" name="alt" placeholder="Texto alternativo">
            <input type="file" name="archivo" placeholder="Selecciona el archivo">
            <input type="submit" class="boton">
        </form>

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
            $sql="SELECT * FROM imagenes";
            $resultado=mysqli_query($con,$sql);
            if(mysqli_num_rows($resultado)>0){
                //recorro todos los registros 
                while($fila=mysqli_fetch_array($resultado)){      
                    file_put_contents('./temp/'.$fila['id_imagen'].'.jpg', $fila['archivo']); 
            ?>
            <div>                
                <img src="./temp/<?=$fila['id_imagen']?>.jpg" alt="">
                <a href="./temp/<?=$fila['id_imagen']?>.jpg" download="<?=$fila['id_imagen']?>.jpg">Descargar</a>
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