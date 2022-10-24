$(function(){

	$('#Usuario').focusout(function(){
		var envio = $('#Usuario').val();

		if(envio!=''){



		$.ajax({
			type: 'POST',
			url: '../php/registrarU.php',
			data: ('Usuario='+envio),
			success: function(Usuario){

				if(resp!=""){
					alert("* ATENCIÓN *"+"\r\n"+Usuario);
				}

			}
		})
}

	})
	})
