
<?php
    include "conecta.inc";

    $conexao=$_SESSION['conexao'];

    $id=$_POST['id'];
    $processo=$_POST['processo'];
    $resultado=$_POST['resultado'];   
	
	$query=    "UPDATE setorial.Audiencias 
				SET RESULTADO='$resultado' 
				where ID='$id'  and PROCESSO='$processo'";
	$insere = ociparse($conexao, $query); 
	ociexecute($insere); 

	if (!$insere) { 
		$e = oci_error();
		trigger_error(htmlentities($e['message']), E_USER_ERROR);
		ocicommit($conexao);
	   //echo "Resultado Atualizado";
		
	}
   
?>