<?php include "init.php"; 
$obj = new base_class;







if(isset($_POST['change_est'])) {
    $estado_colaborador = $_POST['est'];
    $id = $_GET['id'];

    if($obj->Normal_Query("UPDATE acuerdos SET estado_colaborador = ? WHERE id = ?", [$estado_colaborador, $id])){
        $obj->Create_Session("fecha_acuerdo", $estado_colaborador);
        $obj->Create_Session("estado_jefe", "Se actualizo correctamente el estado del acuerdo");
        header("location:verColaboradoresCol.php");
}
}




$user_department = $_SESSION['user_deparment'];



$user_rol = 'Colaborador';

?>




<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Control de acuerdos || asignar colaboradores</title>
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

         <?php include "sidebarJefe.php"?>

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
                    <h1>Asignar colaboradores al acuerdo</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Acuerdos</a></li>
                            <li class="active">Asignar colaboradores</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">
                    
                 
                <div class="col-lg-6">
                    <div class="card">
                    <?php
$id = $_GET['id'];
$obj->Normal_Query("SELECT  * FROM acuerdos WHERE id=$id");
$row = $obj->Single_Result();
?>
                      <div class="card-header">Acuerdo </div>
                      <div class="card-body card-block">
                        <form action="" method="post" class="">









                        <div class="form-group">
                          <label  for="disabled-input" class=" form-control-label">Numero de sesión</label>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                              <input type="text" id="disabled-input" name="disabled-input" placeholder="<?php echo $row->num_sesion;?>" disabled="" class="form-control">
                            </div>
                          </div>


                          <div class="form-group">
                          <label  for="disabled-input" class=" form-control-label">Numero de acuerdo</label>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                              <input type="text" id="disabled-input" name="disabled-input" placeholder="<?php echo $row->num_acuerdo;?>" disabled="" class="form-control">
                            </div>
                          </div>

  <div class="row form-group">
                            <div class="col col-md-1"><label for="disabled-input" class=" form-control-label">Descripción:</label></div>
                            <div class="col-12 col-md-12"><textarea name="disabled-input"" id="disabled-input" rows="9" placeholder="<?php echo $row->descripcion;?>"  disabled="" class="form-control"></textarea></div>
                          </div>


                          <div class="form-group">
                          <label  for="disabled-input" class=" form-control-label">Fecha de creación</label>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                              <input type="text" id="disabled-input" name="disabled-input" placeholder="<?php echo $row->fecha_creacion;?>" disabled="" class="form-control">
                            </div>
                          </div>

                        <div class="form-group">
                          <label  for="disabled-input" class=" form-control-label">fecha de finiquito</label>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                              <input type="text" id="disabled-input" name="disabled-input" placeholder="<?php echo $row->fecha_finiquito;?>" disabled="" class="form-control">
                            </div>
                          </div>
                          

                    


                         
                          
                        </form>
                      </div>
                    </div>


                    
                  </div>

                 <div class="col-md-6">

<div class="card">
  <div class="card-header">Editar estado del acuerdo</div>
  <div class="card-body card-block">
    <form action="" method="post" class="" id="miFormulario">

      <div class="card">
        <div class="card-header">
            <strong class="card-title">Estado del acuerdo</strong>
        </div>
        <div class="card-body">

                                       <select  name="est" data-placeholder="Seleccione un estado para el acuerdo" multiple class="standardSelect">
                                                        <option value=""></option>
                                                        <option value="Finalizado">Finalizado</option>
                                                        <option value="Incompleto">Incompleto</option>
                                                        
                                                       
                                </select>

        </div>
    </div>

     
      
      
      <div class="form-actions form-group"><button type="submit" name="change_est" class="btn btn-success btn-md"><i class="fa fa-check"></i>&nbsp;Actualizar Estado</button>
      <button type="button" class="btn btn-danger btn-md" onClick="funcion_reiniciar();"><i class="fa fa-ban"></i>&nbsp;Reinicar campos</button>
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
