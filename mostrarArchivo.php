<?php
include "init.php"; 
$obj = new base_class;
$path = $_GET['path'];
$obj->Normal_Query("SELECT  * FROM acuerdos WHERE path=$path");
$row = $obj->Single_Result();

header('Content-type: application/octect-stream');
header('Content-Disposition: inline; filename="'.basename($path).'"');
header('Content-Length'.filesize($path));
readfile($path);
?>