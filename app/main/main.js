$(document).ready(function(){

	$('form').submit(function(){
		var data = {
			user: $('input[type=text]').get(0).value,
			pass: $('input[type=password]').get(0).value
		};

		var inputSubmit = $('input[type=submit]').get(0);

		inputSubmit.disabled = true;

		$.ajax({
			type:'post',
			url:'/main/login',
			data:data,
			success:function(data){
				if (typeof console == 'object') console.info(data);
				// reload site
				location.href = location.href;
			},
			error:function(data){
				if (typeof console == 'object') console.info(data);
				alert('Credenciales inválidas');
				inputSubmit.disabled = false;
			}
		});

		return false;
	});

});