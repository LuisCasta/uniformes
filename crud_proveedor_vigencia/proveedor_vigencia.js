$(document).ready(function(){

$("#boton_registrar").click(function(){
var id_proveedor = $("#selector_id_proveedor").val();
var id_ciclo = $("#selector_id_ciclo").val();
if(id_proveedor == "seleccione")
M.toast({html:"Seleccionar proveedor"});
else if(id_ciclo == "seleccione")
M.toast({html:"Seleccionar ciclo"});
else 
$.ajax
({
url: "crud_proveedor_vigencia/insertar.php",
data: {"id_proveedor":id_proveedor,"id_ciclo":id_ciclo},
type: "post",
success: function(result){
	M.toast({html:result})
}
});
});

$('#selector_id_ciclo').change(function(){
var ciclo = $('#selector_id_ciclo').val();
	$.ajax
	({
	   url: 'crud_proveedor_vigencia/obtener_proveedor.php',
	   data: {"ciclo":ciclo},
	   type: 'post',
	   success: function(result){
		$('#tabla').html(result);	
	   }	
	});

});

});