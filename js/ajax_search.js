$(function(){
	$('#search').focus();

	$('#frm_solicitud').submit(function(e){//search_form es el nombre del Formulario
		e.preventDefault();
	})

	$('#search').keyup(function(e){
		if(e.keyCode==13){
				var envio = $('#search').val();
		}

		$.ajax({
			type: 'POST',
			url: 'php/bus-solicitud.',
			data: ('search='+envio),
			success: function(resp){
				if(resp!=""){
					$('#resultados').html(resp);
				}

			}
		})
	})
})
