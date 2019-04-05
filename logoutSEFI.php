<?php   
session_start(); 
session_destroy();
header("Location: ./SEFI.php"); 
exit();
?>