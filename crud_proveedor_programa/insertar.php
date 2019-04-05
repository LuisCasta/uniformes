<?php
$ciclo = $_POST['ciclo'];
try
{
require_once '../db_config.php';
$stmt=$db_con->prepare("SELECT * FROM ciclo WHERE ciclo = '$ciclo'");
$stmt->execute();
if($stmt->rowCount() > 0){
echo 'ya existe un registro con los mismos datos';
}
else{
$stmt=$db_con->prepare("INSERT INTO ciclo(ciclo,fecha_alta) VALUES('$ciclo','".date("Y/m/d")."')");
$stmt->execute();
echo 'exito';
}
}
catch(PDOException $e){
echo $e->getMessage();
}
?>