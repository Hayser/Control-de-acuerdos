<?php include "init.php"; 
$obj = new base_class;










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
        <?php
$id = $_GET['id'];
$obj->Normal_Query("SELECT  * FROM users WHERE id=$id");
$row = $obj->Single_Result();
?>
   <div class="col-lg-7">
                    <div class="card">
                      <div class="card-header">Mi perfil </div>
                      <div class="card-body card-block">
                        <form action="" method="post" class="" id="miFormulario">
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
                          <label for="disabled-input" class=" form-control-label">Rol de usuario</label>
                            <div class="input-group">
                                
                              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                              
                              <input type="text"  id="disabled-input" name="disabled-input" placeholder="<?php echo $row->rolUsuario;?>" disabled=""class="form-control">
                            </div>
                          </div>
                        
                          <div class="form-group">
                          <label  for="disabled-input" class=" form-control-label">Departamento</label>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-archive"></i></div>
                              <input type="text" id="disabled-input" name="disabled-input" placeholder="<?php echo $row->departamento;?>" disabled="" class="form-control">
                            </div>
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
                                    <img class="rounded-circle mx-auto d-block" src="images/<?php echo $row->image;?>" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $row->name;?></h5>
                                    <hr>
                                    <div class="location text-sm-center"><?php echo $row->email;?></div>
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
