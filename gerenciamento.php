<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php
    include "conecta.inc";
    $conexao=$_SESSION['conexao'];
    $login = $_SESSION['login'];
    $DominioBancoSecao = $_SESSION['infos'];
?>


<html>
  <head>
    <meta charset="utf-8">
    <title>Sistema de Agendamento de Audi&ecirc;ncias de Concilia&ccedil;&atilde;o</title>
	<?php include 'includes/head.php'; ?>
    
    
    <link rel="stylesheet" href="css/reset.css">

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

  	<div id="header">
			<?php include 'includes/topo.php'; ?>
		</div>

    
<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
    <img src="icone-siac.png" alt="Logo do TRF 1 Regiao">
  <h1>Sistema de Agendamento de Audi&ecirc;ncias de Concilia&ccedil;&atilde;o</h1>
</div>
<!-- Form Module-->
<div class="module form-module">
  <!--<div class="toggle"><i class="fa fa-times fa-pencil"></i>
   <!--<div class="tooltip">Solicitar cadastro</div>-->
  </div> 
    
	<br>
    <form method="POST" action="login.php">
    <center><tr><td>Localidade:</td><td>
	<select id="regiao"  name="regiao"  onchange="this.form.submit()""></center>
	
		<option value='' selected="selected">Selecione uma localidade</option>
		<?php  /*fun��o em conserto dia 27/06/2017*/
		# Array da Combo de dominio  
		# Todos os servidores da 1� Regi�o podem acessar
		$Secao="TRF1"; 
		$DominioCdgo = 1000;
		$encoding ='ISO-8859-1'; 
		for($i = 0 ; $i < sizeof($DominioBancoSecao) ; $i ++) 
		{  $test='';
			$test1='';
			if($DominioBancoSecao[$i]["Codigo"] != "JFDSV1") 
			{		//Remove a sele��o do banco de desenvolvimento da lista de Banco de dados
				if($DominioBancoSecao[$i]["Codigo"] != "JFDSV") 
				{ //Remove a sele��o do banco de desenvolvimento da lista de Banco de dados
					$test=$DominioBancoSecao[$i]["Nome"];
					$test1 = mb_convert_case($test,MB_CASE_UPPER, $encoding);
					echo  "<option id=\"".( $DominioBancoSecao[$i]["Codigo"] != "" ? $DominioBancoSecao[$i]["Codigo"] : "" )."\" ".($SiglaSecao==$DominioBancoSecao[$i]["Sigla"] ? " Selected " : "")." value=\"" . $DominioBancoSecao[$i]["Sigla"] . "|" . $DominioBancoSecao[$i]["Codigo"] ."|". $DominioBancoSecao[$i]["Descricao"] . "\">" .str_replace("&NBSP;", "&nbsp;", $test1)."</option>\n";

				}  
			}
		}
		?>
	</select>
    
    
  </body>
</html>
