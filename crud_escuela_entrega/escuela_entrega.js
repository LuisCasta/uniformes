$(document).ready(function(){

$('#selector_nivel').change(function(){
var ciclo =	$('#selector_ciclo').val();
var nivel =	$('#selector_nivel').val();
if(nivel == "preescolar")
	$.ajax
	({
	   url: 'crud_escuela_entrega/consulta_preescolar.php',
	   data: {"ciclo":ciclo},
	   type: 'post',
	   success: function(result){	

	   var arreglo = JSON.parse(result);	
	   $('#cabecera').html(arreglo.header);   
	   $('#tabla').html(arreglo.tabla);
	   }	
	});
else if(nivel == "primaria")
	$.ajax
	({
	   url: 'crud_escuela_entrega/consulta_primaria.php',
	   data: {"ciclo":ciclo},
	   type: 'post',
	   success: function(result){	

	   var arreglo = JSON.parse(result);	
	   $('#cabecera').html(arreglo.header);  
	   $('#tabla').html(arreglo.tabla); 
	   }	
	});
else if(nivel == "secundaria")
	$.ajax
	({
	   url: 'crud_escuela_entrega/consulta_secundaria.php',
	   data: {"ciclo":ciclo},
	   type: 'post',
	   success: function(result){	

	   var arreglo = JSON.parse(result);
	   $('#cabecera').html(arreglo.header);  	
	   $('#tabla').html(arreglo.tabla); 
	   }	
	});
});


});