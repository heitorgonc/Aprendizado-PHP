<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>
	<body>
		<div>
			<form method="POST" id="frmUsuario">
				<div>
					<input type="text" name="usuario" id="usuario" placeholder="Usuário">
					<input type="email" name="email" id="email" placeholder="Email">
					<input type="submit" name="saveUsuario" id="saveUsuario" class="submit" value="Salvar">
				</div>			
			</form>
		</div>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
		<script>
			$('.submit').on('click', event => {
				event.preventDefault();
				const data = {
					usuario: $('#usuario').val(),
					email: $('#email').val(),
					action: $(event.target).prop('name')
				};
				$.ajax('/ex1api.php', {
					method: 'post',
					data: JSON.stringify(data),
					success: resp => {
						console.log(resp);
						$('#usuario').val('');
						$("#email").val('');
					}
				});
			});
		</script>
	</body>
</html>