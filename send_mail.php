<?php
    
    $mailto = $_POST['mail_to'];
    $mailSub = $_POST['mail_sub'];
    $mailMsg = $_POST['mail_msg'];
    $nombre ="Marta Vega Carballo";
    $mensaje="Se creo un nuevo usuario en el sistema: ";
    $asunto="No contestar a este correo* nuevo usuario registrado en el sistema";
   require 'PHPMailer-master/PHPMailerAutoload.php';
   $email="infomunicipalidadsanisidro@gmail.com";
 
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "infomunicipalidadsanisidro@gmail.com";
   $mail ->Password = "Daykel1511";
   $mail ->SetFrom("infomunicipalidadsanisidro@gmail.com");
   $mail ->Subject = $asunto;
   $mail ->Body = $mensaje.$nombre;
   $mail ->AddAddress($email);

   if(!$mail->Send())
   {
       
   }
   else
   {
       echo "Se envio el correo electronico";
   }


?>


   

