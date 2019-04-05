$(document).ready(function(){

$("#boton_registrar").click(function(){
var ciclo = $("#input_ciclo").val();
if(ciclo == "")
M.toast({html:"Introducir  ciclo"});
else 
$.ajax
({
url: "crud_proveedor_programa/insertar.php",
data: {"ciclo":ciclo},
type: "post",
success: function(result){
M.toast({html:result});
}
});
});

});