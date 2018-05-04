
<html>
<!--
Essa pÃ¡gina Ã© aberta em uma modal e serve para o usuÃ¡rio preencher os dados
de uma pauta nova. Importante notar que ela chama uma funÃ§Ã£o em java script (funcao10.js) 
que vai servir para as dropdown lists "duracao" e "horarios" interagirem entre si, uma vez que 
elas estando em uma modal as funÃ§Ãµes javascrip ficam limitadas.
-->
  <head>
    <meta charset="ISO-8859-1">
    <title>Sistema de Agendamento de Audiencias de Conciliacao</title>
	<style>
	</style>
  </head>
  <script>
</script>

<style type="text/css">
		.span {
			color: #ff0800;
		}
		
		.disabled{
			background-color: #E2E4E5;		
		}

</style>
  <body onload='setFocusToTextBox()'> 
  
<?php 
      
date_default_timezone_set('America/Sao_Paulo');
//if (date_default_timezone_get()) {    echo 'Este é o: date_default_timezone_set: ' . date_default_timezone_get() . '<br />';}
//if (ini_get('date.timezone')) {    echo 'E este é o: date.timezone: ' . ini_get('date.timezone');}
 
      
//Atualizado 09/03/2017
//variÃ¡veis que sao recebidas do proprio form atravez da funcao10.js caso o usuÃ¡rio mude a duraÃ§Ã£o de 20min para qualquer outro
	$conexao  =  $_SESSION['conexao'];
	$id  =  $_GET['id'];
	$conciliador  =  $_GET['conciliador'];
	$duracao = $_GET['duracao'];
	$entidade  =  $_GET['entidade']; 
	$assunto  =  $_GET['assunto'];
	$total  =  $_GET['total'];
	$total_disponivel = $_GET['total_disponivel'];
	$sala  	=  	$_GET['sala'];
	$data	=	$_GET['data'];

	$dia  =  substr($data, 0, 2);
	$mes  =  substr($data, 3, 2);
	$ano  =  substr($data, 6, 4);
	$teste = $dia.$mes.$ano;
	//echo date('d/m/Y', strtotime($data));
	$data1  =  mktime(00,00,00, $mes, $dia, $ano); 	
	$data_teste = date ("d/m/Y",$data1);
	
	$dia1  =   substr($data_teste, 0, 2);
	$mes1  =  substr($data_teste, 3, 2);
	$ano1  =  substr($data_teste, 6, 4);

	$query  =  "SELECT  setorial.Controle (Entidade, Assunto, Conciliador, Data, Total,  Hora_inicio, Sala, Sigla_localidade,duracao) VALUES ('$entidade', '$assunto','$conciliador', to_date('$data','DD/MM/YYYY'), '$total', '$horario', '$sala','$sigla_local','$duracao')";

		$insere  =  ociparse($conexao, $query);
		ociexecute($insere);
		ocicommit($conexao);
		
echo"<form name=\"cadastropauta\" id=\"cadastropauta\" action=\"executa_editar_pauta.php?id=$id\" method=\"post\">";

?>
	<span class="span">* Campos Edit&aacute;veis * </span> <br>
	<br>
	<table cellpadding="5" cellspacing="5" border="1" style="text-align:left; margin: 0 auto; width: 55%;">

		<tr>
			<td>Entidade:</td>
			<td> 
				<input  class="disabled" readonly="true" id="entidade" type="text"   name="entidade"   style='width: 169px;' value="<?echo $entidade;?>" autofocus required >
			</td>
		</tr>
		
		<tr>
			<td>Assunto: </td>
			<td> 
				<input  class="disabled" readonly="true" id="assunto" type="text" name="assunto" style='width: 169px;' value="<?echo $assunto;?>" required >
			</td>
		</tr>
		
		<tr>
			<td> Data: </td>
			<td> 
				<input id="dia"  class="disabled" readonly="true"  type="number" name="dia" value="<?echo $dia1;?>" required     
				oninput="javascript: if (this.value > 31) this.value = 31;" 
				onKeyUp="if ((this.value.length +1) > 2) document.getElementById('mes').focus();" 
				maxlength = "2" min="1" max="31" style='width:35px;' /> 
				/
				<input class="disabled" readonly="true" type="number" id="mes" required value="<?php echo $mes1; ?>" oninput="javascript: if (this.value > 12) this.value = 12;" 
				onKeyUp="if ((this.value.length +1) > 2) document.getElementById('ano').focus();" 
				maxlength="2" name="mes" min="1" max="12" style='width:35px;' />
				/
				<input class="disabled" readonly="true" type="number" id="ano" name="ano" required value="<?php if($ano1 == NULL){ echo "2018";}else echo $ano1; ?>" min="2017" 
				maxlength="4" style='width:50px;' oninput="javascript: if (this.value.length > this.maxLength) this.value = 2018;" />
			</td>
			</tr>
		
		<tr>
			<td> <span class="span"> * </span> Conciliador: </td>
			<td> <input type="text" name="conciliador" value="<?echo $conciliador;?>" style='width:169px;'> </td>
		</tr>
			
		<tr>  
			<td> 
				<span class="span"> * </span> Sala
			</td>
			<td>
				<input type="text" name="sala" value="<?echo $sala;?>" >
			</td>
		</tr>

		<tr>  
			<td> 
				<span class="span"> * </span> Total de Audi&#234;ncias 
			</td>
			<td> 
				<input type="text" name="total" value="<?echo $total;?>" >
			</td>
		</tr>

		<input type="hidden" name="total_disponivel" id="total_disponivel" value="<? echo $total_disponivel; ?>">
	</table>

	<br><br>
	<center>
		<?echo"<button type=\"submit\" class=\"button2\" cadastrar='1'>Salvar</button></td>"?>
	</center>
</form>			 
																		   <!--FunÃ§Ã£o que executa o arquivo funcao10.js com cadastrar=1 que indica que os dados da pauta devem ser enviados para inserir_pauta.php-->
	<script type="text/javascript" src="funcao10.js"></script>

  </body>
</html>








