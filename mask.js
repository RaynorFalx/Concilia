$(document).ready(function(){
	
	$('#telefone').mask('(00)0000.0000Z', {
		translation: {
			'Z': {
				pattern: /[0-9]/, optional: true
			}
		}
	});

	$('#cpf').mask('000.000.000-00', {reverse: false});
	

})