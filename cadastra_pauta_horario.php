<html>
  <head>
  <script type="text/javascript" src="funcao10.js"></script>
    <meta charset="ISO-8859-1">
    <title>Sistema de Agendamento de Audiencias de Conciliacao</title>
	<style>
	</style>
  </head>
  <body> 
<?php 
	$entidade    = $_GET['entidade']; 
	$assunto     = $_GET['assunto'];
	
	$dia         = $_GET['dia'];
	$mes         = $_GET['mes'];
	$ano         = $_GET['ano'];
	
	$total       = $_GET['total'];
	$conciliador = $_GET['conciliador'];
	$sala        = $_GET['sala'];
 	$duracao     = $_GET['duracao'];
	$horarios    = $_GET['horarios'];
	
	$cadastro    = $_GET['cadastrar'];

?>

<form method="post" name="cadastropauta" id="cadastropauta" action="inserir_pauta.php"> 

	<table cellpadding="5" cellspacing="5" border="1" style="text-align:left; margin: 0 auto">
	
		<caption>Confirmar dados e selecionar Hora de inicio</caption>
		
		<tr><td>Entidade:</td><td><input type="text" name="entidade" value="<?php echo $entidade; ?>" readonly></td></tr>
		<tr><td>Assunto:</td><td><input type="text" name="assunto" value="<?php echo $assunto; ?>" readonly ></td></tr>
		<tr><td>Data:</td><td><input type="number" id="dia" name="dia" style='width:40px;' value="<?php echo $dia; ?>">/<input type="number" id="mes" name="mes" style='width:40px;' value="<?php echo $mes; ?>">/<input type="number" id="ano" name="ano" style='width:80px;' value="<?php echo $ano; ?>"></td></tr>
		<tr><td>Total de Audiencias:</td><td><input type="number" name="total" value="<?php echo $total; ?>" readonly ></td></tr>
		<tr><td>Conciliador:</td><td><input type=text name=conciliador value="<?php echo $conciliador; ?>" readonly ></td></tr>
		<tr><td>Duracao:</td><td><input type="text" name="duracao" value="<?php echo $duracao."min";?>" readonly ></td>
		<tr><td>Sala</td><td><input type="text" name="salas" value="<?php echo $sala; ?>" readonly ></td></tr>
<?php

	if($duracao == 20){
echo	"<tr><td>Hora de inicio:</td><td><select name=\"horarios\">";
echo                    "<option value=\"07:20\"> 07:20</option>";
echo                    "<option value=\"07:40\"> 07:40</option>";
echo                    "<option value=\"08:00\"> 08:00</option>";
echo                    "<option value=\"08:20\"> 08:20</option>";
echo                    "<option value=\"08:40\"> 08:40</option>";
echo                    "<option value=\"09:00\"> 09:00</option>";
echo                    "<option value=\"09:20\"> 09:20</option>";
echo                    "<option value=\"09:40\"> 09:40</option>";
echo                    "<option value=\"10:00\"> 10:00</option>";
echo                    "<option value=\"10:20\"> 10:20</option>";
echo                    "<option value=\"10:40\"> 10:40</option>";
echo                    "<option value=\"11:00\"> 11:00</option>";
echo                    "<option value=\"11:20\"> 11:20</option>";
echo                    "<option value=\"11:40\"> 11:40</option>";
echo                    "<option value=\"12:00\"> 12:00</option>";
echo                    "<option value=\"12:20\"> 12:20</option>";
echo                    "<option value=\"12:40\"> 12:40</option>";
echo                    "<option value=\"13:00\"> 13:00</option>";
echo                    "<option value=\"13:20\"> 13:20</option>";
echo                    "<option value=\"13:40\"> 13:40</option>";
echo                    "<option value=\"14:00\"> 14:00</option>";
echo                    "<option value=\"14:20\"> 14:20</option>";
echo                    "<option value=\"14:40\"> 14:40</option>";
echo                    "<option value=\"15:00\"> 15:00</option>";
echo                    "<option value=\"15:20\"> 15:20</option>";
echo                    "<option value=\"15:40\"> 15:40</option>";
echo                    "<option value=\"16:00\"> 16:00</option>";
echo                    "<option value=\"16:20\"> 16:20</option>";
echo                    "<option value=\"16:40\"> 16:40</option>";
echo                    "<option value=\"17:00\"> 17:00</option>";
echo                    "<option value=\"17:20\"> 17:20</option>";
echo                    "<option value=\"17:40\"> 17:40</option>";
echo                    "<option value=\"18:00\"> 18:00</option>";
echo                    "<option value=\"18:20\"> 18:20</option>";
echo                    "<option value=\"18:40\"> 18:40</option></td></tr>";
	}
	
	if($duracao == 30){
echo	"<tr><td>Hora de inicio:</td><td><select name=\"horarios\">";
echo                    "<option value=\"07:30\"> 07:30</option>";
echo                    "<option value=\"08:00\"> 08:00</option>";
echo                    "<option value=\"08:30\"> 08:30</option>";
echo                    "<option value=\"09:00\"> 09:00</option>";
echo                    "<option value=\"09:30\"> 09:30</option>";
echo                    "<option value=\"10:00\"> 10:00</option>";
echo                    "<option value=\"10:30\"> 10:30</option>";
echo                    "<option value=\"11:00\"> 11:00</option>";
echo                    "<option value=\"11:30\"> 11:30</option>";
echo                    "<option value=\"12:00\"> 12:00</option>";
echo                    "<option value=\"12:30\"> 12:30</option>";
echo                    "<option value=\"13:00\"> 13:00</option>";
echo                    "<option value=\"13:30\"> 13:30</option>";
echo                    "<option value=\"14:00\"> 14:00</option>";
echo                    "<option value=\"14:30\"> 14:30</option>";
echo                    "<option value=\"15:00\"> 15:00</option>";
echo                    "<option value=\"15:30\"> 15:30</option>";
echo                    "<option value=\"16:00\"> 16:00</option>";
echo                    "<option value=\"16:30\"> 16:30</option>";
echo                    "<option value=\"17:00\"> 17:00</option>";
echo                    "<option value=\"17:30\"> 17:30</option>";
echo                    "<option value=\"18:00\"> 18:00</option>";
echo                    "<option value=\"18:30\"> 18:30</option></td></tr>";
	}
	
	if($duracao == 40){
echo	"<tr><td>Hora de inicio:</td><td><select name=\"horarios\">";
echo                    "<option value=\"07:40\"> 07:40</option>";
echo                    "<option value=\"08:20\"> 08:20</option>";
echo                    "<option value=\"09:00\"> 09:00</option>";
echo                    "<option value=\"09:40\"> 09:40</option>";
echo                    "<option value=\"10:20\"> 10:20</option>";
echo                    "<option value=\"11:00\"> 11:00</option>";
echo                    "<option value=\"11:40\"> 11:40</option>";
echo                    "<option value=\"12:20\"> 12:20</option>";
echo                    "<option value=\"13:00\"> 13:00</option>";
echo                    "<option value=\"13:40\"> 13:40</option>";
echo                    "<option value=\"14:20\"> 14:20</option>";
echo                    "<option value=\"15:00\"> 15:00</option>";
echo                    "<option value=\"15:40\"> 15:40</option>";
echo                    "<option value=\"16:20\"> 16:20</option>";
echo                    "<option value=\"17:00\"> 17:00</option>";
echo                    "<option value=\"17:40\"> 17:40</option>";
echo                    "<option value=\"18:20\"> 18:20</option></td></tr>";
	}
?>

</form>
				
</table>

<br>

<br>

</form>
</table>
<center> <input type="submit" class="button2" name="Cadastrar" value="Cadastrar" id="cadastrar"></td> </center>
	</center>
	
	
</body>
</html>