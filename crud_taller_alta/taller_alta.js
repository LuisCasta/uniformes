$(document).ready(function(){


$('#registrar').click(function(){
var nombre = $('#input_nombre').val();
var rfc = $('#input_rfc').val();
var ciudad = $('#input_ciudad').val();
var estado = $('#input_estado').val();
var cp = $('#input_cp').val(); 
var direccion = $('#input_direccion').val();
var titular = $('#input_titular').val(); 
var numero_empleados = $('#input_numero_empleados').val(); 
var zona = $('#input_zona').val(); 
var latitud = $('#input_latitud').val(); 
var longitud = $('#input_longitud').val(); 

if(nombre == "")
	M.toast({html:"por favor ingresa nombre"});
else if(rfc == "")
	M.toast({html:"por favor ingresa rfc"});
else if(ciudad == "")
	M.toast({html:"por favor ingresa ciudad"});
else if(estado == "")
	M.toast({html:"por favor ingresa estado"});
else if(cp == "")
	M.toast({html:"por favor ingresa codigo postal"});
else if(direccion == "")
	M.toast({html:"por favor ingresa direccion"});
else if(titular == "")
	M.toast({html:"por favor ingresa titular"});
else if(numero_empleados == "")
	M.toast({html:"por favor ingresa numero de empleados"});
else if(zona == "")
	M.toast({html:"por favor ingresa zona"});
else if(latitud == "")
	M.toast({html:"por favor ingresa latitud"});
else if(longitud == "")
	M.toast({html:"por favor ingresa longitud"});
else
	swal({
          title: "",
          text: "¿Estás seguro que deseas ingresar un nuevo taller?",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Si, estoy seguro',
          cancelButtonText: "No, cancelar",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm){

	          	$.ajax
				({
				url: 'crud_taller_alta/alta.php',
			    data: {"nombre":nombre,"rfc":rfc,"ciudad":ciudad,"estado":estado,"cp":cp,"direccion":direccion,"titular":titular,"numero_empleados":numero_empleados,"zona":zona,"latitud":latitud,"longitud":longitud},
			    type: 'post',
			    success: function(result)
				{
					if(result == "exito")
						{						
				            swal("Hecho", result, "success");
						}
					else
							swal("Mensaje", result, "info");
					
				}
				});
          } else {
            	swal("Cancelado", "Operación cancelada", "error");
          }
        });

});



});