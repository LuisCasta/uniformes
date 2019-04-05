<?php 
session_start();
$id         = $_SESSION['id'];
$correo    = $_SESSION['correo'];
$titular    = $_SESSION['titular'];
$perfil    = $_SESSION['perfil'];
$estatus    = $_SESSION['estatus'];
$modulo    = $_SESSION['modulo'];
if($correo == null || $perfil != "administrador" || $modulo != "SEFI"){ 
    header("Location: SEFI.php");   
}
?>