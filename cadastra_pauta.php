<!DOCTYPE html>
<html>
<!--
Essa página é aberta em uma modal e serve para o usuário preencher os dados
de uma pauta nova. Importante notar que ela chama uma funç&atilde;o em java script (funcao10.js) 
que vai servir para as dropdown lists "duracao" e "horarios" interagirem entre si, uma vez que 
elas estando em uma modal as funções javascrip ficam limitadas.
-->
  <head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Sistema de Agendamento de Audiencias de Conciliaç&atilde;o</title>
    <!--<script type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 

    <!-- JQUERY --> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script> 

    <!-- JQUERY UI -->
	<script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="jquery-ui.css"> 

    <!-- DATE PICKER -->
    <script type="text/javascript" src="date-picker/jquery-ui.multidatespicker.js"></script>

    <!-- FUNÇÃO 10 -->
    <script type="text/javascript" src="funcao10.js "> </script>
	
	<style>

			.datepicker {
			width: 17em;
			padding: .2em .2em 0;
			display: block;
			z-index:1151 !important;
		}
		.span {
		color: #ff0800;
		
		}
		option {
			display: block;
		}
		*{
	font-family: Arial, sans-serif;
}
div > .tooltip, li > .tooltip, a > .tooltip, span > .tooltip {
  opacity: 0;
  visibility: hidden;

  -webkit-transition: 0.3s;
  -moz-transition: all 0.3s;
}

  div:hover > .tooltip, li:hover > .tooltip, a:hover > .tooltip, span:hover > .tooltip,
  a .tooltip:hover, span .tooltip:hover, li .tooltip:hover, div .tooltip:hover {
    opacity: 1;
    visibility: visible;
    overflow: visible;
    margin-top: -40px;
    display: inline;
    margin-left: -40px;
    
    -webkit-transition: 0.3s;
    -moz-transition: all 0.3s;
  }

.tooltip {
  background:  #285994;
  color: #fff;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -o-border-radius: 5px;
  border-radius: 5px;

  padding: 10px;
  margin-left: -40px;

  position: absolute;

  font-family: Arial;
  font-size: 12px;
  text-decoration: none;
  font-style: normal; 

  z-index: 10;  
}

    .tooltip:before { /* Triangle */
      content: "";
      background: #285994;

      border: 0; 

      width: 10px;
      height: 10px;
      margin-left: 5px;
      margin-top: 20px;
      
      display: block;
      position: absolute;

      -webkit-transform: rotate(-45deg);
      -moz-transform: rotate(-45deg);
      -o-transform: rotate(-45deg);
      transform: rotate(-45deg);
      
      
      display /*\**/: none\9;
      *display: none !important;
      *display: none;
    }
	</style>
  </head>

  <body onload='setFocusToTextBox()'>  
<?php 

	$conciliador  	=  $_GET['conciliador'];
	$entidade		=  $_GET['entidade']; 
	$cadastro  		=  $_GET['cadastrar'];
 	$duracao  		=  $_GET['duracao'];
	$assunto  		=  $_GET['assunto'];
	$total  		=  $_GET['total'];
	$sala  			=  $_GET['sala'];
	$dia  			=  $_GET['dia'];
	$mes  			=  $_GET['mes'];
	$ano  			=  $_GET['ano'];
	$horario 		=  $_GET['horarios'];
 	$intervalo_ini 	=  $_GET['intervaloi'];
    $intervalo_fim 	=  $_GET['intervalof'];
	$status			=  $_GET['Categoria'];
   /*var_dump($entidade);
	var_dump($assunto);
	var_dump($dia);
    var_dump($mes);
    var_dump($ano);
    var_dump($total);
    var_dump($conciliador);
	var_dump($duracao);
  	echo "HOR:"; var_dump($horario);
  	echo "INI:"; var_dump($intervalo_ini);
  	echo "FIM:"; var_dump($intervalo_fim);*/
  //	var_dump($sala);
	//var_dump($status);

	
?>
<!-- Form que recebe os dados da pauta inseridos pelo usuário -->		  


<form name="cadastropauta" id="cadastropauta" action="javascript:void(0)" onkeypress="if (event.keyCode == 13 )  $('[name=cadastrar_btn]').click();"> 

	<table cellpadding="5" cellspacing="5" border="1" style="text-align:left; margin: 0 auto; width: 55%;">
		<br>
		<center><span class="span">* Campos Obrigat&oacute;rios *</span></center><br>
		<tr>
			<td> 	
				<span class="span"> * </span> Entidade:
			</td> 
			<td> 
				<input id="entidade" autofocus type="text"   name="entidade"  placeholder=" Entidade"   value="<?echo $entidade;?>" required size="23" >
			</td>
		</tr> 
			
			
		<tr>
			<td>
				<span class="span"> * </span>	Assunto: 
			</td>
			<td>
				<input id="assunto"  type="text"   name="assunto"  placeholder=" Assunto"    value="<?echo $assunto;?>"  required size="23"> 
			</td>
		
		</tr> 
		<tr>
			<td>
				<span class="span"> * </span>Data:
			</td>
			<td> 
				<?php /*
				<!--  <input id="dia" type="number" name="dia"   placeholder="DD"	required value="<?php if($dia == NULL){echo date('d');}else echo $dia; ?>"  
				oninput="javascript:  
					if (this.value > 31) 
					this.value = 31;" 
				onKeyUp="
					if ((this.value.length +1) > 2) 
					document.getElementById('mes').focus();" 
				maxlength = "2" min="1" max="31" style='width:40px;' /> 
				/
				<input type="number" id="mes"  name="mes"  placeholder="MM" required value="<?php if($mes == NULL){echo date('m');}else echo $mes; ?>" oninput="javascript: 
				if (this.value > 12) 
					this.value = 12;" 
				onKeyUp="
					if ((this.value.length +1) > 2) 
					document.getElementById('ano').focus();" maxlength="2" min="1" max="12" style='width:40px;' /> 
				/
				<input type="number" id="ano"  name="ano" placeholder="AA"   required value="<?php if($ano == NULL){echo date('Y');}else echo $ano; ?>" min="<?php echo date('Y'); ?>" maxlength="4" style='width:60px;' oninput="javascript: if (this.value.length > this.maxLength) this.value = <?php echo date('Y'); ?>;" onblur="javascript: if (this.value < this.min) this.value = <?php echo date('Y'); ?>;" />
			-- onclick="calendar()>
			 */ ?>
			<input id="datepicker" onclick="calendar();">
			</td>
		</tr>
			
		<tr>
			<td> 	
				<span class="span"> * </span> Total de Audi&ecirc;ncias:
			</td>
			<td>
				<input id="total" type="number" name="total"  placeholder="&empty;" required   value="<?echo $total;?>" maxlength = "2" min="1" max="23" oninput="javascript: if (this.value <= 0) this.value = 1; else if(this.value>23) this.value = 23;" style='width:40px;' />  
			
				<a href="#">
					<img name="use" src="/Layout/IconeInterrogacao.gif" border=0 style="cursor:hand" align="right" alt="Interrogação" onclick="javascript: document.getElementById('total').focus();">
					<span class="tooltip">
						O n&#250;mero m&#225;ximo de audi&#234;ncias em um dia &#233; 23.
					</span>
				</a>
			</td>
		</tr>
		<tr>
		<td>
			Conciliador:
		</td>
		<td>
			<input id="Conciliador" type="text"   name="conciliadores"  placeholder="Conciliadores" value="<?echo $conciliador; ?>" size="23" >
		</td>
		</tr>
		<tr> 
			<td>
				Sala:
			</td>
			<td> 
				<input id="salas" type="text" name="salas"  placeholder="Sala" value="<? echo $sala ?>"  size="23" >  
            </td>
		</tr>
		<tr>

		</tr>
		<tr>	
			<td> 
				<span class="span"> * </span> Dura&ccedil;&atilde;o:
			</td>
			<td> 
				<select id="duracao"  cadastrar='0' name="duracao"  onChange="carregaNovo(this);" style='width:65px;'  > 	

					<!--Funç&atilde;o que executa a funca10.js com o valor cadastrar=0 que indica que a pagina deve ser recarregada com as opções de horario alteradas-->

					<?	if($duracao == 20){	?>

							<option value="20" selected="selected"> 20min </option> 
							

					<?	}else{	?>

							<option value="20"> 20min</option>

					<?	}if($duracao == 30){	?>

							<option value="30" selected="selected"> 30min</option>

					<?	}else{	?>

							<option value="30"> 30min</option>

					<?	}if($duracao == 40){	?>

							<option value="40" selected="selected"> 40min</option>

					<?	}else{	?>	

							<option value="40"> 40min</option>
						
						
					<?	}if($duracao == 30){	?>

				</select>
			</td>
		</tr>
		<tr>
		<!--Início do conjunto de selects da opção de duração 30min-->
			<td> 	
				<span class="span"> * </span> Hora de in&iacute;cio: 
			</td> 

					<td>
						<select id="horarios"  style="width:65px;color:white" name="horarios" onChange="onEsChange();" onClick="onEsChange();"> <!--Se houver click ou mudança no select, haverá chamada da função ... que fará a dinamização dos horários-->
						
							<option value="07:30" <?=($horario=='07:30')?'selected':''?>> 07:30</option>
							<option value="08:00" <?=($horario=='08:00')?'selected':''?>> 08:00</option>
							<option value="08:30" <?=($horario=='08:30')?'selected':''?>> 08:30</option>
							<option value="09:00" <?=($horario=='09:00')?'selected':''?>> 09:00</option>
							<option value="09:30" <?=($horario=='09:30')?'selected':''?>> 09:30</option>
							<option value="10:00" <?=($horario=='10:00')?'selected':''?>> 10:00</option>
							<option value="10:30" <?=($horario=='10:30')?'selected':''?>> 10:30</option>
							<option value="11:00" <?=($horario=='11:00')?'selected':''?>> 11:00</option>
							<option value="11:30" <?=($horario=='11:30')?'selected':''?>> 11:30</option>
							<option value="12:00" <?=($horario=='12:00')?'selected':''?>> 12:00</option>
							<option value="12:30" <?=($horario=='12:30')?'selected':''?>> 12:30</option>
							<option value="13:00" <?=($horario=='13:00')?'selected':''?>> 13:00</option>
							<option value="13:30" <?=($horario=='13:30')?'selected':''?>> 13:30</option>
							<option value="14:00" <?=($horario=='14:00')?'selected':''?>> 14:00</option>
							<option value="14:30" <?=($horario=='14:30')?'selected':''?>> 14:30</option>
							<option value="15:00" <?=($horario=='15:00')?'selected':''?>> 15:00</option>
							<option value="15:30" <?=($horario=='15:30')?'selected':''?>> 15:30</option>
							<option value="16:00" <?=($horario=='16:00')?'selected':''?>> 16:00</option>
							<option value="16:30" <?=($horario=='16:30')?'selected':''?>> 16:30</option>
							<option value="17:00" <?=($horario=='17:00')?'selected':''?>> 17:00</option>
							<option value="17:30" <?=($horario=='17:30')?'selected':''?>> 17:30</option>
							<option value="18:00" <?=($horario=='18:00')?'selected':''?>> 18:00</option>
							<option value="18:30" <?=($horario=='18:30')?'selected':''?>> 18:30</option>
					

						</select> 

					</td>   
				</tr> 
								
				<tr>
							<td> Adicionar Intervalo: </td>
									<td>
									<select id="Categoria" class="cat" name="categoria" onChange="teste();" style='width:65px;'>
										<option value="0" >sim</option>
										<option value="1">n&atilde;o</option>
									</select> 
									<a href="#">
										<img name="use" src="/Layout/IconeInterrogacao.gif" border=0 style="cursor:hand; display: none;" align="right" alt="Interrogação" onclick="javascript: document.getElementById('total').focus();" >
										<span class="tooltip">
											Para haver intervalo defina mais de 2 Audi&ecirc;ncias.
										</span>
									</a>
							</td>
				</tr>
			<tr id="1">
				<td>  	  Intervalo: </td>
                
				<td> 	
					
					<select id="ini" name="intervalo-ini" onChange=" requis();" onClick=" requis();" style='width:65px;'>
					
							<option value="08:00" <?=($intervalo_ini=='08:00')?'selected':''?> style="display: block"> 08:00</option>
							<option value="08:30" <?=($intervalo_ini=='08:30')?'selected':''?> style="display: block"> 08:30</option>
							<option value="09:00" <?=($intervalo_ini=='09:00')?'selected':''?> style="display: block"> 09:00</option>
							<option value="09:30" <?=($intervalo_ini=='09:30')?'selected':''?> style="display: block"> 09:30</option>
							<option value="10:00" <?=($intervalo_ini=='10:00')?'selected':''?> style="display: block"> 10:00</option>
							<option value="10:30" <?=($intervalo_ini=='10:30')?'selected':''?> style="display: block"> 10:30</option>
							<option value="11:00" <?=($intervalo_ini=='11:00')?'selected':''?> style="display: block"> 11:00</option>
							<option value="11:30" <?=($intervalo_ini=='11:30')?'selected':''?> style="display: block"> 11:30</option>
							<option value="12:00" <?=($intervalo_ini=='12:00')?'selected':''?> style="display: block"> 12:00</option>
							<option value="12:30" <?=($intervalo_ini=='12:30')?'selected':''?> style="display: block"> 12:30</option>
							<option value="13:00" <?=($intervalo_ini=='13:00')?'selected':''?> style="display: block"> 13:00</option>
							<option value="13:30" <?=($intervalo_ini=='13:30')?'selected':''?> style="display: block"> 13:30</option>
							<option value="14:00" <?=($intervalo_ini=='14:00')?'selected':''?> style="display: block"> 14:00</option>
							<option value="14:30" <?=($intervalo_ini=='14:30')?'selected':''?> style="display: block"> 14:30</option>
							<option value="15:00" <?=($intervalo_ini=='15:00')?'selected':''?> style="display: block"> 15:00</option>
							<option value="15:30" <?=($intervalo_ini=='15:30')?'selected':''?> style="display: block"> 15:30</option>
							<option value="16:00" <?=($intervalo_ini=='16:00')?'selected':''?> style="display: block"> 16:00</option>
							<option value="16:30" <?=($intervalo_ini=='16:30')?'selected':''?> style="display: block"> 16:30</option>
							<option value="17:00" <?=($intervalo_ini=='17:00')?'selected':''?> style="display: block"> 17:00</option>
							<option value="17:30" <?=($intervalo_ini=='17:30')?'selected':''?> style="display: block"> 17:30</option>
							<option value="18:00" <?=($intervalo_ini=='18:00')?'selected':''?> style="display: block"> 18:00</option>
							<option value="18:30" <?=($intervalo_ini=='18:30')?'selected':''?> style="display: block"> 18:30</option>
							
					</select>
					-
					
					<select id="fim" name="intervalo-fim"  style='width:65px;' onkeypress="TeclaEnterPress()">
					
							<option value="08:00" disabled style="display: block"> 08:00</option>
							<option value="08:30" <?=($intervalo_fim=='08:30')?'selected':''?> style="display: block"> 08:30</option>
							<option value="09:00" <?=($intervalo_fim=='09:00')?'selected':''?> style="display: block"> 09:00</option>
							<option value="09:30" <?=($intervalo_fim=='09:30')?'selected':''?> style="display: block"> 09:30</option>
							<option value="10:00" <?=($intervalo_fim=='10:00')?'selected':''?> style="display: block"> 10:00</option>
							<option value="10:30" <?=($intervalo_fim=='10:30')?'selected':''?> style="display: block"> 10:30</option>
							<option value="11:00" <?=($intervalo_fim=='11:00')?'selected':''?> style="display: block"> 11:00</option>
							<option value="11:30" <?=($intervalo_fim=='11:30')?'selected':''?> style="display: block"> 11:30</option>
							<option value="12:00" <?=($intervalo_fim=='12:00')?'selected':''?> style="display: block"> 12:00</option>
							<option value="12:30" <?=($intervalo_fim=='12:30')?'selected':''?> style="display: block"> 12:30</option>
							<option value="13:00" <?=($intervalo_fim=='13:00')?'selected':''?> style="display: block"> 13:00</option>
							<option value="13:30" <?=($intervalo_fim=='13:30')?'selected':''?> style="display: block"> 13:30</option>
							<option value="14:00" <?=($intervalo_fim=='14:00')?'selected':''?> style="display: block"> 14:00</option>
							<option value="14:30" <?=($intervalo_fim=='14:30')?'selected':''?> style="display: block"> 14:30</option>
							<option value="15:00" <?=($intervalo_fim=='15:00')?'selected':''?> style="display: block"> 15:00</option>
							<option value="15:30" <?=($intervalo_fim=='15:30')?'selected':''?> style="display: block"> 15:30</option>
							<option value="16:00" <?=($intervalo_fim=='16:00')?'selected':''?> style="display: block"> 16:00</option>
							<option value="16:30" <?=($intervalo_fim=='16:30')?'selected':''?> style="display: block"> 16:30</option>
							<option value="17:00" <?=($intervalo_fim=='17:00')?'selected':''?> style="display: block"> 17:00</option>
							<option value="17:30" <?=($intervalo_fim=='17:30')?'selected':''?> style="display: block"> 17:30</option>
							<option value="18:00" <?=($intervalo_fim=='18:00')?'selected':''?> style="display: block"> 18:00</option>
							<option value="18:30" <?=($intervalo_fim=='18:30')?'selected':''?> style="display: block"> 18:30</option>

					</select>

				</td> 
			</tr>
			<!--Fim do conjunto de selects da opção de duração 30min-->
		<?	}else if($duracao == 40){	?>
				<!--Início do conjunto de selects da opção de duração 40min-->
				<tr>				
					<td>
						<span class="span"> * </span> Hora de in&iacute;cio:</td> 
					<td>
						<select id="horarios" style="width:65px;color:white"  name="horarios" onChange="onEsChange();"  onClick="onEsChange();">
							
							<option value="07:40" <?=($horario=='07:40')?'selected':''?>> 07:40</option>
							<option value="08:20" <?=($horario=='08:20')?'selected':''?>> 08:20</option>
							<option value="09:00" <?=($horario=='09:00')?'selected':''?>> 09:00</option>
							<option value="09:40" <?=($horario=='09:40')?'selected':''?>> 09:40</option>
							<option value="10:20" <?=($horario=='10:20')?'selected':''?>> 10:20</option>
							<option value="11:00" <?=($horario=='11:00')?'selected':''?>> 11:00</option>
							<option value="11:40" <?=($horario=='11:40')?'selected':''?>> 11:40</option>
							<option value="12:20" <?=($horario=='12:20')?'selected':''?>> 12:20</option>
							<option value="13:00" <?=($horario=='13:00')?'selected':''?>> 13:00</option>
							<option value="13:40" <?=($horario=='13:40')?'selected':''?>> 13:40</option>
							<option value="14:20" <?=($horario=='14:20')?'selected':''?>> 14:20</option>
							<option value="15:00" <?=($horario=='15:00')?'selected':''?>> 15:00</option>
							<option value="15:40" <?=($horario=='15:40')?'selected':''?>> 15:40</option>
							<option value="16:20" <?=($horario=='16:20')?'selected':''?>> 16:20</option>
							<option value="17:00" <?=($horario=='17:00')?'selected':''?>> 17:00</option>
							<option value="17:40" <?=($horario=='17:40')?'selected':''?>> 17:40</option>
							<option value="18:20" <?=($horario=='18:20')?'selected':''?>> 18:20</option>
	
						</select>
					</td>
				</tr>
								
				<tr>
							<td> Adicionar Intervalo: </td>
									<td>
									<select id="Categoria" class="cat" name="categoria" onChange="teste();" style='width:65px;'>
										<option value="1" >sim</option>
										<option value="2">n&atilde;o</option>
									</select> 
									<a href="#">
										<img name="use" src="/Layout/IconeInterrogacao.gif" border=0 style="cursor:hand; display: none;" align="right" alt="Interrogação" onclick="javascript: document.getElementById('total').focus();" >
										<span class="tooltip">
											Para haver intervalo defina mais de 2 Audi&ecirc;ncias.
										</span>
									</a>
							</td>
				</tr>
				<tr id="1">
					<td> Intervalo:</td >
					
					<td>
						<select id="ini" name="intervalo-ini" onChange=" requis();" onClick=" requis();" style='width:65px;'>
						
							<option value="08:20" <?=($intervalo_ini=='08:20')?'selected':''?>> 08:20</option>
							<option value="09:00" <?=($intervalo_ini=='09:00')?'selected':''?>> 09:00</option>
							<option value="09:40" <?=($intervalo_ini=='09:40')?'selected':''?>> 09:40</option>
							<option value="10:20" <?=($intervalo_ini=='10:20')?'selected':''?>> 10:20</option>
							<option value="11:00" <?=($intervalo_ini=='11:00')?'selected':''?>> 11:00</option>
							<option value="11:40" <?=($intervalo_ini=='11:40')?'selected':''?>> 11:40</option>
							<option value="12:20" <?=($intervalo_ini=='12:20')?'selected':''?>> 12:20</option>
							<option value="13:00" <?=($intervalo_ini=='13:00')?'selected':''?>> 13:00</option>
							<option value="13:40" <?=($intervalo_ini=='13:40')?'selected':''?>> 13:40</option>
							<option value="14:20" <?=($intervalo_ini=='14:20')?'selected':''?>> 14:20</option>
							<option value="15:00" <?=($intervalo_ini=='15:00')?'selected':''?>> 15:00</option>
							<option value="15:40" <?=($intervalo_ini=='15:40')?'selected':''?>> 15:40</option>
							<option value="16:20" <?=($intervalo_ini=='16:20')?'selected':''?>> 16:20</option>
							<option value="17:00" <?=($intervalo_ini=='17:00')?'selected':''?>> 17:00</option>
							<option value="17:40" <?=($intervalo_ini=='17:40')?'selected':''?>> 17:40</option>
							<option value="18:20" <?=($intervalo_ini=='18:20')?'selected':''?>> 18:20</option>
		

						</select>

						-

						<select id="fim" name="intervalo-fim" style='width:65px;' onkeypress="TeclaEnterPress()">

							<option value="08:20" disabled> 08:20</option>
							<option value="09:00" <?=($intervalo_fim=='09:00')?'selected':''?>> 09:00</option>
							<option value="09:40" <?=($intervalo_fim=='09:40')?'selected':''?>> 09:40</option>
							<option value="10:20" <?=($intervalo_fim=='10:20')?'selected':''?>> 10:20</option>
							<option value="11:00" <?=($intervalo_fim=='11:00')?'selected':''?>> 11:00</option>
							<option value="11:40" <?=($intervalo_fim=='11:40')?'selected':''?>> 11:40</option>
							<option value="12:20" <?=($intervalo_fim=='12:20')?'selected':''?>> 12:20</option>
							<option value="13:00" <?=($intervalo_fim=='13:00')?'selected':''?>> 13:00</option>
							<option value="13:40" <?=($intervalo_fim=='13:40')?'selected':''?>> 13:40</option>
							<option value="14:20" <?=($intervalo_fim=='14:20')?'selected':''?>> 14:20</option>
							<option value="15:00" <?=($intervalo_fim=='15:00')?'selected':''?>> 15:00</option>
							<option value="15:40" <?=($intervalo_fim=='15:40')?'selected':''?>> 15:40</option>
							<option value="16:20" <?=($intervalo_fim=='16:20')?'selected':''?>> 16:20</option>
							<option value="17:00" <?=($intervalo_fim=='17:00')?'selected':''?>> 17:00</option>
							<option value="17:40" <?=($intervalo_fim=='17:40')?'selected':''?>> 17:40</option>
							<option value="18:20" <?=($intervalo_fim=='18:20')?'selected':''?>> 18:20</option>
					
						</select>
					</td>
					</tr>
					<!--Fim do conjunto de selects da opção de duração 40min-->
		<?	}else{	?>
			<!--Início do conjunto de selects da opção de duração 20min-->
			<tr>
				<td> <span class="span"> * </span> Hora de in&iacute;cio:</td>

				<td>
					<select id="horarios" style="width:65px;color:white"  name="horarios"  onChange="onEsChange();" onClick="onEsChange();">
					
		              		<option value="07:20" <?=($horario=='07:20')?'selected':''?>> 07:20</option>
							<option value="07:40" <?=($horario=='07:40')?'selected':''?>> 07:40</option>
							<option value="08:00" <?=($horario=='08:00')?'selected':''?>> 08:00</option>
							<option value="08:20" <?=($horario=='08:20')?'selected':''?>> 08:20</option>
							<option value="08:40" <?=($horario=='08:40')?'selected':''?>> 08:40</option>
							<option value="09:00" <?=($horario=='09:00')?'selected':''?>> 09:00</option>
							<option value="09:20" <?=($horario=='09:20')?'selected':''?>> 09:20</option>
							<option value="09:40" <?=($horario=='09:40')?'selected':''?>> 09:40</option>
							<option value="10:00" <?=($horario=='10:00')?'selected':''?>> 10:00</option>
							<option value="10:20" <?=($horario=='10:20')?'selected':''?>> 10:20</option>
							<option value="10:40" <?=($horario=='10:40')?'selected':''?>> 10:40</option>
							<option value="11:00" <?=($horario=='11:00')?'selected':''?>> 11:00</option>
							<option value="11:20" <?=($horario=='11:20')?'selected':''?>> 11:20</option>
							<option value="11:40" <?=($horario=='11:40')?'selected':''?>> 11:40</option>
							<option value="12:00" <?=($horario=='12:00')?'selected':''?>> 12:00</option>
							<option value="12:20" <?=($horario=='12:20')?'selected':''?>> 12:20</option>
							<option value="12:40" <?=($horario=='12:40')?'selected':''?>> 12:40</option>
							<option value="13:00" <?=($horario=='13:00')?'selected':''?>> 13:00</option>
							<option value="13:20" <?=($horario=='13:20')?'selected':''?>> 13:20</option>
							<option value="13:40" <?=($horario=='13:40')?'selected':''?>> 13:40</option>
							<option value="14:00" <?=($horario=='14:00')?'selected':''?>> 14:00</option>
							<option value="14:20" <?=($horario=='14:20')?'selected':''?>> 14:20</option>
							<option value="14:40" <?=($horario=='14:40')?'selected':''?>> 14:40</option>
							<option value="15:00" <?=($horario=='15:00')?'selected':''?>> 15:00</option>
							<option value="15:20" <?=($horario=='15:20')?'selected':''?>> 15:20</option>
							<option value="15:40" <?=($horario=='15:40')?'selected':''?>> 15:40</option>
							<option value="16:00" <?=($horario=='16:00')?'selected':''?>> 16:00</option>
							<option value="16:20" <?=($horario=='16:20')?'selected':''?>> 16:20</option>
							<option value="16:40" <?=($horario=='16:40')?'selected':''?>> 16:40</option>
							<option value="17:00" <?=($horario=='17:00')?'selected':''?>> 17:00</option>
							<option value="17:20" <?=($horario=='17:20')?'selected':''?>> 17:20</option>
							<option value="17:40" <?=($horario=='17:40')?'selected':''?>> 17:40</option>
							<option value="18:00" <?=($horario=='18:00')?'selected':''?>> 18:00</option>
							<option value="18:20" <?=($horario=='18:20')?'selected':''?>> 18:20</option>
							<option value="18:40" <?=($horario=='18:40')?'selected':''?>> 18:40</option>
							
		           	</select>
				</td>
				</tr>
				
				<tr>
							<td> Adicionar Intervalo: </td>
							<td>
									<select id="Categoria" class="cat" name="categoria" onChange="teste();" style='width:65px;'>
										<option value="1">sim</option>
										<option value="2">n&atilde;o</option>
									</select>
									<a href="#">
										<img name="use"  src="/Layout/IconeInterrogacao.gif" border=0 style="cursor:hand; display: none;" align="right" alt="Interrogação" onclick="javascript: document.getElementById('total').focus();" >
										<span class="tooltip">
											Para haver intervalo defina mais de 2 Audi&ecirc;ncias.
										</span>
									</a>
							</td>
				</tr>
				<tr id="1">
					<td> 	  Intervalo: </td>
					<td>
						<select id="ini" name="intervalo-ini" onChange=" requis();" onClick=" requis();"  style='width:65px;'>
						
								<option value="07:40" <?=($intervalo_ini=='07:40')?'selected':''?>> 07:40</option>
								<option value="08:00" <?=($intervalo_ini=='08:00')?'selected':''?>> 08:00</option>
								<option value="08:20" <?=($intervalo_ini=='08:20')?'selected':''?>> 08:20</option>
								<option value="08:40" <?=($intervalo_ini=='08:40')?'selected':''?>> 08:40</option>
								<option value="09:00" <?=($intervalo_ini=='09:00')?'selected':''?>> 09:00</option>
								<option value="09:20" <?=($intervalo_ini=='09:20')?'selected':''?>> 09:20</option>
								<option value="09:40" <?=($intervalo_ini=='09:40')?'selected':''?>> 09:40</option>
								<option value="10:00" <?=($intervalo_ini=='10:00')?'selected':''?>> 10:00</option>
								<option value="10:20" <?=($intervalo_ini=='10:20')?'selected':''?>> 10:20</option>
								<option value="10:40" <?=($intervalo_ini=='10:40')?'selected':''?>> 10:40</option>
								<option value="11:00" <?=($intervalo_ini=='11:00')?'selected':''?>> 11:00</option>
								<option value="11:20" <?=($intervalo_ini=='11:20')?'selected':''?>> 11:20</option>
								<option value="11:40" <?=($intervalo_ini=='11:40')?'selected':''?>> 11:40</option>
								<option value="12:00" <?=($intervalo_ini=='12:00')?'selected':''?>> 12:00</option>
								<option value="12:20" <?=($intervalo_ini=='12:20')?'selected':''?>> 12:20</option>
								<option value="12:40" <?=($intervalo_ini=='12:40')?'selected':''?>> 12:40</option>
								<option value="13:00" <?=($intervalo_ini=='13:00')?'selected':''?>> 13:00</option>
								<option value="13:20" <?=($intervalo_ini=='13:20')?'selected':''?>> 13:20</option>
								<option value="13:40" <?=($intervalo_ini=='13:40')?'selected':''?>> 13:40</option>
								<option value="14:00" <?=($intervalo_ini=='14:00')?'selected':''?>> 14:00</option>
								<option value="14:20" <?=($intervalo_ini=='14:20')?'selected':''?>> 14:20</option>
								<option value="14:40" <?=($intervalo_ini=='14:40')?'selected':''?>> 14:40</option>
								<option value="15:00" <?=($intervalo_ini=='15:00')?'selected':''?>> 15:00</option>
								<option value="15:20" <?=($intervalo_ini=='15:20')?'selected':''?>> 15:20</option>
								<option value="15:40" <?=($intervalo_ini=='15:40')?'selected':''?>> 15:40</option>
								<option value="16:00" <?=($intervalo_ini=='16:00')?'selected':''?>> 16:00</option>
								<option value="16:20" <?=($intervalo_ini=='16:20')?'selected':''?>> 16:20</option>
								<option value="16:40" <?=($intervalo_ini=='16:40')?'selected':''?>> 16:40</option>
								<option value="17:00" <?=($intervalo_ini=='17:00')?'selected':''?>> 17:00</option>
								<option value="17:20" <?=($intervalo_ini=='17:20')?'selected':''?>> 17:20</option>
								<option value="17:40" <?=($intervalo_ini=='17:40')?'selected':''?>> 17:40</option>
								<option value="18:00" <?=($intervalo_ini=='18:00')?'selected':''?>> 18:00</option>
								<option value="18:20" <?=($intervalo_ini=='18:20')?'selected':''?>> 18:20</option>
								<option value="18:40" <?=($intervalo_ini=='18:40')?'selected':''?>> 18:40</option>
			
							</select>

							-
							<select  id="fim"  name="intervalo-fim" style='width:65px;' onkeypress="TeclaEnterPress()">
							
								<option value="07:40" disabled > 07:40</option>
								<option value="08:00" <?=($intervalo_fim=='08:00')?'selected':''?>> 08:00</option>
								<option value="08:20" <?=($intervalo_fim=='08:20')?'selected':''?>> 08:20</option>
								<option value="08:40" <?=($intervalo_fim=='08:40')?'selected':''?>> 08:40</option>
								<option value="09:00" <?=($intervalo_fim=='09:00')?'selected':''?>> 09:00</option>
								<option value="09:20" <?=($intervalo_fim=='09:20')?'selected':''?>> 09:20</option>
								<option value="09:40" <?=($intervalo_fim=='09:40')?'selected':''?>> 09:40</option>
								<option value="10:00" <?=($intervalo_fim=='10:00')?'selected':''?>> 10:00</option>
								<option value="10:20" <?=($intervalo_fim=='10:20')?'selected':''?>> 10:20</option>
								<option value="10:40" <?=($intervalo_fim=='10:40')?'selected':''?>> 10:40</option>
								<option value="11:00" <?=($intervalo_fim=='11:00')?'selected':''?>> 11:00</option>
								<option value="11:20" <?=($intervalo_fim=='11:20')?'selected':''?>> 11:20</option>
								<option value="11:40" <?=($intervalo_fim=='11:40')?'selected':''?>> 11:40</option>
								<option value="12:00" <?=($intervalo_fim=='12:00')?'selected':''?>> 12:00</option>
								<option value="12:20" <?=($intervalo_fim=='12:20')?'selected':''?>> 12:20</option>
								<option value="12:40" <?=($intervalo_fim=='12:40')?'selected':''?>> 12:40</option>
								<option value="13:00" <?=($intervalo_fim=='13:00')?'selected':''?>> 13:00</option>
								<option value="13:20" <?=($intervalo_fim=='13:20')?'selected':''?>> 13:20</option>
								<option value="13:40" <?=($intervalo_fim=='13:40')?'selected':''?>> 13:40</option>
								<option value="14:00" <?=($intervalo_fim=='14:00')?'selected':''?>> 14:00</option>
								<option value="14:20" <?=($intervalo_fim=='14:20')?'selected':''?>> 14:20</option>
								<option value="14:40" <?=($intervalo_fim=='14:40')?'selected':''?>> 14:40</option>
								<option value="15:00" <?=($intervalo_fim=='15:00')?'selected':''?>> 15:00</option>
								<option value="15:20" <?=($intervalo_fim=='15:20')?'selected':''?>> 15:20</option>
								<option value="15:40" <?=($intervalo_fim=='15:40')?'selected':''?>> 15:40</option>
								<option value="16:00" <?=($intervalo_fim=='16:00')?'selected':''?>> 16:00</option>
								<option value="16:20" <?=($intervalo_fim=='16:20')?'selected':''?>> 16:20</option>
								<option value="16:40" <?=($intervalo_fim=='16:40')?'selected':''?>> 16:40</option>
								<option value="17:00" <?=($intervalo_fim=='17:00')?'selected':''?>> 17:00</option>
								<option value="17:20" <?=($intervalo_fim=='17:20')?'selected':''?>> 17:20</option>
								<option value="17:40" <?=($intervalo_fim=='17:40')?'selected':''?>> 17:40</option>
								<option value="18:00" <?=($intervalo_fim=='18:00')?'selected':''?>> 18:00</option>
								<option value="18:20" <?=($intervalo_fim=='18:20')?'selected':''?>> 18:20</option>
								<option value="18:40" <?=($intervalo_fim=='18:40')?'selected':''?>> 18:40</option>
								
							</select>
					</td>
					</tr>
				<!--Fim do conjunto de selects da opção de duração 20min-->
			<?	}	?>
	</table>	
</form>
	<br><br>
	<center>
		<?
			echo	"<button id=\"cadastro_de_pauta\" name=\"cadastrar_btn\" type=\"submit\" class=\"button2\" cadastrar=\"1\" onClick=\"carregaNovo(this);\">
						Cadastrar
					</button></td>";//checkTextField(this);
		?>
	</center>	  

											   <!--Funç&atilde;o que executa o arquivo funcao10.js com cadastrar=1 que indica que os dados da pauta devem ser enviados para inserir_pauta.php-->										   
    </body>

<!-- DATE PICKER -->
<script type="text/javascript" src="date-picker/jquery-ui.multidatespicker.js"></script>
<script type="text/javascript">

	$('#datepicker').multiDatesPicker();

</script>

</html>

