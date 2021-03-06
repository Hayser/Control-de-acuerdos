<?php include "init.php";
$obj = new base_class;
ob_start();
$user_department = $_SESSION['user_deparment'];
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
    <link rel="stylesheet" href="mensajes.css">
 <?php include "css.php" ?>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<style>
.flash-heading h3{
    color:#55c57a;
}
.flash-heading p{
    color:#55c57a;
}
</style>
<body>
        <!-- Left Panel -->
<?php include "sidebarJefe.php" ?>
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <?php include "headerJefe.php" ?>
        <!-- Header-->
   <!-- Codigo de la pagina principal-->
      
   <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Control de acuerdos MSIH</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           
                            
                            <li class="active"><?php echo ucfirst($_SESSION['user_name']);
                                                echo ' ';
                                                echo ucfirst($_SESSION['user_last_name']); ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


<!-- Alertas-->
<div class="col-sm-8">

<?php if (isset($_SESSION['name_updated'])) : ?>
 <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    <span class="badge badge-pill badge-success">ÉXITO</span>
    <?php echo $_SESSION['name_updated']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span class="quitar"aria-hidden="true">&times;</span> </button>
     </div>
     <?php endif; ?>
    <?php unset($_SESSION['name_updated']); ?>


<?php if (isset($_SESSION['update_image'])) : ?>
 <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    <span class="badge badge-pill badge-success">ÉXITO</span>
    <?php echo $_SESSION['update_image']; ?>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span class="quitar"aria-hidden="true">&times;</span></button>
   </div>
   <?php endif; ?>
   <?php unset($_SESSION['update_image']); ?>


<?php if (isset($_SESSION['password_updated'])) : ?>
 <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    <span class="badge badge-pill badge-success">ÉXITO</span>
    <?php echo $_SESSION['password_updated']; ?>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span class="quitar"aria-hidden="true">&times;</span> </button>
    </div>
     <?php endif; ?>
     <?php unset($_SESSION['password_updated']); ?>




</div>
<!--Final de alertas -->







 <div class="col-sm-11 mb-4">
                        <div class="card-group">
                            <div class="card col-md-6 no-padding ">
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-users"></i>
                                    </div>

                                    <div class="h4 mb-0">
                                    <?php
                                    $obj->Normal_Query("SELECT  * FROM users");
                                    $row = $obj->Count_Rows();
                                    ?>
                                        <span class="count"><?php echo $row; ?></span>
                                    </div>

                                    <small class="text-muted text-uppercase font-weight-bold">Total de usuarios</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 100%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-md-6 no-padding ">
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-user-plus"></i>
                                    </div>
                                    <div class="h4 mb-0">
                                    <?php 
                                    $obj->Normal_Query("SELECT * FROM `notificaciones` WHERE `estado` = 'leido' and (`estado_alcaldia` = 'Asignado a departamento' or `estado_colaborador` = 'Finalizado' or `estado_colaborador` = 'Incompleto') and `fecha_hora` BETWEEN date_sub(now(), interval 1 week)  AND NOW() ORDER BY `fecha_hora` DESC");
                                    $row = $obj->Count_Rows();
                                    ?>
                                        <span class="count"><?php echo $row; ?></span>
                                    </div>
                                    <small class="text-muted text-uppercase font-weight-bold">Notificaciones leídas (hoy)</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 100%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-md-6 no-padding ">
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-folder"></i>
                                    </div>
                                    <div class="h4 mb-0">
                                    <?php
                                    $obj->Normal_Query("SELECT * FROM acuerdos WHERE acuerdos.departamento LIKE '%" . $user_department . "%'");
                                    $row = $obj->Count_Rows();
                                    ?>
                                        <span class="count"><?php echo $row; ?></span>
                                    </div>

                                    <small class="text-muted text-uppercase font-weight-bold">Total de acuerdos</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 100%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-md-6 no-padding ">
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <?php
                                    $obj->Normal_Query("SELECT estado_jefe
                                                        FROM acuerdos 
                                                        WHERE estado_jefe LIKE 'Finalizado' and departamento LIKE '%" . $user_department . "%'");
                                    $tot = $obj->Count_Rows();
                                    $obj->Normal_Query("SELECT estado_jefe 
                                                        FROM acuerdos 
                                                        WHERE departamento LIKE '%" . $user_department . "%'");
                                    $row = $obj->Count_Rows();
                                    $total = 0;
                                    if($row != 0) {
                                        $total = $tot * 100 / $row;
                                    }
                                    ?>
                                    <div class="h4 mb-0">
                                        <span class="count"><?php echo $row, "/", $tot, " (", $total, "%)"; ?></span>
                                    </div>
                                    
                                    <small class="text-muted text-uppercase font-weight-bold">Acuerdos terminados</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 100%; height: 5px;"></div>
                                </div>
                            </div>
                          
                           
                        </div>
                    </div><!--Final de los widgets -->


                      





 <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-11">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Usuarios registrados en el sistema</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                              <thead>
                                <tr>
                                <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Email</th>
                      <th>Departamento</th>
                      <th>Rol de usuario</th>
                     
                              </tr>
                          </thead>
                          <?php
                            $obj->Normal_Query("SELECT  * FROM users");
                            $message_row = $obj->fetch_all();

                            foreach ($message_row as $row) :
                            ?>
                          <tbody>
                            <tr>
                            <td><?php echo $row->name, "<br>"; ?></td>
    <td>
      <?php echo $row->last_name, "<br>"; ?>
    </td>
    <td><?php echo $row->email, "<br>"; ?></td>
    <td><?php echo $row->departamento, "<br>"; ?></td>
    <td>
        <?php echo $row->rolUsuario, "<br>"; ?>
    </td>
                          </tr>
                          <?php
                            endforeach;
                            ?>
                      </tbody>
                  </table>
                        </div>
                    </div>
                </div>

                </div>

                </div>
</div>


                  





    </div><!-- /#right-panel -->

    <!-- Right Panel -->


   <?php include "scripts.php" ?>
<script src="remove.js"></script>
   


    


</body>
</html>