<?php 
session_start();
$id         = $_SESSION['id'];
$correo    = $_SESSION['correo'];
$titular    = $_SESSION['titular'];
$estatus    = $_SESSION['estatus'];
$perfil    = $_SESSION['perfil'];
$modulo    = $_SESSION['modulo'];
if($correo == null || $modulo != "SEED"){ 
    header("Location: index.php");   
}
?>