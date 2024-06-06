<?php
    require_once "./recursos/display_errors.php";
    require_once './recursos/session_start.php';
    ini_set('allow_url_fopen', 1); //para permitir abrir los archivos subidos
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Facturas</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- miro si existe sesion y sino la creo -->
    <?php
        if(isset($_SESSION["email"])){
            /* echo "Existe sesion";  */
            /* echo $_SESSION["email"]; */
            $email=$_SESSION["email"];
            $usuario = $_SESSION["id_usuario"];
        }else{
             /* echo "No existe sesion";  */
                      
        }
        $cquefactura='ninguno';
        if(isset($_GET["f"])){
            $cquefactura=$_GET["f"];
        }
    ?>
    
    <!-- nav -->
    <h1>Listado de facturas</h1>
        
    <?php
    include "./nav.php"
    ?>


<main>
    
    <section>
        <div class="facturas">
    <?php
        //Borramos archivos temporales
        $archivosTemporales = glob('./temp/*'); //obtenemos todos los nombres de los ficheros
        foreach($archivosTemporales as $item){
            if(is_file($item))
            unlink($item); //Eliminamos el archivo
        }


        //Conectar a la bbdd y consulta a tabla imágenes
        include "./recursos/conexion_bbdd.php";
        $sql="SELECT * FROM facturas where `id_usuario`=$usuario";
        $resultado=mysqli_query($con,$sql);
        if(mysqli_num_rows($resultado)>0){
            $nreg=mysqli_num_rows($resultado);
            // ahora monto la tabla con las facturas
            // pongo cabeceras de la tabla
    ?>
            <table class="tabla_usuarios" width=100% >
                
                <tr class="tabla_cab1">
                    <th>Cliente</th>
                    <th>Nº. Factura</th>
                    <th>Archivo</th>
                    <th>Ver factura</th>
                </tr>
    <?php
            //recorro todos los registros 
            $nid=0;
            for($nid=1; $nid<=$nreg; $nid++){
                $fila=mysqli_fetch_array($resultado);    
                $id_usuario=$fila["id_usuario"];
                $numfac=$fila["num_factura"];
                $nomfac=$fila["nombre_archivo"];
                $imagen='<img class="imagen_factura" data-id='.$nomfac.' src="./imagenes/ver_32x32.png" alt="descargar_factura"> </img>';    
                echo '<tr>';
                echo '<td ALIGN="CENTER">'.$id_usuario.'</td>';
                echo '<td ALIGN="CENTER">'.$numfac.'</td>';
                echo '<td ALIGN="CENTER">'.$nomfac.'</td>';
                echo '<td ALIGN="CENTER">'.$imagen.'</td>';
                echo '</tr>';
    ?>
        
                    
    <?php
            }
            echo '</table>';
        }
        echo '</div>';
    echo '</section>';

    /* sacar linea de factura */

    if($cquefactura=='ninguno'){
        // nada
    }else{
        echo '<section>';
            echo '<div class="facturas">';
            $sql2="SELECT * FROM facturas where `nombre_archivo`='$cquefactura'";
            echo $sql2;
            $resultado2=mysqli_query($con,$sql2);
            if(mysqli_num_rows($resultado2)>0){
                $fila=mysqli_fetch_array($resultado2);    
                $id_usuario=$fila["id_usuario"];
                $numfac=$fila["num_factura"];
                $nomfac=$fila["nombre_archivo"];
                /* file_put_contents('./temp/'.$nomfac.'pdf', $fila['archivo']);  */
                file_put_contents('./temp/'.$nomfac, $fila['archivo']); 
                $refer1='<a href="';
                $refer2='./temp/'.$nomfac.'';
                $refer3='"';
                $refer4=' download="';
                $refer5='>Descargar</a>';
                /* $srefer='<a href="./temp/"'.$nomfac.'" download="'.$fila["num_factura"].'pdf">Descargar</a> */
                $refer=$refer1.$refer2.$refer3.$refer4.$nomfac.$refer3.$refer5;
                
                echo '<table class="tabla_usuarios">';
                    echo '<tr class="tabla_cab1">';
                        echo '<th>Cliente</th>';
                        echo '<th>Numero factura</th>';
                        echo '<th>Archivo</th>';
                        echo '<th>descargar factura</th>';
                    echo '<tr>';
                    echo '<tr>';
                    echo '<td ALIGN="CENTER">'.$id_usuario.'</td>';
                    echo '<td ALIGN="CENTER">'.$numfac.'</td>';
                    echo '<td ALIGN="CENTER">'.$nomfac.'</td>';
                    echo '<td ALIGN="CENTER">'.$refer.'</td>';
                    echo '<tr>';
                }    
            unset($sql2,$resultado2);
            echo '</div>';
        echo '</section>';
        $refer='location:./temp/'.$nomfac;
        
        header($refer);
        /* header("location:./temp/300001.pdf"); */
                    die;
    }

    unset($sql,$resultado);
    mysqli_close($con);
    
    ?>
    </div>
    </section>
    
</main>

<script src="./js/factura.js"></script>
</html>