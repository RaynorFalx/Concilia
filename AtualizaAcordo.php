<?php 
	include "conecta.inc";

	$acordos = $_POST['atualiza_Resultado'];
	$att = $acordos;
	$resposta = array ("acordos" => $att); //cria uma array pra 
	echo json_encode($resposta);   //Converte o Array em Json

?>