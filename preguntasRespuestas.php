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
    <title>Control de acuerdos || Preguntas frecuentes</title>
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

 .container {
        width:100%;
    }

    .card{
        width:100%;
    }
</style>
<body>
        <!-- Left Panel -->
<?php include "sidebar.php" ?>
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <?php include "header.php" ?>
        <!-- Header-->
   <!-- Codigo de la pagina principal-->
      
   <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                    <h1>Ayuda</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        <li><a href="principal.php">Inicio</a></li>
                      <li class="active">Ayuda</li>
                    <li class="active">Preguntas frecuentes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content mt-12">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Preguntas frecuentes</strong>
                        </div>
                        <div class="card-body">

<div id="accordion">

  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          1. ¿Cómo cambiar mi nombre de usuario?
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        Diríjase al menú lateral izquierdo, Mi perfil / Configuración / Actualizar perfil.
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        2. ¿Cómo cambiar mi contraseña?
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      Diríjase al menú lateral izquierdo, Mi perfil / Configuración / Cambiar contraseña.
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        3. ¿Cómo cambiar mi foto de perfil?
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
      Diríjase al menú lateral izquierdo, Mi perfil / Configuración / Cambiar foto.
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingFour">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        4. ¿Cómo crear un acuerdo?
        </button>
      </h5>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
      <div class="card-body">
      Diríjase al menú lateral izquierdo, Acuerdos / Configuración / Crear acuerdo.
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingFive">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
        5. ¿Cómo editar la fecha de finiquito y estado de un acuerdo?
        </button>
      </h5>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
      <div class="card-body">
      Diríjase al menú lateral izquierdo, Acuerdos / Configuración / Editar acuerdo. <br>
      Ahora, diríjase a la columna "Opciones" de la tabla, y presione en el lápiz.
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingSix">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
        6. ¿Cómo asignar un acuerdo por departamento?
        </button>
      </h5>
    </div>
    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
      <div class="card-body">
      Diríjase al menú lateral izquierdo, Acuerdos / Configuración / Asignar acuerdos. <br>
      Ahora, diríjase a la columna "Opciones" de la tabla, y presione en el lápiz.
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingSeven">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
        7. ¿Cómo editar los roles y permisos de los usuarios?
        </button>
      </h5>
    </div>
    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
      <div class="card-body">
      Diríjase al menú lateral izquierdo, Usuarios / Roles y permisos. <br>
      Ahora, diríjase a la columna "Opciones" de la tabla, y presione en el lápiz.
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingEight">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
        8. ¿Cómo eliminar un acuerdo?
        </button>
      </h5>
    </div>
    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
      <div class="card-body">
      Diríjase al menú lateral izquierdo, Acuerdos / Configuración / Editar acuerdos o Asignar acuerdos. <br>
      Ahora, diríjase a la columna "Opciones" de la tabla, y presione en el ícono del basurero.
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingNine">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
        9. ¿Cómo descargar el archivo de un acuerdo?
        </button>
      </h5>
    </div>
    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion">
      <div class="card-body">
      Diríjase al menú lateral izquierdo, Acuerdos / Configuración / Editar acuerdos o Asignar acuerdos. <br>
      Ahora, diríjase a la columna "Opciones" de la tabla, y presione en el ícono de descarga.
      </div>
    </div>
  </div>

</div>






<!--Final del contenor de tamaño 12-->
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