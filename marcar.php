<?php
include "conecta.inc";

$conexao = $_SESSION['conexao'];
$data_aud = $_SESSION['data'];
$id = $_SESSION['id'];
$total = $_SESSION['total'];
$horario = $_SESSION['horario'];
$lotacao = $_SESSION['lotacao'];
$sala = $_SESSION['sala'];
$total_disponivel = $_SESSION['total_disponivel'];
$entidade = $_SESSION['entidade'];
$horarios_ja_marcados = array();
$perfil = $_SESSION['perfil'];
$lista_horarios = array();
$lista_horarios[0] = "07:30:00";
$lista_horarios[1] = "08:00:00";
$lista_horarios[2] = "08:30:00";
$lista_horarios[3] = "09:00:00";
$lista_horarios[4] = "09:30:00";
$lista_horarios[5] = "10:00:00";
$lista_horarios[6] = "10:30:00";
$lista_horarios[7] = "11:00:00";
$lista_horarios[8] = "11:30:00";
$lista_horarios[9] = "12:00:00";
$lista_horarios[10] = "12:30:00";
$lista_horarios[11] = "13:00:00";
$lista_horarios[12] = "13:30:00";
$lista_horarios[13] = "14:00:00";
$lista_horarios[14] = "14:30:00";
$lista_horarios[15] = "15:00:00";
$lista_horarios[16] = "15:30:00";
$lista_horarios[17] = "16:00:00";
$lista_horarios[18] = "16:30:00";
$lista_horarios[19] = "17:00:00";
$lista_horarios[20] = "17:30:00";
$lista_horarios[21] = "18:00:00";
$lista_horarios[22] = "18:30:00";
$_SESSION['lista_horarios'] = $lista_horarios;
$query = "SELECT var_ds_vara from p_vara where var_sesu_cd_secsubsec = '$codigo_local'";
$resultado = ociparse($conexao, $query);
ociexecute($resultado);
?>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sistema de Agendamento de Audiências de Conciliação TESTE</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="css/reset.css">

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/style.css">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <link rel="stylesheet" type="text/css" href="/stdtheme.css" />
  </head>

<img src="sh.gif" height="42" width="42" alt="Acordo">
<table align="center" cellpadding="5" cellspacing="5" border="1">
<?//*adicionado o caractere <?*//
$entidade=urlencode($entidade);
echo "<form method=POST action=inserir.php?id=$id&total=$total&horario=horario&lotacao=$lotacao&total_disponivel=$total_disponivel&entidade=$entidade&data=$data_aud&sala=$sala>";
if ($perfil!='CEJUC') { echo "<tr><td>* Vara:</td><td>$lotacao</td>"; }
else { 
echo "<tr>";
echo "<td>Vara:</td>";
echo "<td> <select name=vara_selecionada>";
echo "<option value='null'> Sem Vara";
while ($linha=oci_fetch_array($resultado,$CampoResultado)){

echo "<option value=".utf8_decode($linha[0]).">".utf8_decode($linha[0])."</option>";
}
echo "</select>";
echo "</td>";
}
?>
</tr><td>* Processo:</td><td><input type="text" name="processo"></td>
</tr><td>* Parte:</td><td><input type="text" name="parte"></td>
</tr><td>* Horário</td><td><form name="horarios"><select name="horarios" color:#FFF8DC style="background-color:#607B8B; font size:8pt; color:#FFF8DC" size="1">
<?php
$counter = 0;
$i = 0;
$z = 0;
$achei = 0;
$n_found = 0;
$valor_inicio = 0;
$limite = 0;

while ($i <= 22) {
    if ($lista_horarios[$i] == $horario) {
        $valor_inicio = $i;
    }

    $i = $i + 1;
}

$query = "SELECT Horario from setorial.Audiencias WHERE ID=$id ORDER BY Horario ASC";
$resultado = ociparse($conexao, $query);
ociexecute($resultado);

while ($linha = oci_fetch_array($resultado)) {
    $horarios_ja_marcados[$n_found] = $linha[0];
    $n_found = $n_found + 1;
}

$i = $valor_inicio;
$limite = $i + $total - 1;

while ($i <= $limite) {
    $achei = 0;
    $z = 0;
    while ($z < $n_found) {
        if ($lista_horarios[$i] == $horarios_ja_marcados[$z]) {
            $achei = 1;
        }

        $z = $z + 1;
    }

    if ($achei == 0) {
        echo "<option value=$i> $lista_horarios[$i]";
    }

    $i = $i + 1;
}

?>
</td>
</tr>
<br/>
<tr>
    <td colspan="2" align="center">
        <input type="submit" name="Cadastrar" value="Cadastrar" id="cadastrar">
    </td>
</tr>
</form>
</table>
<a href="principal.php">Voltar</a>
</center>
</body>
</html>