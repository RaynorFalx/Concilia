<?php

	include "conecta.inc";
	$conexao=$_SESSION['conexao'];

	session_destroy();
	ocilogoff($conexao);
	
	//if(isset($_SESSION['login'])) 	
	//unset($_SESSION['login']);


	header("Location:principal.php");

?>

