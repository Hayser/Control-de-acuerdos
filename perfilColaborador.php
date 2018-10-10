<?php include "init.php"; 
$obj = new base_class;


if(isset($_POST['change_name'])) {
    $user_name = $_POST['user_name'];
    $user_id = $_SESSION['user_id'];
    if(empty($user_name)) {
		$user_name_error = "No se ha ingresado ningun nombre";
	}else {
		if($obj->Normal_Query("UPDATE users SET name = ? WHERE id = ?", [$user_name, $user_id])){
            $obj->Create_Session("user_name", $user_name);
            $obj->Create_Session("name_updated", "su nombre se actualizo correctamente");
            header("location:principalColaborador.php");
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
    <title>Control de acuerdos || perfil</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 <?php include "css.php" ?>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
        <!-- Left Panel -->

    <?php include"sidebarColaborador.php" ?><!-- /#left-panel -->

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
                        <h1>Actualizar información de mi perfil</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="principal.php">Inicio</a></li>
                            <li class="active">Mi perfil</a></li>
                            <li class="active">Actualizar perfil</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
     
   <div class="col-lg-7">
                    <div class="card">
                      <div class="card-header">Mi perfil </div>
                      <div class="card-body card-block">
                        <form action="" method="post" class="" id="miFormulario">
                          <div class="form-group">
                          <label for="company" class=" form-control-label">Nombre de usuario</label>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" id="username" name="user_name" placeholder="<?php echo $_SESSION['user_name'] ?>" class="form-control">
                            </div>
                            <?php if(isset($user_name_error)): ?>

<?php echo "<font color='red'>$user_name_error</font>"; ?>

<?php endif; ?>
                          </div>
                          <div class="form-group">
                          <label for="disabled-input" class=" form-control-label">Correo electronico</label>
                            <div class="input-group">
                                
                              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                              
                              <input type="text"  id="disabled-input" name="disabled-input" placeholder="<?php echo $_SESSION['user_email'] ?>" disabled=""class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                          <label  for="disabled-input" class=" form-control-label">Departamento</label>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                              <input type="text" id="disabled-input" name="disabled-input" placeholder="<?php echo $_SESSION['user_deparment'] ?>" disabled="" class="form-control">
                            </div>
                          </div>
                          <div class="form-actions form-group"><button type="submit" name="change_name" class="btn btn-success btn-md"><i class="fa fa-check"></i>&nbsp;Actualizar perfil</button>
                          <button type="button" class="btn btn-danger btn-md" onClick="funcion_reiniciar();"><i class="fa fa-ban"></i>&nbsp;Reinicar campos</button>
                        </div>
                          
                        </form>
                      </div>
                    </div>
                  </div>

 <div class="col-lg-3 col-md-4">
                        <div class="card">
                            <div class="card-header">
                               <h6>Mi perfil</h6>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="images/<?php  echo $_SESSION['user_image']; ?>" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $_SESSION['user_name'] ?></h5>
                                    <hr>
                                    <div class="location text-sm-center"><?php echo $_SESSION['user_email'] ?></div>
                                    <div class="location text-sm-center"><i class="fa fa-map-marker"></i> MSIH, Costa rica</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                                    <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                    <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                                    <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                                </div>
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
