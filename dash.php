<?php include "init.php"; 
$obj = new base_class;
if(!isset($_SESSION['user_id']) || $_SESSION['user_rol'] == 'Alcaldia'){
    header("location:principal.php");
}
if(!isset($_SESSION['user_id']) || $_SESSION['user_rol'] == 'Jefe de departamento'){
    header("location:principalJefe.php");
}
if(!isset($_SESSION['user_id']) || $_SESSION['user_rol'] == 'Colaborador'){
    header("location:principalColaborador.php");
}

?>