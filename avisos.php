<?php include "init.php";
$obj = new base_class;
if (isset($_POST['Enviar'])) {
   // $destinatario = $_POST['Destinatario'];
    $asunto = $_POST['Asunto'];
    $descripcion = $_POST['descripcion'];
    //$archivo_name = $_FILES['file']['name'];
    //$archivo_tmp = $_FILES['file']['tmp_name'];
    
  
require 'PHPMailer-master/PHPMailerAutoload.php';

   
   date_default_timezone_set('America/Costa_Rica');
   $espacio="<br>";
   $fecha = strftime("%A, %d  %B  %Y %H:%M");
   
   
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
   for ($i=0; $i < count($_FILES['file']['tmp_name']); $i++) { 
    $mail->AddAttachment($_FILES['file']['tmp_name'][$i],
    $_FILES['file']['name'][$i]);
   }
  
                         
   $mail ->SetFrom("infomunicipalidadsanisidro@gmail.com");
   $mail ->Subject = $asunto;
   $mail ->Body = $descripcion.$espacio.$fecha;
 
   $obj->Normal_Query("SELECT  * FROM users");
   $message_row = $obj->fetch_all();

   foreach ($message_row as $row) :
   
   $mail ->AddAddress($row->email);
  
endforeach;
   if(!$mail->Send())
   {
       echo "No se pudo enviar el correo electronico";
   }
   header("location:avisos.php");
   
}
?>

<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Control de acuerdos || avisos</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="images/muni.jpg">
    <link rel="shortcut icon" href="images/logoMuni.png">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
        <!-- Left Panel -->

         <?php include "sidebar.php" ?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include "header.php" ?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                    <h1>Envio de avisos</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="principal.php">Inicio</a></li>
                            <li class="active">Ayuda</li>
                            <li class="active">Enviar Avisos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-1">
            <div class="animated fadeIn">

                <div class="row">
                    
                 
                <div class="col-lg-8">
                    <div class="card">

                      <div class="card-header">Todos los campos son obligatorios* </div>
                      <div class="card-body card-block">
                        <form form method="POST" action="" enctype="multipart/form-data">


                   

                         <div class="form-group">
                          <label for="company" class=" form-control-label">Asunto</label>
                            <div class="input-group">
                            
                              <input type="text" id="Asunto" name="Asunto" placeholder="" class="form-control">
                            </div>
                          </div>
<hr>
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Descripción:</label></div>
                            <div class="col-12 col-md-9"><textarea name="descripcion" id="textarea-input" rows="9" placeholder="Descripción" class="form-control"></textarea></div>
                          </div>
<hr>
                     <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Seleccione los archivos:</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="file[]" multiple="multiple" class="form-control-file"></div>
                          </div>




                        

                    


                          <div class="form-actions form-group"><button type="submit" name="Enviar" class="btn btn-success btn-md"><i class="fa fa-check"></i>&nbsp;Enviar</button>
                          
                          
                          <button type="submit" class="btn btn-danger btn-md"><i class="fa fa-ban"></i>&nbsp;Reinicar campos</button>
                        </div>
                          
                        </form>
                      </div>
                    </div>
                  </div>


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>

</body>
</html>