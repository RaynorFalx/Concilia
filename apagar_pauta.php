<?php
//Atualizado 09/03/2017
    include "conecta.inc";
    $id=$_GET['id'];
    $conexao=$_SESSION['conexao'];
    $query="SELECT * from setorial.Audiencias WHERE ID=$id and RESULTADO='ATIVO';";
    $resultado=ociparse($conexao, $query);
    ociexecute($resultado);
    if (ocifetchstatement($resultado,$CampoResult)>0){
		header("Location:principal.php?del_p=0");				
    }
    else {
    $query2="DELETE from setorial.Controle WHERE ID=$id";
    $resultado2=ociparse($conexao, $query2);
    ociexecute($resultado2);
    if ($resultado2) {
            ocicommit($conexao);		
	        header("Location:principal.php?del_p=1");		
    }
}
?>