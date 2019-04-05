$(document).ready(function(){

var cambiotabla = "nada";

$('#selector_tipo').change(function(){
var tipo = $('#selector_tipo').val();

if(tipo == "pedido"){
	$('#titulo').text("Pedidos");
}
else if(tipo == "extra"){
	$('#titulo').text("Pedidos Extra");
}
});

$('#selector_grado').change(function(){
var grado = $('#selector_grado').val();

if(grado == "preescolar"){
	$('#encabezado').html("<th>TALLAS</th>"+enc("3")+enc("4")+enc("5")+enc("6")+enc("8")+enc("10")+'<th> </th>'+'<th> </th>'+'<th> </th>'+'<th> </th>');
	$('#renglon').html("<td>NUMERO DE KITS</td>"+renglon("3")+renglon("4")+renglon("5")+renglon("6")+renglon("8")+renglon("10")+"<td><input id='input_comentario1' type='text' value='' class='center'></td>"+"<td><input id='input_comentario2' type='text' value='' class='center'></td>"+"<td><input id='input_comentario3' type='text' value='' class='center'></td>"+"<td><input id='input_comentario4' type='text' value='' class='center'></td>");
	cambiotabla = "uno";
	$('#input_total').val("0");
}
else if(grado == "primaria"){
	$('#encabezado').html("<th>TALLAS</th>"+enc("5")+enc("6")+enc("8")+enc("10")+enc("12")+enc("14")+enc("16")+enc("18")+enc("20")+enc("22")+enc("24")+'<th> </th>'+'<th> </th>'+'<th> </th>'+'<th> </th>');
	$('#renglon').html("<td>NUMERO DE KITS</td>"+renglon("5")+renglon("6")+renglon("8")+renglon("10")+renglon("12")+renglon("14")+renglon("16")+renglon("18")+renglon("20")+renglon("22")+renglon("24")+"<td><input id='input_comentario1' type='text' value='' class='center'></td>"+"<td><input id='input_comentario2' type='text' value='' class='center'></td>"+"<td><input id='input_comentario3' type='text' value='' class='center'></td>"+"<td><input id='input_comentario4' type='text' value='' class='center'></td>");
	cambiotabla = "dos";
	$('#input_total').val("0");
}
else{
	$('#encabezado').html("<th>TALLAS</th>"+enc("12")+enc("14")+enc("16")+enc("18")+enc("20")+enc("22")+enc("24")+enc("26")+'<th> </th>'+'<th> </th>'+'<th> </th>'+'<th> </th>');
	$('#renglon').html("<td>NUMERO DE KITS</td>"+renglon("12")+renglon("14")+renglon("16")+renglon("18")+renglon("20")+renglon("22")+renglon("24")+renglon("26")+"<td><input id='input_comentario1' type='text' value='' class='center'></td>"+"<td><input id='input_comentario2' type='text' value='' class='center'></td>"+"<td><input id='input_comentario3' type='text' value='' class='center'></td>"+"<td><input id='input_comentario4' type='text' value='' class='center'></td>");
	cambiotabla = "tres";
	$('#input_total').val("0");
}

});

$('#tabla').change(function(){
if(cambiotabla == "uno")	
var total = parseInt($('#3').val(), 10) + parseInt($('#4').val(), 10) + parseInt($('#5').val(), 10) + parseInt($('#6').val(), 10) + parseInt($('#8').val(), 10) + parseInt($('#10').val(), 10);	
else if(cambiotabla == "dos")
var total = parseInt($('#5').val(), 10) + parseInt($('#6').val(), 10) + parseInt($('#8').val(), 10) + parseInt($('#10').val(), 10) + parseInt($('#12').val(), 10) + parseInt($('#14').val(), 10) + parseInt($('#16').val(), 10) + parseInt($('#18').val(), 10) + parseInt($('#20').val(), 10) + parseInt($('#22').val(), 10) + parseInt($('#24').val(), 10);	
else if(cambiotabla == "tres")
var total = parseInt($('#12').val(), 10) + parseInt($('#14').val(), 10) + parseInt($('#16').val(), 10) + parseInt($('#18').val(), 10) + parseInt($('#20').val(), 10) + parseInt($('#22').val(), 10) + parseInt($('#24').val(), 10) + parseInt($('#26').val(), 10);	
$('#input_total').val(total);
});

$('#tabla').keyup(function(e){
if(cambiotabla == "uno")	
var total = parseInt($('#3').val(), 10) + parseInt($('#4').val(), 10) + parseInt($('#5').val(), 10) + parseInt($('#6').val(), 10) + parseInt($('#8').val(), 10) + parseInt($('#10').val(), 10);	
else if(cambiotabla == "dos")
var total = parseInt($('#5').val(), 10) + parseInt($('#6').val(), 10) + parseInt($('#8').val(), 10) + parseInt($('#10').val(), 10) + parseInt($('#12').val(), 10) + parseInt($('#14').val(), 10) + parseInt($('#16').val(), 10) + parseInt($('#18').val(), 10) + parseInt($('#20').val(), 10) + parseInt($('#22').val(), 10) + parseInt($('#24').val(), 10);	
else if(cambiotabla == "tres")
var total = parseInt($('#12').val(), 10) + parseInt($('#14').val(), 10) + parseInt($('#16').val(), 10) + parseInt($('#18').val(), 10) + parseInt($('#20').val(), 10) + parseInt($('#22').val(), 10) + parseInt($('#24').val(), 10) + parseInt($('#26').val(), 10);	
$('#input_total').val(total);

});

$('#registrar').click(function(){
var matricula = $('#selector_escuela').val();
var id_tallerp = $('#selector_tallerp').val();
var grado = $('#selector_grado').val();
var total = $('#input_total').val();
var ciclo = $('#selector_ciclo').val();
var tipo = $('#selector_tipo').val();
var comentario1 = $('#input_comentario1').val();
var comentario2 = $('#input_comentario2').val();
var comentario3 = $('#input_comentario3').val();
var comentario4 = $('#input_comentario4').val();

if(matricula == "seleccione")
	M.toast({html:"por favor selecciona una escuela"});
else if(grado == "seleccione")
	M.toast({html:"por favor selecciona un nivel educativo"});
else if(ciclo == "seleccione")
	M.toast({html:"por favor selecciona un ciclo"});
else if(total == "0")
	M.toast({html:"por favor inserta algun valor"});
else{

	swal({
          title: "",
          text: "¿Estás seguro que deseas ingresar un nuevo pedido?",
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

	          	if(cambiotabla == "uno")
				{
				var t3 = $('#3').val();
				var t4 = $('#4').val();
				var t5 = $('#5').val();
				var t6 = $('#6').val();
				var t8 = $('#8').val();
				var t10 = $('#10').val(); 
					$.ajax
					({
					   url: 'crud_escuela_pedido/insertarpre.php',
					   data: {"tipo":tipo,"matricula":matricula,"id_tallerp":id_tallerp,"grado":grado,"total":total,"ciclo":ciclo,"comentario1":comentario1,"comentario2":comentario2,"comentario3":comentario3,"comentario4":comentario4,"t3":t3,"t4":t4,"t5":t5,"t6":t6,"t8":t8,"t10":t10},
					   type: 'post',
					   success: function(result){	
					   		if(result == "exito")
							            swal("Hecho", result, "success");
								else
										swal("Mensaje", result, "info");
					   }	
					});
				}

				else if(cambiotabla == "dos")
				{
				var t5 = $('#5').val();
				var t6 = $('#6').val();
				var t8 = $('#8').val();
				var t10 = $('#10').val();
				var t12 = $('#12').val();
				var t14 = $('#14').val();
				var t16 = $('#16').val();
				var t18 = $('#18').val();
				var t20 = $('#20').val();
				var t22 = $('#22').val();
				var t24 = $('#24').val(); 
					$.ajax
					({
					   url: 'crud_escuela_pedido/insertarpri.php',
					   data: {"tipo":tipo,"matricula":matricula,"id_tallerp":id_tallerp,"grado":grado,"total":total,"ciclo":ciclo,"comentario1":comentario1,"comentario2":comentario2,"comentario3":comentario3,"comentario4":comentario4,"t5":t5,"t6":t6,"t8":t8,"t10":t10,"t12":t12,"t14":t14,"t16":t16,"t18":t18,"t20":t20,"t22":t22,"t24":t24},
					   type: 'post',
					   success: function(result){		 
						    if(result == "exito")
								            swal("Hecho", result, "success");
									else
											swal("Mensaje", result, "info");  	
					   }	
					});
				}
				else if(cambiotabla == "tres")
				{
				var t12 = $('#12').val();
				var t14 = $('#14').val();
				var t16 = $('#16').val();
				var t18 = $('#18').val();
				var t20 = $('#20').val();
				var t22 = $('#22').val(); 
				var t24 = $('#24').val();
				var t26 = $('#26').val(); 
					$.ajax
					({
					   url: 'crud_escuela_pedido/insertarsec.php',
					   data: {"tipo":tipo,"matricula":matricula,"id_tallerp":id_tallerp,"grado":grado,"total":total,"ciclo":ciclo,"comentario1":comentario1,"comentario2":comentario2,"comentario3":comentario3,"comentario4":comentario4,"t12":t12,"t14":t14,"t16":t16,"t18":t18,"t20":t20,"t22":t22,"t24":t24,"t26":t26},
					   type: 'post',
					   success: function(result){		   	
						   	if(result == "exito")
								            swal("Hecho", result, "success");
									else
											swal("Mensaje", result, "info");
					   }	
					});
				}
          } else {
            	swal("Cancelado", "Operación cancelada", "error");
          }
        });
}
});

$('#selector_escuela').change(function(){
var matricula = $('#selector_escuela').val();	
	$.ajax
	({
	   url: 'crud_escuela_pedido/consulta_escuelas.php',
	   data: {"matricula":matricula},
	   type: 'post',
	   success: function(result){		   	
		$('#input_escuela').val(result);
	   }	
	});
});

function enc(texto){
	var th = '<th>'+texto+'</th>';
	return th;
}

function renglon(id){
	var td = "<td><input id='"+id+"' type='number' value='0' class='center'></td>";
	return td;
}

});