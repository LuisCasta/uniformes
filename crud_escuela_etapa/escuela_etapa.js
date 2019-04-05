$(document).ready(function(){


$('#registrar').click(function(){
var numero = $('#input_numero').val();
var ciclo = $('#input_ciclo').val();
var fecha = $('#input_fecha').val(); 
var observacion = $('#input_observacion').val(); 
if(numero == "" ||numero <= 0)
	M.toast({html:"por favor ingresa numero"});
else if(ciclo == "")
	M.toast({html:"por favor ingresa ciclo"});
else if(fecha == "")
	M.toast({html:"por favor ingresa fecha"});
else if(observacion == "")
	M.toast({html:"por favor ingresa observacion"});
else
	swal({
          title: "",
          text: "¿Estás seguro que deseas ingresar una nueva etapa?",
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
				url: 'crud_escuela_etapa/alta.php',
			    data: {"ciclo":ciclo,"numero":numero,"fecha":fecha,"observacion":observacion},
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