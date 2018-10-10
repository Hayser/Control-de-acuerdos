<?php include "init.php"; 
$obj = new base_class;


if(isset($_POST['change_rol'])) {
  $Rol = $_POST['Rol'];
  $id = $_GET['id'];

  if($obj->Normal_Query("UPDATE users SET rolUsuario = ? WHERE id = ?", [$Rol, $id])){
      $obj->Create_Session("rol_actualizado", $Rol);
      $obj->Create_Session("rol_actualizado", "Se actualizo correctamente el rol usuario");
      header("location:usuariosRoles.php");
}
}

if(isset($_POST['change_dep'])) {
  $dep = $_POST['dep'];
  $id = $_GET['id'];

  if($obj->Normal_Query("UPDATE users SET departamento = ? WHERE id = ?", [$dep, $id])){
      $obj->Create_Session("dep_actualizado", $dep);
      $obj->Create_Session("dep_actualizado", "Se actualizo correctamente el departamento del usuario");
      header("location:usuariosRoles.php");
}
}






?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Control de acuerdos || editar rol y departamento</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 <?php include "css.php" ?>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
        <!-- Left Panel -->

    <?php include"sidebar.php" ?><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
      <?php include"header.php"?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Actualizar rol y departamento</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="principal.php">Inicio</a></li>
                            <li class="active">Usuarios</a></li>
                            <li class="active">Editar rol y departamento</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
     
   <div class="col-md-6">
                    <div class="card">
                      <div class="card-header">Información del usuario </div>
                      <div class="card-body card-block">
                        <form action="" method="post" class="" id="miFormulario">
<?php
$id = $_GET['id'];
$obj->Normal_Query("SELECT  * FROM users WHERE id=$id");
$row = $obj->Single_Result();
?>

 <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Rol del usuario</strong>
                            </div>
                            <div class="card-body">

                                  <select   name="Rol" data-placeholder="Escoga el rol de usuario" multiple class="standardSelect">
                                                        <option value=""></option>
                                                        <option value="Alcaldia">Alcaldia</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Jefe de departamento">Jefe de departamento</option>
                                                        <option value="Colaborador">Colaborador</option>
                                                       
                                                        
                                </select>

                            </div>
                        </div>









                        
                        <div class="form-group">
                          <label for="disabled-input" class=" form-control-label">Nombre</label>
                            <div class="input-group">
                                
                              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                              
                              <input type="text"  id="disabled-input" name="disabled-input" placeholder="<?php echo $row->name;?>" disabled=""class="form-control">
                            </div>
                          </div>
                  
                          <div class="form-group">
                          <label for="disabled-input" class=" form-control-label">Correo electronico</label>
                            <div class="input-group">
                                
                              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                              
                              <input type="text"  id="disabled-input" name="disabled-input" placeholder="<?php echo $row->email;?>" disabled=""class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                          <label  for="disabled-input" class=" form-control-label">Departamento</label>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                              <input type="text" id="disabled-input" name="disabled-input" placeholder="<?php echo $row->departamento;?>" disabled="" class="form-control">
                            </div>
                          </div>
                          <div class="form-actions form-group"><button type="submit" name="change_rol" class="btn btn-success btn-md"><i class="fa fa-check"></i>&nbsp;Actualizar rol</button>
                          <button type="button" class="btn btn-danger btn-md" onClick="funcion_reiniciar();"><i class="fa fa-ban"></i>&nbsp;Reinicar campos</button>
                        </div>
                          
                        </form>
                      </div>
                    </div>
                  </div>



                   <div class="col-md-6">

                    <div class="card">
                      <div class="card-header">Departamento del usuario</div>
                      <div class="card-body card-block">
                        <form action="" method="post" class="" id="miFormulario">

                          <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Departamento</strong>
                            </div>
                            <div class="card-body">

                                  <select  name="dep" data-placeholder="Escoga el departamento" multiple class="standardSelect">
                                                        <option value=""></option>
                                                        <option value="Alcaldia">Alcaldia</option>
                                                        <option value="Proveduría">Proveduría</option>
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
                  
                         
                          
                          
                          <div class="form-actions form-group"><button type="submit" name="change_dep" class="btn btn-success btn-md"><i class="fa fa-check"></i>&nbsp;Actualizar departamento</button>
                          <button type="button" class="btn btn-danger btn-md" onClick="funcion_reiniciar();"><i class="fa fa-ban"></i>&nbsp;Reinicar campos</button>
                        </div>
                          
                        </form>
                      </div>
                    </div>
                  </div>





    </div><!-- /#right-panel -->

    <!-- Right Panel -->


   <?php include "scripts.php" ?>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

    <script type="text/javascript">
    function funcion_reiniciar(){
        document.getElementById("miFormulario").reset();
    }
    
    </script>
 
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