<?php
    include "conecta.inc";
    $conexao            = $_SESSION['conexao'];
    $resultado_valor    = preg_replace('/([\W]+)/', '', $_POST['novo_Valor']);    
	//$resultado_valor	= preg_replace('/[^0-9]/', '', $_POST['novo_Valor']);   

    if ($resultado_valor >= 100) {

        $resultado_valor    = bcdiv($resultado_valor, 100, 2);
        $resultado_valor    = strtr($resultado_valor, '.', ',');

    }

    $id                 = $_POST['id'];
    $codigo             = $_POST['codigo'];
    $processo           = $_POST['processo'];   
	
	//var_dump($resultado_valor);
	//die();
	
    //foreach ($resultado_valor as $resultado_valores) {

        $query =    "UPDATE setorial.Audiencias 
                    SET VALOR = '$resultado_valor'
                    WHERE ID = '$id' and CODIGO='$codigo' and PROCESSO='$processo'"; 
            
        
        $insere = ociparse($conexao, $query);
        ociexecute($insere);

        //$resposta = array('resposta' => $resultado_valores);
        //print json_encode($resposta);

    //}
?>