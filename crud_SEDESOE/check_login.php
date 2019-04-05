<?php
$correo = $_POST['correo'];
$contraseña = md5($_POST['contraseña']);
	
	require_once '../db_config.php'; 
	$stmt=$db_con->prepare("SELECT * FROM usuario WHERE correo = '$correo' AND modulo = 'SEDESOE'");
	$stmt->execute();
	if($fila=$stmt->fetch(PDO::FETCH_ASSOC)) 
	{ 
			if ($fila['contrasena'] == $contraseña) {
				$correo    = $fila['correo'];
				$titular    = $fila['titular'];
				$estatus    = $fila['estatus'];
				$id         = $fila['id'];
				$perfil    = $fila['perfil'];
				$modulo         = $fila['modulo'];
				session_start();
				$_SESSION['correo']    = $correo;
				$_SESSION['titular']    = $titular;
				$_SESSION['estatus']    = $estatus;
				$_SESSION['id']         = $id;
				$_SESSION['perfil']     = $perfil;
				$_SESSION['modulo']         = $modulo;
				if($estatus=="ACTIVO")
					echo "exito";
				else
					echo "baja";
			}
			else {
				echo "Usuario o Password Incorrectos";
			}
	}
	else {
			echo "Usuario o Password Incorrectos";			
		}
?>