<?php include "init.php"; 
$obj = new base_class;

$id = $_GET['id'];
$obj->Normal_Query("SELECT  * FROM acuerdos WHERE id=$id");
$row = $obj->Single_Result();

$mensaje="Se elimino el acuerdo con número de sesión: ";
$mensaje1=" y numero de acuerdo:";
$mensaje2=" El día ";
$num_sesion= $row->num_sesion;
$num_acuerdo= $row->num_acuerdo;
date_default_timezone_set('America/Costa_Rica');
$espacio="<br>";
$fecha = strftime("%A, %d  %B  %Y %H:%M");
$asunto="No contestar a este correo* se elimino un acuerdo del sistema";
require 'PHPMailer-master/PHPMailerAutoload.php';




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
$mail ->Body = $mensaje.$num_sesion.$mensaje1.$num_acuerdo.$espacio.$espacio.$fecha;
$mail ->AddAddress($_SESSION['user_email']);

if(!$mail->Send())
{
   echo "No se pudo enviar el correo electronico";
}

    if($obj->Normal_Query("DELETE FROM acuerdos WHERE id = ?", [$id])){
        $obj->Create_Session("eliminar_acuerdo", "Se eliminó el acuerdo correctamente");
        header("location:verAcuerdos.php");
}



?>
