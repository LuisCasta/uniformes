$(document).ready(function(){

$("#boton_registrar").click(function(){
var fecha = $("#input_fecha").val();
var id_proveedor = $("#select_id_proveedor").val();
var id_ciclo = $("#select_id_programa").val();
var monto = $("#input_monto").val();
if(fecha == "")
M.toast({html:"Introducir  fecha"});
else if(id_proveedor == "seleccione" || id_proveedor == "")
M.toast({html:"Introducir  proveedor"});
else if(id_ciclo == "seleccione")
M.toast({html:"Introducir  programa"});
else if(monto == "")
M.toast({html:"Introducir  monto"});
else 
$.ajax
({
url: "crud_proveedor_pago2/insertar.php",
data: {"fecha":fecha,"id_proveedor":id_proveedor,"id_ciclo":id_ciclo,"monto":monto},
type: "post",
success: function(result){
M.toast({html:result});
}
});
});

$('#select_id_programa').change(function(){
var ciclo =	$('#select_id_programa').val();
	$.ajax
	({
	   url: 'crud_proveedor_pago2/obtener_proveedor.php',
	   data: {"ciclo":ciclo},
	   type: 'post',
	   success: function(result){	
	   $('#select_id_proveedor').html(result);   	
	   }	
	});
});

});