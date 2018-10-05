<?php include "init.php"; 
$obj = new base_class;
if(isset($_POST['send_a'])){
    $num_sesion = $_POST['num_sesion'];
    $num_acuerdo = $_POST['num_acuerdo'];
   
    $descripcion = $_POST['descripcion'];
    $archivo_name = $_FILES['archivo']['name'];
    $archivo_tmp   = $_FILES['archivo']['tmp_name'];
    $fecha_creacion = $_POST['fecha_creacion'];
    $fecha_finiquito = $_POST['fecha_finiquito'];
    $file_path  = "../dist/img/";
    $extensions = ['pdf', 'txt', 'docx'];
    $status = 0;
    $clean_status = 0;
    move_uploaded_file($archivo_tmp, "$file_path/$archivo_name");
    if($obj->Normal_Query("INSERT INTO acuerdos (num_sesion,num_acuerdo, descripcion, archivo,fecha_creacion,fecha_finiquito) 
      VALUES (?,?,?,?,?,?)", [$num_sesion, $num_acuerdo , $descripcion, $archivo_name,$fecha_creacion,$fecha_finiquito])) {
              
                
                 
                 $obj->Create_Session("num_acuerdo", $num_acuerdo);
                 $obj->Create_Session("num_sesion", $num_sesion);
                
                 $obj->Create_Session("fecha_creacion", $fecha_creacion);
                 $obj->Create_Session("fecha_finiquito", $fecha_finiquito);
                 $obj->Create_Session("archivo", $archivo_name);
                 $obj->Create_Session("crear_acuerdo", "El acuerdo se creo correctamente");
                 header("location:verAcuerdos.php");
            }
}




?>




<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Control de acuerdos || crear acuerdos</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="images/muni.jpg">
    <link rel="shortcut icon" href="images/muni.jpg">

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

         <?php include "sidebar.php"?>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include "header.php"?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                    <h1>Creación de acuerdos</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Acuerdos</a></li>
                            <li class="active">Crear acuerdos</li>
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
                          <label for="company" class=" form-control-label">Numero de sesión</label>
                            <div class="input-group">
                             
                              <input type="text" id="username"name="num_sesion" placeholder="" class="form-control">
                            </div>
                          </div>

                         <div class="form-group">
                          <label for="company" class=" form-control-label">Numero de acuerdo</label>
                            <div class="input-group">
                            
                              <input type="text" id="username" name="num_acuerdo" placeholder="" class="form-control">
                            </div>
                          </div>
<hr>
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Descripción:</label></div>
                            <div class="col-12 col-md-9"><textarea name="descripcion" id="textarea-input" rows="9" placeholder="Escriba algo aqui...." class="form-control"></textarea></div>
                          </div>
<hr>
                     <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Seleccione un archivo:</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="archivo" class="form-control-file"></div>
                          </div>


<div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Fecha creación</label>
                                                        <input name="fecha_creacion" type="date" class="form-control" aria-required="true" aria-invalid="false" >
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label >Fecha finiquito</label>
                                                    <div class="input-group">
                                                    <input name="fecha_finiquito" type="date" class="form-control" aria-required="true" aria-invalid="false" >
                                                        

                                                    </div>
                                                </div>
</div>

                        

                    


                          <div class="form-actions form-group"><button type="submit" name="send_a" class="btn btn-success btn-md"><i class="fa fa-check"></i>&nbsp;Crear acuerdo</button>
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