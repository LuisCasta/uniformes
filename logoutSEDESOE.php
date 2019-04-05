<?php   
session_start(); 
session_destroy();
header("Location: ./SEDESOE.php"); 
exit();
?>