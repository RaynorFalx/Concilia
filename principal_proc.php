<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<!--
O usuário é redirecionado para essa página após realizar uma busca por audiências
a unica função dela é listar as audiências encontradas.
-->
<html>
	<head>   
		<meta charset="ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="sistema e-SiAC">
		<meta name="author" content="TRF1">
		<link rel="shortcut icon" href="icone-siac.png" type="image/x-icon" />
		<title>Sistema de Agendamento de Audiências de Concilia&ccedil;ão</title>
		
		<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
		<link rel="stylesheet" href="css/reset.css">    
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/bootstrap2.css" >
		<link rel="stylesheet" href="css/blueprint/src/result.css" >

		 
		<script src="jquery.min.js"></script>
		<script src="./js/js_plugins/bootstrap.min.js" type="text/javascript"></script>
		<script src="./plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
		<script src="js/index.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script type="text/javascript" src="jquery.mask.min.js"></script>
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	   <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
	   <script src="/scripts/jquery.min.js"></script>   
		<link rel="stylesheet" href="css/reset.css">    
		<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
		<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
		<link rel="stylesheet" href="css/style.css">
		<link rel="style" href="css/style.css">
		<link href="./css/bootstrap2.css" rel="stylesheet" type="text/css"/>-->

		<style type="text/css"> 
			@media print 
			{    
					.no-print { 
						display: none; 
					}

					.print {
						display: inline;
					}
					.size{ width:100% }
					.td4 { 
						display: none;
						padding: 10px;
						text-align: center;
						border-bottom:1;
						border:1;
					}
					.table1{
									
					margin: 0 auto;

					}
						
					}
				   
			}
			.hidden
			{
				visibility: hidden;
			}
			.block {
			  text-align: center;
			}

			/* The ghost, nudged to maintain perfect centering */
			.block:before {
			  content: '';
			  display: inline-block;
			  height: 100%;
			  vertical-align: middle;

			}

			/* The element to be centered, can
			   also be of any width and height */ 
			.centered {
			  display: inline-block;
			  vertical-align: middle;
			  width: 600px;
			}
		relative2 {
		  position: relative;
		  top: 20px;
		  left: 20px;
		  background-color: white;
		  width: 500px;
		}
		.button {
			cursor: pointer;
			background-color: #152f4e; /* Green */
			border: none;
			color: white;
			padding: 16px 32px;
			text-align: center;
			text-decoration: none;    
			display: inline-block;
			border-radius: 9px;
			width: 300px;
			height: 50px;
			font-size: 16px;
			box-shadow: 1px 1px 2px #000;
		}

		.button2 {
			cursor: pointer;
			background-color: #285994; 
			border: none;
			color: white;
			padding: 10px;
			text-align: center;
			text-decoration: none;    
			display: inline-block;
			border-radius: 8px;
			font-size: 14px;
			margin:auto;
		}
		.button3{
			cursor: pointer;
			font-size:13px;
			color: white;
			background-color: #1a1a1a;
			padding:5px;
			border-radius: 9px;
		}
		center {
			align="center";
			margin:0 auto;
			width: 60%;
			padding: 10px;
		}
		.box{
			margin: 0 auto;
			width: 90%;
			align: center;
			vertical-align:middle;
		}
		table {
			border: 1px solid #808080;    
			width: 90%;
			align: center;
			vertical-align:middle;
		}
		th {
			border-bottom: 1px solid #808080;
			font-size: 108%;
			padding: 10px;
			background-color: #285994; 
			color: white; 
			vertical-align:middle;
		}
		td {
			border-bottom: 1px solid #808080;
			padding:7px;
			vertical-align:middle;
		}
		tr:nth-child(even){background-color: white}
		tr:hover{
			background-color:#cccccc;
		}
		.FAQ { 
			vertical-align: top;     
			height:auto !important; 
		}

		.list {
			display:none; 
			height:auto;
			horizontal-align: left;
			margin:0;
			float: center;
		}
		.show {
			display: none; 
		}
		.hide:target + .show {
			display: inline;     
		}
		.hide:target {
			display: none; 
		}
		.hide:target ~ .list {
			display:inline; 
		}

		/*style the (+) and (-) */
		.hide, .show {
			width: 80px;
			height: 80px;
			border-radius: 130px;
			font-size: 30px;
			color: #fff;
			text-shadow: 0 1px 0 #666;
			text-align: center;
			text-decoration: none;
			box-shadow: 1px 1px 2px #000;
			background: #152f4e;
			opacity: .95;
			margin-right: 0;
			float: left;
			margin-bottom: 25px;
		}

		.hide:hover, .show:hover {
			color: #eee;
			text-shadow: 0 0 1px #666;
			text-decoration: none;
			box-shadow: 0 0 4px #222 inset;
			opacity: 1;
			margin-bottom: 125px;
		}
		</style>
		<!--<style type="text/css">
			 @media print {    
			   .noprint { display: none; }
			 }
		</style>  -->
		
	</head>
	<body> 
		<!-- Form Mixin-->
		<!-- Input Mixin-->
		<!-- Button Mixin-->
		<!-- Pen Title-->
		<?php
			include "conecta.inc";
			$localidade = $_SESSION['localidade'];
		?>

		<?php
			$login_SESSION        = $_SESSION['login'];
			$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
			$data_login           = $_SESSION['data_login'];
			$dia                  = $_SESSION['dia'];
			$mes                  = $_SESSION['mes'];
			$ano                  = $_SESSION['ano'];
			$perfil               = $_SESSION['perfil'];
			$lotacao              = $_SESSION['lotacao'];
			$conexao              = $_SESSION['conexao'];
			$sigla                = $_SESSION['SIGLA_LOCAL'];
			
			if (isset($_POST['Visualizar'])) 
			{
					$tipo_busca = $_POST['tipo_busca'];
					if (!empty($_POST['dia1'])) 
					{
						$dia = $_POST['dia1'];
					}
					if (!empty($_POST['dia2'])) 
					{
						$dia2 = $_POST['dia2'];
					}
					if (!empty($_POST['mes1'])) 
					{
						$mes = $_POST['mes1'];
					}
					if (!empty($_POST['mes2'])) 
					{
						$mes2 = $_POST['mes2'];
					}
					if (!empty($_POST['ano1']))
					{
						$ano = $_POST['ano1'];
					}
					if (!empty($_POST['ano2']))
					{
						$ano2 = $_POST['ano2'];
					}
					$assunto_buscar  = $_POST['assunto_buscar'];
					//var_dump($assunto_buscar);
					$processo_buscar = $_POST['processo_buscar'];
					$processo_buscar = str_replace('.', '', $processo_buscar);
					$processo_buscar = str_replace('-', '', $processo_buscar);
					$parte_buscar    = $_POST['parte_buscar'];
					$vara_buscar     = $_POST['vara_buscar'];
			
					
			}
			echo "<br>";
			//echo "<center><h3>Audiências encontradas:</h3></center>";
		?>
		<center>
				<div id="audiencias_encontradas">   
					<br><br>
					<div class="title">
						<div class="block">
							<div class="centered">
											
								<img src="icone-siac.png" alt="Logo do TRF 1ª Região">
								<h1>
									<font size="6px"> 
										Sistema de Agendamento de Concilia&ccedil;&atilde;o<br>		
									</font>
								</h1>
								<?echo urldecode($localidade);?>
								<br><br>
							
						<!-- debugger -->
						<?php
							$query_nls_comp = "alter session set nls_comp=linguistic";
							$resultado      = oci_parse($conexao, $query_nls_comp);
							ociexecute($resultado);
							$query_nls_sort = "alter session set nls_sort=binary_ai";
							$resultado      = oci_parse($conexao, $query_nls_sort);
							ociexecute($resultado);

							if ($tipo_busca == 'tipo_1' AND $vara_buscar !== 'Todas') {
								$query = "	SELECT Audiencias.Codigo, Audiencias.Processo, Audiencias.Vara, Audiencias.Parte, Audiencias.Horario, Controle.Data, Controle.Entidade, 
											Controle.Assunto, Controle.ID, Controle.Total_disponivel, Controle.Sala, Controle.Total,Controle.Conciliador,Audiencias.Estado 	
											FROM setorial.Audiencias, setorial.Controle 
											WHERE controle.SIGLA_LOCALIDADE = '$sigla' 
											AND audiencias.estado='ATIVO' 
											AND Audiencias.Vara='$vara_buscar' 
											AND Audiencias.ID IN (Select ID from setorial.Controle WHERE Data>=TO_DATE('$mes-$dia-$ano','MM-DD-YYYY') AND Data<=TO_DATE('$mes2-$dia2-$ano2','MM-DD-YYYY')) 
											AND Controle.ID=Audiencias.ID 
											ORDER BY Data, Horario ASC";
								//$pesquisa_item = $vara_buscar;
							}

							if ($tipo_busca == 'tipo_1' AND $vara_buscar == 'Todas') 
							{
								$query = "	SELECT Audiencias.Codigo, Audiencias.Processo, Audiencias.Vara, Audiencias.Parte, Audiencias.Horario,Controle.Data, Controle.Entidade, 
											Controle.Assunto, Controle.ID, Controle.Total_disponivel, Controle.Sala, Controle.Total,Controle.Conciliador 
											FROM setorial.Audiencias, setorial.Controle 
											WHERE controle.SIGLA_LOCALIDADE = '$sigla'  
											AND audiencias.estado='ATIVO'
											AND Audiencias.ID IN (Select ID from setorial.Controle WHERE Data>=TO_DATE('$mes-$dia-$ano','MM-DD-YYYY') AND Data<=TO_DATE('$mes2-$dia2-$ano2','MM-DD-YYYY')) 
											AND Controle.ID=Audiencias.ID 
											ORDER BY Horario ASC";
							}
							if ($tipo_busca == 'tipo_2') 
							{
								$query = "SELECT Audiencias.Codigo, Audiencias.Processo, Audiencias.Vara, Audiencias.Parte, Audiencias.Horario,Controle.Data, Controle.Entidade, Controle.Assunto, Controle.ID, Controle.Total_disponivel, Controle.Sala, Controle.Total,Controle.Conciliador from setorial.Audiencias, setorial.Controle WHERE controle.SIGLA_LOCALIDADE = '$sigla' and audiencias.estado='ATIVO' and lower(Audiencias.Processo)=lower('$processo_buscar') AND Audiencias.ID=Controle.ID AND Controle.Data>=TO_DATE('$mes-$dia-$ano','MM-DD-YYYY') AND Controle.Data<=TO_DATE('$mes2-$dia2-$ano2','MM-DD-YYYY') ORDER BY Controle.Data ASC";
								$pesquisa_item = $processo_buscar;
							}
							if ($tipo_busca == 'tipo_3') 
							{
								$query = "SELECT Audiencias.Codigo, Audiencias.Processo, Audiencias.Vara, Audiencias.Parte, Audiencias.Horario,Controle.Data, Controle.Entidade, Controle.Assunto, Controle.ID, Controle.Total_disponivel, Controle.Sala, Controle.Total,Controle.Conciliador from setorial.Audiencias, setorial.Controle WHERE controle.SIGLA_LOCALIDADE = '$sigla' and audiencias.estado='ATIVO' and lower(Audiencias.Parte) LIKE lower('$parte_buscar') AND Audiencias.ID=Controle.ID AND Controle.Data>=TO_DATE('$mes-$dia-$ano','MM-DD-YYYY') AND Controle.Data<=TO_DATE('$mes2-$dia2-$ano2','MM-DD-YYYY') ORDER BY Controle.Data ASC";
								$pesquisa_item = $parte_buscar;
							}
							if ($tipo_busca == 'tipo_4') 
							{
								$query = "SELECT Audiencias.Codigo, Audiencias.Processo, Audiencias.Vara, Audiencias.Parte, Audiencias.Horario,Controle.Data, Controle.Entidade, Controle.Assunto, Controle.ID, Controle.Total_disponivel, Controle.Sala, Controle.Total,Controle.Conciliador from setorial.Audiencias, setorial.Controle WHERE controle.SIGLA_LOCALIDADE = '$sigla'  and audiencias.estado='ATIVO' and lower(Assunto) LIKE lower('$assunto_buscar') AND Audiencias.ID=Controle.ID AND Controle.Data>=TO_DATE('$mes-$dia-$ano','MM-DD-YYYY') AND Controle.Data<=TO_DATE('$mes2-$dia2-$ano2','MM-DD-YYYY') ORDER BY Controle.Data ASC";
								$pesquisa_item = $assunto_buscar;
							}
							
							$resultado1=ociparse($conexao, $query);  
							ociexecute($resultado1);
							$cont = 0;
							while($linha1=oci_fetch_array($resultado1))
							{ 
								$cont++;
							}
							if($cont > 0){
								?>
								
								<h1>
									<center>
										<font size="5px">
											Audi&ecirc;ncias encontradas:
										</font>
									</center>
								</h1> 
							</div>
						</div>
						<br>
					</div>
					<table style="margin: 0 auto; text-align: center; " cellpadding="5" cellspacing="5" border="1">
					<thead>
						<tr style="width:987px">
							<!--<td>Codigo</td>-->
							<th><font size="3">Processo:</font></th>
							<!--<th><font size="3">Vara:</th>-->
							<th><font size="3">Parte:</th>
							<th><font size="3">Hor&aacute;rio:</th>
							<th   ><font size="3">Data:</th>
							<th   ><font size="3">Entidade:</th>
							<th   ><font size="3">Assunto:</th>
							<th   ><font size="3">Conciliador:</th>
							<th   ><font size="3">Sala:</th>
						</tr>
				
							<?
							$resultado = ociparse($conexao, $query);
							ociexecute($resultado);
							//echo "<table style=\"margin: 0 auto; text-align: center\" cellpadding=\"5\" cellspacing=\"5\" border=\"1\">";
							while ($linha = oci_fetch_array($resultado)) 
							{
									echo "<tr>";
								
									//echo "<td><font face=calibri color=#000000 size=4> $linha[0] </font></td>";
									echo "<td width=\"100px\"><font face=calibri color=#000000 size=4> $linha[1] </font></td>";
									if ($linha[2] == "null") 
									{
										echo "<td>  </td>";
									} else 
									{
										//echo "<td width=\"100px\"><font face=calibri color=#000000 size=4> $linha[2] </font></td>";
									}
									echo "<td width=\"200px\"><font face=calibri color=#000000 size=3> $linha[3] </font></td>";
									echo "<td width=\"90px\"><font face=calibri color=#000000 size=4> $linha[4] </font></td>";
									echo "<td width=\"100px\"><font face=calibri color=#000000 size=4> $linha[5] </font></td>";
									echo "<td width=\"100px\"><font face=calibri color=#000000 size=4> $linha[6] </font></td>";
									echo "<td width=\"100px\"><font face=calibri color=#000000 size=4> $linha[7] </font></td>";
									echo "<td width=\"100px\"><font face=calibri color=#000000 size=4> $linha[12]</font></td>";
									echo "<td width=\"100px\"><font face=calibri color=#000000 size=4> $linha[10] </font></td>";
									$id               = $linha[8];
									$assunto          = $linha[7];
									$data_aud         = $linha[5];
									$sala             = $linha[10];
									$entidade         = $linha[6];
									$horario          = $linha[4];
									$total            = $linha[11];
									$total_disponivel = $linha[9];
									$conciador        = $linha[12];

									/*if ($lotacao == $linha[2] OR $perfil == "Diretor") 
									{
										echo "<td>";
											echo "<button type=\"button\" class=\"button2\" data-id=\"$id\" data-codigo=\"$linha[0]\" data-vara=\"$linha[2]\" data-total_disponivel=\"$total_disponivel\" data-assunto=\"$assunto\" data-data_aud=\"$data_aud\" data-sala=\"$sala\" data-entidade=\"$entidade\" data-horario=\"$horario\" data-total=\"$total\" onclick=\"apaga(this)\">";
												echo "Apagar";
											echo "</button>";
										echo "</td>";
									} else 
									{
										//echo "<td><font face=calibri color=#000000 size=4>  </font></td>";
									}*/
								
									echo "</tr>";
							}
							//echo "</table>";
						?>
						</table>
					<center>
						<div class="no-print">
							   <button target="_blank" 
									class="button2" 
									onclick="printDiv2('audiencias_encontradas')"
									value="Imprimir" 
									style="padding:10px;margin:10px"> 
										Imprimir 
								</button>

								<a href="principal.php"> 
									<button type="button" class="button2"> 
										Voltar
									</button>
								</a>
						</div>
					<!--<input type="button" class="button2" name="imprimir" value="Imprimir" onclick="window.print();">-->
					</center>
				</div>	
		</center>
				<?}
				else{	
				?>
				<br><br><br><br><br><br><br><br><br><br>
				<div class="nao_encontrou">
						<font size="7px"> 
							Resultado n&atilde;o encontrado! <br>		
						</font>
						</br>
						<br><br>
						<!--font size="4px">
						<ul align="left"> 
							O par&acirc;metro de pesquisa &quot;&quot; n&atilde;o foi encontrado neste servidor. 					
							<br></br>
							Recomenda&ccedil;&otilde;es:
							<br></br>
							
							<ol>&bull;  Utilize par&acirc;metros v&aacute;lidos (&eacute; preciso ter audi&ecirc;ncias cadastradas).</ol>
							<ol>&bull;  Certifique-se de que o par&acirc;metro esteja digitado corretamente.</ol>
							<ol>&bull;  Verifique se o par&acirc;metro digitado pertence &agrave; sua regi&atilde;o.</ol>
							<ol>&bull;  Refa&ccedil;a sua pesquisa cumprindo os itens anteriores.</ol>
							</ul>
						</font-->
						</br>
						<br><br>
						<a href="principal.php"> 
							<button type="button" class="button2"> 
								Voltar
							</button>
						</a>
				</div>
					<?
					}?>				
		<script type="text/javascript" src="funcao3.js"></script>
		<script>
		 jQuery.validator.setDefaults({
            debug: true,
            success: "valid",
        });
		$("#myform").validate({
  onsubmit: false
});
function testedejavscrpt(){
	alert("teste");
}
			function apaga(bt) 
			{                                                                      
						var x=confirm('Confirma a exclus\u00e3o?');
						var ID = bt.getAttribute('data-ID');
						var codigo = bt.getAttribute('data-codigo');
						var vara = bt.getAttribute('data-vara');                
						var total_disponivel=bt.getAttribute('data-total_disponivel');                
						var assunto=bt.getAttribute('data-assunto');                
						var data=bt.getAttribute('data-data_aud');                
						var entidade=bt.getAttribute('data-entidade');                
						var horario=bt.getAttribute('data-horario');  
						var total=bt.getAttribute('data-total');  
						var sala=bt.getAttribute('data-sala');  
						var origem="lista";
						if (x == true) 
						{
							apagaAudiencia(ID, codigo, vara, total_disponivel, assunto, data, entidade, horario, total, sala, origem);
						}
			}
			
			function printDiv2(divName)
			{
				var printContents = document.getElementById(divName).innerHTML;
				var originalContents = document.body.innerHTML;

				document.body.innerHTML = printContents;
				window.print();
				document.body.innerHTML = originalContents;    
			}
		</script>
	</body>
</html>
