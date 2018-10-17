<?php include "init.php";
$obj = new base_class;



if (isset($_POST['change_date'])) {
    $fecha_finiquito = $_POST['fecha_finiquito'];
    $id = $_GET['id'];

    if ($obj->Normal_Query("UPDATE acuerdos SET fecha_finiquito = ? WHERE id = ?", [$fecha_finiquito, $id])) {
        $obj->Create_Session("fecha_acuerdo", $fecha_finiquito);
        $obj->Create_Session("date_updated", "Se actualizó correctamente la fecha del acuerdo");
        header("location:editarAcuerdo.php");
    }
}


if (isset($_POST['change_dep'])) {
    $estado_acuerdo = $_POST['est'];
    $id = $_GET['id'];

    if ($obj->Normal_Query("UPDATE acuerdos SET estado_alcaldia = ? WHERE id = ?", [$estado_acuerdo, $id])) {
        
        $obj->Normal_Query("SELECT * FROM `acuerdos` WHERE id = ?", [$id]);
        $obj->Count_Rows();
        $row = $obj->Single_Result();
        $num = $row->num_acuerdo;
        $dep = $row->departamento;

        $obj->Normal_Query("INSERT INTO notificaciones (num_acuerdo, departamento, estado_alcaldia) 
                            VALUES (?,?,?)", [$num, $dep, $estado_acuerdo]);
        
        $obj->Create_Session("fecha_acuerdo", $estado_acuerdo);
        $obj->Create_Session("date_updated", "Se actualizó correctamente el estado del acuerdo");
        header("location:editarAcuerdo.php");
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
    <title>Control de acuerdos || editar fecha de finiquito</title>
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
                    <h1>Fecha de finiquito y estado</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="principal.php">Inicio</a></li>
                            <li><a class="active">Acuerdos</a></li>
                            <li class="active">Editar fecha de finiquito</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-1">
            <div class="animated fadeIn">

                <div class="row">
                    
                 
                <div class="col-lg-6">
                    <div class="card">
                    <?php
                    $id = $_GET['id'];
                    $obj->Normal_Query("SELECT  * FROM acuerdos WHERE id=$id");
                    $row = $obj->Single_Result();
                    ?>
                      <div class="card-header">Editar fecha de finiquito </div>
                      <div class="card-body card-block">
                        <form action="" method="post" class="">

                        <div class="form-group">
                          <label  for="disabled-input" class=" form-control-label">Numero de sesión</label>
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

                           <div class="row form-group">
                            <div class="col col-md-1"><label for="disabled-input" class=" form-control-label">Descripción:</label></div>
                            <div class="col-12 col-md-12"><textarea name="disabled-input"" id="disabled-input" rows="9" placeholder="<?php echo $row->descripcion; ?>"  disabled="" class="form-control"></textarea></div>
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
                              <input id="cc-pament" name="fecha_finiquito" type="date" class="form-control" aria-required="true" aria-invalid="false" placeholder="Dia">
                            </div>
                          </div>

                          <div class="form-actions form-group"><button type="submit" name="change_state" class="btn btn-success btn-md"><i class="fa fa-check"></i>&nbsp;Cambiar fecha de finiquito</button>
                          <button type="submit" class="btn btn-danger btn-md"><i class="fa fa-ban"></i>&nbsp;Reinicar campos</button>
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
                                                        <option value="Asignado a departamento">Asignado a departamento</option>
                                                       
                                </select>

        </div>
    </div>

     
      
      
      <div class="form-actions form-group"><button type="submit" name="change_dep" class="btn btn-success btn-md"><i class="fa fa-check"></i>&nbsp;Actualizar Estado</button>
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