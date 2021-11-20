<?php 
    ob_start();
    if($_POST){
        $visitor_name = "";
        $visitor_email = "";
        $emai_title = "";
        $visitor_message = "";
        $recipient = "moonshotcostumes@gmail.com";

        if(isset($_POST['nombre'])){
            $visitor_name = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        }

        if(isset($_POST['correo'])){
            $visitor_email = str_replace(array("\r","\n","%0a","%0d"),'',$_POST['nombre']);
            $visitor_email = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
        }
        if(isset($_POST['titulo'])){
            $emai_title = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
        }
        if(isset($_POST['mensaje'])){
            $visitor_message = filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);
        }
        $headers = 'MIME-Version: 1.0'."\r\n".
        'Content-type: text/html; charset=utf-8'."\r\n"
        .'From: '. $visitor_email."\r\n";
        if(mail($recipient,$emai_title,$visitor_message,$headers)){
            echo "<p>Gracias por contactarte</p>";
            header("refresh:1;url= https://mousema.000webhostapp.com/index.html"); 
            ob_end_flush();
            
        } else{
            echo "<p>No se pudo enviar</p>";
            
        }
    } else{
        echo "<p>salio mal</p>";
    }
?>