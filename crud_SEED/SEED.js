$(document).ready(function(){

//INICIAR SESION
$('#entrar').click(function(){
var correo = $('#input_correo').val();
var contraseña = $('#input_contraseña').val();

	$.ajax
	({
	   url: 'crud_SEED/check_login.php',
	   data: {"correo":correo, "contraseña":contraseña},
	   type: 'post',
	   success: function(result){		   	
	   	if(result == "exito")
	   		window.location.replace("escuela.php");	   	
	   	else if(result == "baja")
	    	M.toast({html: "Este usuario fue suspendido, hable con el administrador"});
		else
	    	M.toast({html: result});
	   }	
	});
});


});