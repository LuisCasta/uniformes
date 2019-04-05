<?php
$outstr = NULL;
$programa = $_POST['programa'];
$etapa = $_POST['etapa'];

header("Content-Type: application/csv");
header("Content-Disposition: attachment;Filename=lista_pedidos.csv");

require_once './db_config.php';

$outstr .= "Preescolar\n";
$stmt=$db_con->prepare("show columns from etapa_preescolar");
  $stmt->execute();
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
  { 
  	if(substr($row['Field'], 0,1) != 'r' && $row['Field'] != "cruze")
      $outstr.= $row['Field'].',';
  }
    
$outstr = substr($outstr, 0, -1)."\n";

$stmt=$db_con->prepare("SELECT id,id_pedido_etapa,etapa,t3,t4,t5,t6,t8,t10 FROM etapa_preescolar where etapa = '$etapa'");
  $stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
    $outstr.= join(',', $row)."\n";
}

$outstr = substr($outstr, 0, -1)."\n\n\n";

$outstr .= "Primaria\n";
$stmt=$db_con->prepare("show columns from etapa_primaria");
  $stmt->execute();
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
  { 
  	if(substr($row['Field'], 0,1) != 'r' && $row['Field'] != "cruze")
      $outstr.= $row['Field'].',';
  }
    
$outstr = substr($outstr, 0, -1)."\n";

$stmt=$db_con->prepare("SELECT id,id_pedido_etapa,etapa,t5,t6,t8,t10,t12,t14,t16,t18,t20,t22,t24 FROM etapa_primaria where etapa = '$etapa'");
  $stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
    $outstr.= join(',', $row)."\n";
}

$outstr = substr($outstr, 0, -1)."\n\n\n";

$outstr .= "Secundaria\n";
$stmt=$db_con->prepare("show columns from etapa_secundaria");
  $stmt->execute();
  while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
  { 
  	if(substr($row['Field'], 0,1) != 'r' && $row['Field'] != "cruze")
      $outstr.= $row['Field'].',';
  }
    
$outstr = substr($outstr, 0, -1)."\n";

$stmt=$db_con->prepare("SELECT id,id_pedido_etapa,etapa,t12,t14,t16,t18,t20,t22,t24,t26 FROM etapa_secundaria where etapa = '$etapa'");
  $stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
    $outstr.= join(',', $row)."\n";
}
echo $outstr;
?>