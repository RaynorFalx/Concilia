<?php

    ob_start();
    session_start();
    if(($_SERVER['SERVER_NAME'] =="dsv.trf1.jus.br")||($_SERVER['SERVER_NAME'] =="wwwdsv1.trf1.gov.br")){
    $connect = oci_connect('TRFWEBINTRA', 'intraweb','172.16.3.70:1521/trf1dsv.trf1.gov.br','WE8ISO8859P1');
    }else{
    $connect = oci_connect('TRFWEBINTRA', 'intraweb','172.16.3.3:1521/trf1.trf1.gov.br','WE8ISO8859P1');
    }
    $_SESSION['conexao']=$connect;
	$connect2= oci_connect('TRFWEBINTRA', 'intraweb','172.16.3.3:1521/trf1.trf1.gov.br','WE8ISO8859P1');
	$_SESSION['conexao_judicial']=$connect2;
	
?>