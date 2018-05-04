<?php
    include "conecta.inc";
    $conexao=$_SESSION['conexao'];
    $login = $_SESSION['login'];
    $senha = $_SESSION['senha'];
    $localidade =$_SESSION['descDomUserLogon'];
    $codigo_localidade = $_SESSION['codDomUserLogon'];

    if($codigo_localidade==1000){
        $codigo_localidade=100;
    }
    
    $GetSigla = "SELECT SESU_SG_SECSUBSEC from p_secao_subsecao where SESU_CD_SECSUBSEC = '$codigo_localidade'";
    $executa = oci_parse($conexao, $GetSigla);
    ociexecute($executa);
    $sigla =oci_fetch_array($executa);
    @$_SESSION['SIGLA_LOCAL'] = $sigla[0];

            //$query ="SELECT * FROM setorial.usuarios WHERE matricula = '$login'";
            $query ="SELECT * FROM setorial.usuarios WHERE matricula = '$login' AND SIGLA_LOCALIDADE = '$sigla[0]'";             
            $verifica = oci_parse($conexao, $query);
            ociexecute($verifica) ;
            $linha =ocifetchstatement($verifica,$CampoResult);

                //if (mysqli_num_rows($verifica)<=0){
                if($linha<=0){
                    session_destroy();
                    echo"<script language='javascript' type='text/javascript'>alert('Usu\u00e1rio ainda n\u00e3o tem perfil cadastrado!');window.location.href='principal.php';</script>";
                    die();
                }else{			    
        		    $dia = date('d');
	          	    $mes = date('m');
		            $ano = date('Y');
        		    $data_login = $dia."/".$mes."/".$ano;
                    $_SESSION["login"] = $login;
                    $_SESSION["dia"]=$dia;
                    $_SESSION["ano"]=$ano;
                    $_SESSION["mes"]=$mes;
        		    $_SESSION["data_login"]= $data_login;
			        $_SESSION["perfil"]=$CampoResult["PERFIL"][0];
                    //$_SESSION["vara_user"]= $CampoResult["VARA"][0];
                    if(isset($_POST['regiao'])){
                        $regiao=$_POST['regiao'];
                        $infos = explode("|",$regiao);
                        $_SESSION["lotacao"]= $infos[0];
                        $_SESSION["codigo_local"]= $infos[1];
                        $_SESSION["localidade"]= $infos[2];
                    }else{
    			        $_SESSION["lotacao"]= $CampoResult["SIGLA_LOCALIDADE"][0];
                        $_SESSION["localidade"]= $localidade;
                        $_SESSION["codigo_local"]= $codigo_localidade;
                    }   
                    $_SESSION["vara_user"]= $CampoResult["VARA"][0];
           		    //mysqli_close($conexao);
                    header("Location:principal.php");
					echo "<script language='javascript' type='text/javascript'>window.location.reload(true);</script>";
                 }

?>


