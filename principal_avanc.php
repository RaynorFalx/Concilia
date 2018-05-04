<script>
function mensagem() {
	var name=confirm("Tem certeza que deseja apagar?")
	if (name==true) {
		document.write("Você pressionou o botão OK!")
	}
	else {
		document.write("Você pressionou o botão CANCELAR")
	}
}
</script>
<html>
<center>
<?php
    include "conecta.inc";
    $login_SESSION = $_SESSION['login'];
    $data_login = $_SESSION['data_login'];
    $dia = $_SESSION['dia'];
    $mes = $_SESSION['mes'];
    $ano = $_SESSION['ano'];
    if(!empty($_POST['dia1'])) { $dia1=$_POST['dia1']; }
    if(!empty($_POST['dia2'])) { $dia2=$_POST['dia2']; }
    if(!empty($_POST['mes1'])) { $mes1=$_POST['mes1']; }
    if(!empty($_POST['mes2'])) { $mes2=$_POST['mes2']; }
    if(!empty($_POST['ano1'])) { $ano1=$_POST['ano1']; }
    if(!empty($_POST['ano2'])) { $ano2=$_POST['ano2']; }
    $perfil=$_SESSION['perfil'];
    $lotacao=$_SESSION['lotacao'];
    $conexao=$_SESSION['conexao'];
   if (isset($_POST['Visualizar'])) {
    $tipo_busca=$_POST['tipo_busca'];
    $entidade_buscar=$_POST['entidade_buscar'];
    $assunto_buscar=$_POST['assunto_buscar'];
    }
        if(isset($login_SESSION)){
            echo"Bem-Vindo, $login_SESSION. Hoje é $data_login.<br>Seu perfil é de $perfil e sua lotação é $lotacao.<br><br><br>";
?>
<br>
<h3>Lista de pautas</h3>
</center>
<table align="center" cellpadding="5" cellspacing="5" border="1">
<tr>
<td><center>ID</td></center> 
<td><center>Entidade</td></center>
<td><center>Assunto</td></center>
<td><center>Data</td></center>
<td><center>Sala</td></center>
<td><center>Horário de inicio</td></center>
<td><center>Total disponível</td></center>
<td><center>-</td></center>
<td><center>-</td></center>
<?php
if ($perfil=="CEJUC") { echo "<td><center></td></center>"; }
?>
</tr>
<?php
	    if ($tipo_busca=='tipo_1') { $query="SELECT ID, Entidade, Assunto, DATA, Total, Total_disponivel, Hora_inicio, Sala from setorial.Controle where data >= TRUNC(SYSDATE) - 60"; }
	    if ($tipo_busca=='tipo_2') { $query="SELECT ID, Entidade, Assunto, DATA, Total, Total_disponivel, Hora_inicio, Sala from setorial.Controle where data > TO_DATE('$mes1-$dia1-$ano1','MM-DD-YYYY') and data < TO_DATE('$mes2-$dia2-$ano2','MM-DD-YYYY')"; }
	    if ($tipo_busca=='tipo_3') { 
		$query="SELECT ID, Entidade, Assunto, DATA, Total, Total_disponivel, Hora_inicio, Sala from setorial.Controle  WHERE Entidade LIKE '%$entidade_buscar%'"; 
		if(!empty($_POST['a_partir1'])){ $query .= " AND data >= TRUNC(SYSDATE)"; }
            }
	    if ($tipo_busca=='tipo_4') { 
		$query="SELECT ID, Entidade, Assunto, DATA, Total, Total_disponivel, Hora_inicio, Sala from setorial.Controle WHERE Assunto LIKE '%$assunto_buscar%'"; 
		if(!empty($_POST['a_partir2'])){ $query .= " AND data >= TRUNC(SYSDATE)"; }
	    }
	    $resultado=ociparse($conexao, $query);
        ociexecute($resultado);

	    while($linha=oci_fetch_array($resultado)){


echo "<tr bgcolor=#D3D3D3>";
echo "<td><font face=calibri color=#000000 size=4> $linha[0] </font></td>";
echo "<td><font face=calibri color=#000000 size=4> $linha[1] </font></td>";
echo "<td><font face=calibri color=#000000 size=4> $linha[2] </font></td>";
echo "<td><font face=calibri color=#000000 size=4> $linha[3] </font></td>";
echo "<td><font face=calibri color=#000000 size=4> $linha[7] </font></td>";
echo "<td><font face=calibri color=#000000 size=4> $linha[6] </font></td>";
echo "<td><font face=calibri color=#000000 size=4> $linha[5] </font></td>";

$_SESSION['login']=$login_SESSION;
$_SESSION['lotacao']=$lotacao;
$_SESSION['perfil']=$perfil;
$assunto=$linha[2];
$entidade=$linha[1];

if ($linha[5]>0) { echo "<td><font face=calibri color=#000000 size=4><a href=marcar.php?id=$linha[0]&total=$linha[4]&horario=$linha[6]&lotacao=$lotacao&total_disponivel=$linha[5]&entidade=$entidade> Marcar </a></font></td>"; }
if ($linha[5]==0) { echo "<td><font face=calibri color=#000000 size=4> Pauta cheia </font></td>"; }
if ($linha[4]>$linha[5]) { echo "<td><font face=calibri color=#000000 size=4><a href=listar.php?id=$linha[0]&assunto=$assunto&data=$linha[3]&total_disponivel=$linha[5]&entidade=$entidade> Listar </a></font></td>"; }
if ($linha[4]==$linha[5]) { echo "<td><font face=calibri color=#000000 size=4> - </font></td>"; }
if ($perfil=="CEJUC" AND $linha[5]==$linha[4]) { echo "<td><font face=calibri color=#000000 size=4><a href=apagar_pauta.php?id=$linha[0] onclick=mensagem()>Apagar</a></font></td>"; } 
if ($perfil=="CEJUC" AND $linha[5]<$linha[4]) { echo "<td><font face=calibri color=#000000 size=4> - </font></td>"; }
echo "</tr>";

}}     
else {
            echo"Bem-Vindo, convidado <br>";
            echo"Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";
            echo"<br><a href='login.html'>Faça Login</a> Para ler o conteúdo";
}
?>
</table>
<br>
<br>
<center><a href=visualiza_avanc.php>Voltar</center><br>
<center><input type="button" name="imprimir" value="Imprimir" onclick="window.print();"></center>
</center>
</html>

