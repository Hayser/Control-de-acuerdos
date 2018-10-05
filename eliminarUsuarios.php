<?php include "init.php"; 
$obj = new base_class;

$id = $_GET['id'];

    if($obj->Normal_Query("DELETE FROM users WHERE id = ?", [$id])){
        $obj->Create_Session("eliminar_usuarios", "Se elimino el usuario correctamente");
        header("location:usuariosRoles.php");
}



?>