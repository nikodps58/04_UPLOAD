<?php
require_once "./display_errors.php";
require_once './session_start.php';

ini_set('file_upload', 1); //para permitir subir los archivos
ini_set('allow_url_fopen', 1); //para permitir abrir los archivos subidos



/* 
En XAMPP, en el "config a MySQL se edita el archivo my.ini donde cambiaremos el valor de max_allowed_packet=1M por otro superior, por ejemplo 100M. Sino tendremos capado el subir arhivos cuya encriptación supere 1MB

innodb_log_file_size=10M
innodb_log_buffer_size=15M
*/


if($_POST){
    $num_factura = $_POST['numfac'];
    $archivo = $_FILES['archivo'];
    $usuario = $_SESSION["id_usuario"];

    /* comprobar que no supere el tamaño limite */
    $tamano=$archivo['size'];
    $tamanoMaximoKB = "10000"; //Tamaño máximo expresado en KB
    $tamanoMaximoBytes = $tamanoMaximoKB * 1024; //Pasamos el valor a BYTES
    if($tamano > $tamanoMaximoBytes){
        header('location:index.php?e=1');
        die;
    }

   //COMPROBAMOS QUE SEA UNA EXTENSIÓN DESEADA
    $nombreArchivo = $archivo['name'];//cogemos el nombre del archivo
    $nombreArchivoDespiezado = explode(".", $nombreArchivo);//separamos el nombre de la extensión en un array
    $extensionArchivo = strtolower(end($nombreArchivoDespiezado));//pasamos a minúsculas y cogemos el último item (donde está la extensión)
    $arrayExtensiones = array('jpg','zip','pdf', 'xls', 'doc'); //hacemos un array donde metemos las extensiones que queremos admitir
    if (!in_array($extensionArchivo, $arrayExtensiones)) { //comprobamos si la extensión del archivo NO está dentro del array
        header('location:index.php?e=2');
        die;
    }

    //POR CAMBIAR, COGEMOS AHORA EL NOMBRE DEL ARCHIVO TEMPORAL QUE ESTÁ EN EL SERVIDOR, COGEMOS SU CONTENIDO Y CODIFICAMOS
    $nombreArchivoTemp = $archivo['tmp_name']; 
    $archivoCodificado = addslashes(file_get_contents($nombreArchivoTemp)); //cogenmos el contenido y lo codificamos

    /* SUBIMOS A LA BBDD*/
    include "./conexion_bbdd.php";
    $sql="INSERT INTO `facturas`(`id_factura`, `num_factura`, `id_usuario`, `archivo`) VALUES (NULL,'$num_factura',$usuario,'$archivoCodificado')";
    $resultado=mysqli_query($con,$sql);
    unset($sql,$resultado);
    mysqli_close($con);
    /* header('location:index.php?a='.$titulo."'");
        die; */

}

header('location:./subir_facturas.php');


