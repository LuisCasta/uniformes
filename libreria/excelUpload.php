<?php

require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('../db_config.php');
	
if(isset($_POST['Submit'])){

	$mimes = ['application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','xls','xlsx','application/vnd.oasis.opendocument.spreadsheet'];
	
	if(in_array($_FILES["file"]["type"],$mimes)){

		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
		$uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

		$Reader = new SpreadsheetReader($uploadFilePath);

		$totalSheet = count($Reader->sheets());

		//echo "You have total ".$totalSheet." sheets".

		$html="<table border='1'>";
		$html.="<table border=1><tr><td>matricula</td><td>nombre</td><td>calle</td><td>numero</td><td>colonia</td><td>cp</td><td>municipio</td><td>estado</td><td>numero_alumnos</td><td>director</td><td>longitud</td><td>latitud</td><td>ruta</td></tr>";
		$contador = 0;
		$resultado = "";
		$encabezados = "";
		/* For Loop for all sheets */
		for($i=0;$i<$totalSheet;$i++){

			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row)
	        {
	        	$contador = $contador+1;
	        	$html.="<tr>";
				/* Check If sheet not emprt */
		        $matricula = isset($Row[0]) ? $Row[0] : '';
				$nombre = isset($Row[1]) ? $Row[1] : ''; 
				$calle = isset($Row[2]) ? $Row[2] : '';
		        $numero = isset($Row[3]) ? $Row[3] : '';
				$colonia = isset($Row[4]) ? $Row[4] : ''; 
				$cp = isset($Row[5]) ? $Row[5] : '';
		        $municipio = isset($Row[6]) ? $Row[6] : '';
				$estado = isset($Row[7]) ? $Row[7] : ''; 
				$numero_alumnos = isset($Row[8]) ? $Row[8] : '';
		        $director = isset($Row[9]) ? $Row[9] : '';
				$longitud = isset($Row[10]) ? $Row[10] : ''; 
				$latitud = isset($Row[11]) ? $Row[11] : '';
				$ruta = isset($Row[12]) ? $Row[12] : '';
				
				//echo $Row[1]." ".$contador;
				if($contador == 1 && $matricula == "matricula" && $nombre == "nombre" && $calle == "calle" && $numero == "numero" && $colonia == "colonia" && $cp == "cp" && $municipio == "municipio" && $estado == "estado" && $numero_alumnos == "numero_alumnos" && $director == "director" && $longitud == "longitud" && $latitud == "latitud" && $ruta == "ruta")
					$encabezados = "exito";
				
				if($encabezados == "exito" && $contador >= 2){
				$html.="<td>".$matricula."</td>";
				$html.="<td>".$nombre."</td>"; 
				$html.="<td>".$calle."</td>";
				$html.="<td>".$numero."</td>";
				$html.="<td>".$colonia."</td>"; 
				$html.="<td>".$cp."</td>";
				$html.="<td>".$municipio."</td>";
				$html.="<td>".$estado."</td>"; 
				$html.="<td>".$numero_alumnos."</td>";
				$html.="<td>".$director."</td>";
				$html.="<td>".$longitud."</td>"; 
				$html.="<td>".$latitud."</td>"; 
				$html.="<td>".$ruta."</td>";
				
				$html.="</tr>";

				$stmt2=$db_con->prepare("SELECT * FROM escuela WHERE matricula = '$matricula'");
				$stmt2->execute();
				if($stmt2->rowCount() > 0){
					echo "fallo en renglon ".$contador." ya existe esta matricula $matricula ";
				}
				else{
				$query = "INSERT INTO escuela(matricula,nombre,calle,numero,colonia,cp,municipio,estado,numero_alumnos,director,fecha_alta,longitud,latitud,ruta) VALUES('".$matricula."','".$nombre."','".$calle."','".$numero."','".$colonia."','".$cp."','".$municipio."','".$estado."','".$numero_alumnos."','".$director."','".date("Y/m/d")."','".$longitud."','".$latitud."','".$ruta."')";
	 
				$stmt=$db_con->prepare($query);
                $stmt->execute();
                $resultado ="exito";
            	}
                }
                else if($encabezados == "" && $contador == 1){
                	echo "por favor inserta una hoja excel con los encabezados correspondientes";
                	$resultado = "fallo";
                }
	        }

		}

		$html.="</table>";
		echo $html;
		if($resultado == "exito"){
		echo "<br />Datos insertados en la base de datos";
		header("Refresh: 1; ../escuela_alta.php");
		}
	}else { 
		die("<br/>Lo sentimos, Este tipo de archivo no esta permitido. Solo archivos Excel(ODS)."); 
	}

}

?>