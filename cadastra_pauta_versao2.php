<html>
<!--
Essa página é aberta em uma modal e serve para o usuário preencher os dados
de uma pauta nova. Importante notar que ela chama uma função em java script (funcao10.js) 
que vai servir para as dropdown lists "duracao" e "horarios" interagirem entre si, uma vez que 
elas estando em uma modal as funções javascrip ficam limitadas.
-->
  <head>
    <meta charset="ISO-8859-1">
    <title>Sistema de Agendamento de Audiencias de Conciliacao</title>
	
    <title>Sistema de Agendamento de Audiências de Conciliação</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/scripts/jquery.min.js"></script>   
    <link rel="stylesheet" href="css/reset.css">    
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="style" href="css/style.css">
    <link href="./css/bootstrap2.css" rel="stylesheet" type="text/css"/>
	<link href="principal.css" rel="stylesheet" type="text/css"/>

	<div class="pen-title">
			<img src="icone-siac.png" alt="Logo do TRF 1ª Região">
			<span>
				<br>
				
					<h1> Sistema de Agendamento de Audiências de Conciliação </h1>
									Sistema de Conciliação <br>
							Tribunal Regional Federal da 1º Região <br>
						Sistema de Agendamento de Audiências de Conciliação <br>
																			<br>
																			<br>
																			<br>
							<h1> 			Cadastrar Pauta 			</h1>
				</br>
			</span>
			
		</div>
		
	
  </head>
  <script>
</script>
  <body onload='setFocusToTextBox()'> 
  <style src="principal.css"></style>
<?php 
//Atualizado 09/03/2017
//variáveis que sao recebidas do proprio form atravez da funcao10.js caso o usuário mude a duração de 20min para qualquer outro
	//$conciliador  =  $_GET['conciliador'];
	//$entidade  =  $_GET['entidade']; 
	//$cadastro  =  $_GET['cadastrar'];
 	//$duracao  =  $_GET['duracao'];
	//$assunto  =  $_GET['assunto'];
	//$total  =  $_GET['total'];
	//$sala  =  $_GET['sala'];
	//$dia  =  $_GET['dia'];
	//$mes  =  $_GET['mes'];
	//$ano  =  $_GET['ano'];
	

	
	
	
?>
<!--Form que recebe os dados da pauta inseridos pelo usuário-->		  
<center><form name="cadastropauta" id="cadastropauta" action="inserir_pauta.php" method="post""> 
	<table cellpadding="5" cellspacing="5" border="1" style="text-align:left; margin: 0 auto; width: 55%;">

		<tr><td>Entidade :</td><td> <input id="entidade" type="text"   name="entidade"    autofocus required ></td></tr>
		<tr><td>Assunto: </td><td> <input id="assunto"  type="text"   name="assunto"     required  ></td></tr>
		<tr><td>Data:    </td><td> <input id="dia"      type="number" name="dia" 	      required     oninput="javascript: if (this.value > 31) this.value = 31;" onKeyUp="if ((this.value.length +1) > 2) document.getElementById('mes').focus();" maxlength = "2" min="1" max="31" style='width:40px;' />/<input type="number" id="mes"  required value="<?php echo $mes; ?>" oninput="javascript: if (this.value > 12) this.value = 12;" onKeyUp="if ((this.value.length +1) > 2) document.getElementById('ano').focus();" maxlength="2" name="mes" min="1" max="12" style='width:40px;' />/<input type="number" id="ano" name="ano"  required value="<?php if($ano == NULL){ echo "2017";}else echo $ano; ?>" min="2016" maxlength="4" style='width:80px;' oninput="javascript: if (this.value.length > this.maxLength) this.value = 2016;" /></td></tr>
		<tr><td>Total de Audiencias:</td><td>    <input type="number" name="total"    required        min="1" max="23" ></td></tr>
		<tr><td>Conciliador:</td><td> <input 			type="text"   name="conciliador"  size="55" ></td></tr>
		<tr><td>Duracao:</td><td> <select id="duracao"  > <!--Função que executa a funca10.js com o valor cadastrar=0 que indica
																														que a pagina deve ser recarregada com as opções de horario alteradas-->
<?	if($duracao == 20){	?>
				<option value="20" selected="selected"> 20min</option>
<?	}else{	?>	<option value="20"> 20min</option>

<?	}if($duracao == 30){	?>
				<option value="30" selected="selected"> 30min</option>
<?	}else{	?>	<option value="30"> 30min</option>

<?	}if($duracao == 40){	?>
				<option value="40" selected="selected"> 40min</option>
<?	}else{	?>	<option value="40"> 40min</option>
	
<?	}if($duracao == 30){	?>
		<tr><td>Hora de inicio:</td><td><select name="horarios">
				<option value="07:30"> 07:30</option>
				<option value="08:00"> 08:00</option>
				<option value="08:30"> 08:30</option>
				<option value="09:00"> 09:00</option>
				<option value="09:30"> 09:30</option>
				<option value="10:00"> 10:00</option>
				<option value="10:30"> 10:30</option>
				<option value="11:00"> 11:00</option>
				<option value="11:30"> 11:30</option>
				<option value="12:00"> 12:00</option>
				<option value="12:30"> 12:30</option>
				<option value="13:00"> 13:00</option>
				<option value="13:30"> 13:30</option>
				<option value="14:00"> 14:00</option>
				<option value="14:30"> 14:30</option>
				<option value="15:00"> 15:00</option>
				<option value="15:30"> 15:30</option>
				<option value="16:00"> 16:00</option>
				<option value="16:30"> 16:30</option>
				<option value="17:00"> 17:00</option>
				<option value="17:30"> 17:30</option>
				<option value="18:00"> 18:00</option>
				<option value=\"18:30\"> 18:30</option></td></tr>
<?	}else if($duracao == 40){	?>
		<tr><td>Hora de inicio:</td><td><select name="horarios">
				<option value="07:40"> 07:40</option>
				<option value="08:20"> 08:20</option>
				<option value="09:00"> 09:00</option>
				<option value="09:40"> 09:40</option>
				<option value="10:20"> 10:20</option>
				<option value="11:00"> 11:00</option>
				<option value="11:40"> 11:40</option>
				<option value="12:20"> 12:20</option>
				<option value="13:00"> 13:00</option>
				<option value="13:40"> 13:40</option>
				<option value="14:20"> 14:20</option>
				<option value="15:00"> 15:00</option>
				<option value="15:40"> 15:40</option>
				<option value="16:20"> 16:20</option>
				<option value="17:00"> 17:00</option>
				<option value="17:40"> 17:40</option>
				<option value="18:20"> 18:20</option></td></tr>
<?	}else{	?>
		<tr><td>Hora de inicio:</td><td><select name="horarios">
               <option value="07:20"> 07:20</option>
               <option value="07:40"> 07:40</option>
               <option value="08:00"> 08:00</option>
               <option value="08:20"> 08:20</option>
               <option value="08:40"> 08:40</option>
               <option value="09:00"> 09:00</option>
               <option value="09:20"> 09:20</option>
               <option value="09:40"> 09:40</option>
               <option value="10:00"> 10:00</option>
               <option value="10:20"> 10:20</option>
               <option value="10:40"> 10:40</option>
               <option value="11:00"> 11:00</option>
               <option value="11:20"> 11:20</option>
               <option value="11:40"> 11:40</option>
               <option value="12:00"> 12:00</option>
               <option value="12:20"> 12:20</option>
               <option value="12:40"> 12:40</option>
               <option value="13:00"> 13:00</option>
               <option value="13:20"> 13:20</option>
               <option value="13:40"> 13:40</option>
               <option value="14:00"> 14:00</option>
               <option value="14:20"> 14:20</option>
               <option value="14:40"> 14:40</option>
               <option value="15:00"> 15:00</option>
               <option value="15:20"> 15:20</option>
               <option value="15:40"> 15:40</option>
               <option value="16:00"> 16:00</option>
               <option value="16:20"> 16:20</option>
               <option value="16:40"> 16:40</option>
               <option value="17:00"> 17:00</option>
               <option value="17:20"> 17:20</option>
               <option value="17:40"> 17:40</option>
               <option value="18:00"> 18:00</option>
               <option value="18:20"> 18:20</option>
               <option value="18:40"> 18:40</option></td></tr>
<?	}	?>

		<tr><td>Sala</td><td><input type="text" name="salas"  required ></td></tr>

	</table>
	
	<center>
		<input type="submit" name="submit" class="button2"  value="Cadastrar">
	</center>	
	
</form>	</center>		

	
	
		<center><?echo"<a href='principal.php'><button class=\"button2\">Voltar</button></a>"?></center>	  


  </body>
</html>








