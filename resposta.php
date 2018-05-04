<?php
if (isset($_POST['enviar'])) {
	$resposta = ['valor' => 3,'sucesso' => true];
	echo json_encode($resposta);
}



?>