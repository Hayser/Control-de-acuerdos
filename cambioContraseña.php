<?php include "init.php"; 
$obj = new base_class;

if(isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
	$new_password     = $_POST['new_password'];
	$retype_password  = $_POST['retype_password'];

    $current_status = $new_status = $retype_status = 1;

    if(empty($current_password)) {
		$current_password_error = "No se ha ingresado la contraseña";
		$current_status = "";
	}

	if(empty($new_password)) {
		$new_password_error = "No se ha ingresado una nueva contraseña";
		$new_status = "";
	} else if(strlen($new_password) < 6) {
		$new_password_error = "La contraseña debe tener al menos 6 caracteres";
		$new_status = "";
	}

	if(empty($retype_password)) {
		$retype_password_error = "No se ha ingresado de nuevo la contraseña";
		$retype_status = "";
	} else if($new_password != $retype_password) {
		$retype_password_error = "Las contraseñas no coinciden ";
		$retype_status = "";
    }
    
    if(!empty($current_status) && !empty($new_status) && !empty($retype_status)) {
        $user_id = $_SESSION['user_id'];
        if($obj->Normal_Query("SELECT password FROM users WHERE id = ?", [$user_id])) {
            $row = $obj->Single_Result();
            $db_password = $row->password;
            if(password_verify($current_password, $db_password)){
                if($obj->Normal_Query("UPDATE users SET password = ? WHERE id = ?", [password_hash($new_password,PASSWORD_DEFAULT), $user_id])) {
                    $obj->Create_Session("password_updated", "su contraseña se cambió correctamente");
                    header("location:principal.php");
                }

            }else{
                $current_password_error = "Por favor ingrese la contrasaña correcta";
            }

        }

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
    <title>Control de acuerdos || Cambio de contraseña</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 <?php include "css.php" ?>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
        <!-- Left Panel -->

    <?php include "sidebar.php"?>

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
                        <h1>Actualizar mi contraseña</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="principal.php">Inicio</a></li>
                            <li class="active">Mi perfil</a></li>
                            <li class="active">Cambiar Contraseña</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

   <div class="col-lg-7">
                    <div class="card">
                      <div class="card-header">Los siguientes campos son obligatorios *</div>
                      <div class="card-body card-block">
                        <form action="" method="post" class="" id="miFormulario">
                          <div class="form-group">
                          <label for="company" class=" form-control-label">Contraseña actual</label>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                              <input type="password" id="password" name="current_password" placeholder="" class="form-control">
                            </div>
                            <?php if(isset($current_password_error)): ?>

<?php echo "<font color='red'>$current_password_error</font>"; ?>

<?php endif; ?>
                          </div>
                          <div class="form-group">
                          <label for="company" class=" form-control-label">Nueva contraseña</label>
                            <div class="input-group">
                                
                              <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                              
                              <input type="password" id="password" name="new_password" placeholder="" class="form-control">
                            </div>
                            <?php if(isset($new_password_error)): ?>

                     <?php echo "<font color='red'>$new_password_error</font>"; ?>

                  <?php endif; ?>
                          </div>
                          <div class="form-group">
                          <label for="company" class=" form-control-label">Vuelva a escribir la nueva contraseña</label>
                            <div class="input-group">
                                
                              <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                              
                              <input type="password" id="password" name="retype_password" placeholder="" class="form-control">
                            </div>
                            <?php if(isset($retype_password_error)): ?>

                     <?php echo "<font color='red'>$retype_password_error</font>"; ?>

                  <?php endif; ?>
                          </div>
                         
                          <div class="form-actions form-group"><button type="submit" name="change_password"class="btn btn-success btn-md"><i class="fa fa-check"></i>&nbsp;Actualizar contraseña</button>
                          <button type="submit" class="btn btn-danger btn-md"><i class="fa fa-ban"></i>&nbsp;Reinicar campos</button>
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

    


</body>
</html>
