<html>
<head>
<meta charset="ISO-8859-1">
</head>
<center>
<?php
    include "conecta.inc";
    $conexao=$_SESSION['conexao'];
    $perfil=$_SESSION['perfil'];
    $lotacao=$_SESSION['lotacao'];
    echo "<h3>Usu&aacute;rios cadastrados</h3>";
?>
<table align="center" cellpadding="5" cellspacing="5" border="1">
<tr>
<td><center>Matr&iacute;cula</td></center> 
<td><center>Perfil</td></center>
<td><center>Lotacao</td></center>
<td><center></td></center>

</tr>

<?php
$query="SELECT matricula, perfil, lotacao from Usuarios"; 
$resultado=mysqli_query($conexao, $query) or die("Problema de conex&atilde;o com banco de dados". mysql_error());
while($linha=mysqli_fetch_row($resultado)){
echo "<tr bgcolor=#D3D3D3>";
echo "<td><font face=calibri color=#000000 size=4> $linha[0] </font></td>";
echo "<td><font face=calibri color=#000000 size=4> $linha[1] </font></td>";
echo "<td><font face=calibri color=#000000 size=4> $linha[2] </font></td>";
$concatena='<td><font face="calibri" color="#000000" size="4"><a href="apagar_usuario.php?matricula=' . $linha[0] . '" onclick="return confirm(\'Confirma a exclus&atilde;o?\')">Apagar</a></font></td>'; 
echo $concatena;

echo "</tr>";
}
?>
</table>
<a href="principal.php">Voltar</a>
<br>
<br>
<input type="button" name="imprimir" value="Imprimir" onclick="window.print();">
