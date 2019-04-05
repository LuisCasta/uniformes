$(document).ready(function(){


$('#registrar').click(function(){
var id_taller = $('#selector_taller').val();
var contrato = $('#input_contrato').val();
var periodo = $('#input_periodo').val(); 

if(id_taller == "seleccione")
	M.toast({html:"por favor selecciona taller"});
else if(contrato == "")
	M.toast({html:"por favor ingresa contrato"});
else if(periodo == "")
	M.toast({html:"por favor ingresa periodo"});
else
	swal({
          title: "",
          text: "¿Estás seguro que deseas ingresar un nuevo proveedor?",
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
				url: 'crud_proveedor_alta/alta.php',
			    data: {"id_taller":id_taller,"contrato":contrato,"periodo":periodo},
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