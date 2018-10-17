<?php include "init.php"; 
$obj = new base_class;

if(isset($_POST['change_image'])) {
    $img_name  = $_FILES['change_image']['name'];
    $img_tmp   = $_FILES['change_image']['tmp_name'];
    $img_path  = "images/";
    $extensions = ['jpg', 'jpeg', 'png'];
    $img_ext   = explode(".", $img_name);
    $img_extension = end($img_ext);

    if(empty($img_name)) {
        $img_error  = "No se escogio ninguna imagen";
    }else if(!in_array($img_extension, $extensions)) {
        $img_error = "Seleccione un formato de imagen valido";
    }else {
        $user_id = $_SESSION['user_id'];
        move_uploaded_file($img_tmp , "$img_path/$img_name");
        if($obj->Normal_Query("UPDATE users SET image = ? WHERE id = ?", [$img_name, $user_id])){
            $obj->Create_Session("user_image", $img_name);
            $obj->Create_Session("update_image", "su foto de perfil se actualizó correctamente");
   		    header("location:principal.php");
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
    <title>Control de acuerdos || cambiar foto</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 <?php include "css.php" ?>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<style>


legend
{
	font-weight: bold;
	color: #333;
}




</style>
<body>
        <!-- Left Panel -->

    <?php include"sidebar.php" ?>

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
                        <h1>Actualizar mi foto de perfil</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        <li><a href="principal.php">Inicio</a></li>
                            <li class="active">Mi perfil</a></li>
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
                      <form id="miFormulario"method="POST" enctype="multipart/form-data">


<legend>Seleccione una imagen</legend>



<div>
	<label for="fileselect">Nombre del archivo:</label>
    <input type="file" name="change_image"/>
    
</div>






<hr>


<div class="form-actions form-group"><button type="submit" name="change_image" class="btn btn-success btn-md"><i class="fa fa-check"></i>&nbsp;Actualizar Foto</button>
                          <button type="button" class="btn btn-danger btn-md"  onClick="funcion_reiniciar();"><i class="fa fa-ban"></i>&nbsp;Cancelar</button>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

</form>

   <?php include "scripts.php" ?>


<script type="text/javascript">
    function funcion_reiniciar(){
        document.getElementById("miFormulario").reset();
    }
    
    </script>


  
 



</body>
</html>