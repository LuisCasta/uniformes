$(document).ready(function(){


$('#registrar').click(function(){
var matricula = $('#input_matricula').val();
var nombre = $('#input_nombre').val();
var calle = $('#input_calle').val();
var numero = $('#input_numero').val();
var colonia = $('#input_colonia').val();
var cp = $('#input_cp').val();
var municipio = $('#input_municipio').val();
var estado = $('#input_estado').val(); 
var num_alumnos = $('#input_num_alumnos').val();
var director = $('#input_director').val(); 	   
var longitud = $('#input_longitud').val();
var latitud = $('#input_latitud').val(); 	
var ruta = $('#input_ruta').val();    
if(matricula == "")
	M.toast({html:"por favor ingresa matricula"});
else if(nombre == "")
	M.toast({html:"por favor ingresa nombre"});
else if(calle == "")
	M.toast({html:"por favor ingresa calle"});
else if(numero == "")
	M.toast({html:"por favor ingresa numero"});
else if(colonia == "")
	M.toast({html:"por favor ingresa colonia"});
else if(cp == "")
	M.toast({html:"por favor ingresa codigo postal"});
else if(municipio == "")
	M.toast({html:"por favor ingresa municipio"});
else if(estado == "")
	M.toast({html:"por favor ingresa estado"});
else if(num_alumnos == "")
	M.toast({html:"por favor ingresa numero de alumnos"});
else if(director == "")
	M.toast({html:"por favor ingresa director"});
else if(longitud == "")
	M.toast({html:"por favor ingresa longitud"});
else if(latitud == "")
	M.toast({html:"por favor ingresa latitud"});
else if(ruta == "")
	M.toast({html:"por favor ingresa ruta"});
else
	swal({
          title: "",
          text: "¿Estás seguro que deseas ingresar una nueva escuela?",
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
				url: 'crud_escuela_alta/alta.php',
			    data: {"matricula":matricula, "nombre":nombre, "calle":calle, "numero":numero, "colonia":colonia,"cp":cp, "municipio":municipio, "estado":estado, "num_alumnos":num_alumnos, "director":director, "longitud":longitud, "latitud":latitud,"ruta":ruta},
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