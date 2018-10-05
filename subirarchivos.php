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
    <title>Control de acuerdos || cambiar foto</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 <?php include "css.php" ?>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<style>

h1, h2
{
	font-size: 1.5em;
	font-weight: normal;
}

h2
{
	font-size: 1.3em;
}

legend
{
	font-weight: bold;
	color: #333;
}

#filedrag
{
	display: none;
	font-weight: bold;
	text-align: center;
	padding: 1em 0;
	margin: 1em 0;
	color: #555;
	border: 2px dashed #555;
	border-radius: 7px;
	cursor: default;
}

#filedrag.hover
{
	color: #f00;
	border-color: #f00;
	border-style: solid;
	box-shadow: inset 0 3px 4px #888;
}

img
{
	max-width: 100%;
}

pre
{
	width: 95%;
	height: 8em;
	font-family: monospace;
	font-size: 0.9em;
	padding: 1px 2px;
	margin: 0 0 1em auto;
	border: 1px inset #666;
	background-color: #eee;
	overflow: auto;
}

#messages
{
	padding: 0 10px;
	margin: 1em 0;
	border: 1px solid #999;
}

#progress p
{
	display: block;
	width: 240px;
	padding: 2px 5px;
	margin: 2px 0;
	border: 1px inset #446;
	border-radius: 5px;
	background: #eee url("progress.png") 100% 0 repeat-y;
}

#progress p.success
{
	background: #0c0 none 0 0 no-repeat;
}

#progress p.failed
{
	background: #c00 none 0 0 no-repeat;
}


</style>
<body>
        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">Control de acuerdos</a>
                <a class="navbar-brand hidden" href="./">CDA</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html"> <i class="menu-icon fa fa-home"></i>Pagina principal </a>
                    </li>

                    <h3 class="menu-title">Mi perfil</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gear"></i>Configuración</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user"></i><a href="perfil.php">Actualizar perfil</a></li>
                            <li><i class="fa fa-lock"></i><a href="cambioContraseña.php">Cambiar contraseña</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="cambiarFoto.php">Cambiar foto</a></li>
                           
                         
                        </ul>
                    </li>
                  
                   

                    <h3 class="menu-title">Acuerdos</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-gears"></i>Acciones</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-edit"></i><a href="font-fontawesome.html">Crear acuerdo</a></li>
                            <li><i class="menu-icon fa fa-eye"></i><a href="font-themify.html">Ver acuerdos</a></li>
                            <li><i class="menu-icon fa fa-pencil"></i><a href="font-themify.html">Asignar acuerdos</a></li>
                        </ul>
                    </li>
                  
                    <h3 class="menu-title">Usuarios</h3><!-- /.menu-title -->
                    <li>
                        <a href="widgets.html"> <i class="menu-icon fa fa-users"></i>Roles y permisos </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">3</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">Tiene 3 notificaciones</p>
                            <a class="dropdown-item media bg-flat-color-2" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-2" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-2" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                          
                          </div>
                        </div>

                        <div class="dropdown for-message">
                        
                         
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/baby-dead.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="menu-icon fa fa-user"></i> Mi Perfil</a>

                                

                             


                                <a class="nav-link" href="#"><i class="menu-icon fa fa-sign-out"></i> Cerrar sesión</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-cr"></i>
                        </a>
                      
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Actualizar mi foto de perfil</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Mi perfil</a></li>
                            <li class="active">Cambiar foto</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

   <div class="col-lg-10">
                    <div class="card">
                      <div class="card-header">Cambio de foto </div>
                      <div class="card-body card-block">
                      <form id="upload" action="upload.php" method="POST" enctype="multipart/form-data">

<fieldset>
<legend>Seleccione una imagen</legend>

<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="10000000000" />

<div>
	<label for="fileselect">Nombre del archivo:</label>
    <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
    
	<div id="filedrag">Arrastre los archivos aqui</div>
</div>



</fieldset>

</form>

<div id="progress"></div>

<div id="messages">

</div>


<div class="form-actions form-group"><button type="submit" class="btn btn-success btn-md"><i class="fa fa-check"></i>&nbsp;Actualizar Foto</button>
                          <button type="button" class="btn btn-danger btn-md"  onClick="funcion_reiniciar();"><i class="fa fa-ban"></i>&nbsp;Cancelar</button>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->


   <?php include "scripts.php" ?>


  <script src="subir.js"></script>

    <script type="text/javascript">
    function funcion_reiniciar(){
        document.getElementById("upload").reset();
    }
    
    </script>
 



</body>
</html>