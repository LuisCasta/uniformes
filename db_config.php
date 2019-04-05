<?php 
$db_host="10.1.4.192";
$db_name="gobierno2"; 
$db_user="root";
$db_pass="PA$$w0rd";
try{ 
$db_con=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
} 
catch(PDOException $e){ 
echo $e->getMessage();
}


// $db_con=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
?>