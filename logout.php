<?php
        require_once "./recursos/display_errors.php";
        require_once './recursos/session_start.php';


        if(isset($_SESSION["email"])){
                
                /* unset($_SESSION["email"]);
                session_write_close();
                unset($_SESSION);
                session_unset();    */   
                session_unset();   
                session_destroy();
        }      
        header("location:./index.php");
           
        
?>
