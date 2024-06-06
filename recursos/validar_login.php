<?php
        require_once "../recursos/display_errors.php";
        require_once '../recursos/session_start.php';
        
        /* Este archivo se sejcuta cuando doy al boton del fourmaulario del login */
/* recogemos valores */

    if(isset($_POST["email"])){
        $usuario=$_POST["email"];
        $pass=$_POST["pass"];
        
        /* comprobar en BBDD la existencia de usuario t password */
        /* a) abrimos bbdd */
        include "../recursos/conexion_bbdd.php";

        /* b) hacemos select a tabla usuario */
        $sql="SELECT * from `usuarios` WHERE email='$usuario' AND  pass='$pass'"; 
        $resultado=mysqli_query($con,$sql);

        if(mysqli_num_rows($resultado)==0){ /* sino existe insertamos la consulta*/
            /* d) Si no existe pongo mensaje de aviso de que no existe */
            unset($sql,$resultado);    
            mysqli_close($con);   
            $mensajelogin='Usuario ó password incorrecto. Corrija sus datos';
            header("location:../login.php?e=2&me=$mensajelogin");
            die;
        }else{
            /* c) si existe creo la variable de sesion de este usuario */
            $fila=mysqli_fetch_array($resultado);
            $_SESSION["email"]=$fila["email"];
            $_SESSION["nombre"]=trim($fila["nombre"]);
            $_SESSION["id_usuario"]=$fila["id_usuario"];
            $_SESSION["id_rol"]=$fila["id_rol"];
            $_SESSION["telefono]"]=$fila["telefono"];
            $_SESSION["nombre_rol"]="Ninguno";
            $cvalor=$_SESSION["id_rol"];
            switch($cvalor){
                case "1": $_SESSION["nombre_rol"]="Usuario";
                break;
                case "2": $_SESSION["nombre_rol"]="Editor";
                break;
                case "3": $_SESSION["nombre_rol"]="Administrador";
                break;
                case " ": $_SESSION["nombre_rol"]="Vacio";
                break;
                case "0": $_SESSION["nombre_rol"]="Vacio 0";
                break;
            }

                          
                
            unset($sql,$resultado,$fila); 
            mysqli_close($con);   
            header("location:../index.php");  
            die;  
        }
        
    }else{
        $mensajelogin='Debe introducir el usuario';
        header("location:../login.php?&me=$mensajelogin");
        die;
    }

?>