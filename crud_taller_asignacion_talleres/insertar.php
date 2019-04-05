<?php
$ciclo = $_POST['ciclo'];
$id_proveedor = $_POST['id_proveedor'];
$id_taller = $_POST['id_taller'];
try
{
require_once '../db_config.php';
$stmt=$db_con->prepare("SELECT * FROM proveedor_taller WHERE id_proveedor = '$id_proveedor' AND id_taller = '$id_taller'");
$stmt->execute();
if($stmt->rowCount() > 0){
echo 'ya existe un registro con los mismos datos';
}
else{
$stmt=$db_con->prepare("INSERT INTO proveedor_taller(ciclo,fecha_alta,id_proveedor,id_taller) VALUES('$ciclo','".date("Y/m/d")."','$id_proveedor','$id_taller')");
$stmt->execute();
echo 'exito';
}
}
catch(PDOException $e){
echo $e->getMessage();
}
?>