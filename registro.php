<?php
include "init.php";
$obj = new base_class;
if (isset($_POST['enviar'])) {
    $nombre = $obj->security($_POST['nombre']);
    $apellido = $obj->security($_POST['apellido']);
    $email = $obj->security($_POST['email']);
    $contraseña = $obj->security($_POST['contraseña']);
    $img_name = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    $img_path = "images";
    $extensions = ['jpg', 'jpeg', 'png'];

    $clean_status = 0;

    move_uploaded_file($img_tmp, "$img_path/$img_name");

    //Manejo de errores
    //Revisar espacios vacios

    if ($obj->Normal_Query("SELECT * FROM users WHERE email = ?", [$email])) {
        if ($obj->Count_Rows() == 1) {
        } else {
            echo "Email ya registrado";
        }
    }
        //encriptando la contrasenna
    $hashhedPwd = password_hash($contraseña, PASSWORD_DEFAULT);
        //Insertar en la base de datos
    if ($obj->Normal_Query("INSERT INTO users (name, last_name, email, password, image) 
            VALUES (?,?,?,?,?)", [$nombre, $apellido, $email, $hashhedPwd, $img_name])) {
        $obj->Create_Session("account_success", "La cuenta ha sido creada exitosamente");
        
        header("location:login.php");
    }
    $mensaje="Se creo un nuevo usuario en el sistema: ";
    $mensaje1=" ";
    $asunto="No contestar a este correo* nuevo usuario registrado en el sistema";
   require 'PHPMailer-master/PHPMailerAutoload.php';
   $email1="infomunicipalidadsanisidro@gmail.com";
   
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
   $mail ->Body = $mensaje.$nombre.$mensaje1.$email;
   $mail ->AddAddress($email1);
   
   if(!$mail->Send())
   {
       echo "No se pudo enviar el correo electronico";
   }
   else
   {
       
   }

} /*else {
        //Revisar si los caracteres de entrada son validos
        if (!preg_match("/^[a-aA-Z]*$", $nombre)) {
            header("location: ../narrow-jumbotron/registro.php?registro=invalido");
            exit();
        }*/ /*else {
            //Revisar que el email sea valido
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("location: ../narrow-jumbotron/registro.php?registro=email");
                exit();
            }*/ 
        //}
    //}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="icon" href="images/logoMuni.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="narrow-jumbotron.css" rel="stylesheet">
</head>

<style>
    body {
      padding-top: 1.5rem;
      padding-bottom: 1.5rem;
      background-image: url("images/noise.png");
    }
</style>

<body>
    <div class="container">
        <div class="header clearfix">
            <nav>
              <ul class="nav nav-pills float-right">
                <li class="nav-item">
                  <a class="nav-link active" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Iniciar Sesión</a>
                </li>
              </ul>
            </nav>
            <h4 class="text-muted">Crear un nuevo usuario</h4>
        </div>
        
        <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
        <header class="card-header">
            <!-- <a href="login.php" class="float-right btn btn-outline-primary mt-1">Iniciar sesión</a> -->
            <h4 class="card-title mt-2">Registro</h4>
        </header>
        <article class="card-body">
        <form method="POST" action="" enctype="multipart/form-data"><!-- Inicio del formulario-->

        <?php 
        $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($fullUrl, "registro=vacio") == true) {
            echo "<p style='color:red;'>* Complete los espacios vacíos</p>";
        }
        ?>

        <?php 
        $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($fullUrl, "registro=correcto") == true) {
            echo "<strong style='color:green;'>¡Cuenta registrada!</strong>";
        }
        ?>

            <?php 
            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "registro=incorrecto") == true) {
                echo "<strong style='color: red;'>* Espacios obligatorios</strong>";
            }
            ?>

            <div class="form-row">
                <div class="col form-group">
                    <label>Nombre</label>   
                    <input type="text" name="nombre" class="form-control" placeholder="" required autofocus>
                </div> <!-- form-group end.// -->
                
            </div> <!-- form-row end.// -->
            
            <?php 
            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "registro=nombreVacio") == true) {
                echo "<p style='color:red;'>Ingrese un nombre</p>";
            }
            if (strpos($fullUrl, "registro=invalido") == true) {
                echo "<p style='color:red;'>Ingrese un nombre válido</p>";
            }
            ?>

            <div class="form-row">
                <div class="col form-group">
                    <label>Apellido</label>   
                    <input type="text" name="apellido" class="form-control" placeholder="" required autofocus>
                </div> <!-- form-group end.// -->
                
            </div> <!-- form-row end.// -->
            <?php 
            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "registro=apellidoVacio") == true) {
                echo "<p style='color:red;'>Ingrese un apellido</p>";
            }
            if (strpos($fullUrl, "registro=invalido") == true) {
                echo "<p style='color:red;'>Ingrese un nombre válido</p>";
            }
            ?>
            
            <div class="form-group">
                <label>Email </label>
                <input type="email" name="email" class="form-control" placeholder="" required autofocus>
            </div> <!-- form-group end.// -->
            <?php 
            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "registro=emailVacio") == true) {
                echo "<p style='color:red;'>Ingrese un correo electrónico</p>";
            }
            /*if (strpos($fullUrl, "registro=email") == true) {
                echo "<p style='color:red;'>Ingrese un correo válido.</p>";
            }*/
            if (strpos($fullUrl, "registro=emailUsado") == true) {
                echo "<p style='color:red;'>Correo en uso</p>";
            }
            ?>
           
            <div class="form-row">
              
            </div> <!-- form-row.// -->

            <div class="form-group">
                <label>Contraseña</label>
                <input name="contraseña" class="form-control" type="password" required autofocus>
            </div> <!-- form-group end.// -->  
            <?php 
            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "registro=contrasenaVacia") == true) {
                echo "<p style='color:red;'>Ingrese una contraseña</p>";
            }
            ?>

            <div class="group">
   				<label for="file" id="file-label"><i class="fas fa-cloud-upload-alt upload-icon"></i>Imagen</label>
   				<input type="file" name="img" class="file" id="file" required autofocus>
            </div>
            <?php 
            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "registro=imgVacia") == true) {
                echo "<p style='color:red;'>Cargue una imagen desde su dispositivo</p>";
            }
            ?>
               
            <br>

            <div class="form-group">
                <button type="submit" name="enviar" class="btn btn-success btn-block">Crear cuenta</button>
            </div> <!-- form-group// -->   

            <?php 
            $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($fullUrl, "registro=correcto") == true) {
                echo "<strong style='color:darkblue;'>¡Cuenta registrada!</strong>";
            }
            ?>
                                       
        </form>
        </article> <!-- card-body end .// -->
      
        </div> <!-- card.// -->
        </div> <!-- col.//-->
        
        </div> <!-- row.//-->
        
        </div> 
        <!--container end.//-->
        
</body>
</html>
