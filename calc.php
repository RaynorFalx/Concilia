<?php
if (isset($_POST)) {
	$numero1 = $_POST['numero1'];
	$numero2 = $_POST['numero2'];
	$calc = $numero1+$numero2;
	$resposta = array ("calc" => $calc); //cria uma array pra 
	echo json_encode($resposta);   //Converte o Array em Json
}
?>