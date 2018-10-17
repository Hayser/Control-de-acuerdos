<?php include "init.php";
$obj = new base_class;

if (isset($_POST['asiganarDepartamento'])) {

    $education = $_REQUEST["education"];
    $value = implode("<br>", $education);
    $id = $_GET['id'];

    if ($obj->Normal_Query("UPDATE acuerdos SET departamento = ? WHERE id = ?", [$value, $id])) {

        $obj->Create_Session("asignar_departamento", "Se asignó correctamente el acuerdo a(los) nuevo(s) departamento(s)");
        header("location:verAcuerdos.php");
        $obj->Normal_Query("UPDATE acuerdos SET estado_alcaldia = ? WHERE id = ?", ['Asignado a departamento', $id]);
    }
    $id = $_GET['id'];
$obj->Normal_Query("SELECT  * FROM acuerdos WHERE id=$id");
$row = $obj->Single_Result();

$mensaje="Se asigno el acuerdo con número de sesión: ";
$mensaje1=" y numero de acuerdo:";
$mensaje2=" al departamento(s) de:";
$num_sesion= $row->num_sesion;
$num_acuerdo= $row->num_acuerdo;
$asunto="No contestar a este correo* se asigno un acuerdo en el sistema";
require 'PHPMailer-master/PHPMailerAutoload.php';
date_default_timezone_set('America/Costa_Rica');

$fecha = strftime("%A, %d  %B  %Y %H:%M");
$espacio="<br>";



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
$mail ->Body = $mensaje.$num_sesion.$mensaje1.$num_acuerdo.$mensaje2.$espacio.$value.$espacio.$espacio.$fecha;
$mail ->AddAddress($_SESSION['user_email']);

if(!$mail->Send())
{
   echo "No se pudo enviar el correo electronico";
}
}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Control de acuerdos || asignar acuerdos</title>
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
                    <h1>Asignar departamentos al acuerdo</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="principal.php">Inicio</a></li>
                            <li><a class="active">Acuerdos</a></li>
                            <li class="active">Asignar acuerdos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">
                    
                 
                <div class="col-lg-7">
                    <div class="card">
                    <?php
                    $id = $_GET['id'];
                    $obj->Normal_Query("SELECT  * FROM acuerdos WHERE id=$id");
                    $row = $obj->Single_Result();
                    ?>
                      <div class="card-header">Puede escoger entre 1 o varios departamentos </div>
                      <div class="card-body card-block">
                        <form action="" method="post" class="">


                            <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Departamentos</strong>
                            </div>
                            <div class="card-body">

                                  <select  name="education[]" data-placeholder="Escoga el departamento(s)" multiple class="standardSelect">
                                                        <option value=""></option>
                                                        <option value="Alcaldia">Alcaldía</option>
                                                        <option value="Proveduría">Proveeduría</option>
                                                        <option value="Recursos Humanos">Recursos Humanos</option>
                                                        <option value="Gestión Social">Gestión Social</option>
                                                        <option value="Departamento Legal">Departamento Legal</option>
                                                        <option value="Informática">Informática</option>
                                                        <option value="CECUDI">CECUDI</option>
                                                        <option value="Contabilidad">Contabilidad</option>
                                                        <option value="Tesorería">Tesorería</option>
                                                        <option value="Planificación Urbana">Planificación Urbana</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                          <label  for="disabled-input" class=" form-control-label">Número de sesión</label>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                              <input type="text" id="disabled-input" name="disabled-input" placeholder="<?php echo $row->num_sesion; ?>" disabled="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                          <label  for="disabled-input" class=" form-control-label">Número de acuerdo</label>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                              <input type="text" id="disabled-input" name="disabled-input" placeholder="<?php echo $row->num_acuerdo; ?>" disabled="" class="form-control">
                            </div>
                          </div>

                          <div class="form-group">
                          <label  for="disabled-input" class=" form-control-label">Fecha de creación</label>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                              <input type="text" id="disabled-input" name="disabled-input" placeholder="<?php echo $row->fecha_creacion; ?>" disabled="" class="form-control">
                            </div>
                          </div>

                        <div class="form-group">
                          <label  for="disabled-input" class=" form-control-label">Fecha de finiquito</label>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                              <input type="text" id="disabled-input" name="disabled-input" placeholder="<?php echo $row->fecha_finiquito; ?>" disabled="" class="form-control">
                            </div>
                          </div>

                          <div class="form-actions form-group"><button type="submit" name="asiganarDepartamento" class="btn btn-success btn-md"><i class="fa fa-check"></i>&nbsp;Asignar acuerdo</button>
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
