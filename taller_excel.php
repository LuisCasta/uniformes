<?php
$table = 'table_name';
$outstr = NULL;

header("Content-Type: application/csv");
header("Content-Disposition: attachment;Filename=lista_talleres.csv");

require_once './db_config.php';

$stmt=$db_con->prepare("show columns from taller");
  $stmt->execute();
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
  { 
      $outstr.= $row['Field'].',';
  }
    
$outstr = substr($outstr, 0, -1)."\n";

$stmt=$db_con->prepare("SELECT * FROM taller");
  $stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
    $outstr.= join(',', $row)."\n";
}


echo $outstr;
?>