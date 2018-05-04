<?php
    include "conecta.inc";
    $lotacao=$_SESSION["lotacao"];
    $matricula=$_GET['matricula'];
    $conexao=$_SESSION['conexao'];    
	$query="DELETE FROM setorial.Usuarios WHERE matricula='$matricula' and sigla_localidade = '$lotacao'";
	$apaga=ociparse($conexao, $query);
	ociexecute($apaga);
        if ($apaga) {
        	ocicommit($conexao);
		header("Location:principal.php?apagauser=1");
	}
	else {
		echo "<script>alert('ERRO ao apagar o usuário. Por favor faça um SOSTI para a SEINF! ;)');</script>";		
	}
?>
	    