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
    <title>Control de acuerdos || roles y permisos</title>
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
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

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
                        <h1>Pagina Principal</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Usuarios</a></li>
                            <li class="active">Roles y permisos</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

     

 <div class="col-sm-8">
 <?php if(isset($_SESSION['eliminar_usuarios'])): ?>
 <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    <span class="badge badge-pill badge-success">EXITO</span>
    <?php echo $_SESSION['eliminar_usuarios']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span class="quitar"aria-hidden="true">&times;</span> </button>
     </div>
     <?php endif; ?>
    <?php unset($_SESSION['eliminar_usuarios']); ?>

 <?php if(isset($_SESSION['rol_actualizado'])): ?>
 <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    <span class="badge badge-pill badge-success">EXITO</span>
    <?php echo $_SESSION['rol_actualizado']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span class="quitar"aria-hidden="true">&times;</span> </button>
     </div>
     <?php endif; ?>
    <?php unset($_SESSION['rol_actualizado']); ?>

    <?php if(isset($_SESSION['dep_actualizado'])): ?>
 <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    <span class="badge badge-pill badge-success">EXITO</span>
    <?php echo $_SESSION['dep_actualizado']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span class="quitar"aria-hidden="true">&times;</span> </button>
     </div>
     <?php endif; ?>
    <?php unset($_SESSION['dep_actualizado']); ?>
</div>








        <div class="content mt-1">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Usuarios registrados</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Rol</th>
                      <th>Departamento</th>
                      <th>Opciones</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                    <?php
$obj->Normal_Query("SELECT  * FROM users");
$message_row=$obj-> fetch_all();

foreach($message_row as $row):
    ?> <tr>
                                                
                                                <td><?php echo $row->id,"<br>";?></td>
                                                <td>
                                                    <?php echo $row->name,"<br>";?>
                                                </td>
                                                <td ><?php echo $row->email,"<br>";?></td>
                                                <td ><?php echo $row->rolUsuario,"<br>";?></td>
                                                <td><?php echo $row->departamento,"<br>";?></td>
                                                

    <td>
                                                        <button  title="Editar rol y departamento">
                                                        <a href="editarRolDepartamento.php?id=<?php echo $row->id?>">   <i class="fa fa-pencil"></i></a>
                                                        </button>
                                                        <button  title="Eliminar Usuario">
                                                        <a href="eliminarUsuarios.php?id=<?php echo $row->id?>"> <i class="fa fa-trash"></i></a>
                                                        </button>
                                                        <button  title="Ver Perfil">
                                                        <a href="eliminarU.php?id=<?php echo $row->id?>"> <i class="fa fa-eye"></i></a>
                                                        </button>
  
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
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable({
            "order": [[1, "asc"]],
			"language":{
				"lengthMenu": "Mostrar _MENU_ registros por pagina",
				"info": "Mostrando pagina _PAGE_ de _PAGES_",
				"infoEmpty": "No hay registros disponibles",
				"infoFiltered": "(filtrada de _MAX_ registros)",
				"loadingRecords": "Cargando...",
				"processing":     "Procesando...",
				"search": "Buscar:",
				"zeroRecords":    "No se encontraron registros coincidentes",
				"paginate": {
					"next":       "Siguiente",
					"previous":   "Anterior"
				},					
			},
          });
        } );
    </script>

<script src="remove.js"></script>
    


</body>
</html>
