<?php
	$json = file_get_contents('php://input');
	$obj = json_decode($json);
	
	if($obj->action == 'saveUsuario'){
		$handle = fopen('users.txt', 'a+');
		fwrite($handle, $obj->usuario . "\n");
		fclose($handle);

		header('Content-Type: application/json; charset=utf-8', true, 202);
		echo json_encode(
			['status' => 'ok', 'message' => 'usuário ' . $obj->usuario . ' gravado com sucesso']
		);
	}
?>