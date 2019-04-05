<?php   
session_start(); 
session_destroy();
header("Location: ./SEED.php"); 
exit();
?>