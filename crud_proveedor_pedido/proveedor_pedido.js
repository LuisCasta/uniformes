$(document).ready(function(){

$('#selector_ciclo').change(function(){
var ciclo =	$('#selector_ciclo').val();
$('#programa').val(ciclo);
	$.ajax
	({
	   url: 'crud_proveedor_pedido/consulta_etapas.php',
	   data: {"ciclo":ciclo},
	   type: 'post',
	   success: function(result){	
	   $('#selector_etapa').html(result);   	
	   }	
	});
});

$('#selector_etapa').change(function(){
var etapa =	$('#selector_etapa').val();
$('#etapa').val(etapa);
	$.ajax
	({
	   url: 'crud_proveedor_pedido/consulta_preescolar.php',
	   data: {"etapa":etapa},
	   type: 'post',
	   success: function(result){	

	   var arreglo = JSON.parse(result);	
	   $('#tabla_preescolar').html(arreglo.tabla);
	   $('#cabecera_preescolar').html(arreglo.tabla_header);
	   $('#total_preescolar').html(arreglo.total);   
	   }	
	});
	$.ajax
	({
	   url: 'crud_proveedor_pedido/consulta_primaria.php',
	   data: {"etapa":etapa},
	   type: 'post',
	   success: function(result){	

	   var arreglo = JSON.parse(result);	
	   $('#tabla_primaria').html(arreglo.tabla);
	   $('#cabecera_primaria').html(arreglo.tabla_header);
	   $('#total_primaria').html(arreglo.total);    	
	   }	
	});
	$.ajax
	({
	   url: 'crud_proveedor_pedido/consulta_secundaria.php',
	   data: {"etapa":etapa},
	   type: 'post',
	   success: function(result){	

	   var arreglo = JSON.parse(result);	
	   $('#tabla_secundaria').html(arreglo.tabla);
	   $('#cabecera_secundaria').html(arreglo.tabla_header);
	   $('#total_secundaria').html(arreglo.total);  
	   }	
	});
});


});