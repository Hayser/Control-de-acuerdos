<?php include "init.php"; 
$obj = new base_class;

$id = $_GET['id'];

    if($obj->Normal_Query("DELETE FROM acuerdos WHERE id = ?", [$id])){
        $obj->Create_Session("eliminar_acuerdo", "Se elimino el acuerdo correctamente");
        header("location:verAcuerdos.php");
}



?>
