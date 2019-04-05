<?php   
session_start(); 
session_destroy();
header("Location: ./SEDECO.php"); 
exit();
?>